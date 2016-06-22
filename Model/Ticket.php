<?php
App::uses('AppModel', 'Model');

class Ticket extends AppModel {
    
    public $useTable = 'tickets';
    public $primaryKey = 'id';
    public $displayField = 'ticket_number';

    public $hasMany = array(
        'TicketMessage' => array(
            'className' => 'TicketMessage',
            'foreignKey' => 'ticket_id'
        )
    );

    public $belongsTo = array(
        'Department' => array(
            'className' => 'Department',
            'foreignKey' => 'department_id'
        )
    );

    public function createTicket(array $data, $user_id)
    {
        $data_save = $data;
        $data_save['Ticket']['customer_name'] = trim($data_save['Ticket']['customer_name']);

        // Generate ticket's number
        App::uses('ConnectionManager', 'Model');
        $db = ConnectionManager::getDataSource('default');

        $conn = new PDO(
            'mysql:host='.$db->config['host'].';dbname='.$db->config['database'],
            $db->config['login'],
            $db->config['password'],
            array(PDO::ATTR_PERSISTENT => true)
        );

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conn->exec('LOCK TABLES tickets READ;');
        $conn->exec('LOCK TABLES tickets WRITE;');

        $str_query = "SELECT COUNT(id) AS total_ticket FROM tickets";

        $query = $conn->query($str_query);
        $total_ticket_fetch = $query->fetch(PDO::FETCH_ASSOC);

        $conn->exec('UNLOCK TABLES;');
        $conn = null;  // close connection manually. because it is a persistent connection

        $next_number = $total_ticket_fetch['total_ticket'] + 1;
        $str_number = strlen($next_number) == 1 ? '0'.$next_number : $next_number;
        $str_digit = '0000000';
        $start_sub = 0 - strlen($str_number);

        $ticket_number = substr_replace($str_digit, $str_number, $start_sub);
        $ticket_number = "MAMI".$ticket_number;
        // --- End generate ticket's number

        $data_save['Ticket']['ticket_number'] = $ticket_number;

        if ($data['Ticket']['ticket_status'] != 'C') {
            $data_save['Ticket']['due_date'] = getWDays(date('Y-m-d'), array(), 7);
        } else {
            $data_save['Ticket']['due_date'] = null;
        }

        if (!isset($data['Ticket']['department_id'])) {
            $data['Ticket']['department_id'] = null;
        }
        
        $data_save['Ticket']['created'] = date('Y-m-d H:i:s');
        $data_save['Ticket']['created_by'] = $user_id;

        $data_save['TicketMessage'][0]['ticket_message'] = trim($data_save['TicketMessage'][0]['ticket_message']);
        $data_save['TicketMessage'][0]['created_by'] = $user_id;

        if (empty($data_save['TicketMessage'][0]['ticket_message'])) {
            unset($data_save['TicketMessage']);
        }

        $this->create();
        $save = $this->saveAssociated($data_save);

        if ($save) {

            // Fetch last created / newest ticket
            $aticket = $this->find('first', array(
                'fields' => array(
                    'InteractionLevel1.id AS interaction_id1',
                    'InteractionLevel2.id AS interaction_id2',
                    'InteractionLevel3.id AS interaction_id3',
                    'InteractionLevel1.interaction_title AS interaction_title1',
                    'InteractionLevel2.interaction_title AS interaction_title2',
                    'InteractionLevel3.interaction_title AS interaction_title3',
                    'Ticket.*',
                    'Customer.CLI_TYP'
                ),
                'conditions' => array('Ticket.ticket_number' => $ticket_number),
                'joins' => array(
                    array(
                        'table' => 'interactions',
                        'alias' => 'InteractionLevel1',
                        'conditions' => array('Ticket.interaction_code1 = InteractionLevel1.id')
                    ),
                    array(
                        'table' => 'interactions',
                        'alias' => 'InteractionLevel2',
                        'conditions' => array('Ticket.interaction_code2 = InteractionLevel2.id')
                    ),
                    array(
                        'table' => 'interactions',
                        'alias' => 'InteractionLevel3',
                        'type' => 'LEFT',
                        'conditions' => array('Ticket.interaction_code3 = InteractionLevel3.id')
                    ),
                    array(
                        'table' => 'customers',
                        'alias' => 'Customer',
                        'conditions' => array('Ticket.cif = Customer.CUSTOMER_ID')
                    )
                ),
            ));

            if ($data['Ticket']['ticket_status'] == 'S') {
                // Send email to bosses
                App::uses('CakeEmail', 'Network/Email');

                $bosses = ClassRegistry::init('User')->find('all', array(
                    'fields' => array('User.email', 'User.complete_name'),
                    'conditions' => array('User.role' => Configure::read('roles_receive_email'))
                ));

                $email = new CakeEmail('smtp');
                $email->emailFormat('text');
                $email->template('default', 'default');

                foreach ($bosses as $boss) {
                    $email->viewVars(array(
                        'ticket_number' => $ticket_number,
                        'pic_name' => $boss['User']['complete_name'],
                        'ticket' => $aticket
                    ));

                    $email->to($boss['User']['email']);
                    $email->subject("[MAMI CRM System] New ticket created: ".$ticket_number);
                    $email->send();
                }
            }
        }

        return $save;
    }

    public function updateTicket(array $data, $user_id)
    {
        //
    }

    public function getTicket($ticket_id)
    {
        $this->recursive = 2;
        $ticket = $this->find('first', array(
            'fields' => array(
                'InteractionLevel1.interaction_title AS interaction_title1',
                'InteractionLevel2.interaction_title AS interaction_title2',
                'InteractionLevel3.interaction_title AS interaction_title3',
                'Ticket.*'
            ),
            'conditions' => array('Ticket.id' => $ticket_id),
            'joins' => array(
                array(
                    'table' => 'interactions',
                    'alias' => 'InteractionLevel1',
                    'conditions' => array('Ticket.interaction_code1 = InteractionLevel1.id')
                ),
                array(
                    'table' => 'interactions',
                    'alias' => 'InteractionLevel2',
                    'conditions' => array('Ticket.interaction_code2 = InteractionLevel2.id')
                ),
                array(
                    'table' => 'interactions',
                    'type' => 'LEFT',
                    'alias' => 'InteractionLevel3',
                    'conditions' => array('Ticket.interaction_code3 = InteractionLevel3.id')
                )
            )
        ));
        
        return $ticket;
    }

}
