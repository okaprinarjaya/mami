<?php
App::uses('AppController', 'Controller');

class TicketsController extends AppController {

	public $components = array('Paginator');
    public $uses = array('Ticket', 'TicketStatus', 'Department', 'Interaction', 'Customer');

    public function beforeRender()
    {
        $this->set('__module_title__', 'Tickets');
    }

    public function index()
    {
        $conditions = array();

        if (isset($this->request->query['kwd']) && !empty($this->request->query['kwd'])) {
            $conditions['OR'] = array(
                array('Ticket.customer_name' => '%'.$this->request->query['kwd'].'%'),
                array('Ticket.email' => '%'.$this->request->query['kwd'].'%'),
            );
        }

        if (isset($this->request->query['ticket_status']) && !empty($this->request->query['ticket_status'])) {
            $conditions['Ticket.ticket_status'] = $this->request->query['ticket_status'];
        }

        $this->Paginator->settings = array(
            'fields' => array(
                'InteractionLevel1.interaction_title AS interaction_title1',
                'InteractionLevel2.interaction_title AS interaction_title2',
                'InteractionLevel3.interaction_title AS interaction_title3',
                'Ticket.*'
            ),
            'conditions' => $conditions,
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
                )
            ),
            'order' => array('Ticket.created' => 'DESC'),
            'limit' => isset($this->request->query['rpp']) ? $this->request->query['rpp'] : 50,
        );

        $ticket_statuses = $this->TicketStatus->getTicketStatuses();
        $tickets = array();

        try {
            $tickets = $this->Paginator->paginate($this->Ticket);
        } catch (NotFoundException $e) {
            $this->redirect('/tickets?'.http_build_query($this->request->query));
        }

        $this->set(compact('tickets', 'ticket_statuses'));
    }

    public function add($customer_id)
    {
        if ($this->request->is('post')) {
            if ($this->Ticket->createTicket(
                $this->request->data,
                $this->Auth->user('id')
            )) {
                $this->Session->setFlash('New ticket created successfuly!', 'Flash/success');
                return $this->redirect('/tickets');
            } else {
                $this->Session->setFlash('Failed to create new ticket', 'Flash/error');
            }
        }

        $depts_fetch = $this->Department->getDepartments();
        $depts = Hash::combine($depts_fetch, '{n}.Department.id', '{n}.Department.department_name');

        $interactions_root = $this->Interaction->getInteractions();
        $ticket_statuses = array('C' => 'CLOSED', 'S' => 'SUBMIT');
        $customer = $this->Customer->find('first', array(
            'fields' => array('Customer.CLI_NM', 'Customer.MID_NM', 'Customer.EMAIL_ADD'),
            'conditions' => array('Customer.CUSTOMER_ID' => $customer_id)
        ));

        $channel_types = array(
            'W' => 'Walk In',
            'P' => 'Phone',
            'E' => 'Email',
            'F' => 'Fax',
            'M' => 'Mail',
            'S' => 'Social Media'
        );

        $this->set(compact(
            'customer_id',
            'depts',
            'ticket_statuses',
            'interactions_root',
            'channel_types',
            'customer'
        ));
    }

    public function edit($ticket_id)
    {
        if ($this->request->is(array('post', 'put'))) {
            
            $this->request->data['TicketMessage'][0]['ticket_message'] = trim($this->request->data['TicketMessage'][0]['ticket_message']);
            if (empty($this->request->data['TicketMessage'][0]['ticket_message'])) {
                unset($this->request->data['TicketMessage']);
            }

            if ($this->Ticket->saveAssociated($this->request->data)) {
                $this->Session->setFlash('Ticket Updated Successfuly!', 'Flash/success');
                return $this->redirect('/tickets');
            } else {
                $this->Session->setFlash('Failed to update the ticket', 'Flash/error');
                return $this->redirect('/tickets');
            }
        }
    }

    public function ajax_modal_get_ticket_detail($ticket_id)
    {
        $this->autoRender = false;
        $this->layout = null;

        if ($this->request->is('ajax')) {
            $ticket = $this->Ticket->getTicket($ticket_id);
            $ticket_statuses = array('C' => 'CLOSED', 'P' => 'IN PROGRESS');
            
            $this->set(compact(
                'ticket',
                'ticket_statuses'
            ));

            $this->response->type('text');
            $this->render('ajax_modal_ticket_detail');
        }
    }

    public function ajax_get_interaction($parent_id)
    {
        $this->autoRender = false;
        $this->layout = null;

        if ($this->request->is('ajax')) {
            
            $interactions = $this->Interaction->getInteractions($parent_id);
            $interactions_str = '<option value="" selected="selected">--CHOOSE--</option>';
            $interactions_str .= "\n";

            foreach ($interactions as $key => $value) {
                $interactions_str .= '<option value="'.$key.'">'.$value.'</option>';
                $interactions_str .= "\n";
            }

            $this->response->type('text');
            echo $interactions_str;
        }
    }

}
