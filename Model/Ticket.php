<?php
App::uses('AppModel', 'Model');

class Ticket extends AppModel {
    
    public $useTable = 'tickets';
    public $primaryKey = 'id';
    public $displayField = 'ticket_number';

    public function createTicket(array $data, $user_id, $user_id_agt)
    {
        $data_save = $data;
        if ($data['Ticket']['ticket_status'] != 'C') {
            $data_save['Ticket']['due_date'] = getWDays(date('Y-m-d'), array(), 7);
        } else {
            $data_save['Ticket']['due_date'] = null;
        }
        
        $data_save['Ticket']['created'] = date('Y-m-d H:i:s');
        $data_save['Ticket']['created_by'] = $user_id;
        $data_save['Ticket']['created_by_agt'] = $user_id_agt;

        $this->create();
        return $this->save($data_save);
    }

    public function getTicket($ticket_id)
    {
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
                    'alias' => 'InteractionLevel3',
                    'conditions' => array('Ticket.interaction_code3 = InteractionLevel3.id')
                )
            )
        ));
        
        return $ticket;
    }

}