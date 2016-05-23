<?php
App::uses('AppController', 'Controller');

class DashboardController extends AppController {
 
    public $name = 'Dashboard';
    public $uses = array('Ticket');

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function beforeRender()
    {
        $this->set('__module_title__', 'Dashboard');
    }

    public function index()
    {
        //
    }

    public function ajax_chart($periode) {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {

            $date_info = array();
            if ($periode == 'monthly') {
                $date_info['sd'] = date('Y-m-01');
                $date_info['ed'] = date('Y-m-t');
            } else if ($periode == 'weekly') {
                $week_date_range = current_week_date_range();
                $date_info['sd'] = $week_date_range['sd'];
                $date_info['ed'] = $week_date_range['ed'];
            } else {
                $date_info['sd'] = date('Y-m-d');
                $date_info['ed'] = date('Y-m-d');
            }

            $date_range = date_range($date_info['sd'], $date_info['ed']);
            $chart_data = array();

            foreach ($date_range as $item) {
                $chart_data[$item] = array('OPEN' => 0, 'SUBMIT' => 0);
            }

            $this->Ticket->recursive = -1;
            $ticket_open = $this->Ticket->find('all', array(
                'fields' => array(
                    'DATE(Ticket.created) AS ticket_created',
                    'COUNT(*) AS total_ticket'
                ),
                'conditions' => array(
                    'Ticket.ticket_status' => 'P',
                    'DATE(Ticket.created) >= ? AND DATE(Ticket.created) <= ?' => array($date_info['sd'], $date_info['ed'])
                ),
                'group' => array('DATE(Ticket.created)')
            ));

            $ticket_submit = $this->Ticket->find('all', array(
                'fields' => array(
                    'DATE(Ticket.created) AS ticket_created',
                    'COUNT(*) AS total_ticket'
                ),
                'conditions' => array(
                    'Ticket.ticket_status' => 'S',
                    'DATE(Ticket.created) >= ? AND DATE(Ticket.created) <= ?' => array($date_info['sd'], $date_info['ed'])
                ),
                'group' => array('DATE(Ticket.created)')
            ));

            foreach ($ticket_open as $item) {
                $chart_data[$item[0]['ticket_created']]['OPEN'] = $item[0]['total_ticket'];
            }

            foreach ($ticket_submit as $item) {
                $chart_data[$item[0]['ticket_created']]['SUBMIT'] = $item[0]['total_ticket'];
            }

            $chart_data_display = array();

            foreach ($chart_data as $itemKey => $itemVal) {
                $dt_split = explode("-", $itemKey);
                $chart_data_display[] = array(
                    'dt' => $dt_split[2],
                    'vo' => $itemVal['OPEN'],
                    'vs' => $itemVal['SUBMIT']
                );
            }

            $this->response->type('json');
            echo json_encode($chart_data_display);
        }
    }
}
