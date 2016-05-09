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

    public function ajax_chart() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {

            $date_range = date_range('2016-04-01', '2016-04-30');
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
                    'DATE(Ticket.created) >= ? AND DATE(Ticket.created) <= ?' => array('2016-04-01', '2016-04-28')
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
                    'DATE(Ticket.created) >= ? AND DATE(Ticket.created) <= ?' => array('2016-04-01', '2016-04-30')
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
            $chart_data['2016-04-10']['OPEN'] = 10;
            $chart_data['2016-04-10']['SUBMIT'] = 15;

            foreach ($chart_data as $itemKey => $itemVal) {
                $dt_split = explode("-", $itemKey);
                $chart_data_display[] = array(
                    'dt' => $dt_split[2].'/'.$dt_split[1],
                    'vo' => $itemVal['OPEN'],
                    'vs' => $itemVal['SUBMIT']
                );
            }

            $this->response->type('json');
            echo json_encode($chart_data_display);
        }
    }
}
