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
        return $this->saveAssociated($data_save);
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
