<?php
App::uses('AppController', 'Controller');

class TicketsController extends AppController {

	public $components = array('Paginator');
    public $uses = array(
        'Ticket',
        'TicketStatus',
        'Department',
        'Interaction',
        'Customer',
        'User'
    );

    public function beforeRender()
    {
        $this->set('__module_title__', 'Tickets');
    }

    public function index()
    {
        $conditions = array();
        $grid_view_type = '';

        if (isset($this->request->query['kwd']) && !empty($this->request->query['kwd'])) {
            $conditions['OR'] = array(
                array('Ticket.customer_name LIKE' => '%'.$this->request->query['kwd'].'%'),
                array('Ticket.email LIKE' => '%'.$this->request->query['kwd'].'%'),
                array('Ticket.ticket_number LIKE' => '%'.$this->request->query['kwd'].'%'),
            );
        }

        if (isset($this->request->query['sla_state']) && !empty($this->request->query['sla_state'])) {
            if ($this->request->query['sla_state'] == 'LT_SLA') {
                array_push($conditions, array('Ticket.due_date > NOW()'));
            } else if ($this->request->query['sla_state'] == 'GT_SLA') {
                array_push($conditions, array('Ticket.due_date < NOW()'));
            }  else if ($this->request->query['sla_state'] == 'EQ_SLA') {
                $grid_view_type = 'already_due_date';
                array_push($conditions, array('DATE(Ticket.due_date) <= DATE(NOW())'));
            }
        }

        if (isset($this->request->query['from_date_val']) && !empty($this->request->query['from_date_val'])) {
            $ed = $this->request->query['to_date_val'];
            if (empty($this->request->query['to_date_val'])) {
                $ed = $this->request->query['from_date_val'];
            }

            $conditions['Ticket.created >= ? AND Ticket.created <= ?'] = array(
                $this->request->query['from_date_val'],
                $ed
            );
        }

        if (isset($this->request->query['periode']) && !empty($this->request->query['periode'])) {
            $periode_conds = array();

            if ($this->request->query['periode'] == 'D') {
                $periode_conds['Ticket.created'] = date('Y-m-d');

            } else if ($this->request->query['periode'] == 'W') {
                $week_date_range = current_week_date_range();
                $periode_conds['Ticket.created >= ? AND Ticket.created <= ?'] = array(
                    $week_date_range['sd'],
                    $week_date_range['ed']
                );

            } else if ($this->request->query['periode'] == 'M') {
                $periode_conds['MONTH(Ticket.created)'] = date('m');
            }

            if ($periode_conds) {
                $conditions = array_merge($conditions, $periode_conds);
            }
            
        }

        if (isset($this->request->query['ticket_status']) && !empty($this->request->query['ticket_status'])) {
            $conditions['Ticket.ticket_status'] = $this->request->query['ticket_status'];
        }

        if (isset($this->request->query['interaction_code1']) && !empty($this->request->query['interaction_code1'])) {
            $conditions['InteractionLevel1.id'] = $this->request->query['interaction_code1'];
        }

        if (isset($this->request->query['interaction_code2']) && !empty($this->request->query['interaction_code2'])) {
            $conditions['InteractionLevel2.id'] = $this->request->query['interaction_code2'];
        }

        $this->Paginator->settings = array(
            'fields' => array(
                'InteractionLevel1.id AS interaction_id1',
                'InteractionLevel2.id AS interaction_id2',
                'InteractionLevel3.id AS interaction_id3',
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
        $interactions_root = $this->Interaction->getInteractions();
        $interactions_codes2 = array();

        if (isset($this->request->query['interaction_code1']) && !empty($this->request->query['interaction_code1'])) {
            $interactions_codes2 = $this->Interaction->getInteractions($this->request->query['interaction_code1']);
        }

        $tickets = array();

        try {
            $this->Ticket->recursive = 2;
            $tickets = $this->Paginator->paginate($this->Ticket);
        } catch (NotFoundException $e) {
            $this->redirect('/tickets?'.http_build_query($this->request->query));
        }

        $this->set(compact(
            'tickets',
            'ticket_statuses',
            'interactions_root',
            'interactions_codes2',
            'grid_view_type'
        ));

    }

    public function top_interaction() {
        $conditions = array();

        if (isset($this->request->query['interaction_code1']) && !empty($this->request->query['interaction_code1'])) {
            $conditions['InteractionLevel1.id'] = $this->request->query['interaction_code1'];
        }

        if (isset($this->request->query['interaction_code2']) && !empty($this->request->query['interaction_code2'])) {
            $conditions['InteractionLevel2.id'] = $this->request->query['interaction_code2'];
        }

        if (isset($this->request->query['periode']) && !empty($this->request->query['periode'])) {
            $periode_conds = array();

            if ($this->request->query['periode'] == 'D') {
                $periode_conds['Ticket.created'] = date('Y-m-d');

            } else if ($this->request->query['periode'] == 'W') {
                $week_date_range = current_week_date_range();
                $periode_conds['Ticket.created >= ? AND Ticket.created <= ?'] = array(
                    $week_date_range['sd'],
                    $week_date_range['ed']
                );

            } else if ($this->request->query['periode'] == 'M') {
                $periode_conds['MONTH(Ticket.created)'] = date('m');
            }

            if ($periode_conds) {
                $conditions = array_merge($conditions, $periode_conds);
            }
            
        }

        if (isset($this->request->query['from_date_val']) && !empty($this->request->query['from_date_val'])) {
            $ed = $this->request->query['to_date_val'];
            if (empty($this->request->query['to_date_val'])) {
                $ed = $this->request->query['from_date_val'];
            }

            $conditions['Ticket.created >= ? AND Ticket.created <= ?'] = array(
                $this->request->query['from_date_val'],
                $ed
            );
        }

        $this->Ticket->unbindModel(array(
            'hasMany' => array('TicketMessage'),
            'belongsTo' => array('Department')
        ));

        $this->Ticket->virtualFields = array('totdat' => 'COUNT(*)');
        $top_interactions = $this->Ticket->find('all', array(
            'fields' => array('Ticket.totdat', 'InteractionLevel1.interaction_title', 'InteractionLevel2.interaction_title'),
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
                )
            ),
            'order' => array('Ticket.totdat' => 'DESC'),
            'group' => array('Ticket.interaction_code2')
        ));

        $ticket_statuses = $this->TicketStatus->getTicketStatuses();
        $interactions_root = $this->Interaction->getInteractions();
        $interactions_codes2 = array();

        if (isset($this->request->query['interaction_code1']) && !empty($this->request->query['interaction_code1'])) {
            $interactions_codes2 = $this->Interaction->getInteractions($this->request->query['interaction_code1']);
        }

        $this->set(compact(
            'top_interactions',
            'ticket_statuses',
            'interactions_root',
            'interactions_codes2'
        ));

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
            'fields' => array(
                'Customer.CLI_NM',
                'Customer.MID_NM',
                'Customer.CLI_TYP',
                'Customer.CLI_NM_PERSON',
                'Customer.EMAIL_ADD',
                'Customer.MOBILE_NUM'
            ),
            'conditions' => array(
                'Customer.CUSTOMER_ID' => $customer_id
            )
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

    public function edit($ticket_id) {
        if ($this->request->is(array('post', 'put'))) {
            
            $this->request->data['TicketMessage'][0]['ticket_message'] = trim($this->request->data['TicketMessage'][0]['ticket_message']);
            $this->request->data['TicketMessage'][0]['created_by'] = $this->Auth->user('id');

            if (empty($this->request->data['TicketMessage'][0]['ticket_message'])) {
                unset($this->request->data['TicketMessage']);
            }

            if ($this->request->data['Ticket']['ticket_status'] == 'C') {
                $now = time();

                // Ticket Days
                $created_date = strtotime($this->request->data['Ticket']['created']);
                $datediff = $now - $created_date;
                $ticket_days = floor($datediff / (60 * 60 * 24));

                // Ticket Aging
                $ticket_aging = 0;
                if ($this->request->data['Ticket']['due_date'] != 'null'):
                    $due_date = strtotime($this->request->data['Ticket']['due_date']);
                    if ($now > $due_date):
                        $datediff_aging = $now - $due_date;
                        $days_aging = floor($datediff_aging / (60 * 60 * 24));
                        $ticket_aging = $days_aging;
                    endif;
                endif;

                $this->request->data['Ticket']['ticket_days'] = $ticket_days;
                $this->request->data['Ticket']['ticket_aging'] = $ticket_aging;
                unset($this->request->data['Ticket']['created']);
                unset($this->request->data['Ticket']['due_date']);
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

    public function top_interaction_export_excel() {
        require APP . 'Vendor' . DS . 'PHPExcel' . DS . 'Classes' . DS . 'PHPExcel.php';

        $conditions = array();

        if (isset($this->request->query['interaction_code1']) && !empty($this->request->query['interaction_code1'])) {
            $conditions['InteractionLevel1.id'] = $this->request->query['interaction_code1'];
        }

        if (isset($this->request->query['interaction_code2']) && !empty($this->request->query['interaction_code2'])) {
            $conditions['InteractionLevel2.id'] = $this->request->query['interaction_code2'];
        }

        if (isset($this->request->query['periode']) && !empty($this->request->query['periode'])) {
            $periode_conds = array();

            if ($this->request->query['periode'] == 'D') {
                $periode_conds['Ticket.created'] = date('Y-m-d');

            } else if ($this->request->query['periode'] == 'W') {
                $week_date_range = current_week_date_range();
                $periode_conds['Ticket.created >= ? AND Ticket.created <= ?'] = array(
                    $week_date_range['sd'],
                    $week_date_range['ed']
                );

            } else if ($this->request->query['periode'] == 'M') {
                $periode_conds['MONTH(Ticket.created)'] = date('m');
            }

            if ($periode_conds) {
                $conditions = array_merge($conditions, $periode_conds);
            }
            
        }

        if (isset($this->request->query['from_date_val']) && !empty($this->request->query['from_date_val'])) {
            $ed = $this->request->query['to_date_val'];
            if (empty($this->request->query['to_date_val'])) {
                $ed = $this->request->query['from_date_val'];
            }

            $conditions['Ticket.created >= ? AND Ticket.created <= ?'] = array(
                $this->request->query['from_date_val'],
                $ed
            );
        }

        $this->Ticket->unbindModel(array(
            'hasMany' => array('TicketMessage'),
            'belongsTo' => array('Department')
        ));

        $this->Ticket->virtualFields = array('totdat' => 'COUNT(*)');
        $top_interactions = $this->Ticket->find('all', array(
            'fields' => array('Ticket.totdat', 'InteractionLevel1.interaction_title', 'InteractionLevel2.interaction_title'),
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
                )
            ),
            'order' => array('Ticket.totdat' => 'DESC'),
            'group' => array('Ticket.interaction_code2')
        ));

        // START TO WRITE EXCEL 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        // ----- //
        $r1_start_row_th = 4;
        $r1_start_row_td = $r1_start_row_th + 1;

        $num = 1;
        foreach ($top_interactions as $item) {
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$r1_start_row_td, $item['InteractionLevel1']['interaction_title']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$r1_start_row_td, $item['InteractionLevel2']['interaction_title']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$r1_start_row_td, $item['Ticket']['totdat']);
            
            $r1_start_row_td++;
            $num++;
        }

        // Set heading title
        $objPHPExcel->getActiveSheet()->setCellValue('B2', "Report Top Interactions");
        $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray(array(
            'font' => array('size' => 20)
        ));

        $objPHPExcel->getActiveSheet()->setCellValue('B'.$r1_start_row_th, 'Interaction');
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$r1_start_row_th, 'Interaction Detail');
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$r1_start_row_th, 'Total');

        // Styling
        // Set width column report 1
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(37);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(57);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);

        // Set alignment column header (th) report 1
        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':D'.$r1_start_row_th)
                    ->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':D'.$r1_start_row_th)
                    ->getAlignment()
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        // Set body (td) cells report 1
        $start_data_cell = $r1_start_row_th + 1;
        
        $objPHPExcel->getActiveSheet()
                    ->getStyle('D'.$start_data_cell.':D'.$r1_start_row_td)
                    ->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        /*$objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$start_data_cell.':C'.$r1_start_row_td)
                    ->getAlignment()
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $objPHPExcel->getActiveSheet()
                    ->getStyle('D'.$start_data_cell.':D'.$r1_start_row_td)
                    ->getAlignment()
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);*/

        // Set bold col header report 1 
        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':D'.$r1_start_row_th)
                    ->getFont()
                    ->setBold(true);

        $objPHPExcel->getActiveSheet()
                    ->getRowDimension(4)
                    ->setRowHeight(23);

        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':D'.$r1_start_row_td)
                    ->applyFromArray(array(
                        'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
                    ));

        // End styling

        // ------ //
       
        // File name
        $title = 'Report Top Interactions';
        $filename = $title.".xlsx";

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->setIncludeCharts(TRUE);
        $objWriter->save('php://output');

        exit(0);

    }

    public function export_excel() {
        require APP . 'Vendor' . DS . 'PHPExcel' . DS . 'Classes' . DS . 'PHPExcel.php';

        $conditions = array();
        $grid_view_type = '';

        if (isset($this->request->query['kwd']) && !empty($this->request->query['kwd'])) {
            $conditions['OR'] = array(
                array('Ticket.customer_name LIKE' => '%'.$this->request->query['kwd'].'%'),
                array('Ticket.email LIKE' => '%'.$this->request->query['kwd'].'%'),
                array('Ticket.ticket_number LIKE' => '%'.$this->request->query['kwd'].'%'),
            );
        }

        if (isset($this->request->query['sla_state']) && !empty($this->request->query['sla_state'])) {
            if ($this->request->query['sla_state'] == 'LT_SLA') {
                array_push($conditions, array('Ticket.due_date > NOW()'));
            } else if ($this->request->query['sla_state'] == 'GT_SLA') {
                array_push($conditions, array('Ticket.due_date < NOW()'));
            }  else if ($this->request->query['sla_state'] == 'EQ_SLA') {
                $grid_view_type = 'already_due_date';
                array_push($conditions, array('DATE(Ticket.due_date) <= DATE(NOW())'));
            }
        }

        if (isset($this->request->query['from_date_val']) && !empty($this->request->query['from_date_val'])) {
            $ed = $this->request->query['to_date_val'];
            if (empty($this->request->query['to_date_val'])) {
                $ed = $this->request->query['from_date_val'];
            }

            $conditions['Ticket.created >= ? AND Ticket.created <= ?'] = array(
                $this->request->query['from_date_val'],
                $ed
            );
        }

        if (isset($this->request->query['periode']) && !empty($this->request->query['periode'])) {
            $periode_conds = array();

            if ($this->request->query['periode'] == 'D') {
                $periode_conds['Ticket.created'] = date('Y-m-d');

            } else if ($this->request->query['periode'] == 'W') {
                $week_date_range = current_week_date_range();
                $periode_conds['Ticket.created >= ? AND Ticket.created <= ?'] = array(
                    $week_date_range['sd'],
                    $week_date_range['ed']
                );

            } else if ($this->request->query['periode'] == 'M') {
                $periode_conds['MONTH(Ticket.created)'] = date('m');
            }

            if ($periode_conds) {
                $conditions = array_merge($conditions, $periode_conds);
            }
            
        }

        if (isset($this->request->query['ticket_status']) && !empty($this->request->query['ticket_status'])) {
            $conditions['Ticket.ticket_status'] = $this->request->query['ticket_status'];
        }

        if (isset($this->request->query['interaction_code1']) && !empty($this->request->query['interaction_code1'])) {
            $conditions['InteractionLevel1.id'] = $this->request->query['interaction_code1'];
        }

        if (isset($this->request->query['interaction_code2']) && !empty($this->request->query['interaction_code2'])) {
            $conditions['InteractionLevel2.id'] = $this->request->query['interaction_code2'];
        }

        $options = array(
            'fields' => array(
                'InteractionLevel1.id AS interaction_id1',
                'InteractionLevel2.id AS interaction_id2',
                'InteractionLevel3.id AS interaction_id3',
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

        $this->Ticket->recursive = 2;
        $tickets = $this->Ticket->find('all', $options);
        $ticket_statuses = $this->TicketStatus->getTicketStatuses();

        // START TO WRITE EXCEL 
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        if ($grid_view_type == 'already_due_date') {
            $this->setup_already_due_date_format($tickets, $ticket_statuses, $objPHPExcel);
        } else {
            $this->setup_main_format($tickets, $ticket_statuses, $objPHPExcel);
        }
       
        // File name
        $title = 'Report';
        $filename = $title.".xlsx";

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->setIncludeCharts(TRUE);
        $objWriter->save('php://output');

        exit(0);
    }

    private function ticket_days($item) {
        $str = null;

        if ($item['Ticket']['ticket_days'] == null):
            $created_date = strtotime($item['Ticket']['created']);
            $now = time();
            $datediff = $now - $created_date;
            $days = floor($datediff / (60 * 60 * 24));
            $days_label = 'day';

            if ($days > 1) {
                $days_label = 'days';
            }

            $str = $days.' '.$days_label;

        else:
            $days_label = 'day';
            if ($item['Ticket']['ticket_days'] > 1) {
                $days_label = 'days';
            }

            $str = $item['Ticket']['ticket_days'].' '.$days_label;
        endif;

        return $str;
    }

    private function ticket_aging($item) {
        $vJ = '';

        if ($item['Ticket']['ticket_aging'] == null):
            if ($item['Ticket']['due_date'] != null):
                $now = time();
                $due_date = strtotime($item['Ticket']['due_date']);
                if ($now > $due_date):
                    $datediff_aging = $now - $due_date;
                    $days_aging = floor($datediff_aging / (60 * 60 * 24));

                    $vJ = '+'.$days_aging;
                else:
                    $vJ = '-';
                endif;
            else:
                $vJ = '-';
            endif;
        else:
            if ($item['Ticket']['ticket_aging'] > 0):
                $vJ = '+'.$item['Ticket']['ticket_aging'];
            else:
                $vJ = '-';
            endif;
        endif;

        return $vJ;
    }

    private function setup_main_format($tickets, $ticket_statuses, $objPHPExcel) {
        $r1_start_row_th = 4;
        $r1_start_row_td = $r1_start_row_th + 1;

        $num = 1;
        foreach ($tickets as $item) {
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$r1_start_row_td, trim(ucwords($item['Ticket']['ticket_number'])));
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$r1_start_row_td, "");
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$r1_start_row_td, trim($item['Ticket']['customer_name']));
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$r1_start_row_td, trim($item['InteractionLevel1']['interaction_title1']));
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$r1_start_row_td, trim($item['InteractionLevel2']['interaction_title2']));
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$r1_start_row_td, date('d/m/Y', strtotime($item['Ticket']['created'])));

            if ($item['Ticket']['due_date'] != null):
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$r1_start_row_td, date('d/m/Y', strtotime($item['Ticket']['due_date'])));
            else:
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$r1_start_row_td, '-');
            endif;

            // Ticket Days
            $ticket_days = $this->ticket_days($item);
            $objPHPExcel->getActiveSheet()->setCellValue('I'.$r1_start_row_td, $ticket_days);
            
            // Ticket Aging
            $vJ = $this->ticket_aging($item);
            $objPHPExcel->getActiveSheet()->setCellValue('J'.$r1_start_row_td, $vJ);
            
            $objPHPExcel->getActiveSheet()->setCellValue('K'.$r1_start_row_td, $ticket_statuses[$item['Ticket']['ticket_status']]);
            
            $objPHPExcel->getActiveSheet()->setCellValue('L'.$r1_start_row_td, isset($item['Department']['department_name']) ? $item['Department']['department_name'] : '-');

            $r1_start_row_td++;
            $num++;
        }

        // Set heading title
        $objPHPExcel->getActiveSheet()->setCellValue('B2', "Report");
        $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray(array(
            'font' => array('size' => 20)
        ));

        $objPHPExcel->getActiveSheet()->setCellValue('B'.$r1_start_row_th, 'Ticket No.');
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$r1_start_row_th, 'CIF');
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$r1_start_row_th, 'Customer Name');
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$r1_start_row_th, 'Interaction');
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$r1_start_row_th, 'Interaction Detail');
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$r1_start_row_th, 'Created Date');
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$r1_start_row_th, 'Due Date');
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$r1_start_row_th, 'Days');
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$r1_start_row_th, 'Aging');
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$r1_start_row_th, 'Status');
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$r1_start_row_th, 'Dept.');

        // Styling
        // Set width column report 1
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(45);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(31);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(19);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(11);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(9);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(9);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(23);

        // Set alignment column header (th) report 1
        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':L'.$r1_start_row_th)
                    ->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':L'.$r1_start_row_th)
                    ->getAlignment()
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        // Set body (td) cells report 1
        $start_data_cell = $r1_start_row_th + 1;
        
        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$start_data_cell.':C'.$r1_start_row_td)
                    ->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$start_data_cell.':C'.$r1_start_row_td)
                    ->getAlignment()
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $objPHPExcel->getActiveSheet()
                    ->getStyle('D'.$start_data_cell.':D'.$r1_start_row_td)
                    ->getAlignment()
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        // Set bold col header report 1 
        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':L'.$r1_start_row_th)
                    ->getFont()
                    ->setBold(true);

        $objPHPExcel->getActiveSheet()
                    ->getRowDimension(4)
                    ->setRowHeight(23);

        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':L'.$r1_start_row_td)
                    ->applyFromArray(array(
                        'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
                    ));

        // End styling
    }

    private function setup_already_due_date_format($tickets, $ticket_statuses, $objPHPExcel) {
        $r1_start_row_th = 4;
        $r1_start_row_td = $r1_start_row_th + 1;

        $num = 1;
        foreach ($tickets as $item) {
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$r1_start_row_td, trim(ucwords($item['Ticket']['ticket_number'])));
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$r1_start_row_td, trim($item['InteractionLevel1']['interaction_title1']));
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$r1_start_row_td, trim($item['InteractionLevel2']['interaction_title2']));

            // Ticket Days
            $ticket_days = $this->ticket_days($item);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$r1_start_row_td, $ticket_days);
            
            // Ticket Aging
            $vJ = $this->ticket_aging($item);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$r1_start_row_td, $vJ);
            
            $r1_start_row_td++;
            $num++;
        }

        // Set heading title
        $objPHPExcel->getActiveSheet()->setCellValue('B2', "Report");
        $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray(array(
            'font' => array('size' => 20)
        ));

        $objPHPExcel->getActiveSheet()->setCellValue('B'.$r1_start_row_th, 'Ticket No.');
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$r1_start_row_th, 'Interaction');
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$r1_start_row_th, 'Interaction Detail');
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$r1_start_row_th, 'Days');
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$r1_start_row_th, 'Aging');

        // Styling
        // Set width column report 1
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(31);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(11);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(9);

        // Set alignment column header (th) report 1
        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':F'.$r1_start_row_th)
                    ->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':F'.$r1_start_row_th)
                    ->getAlignment()
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        // Set body (td) cells report 1
        $start_data_cell = $r1_start_row_th + 1;
        
        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$start_data_cell.':C'.$r1_start_row_td)
                    ->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$start_data_cell.':C'.$r1_start_row_td)
                    ->getAlignment()
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $objPHPExcel->getActiveSheet()
                    ->getStyle('D'.$start_data_cell.':D'.$r1_start_row_td)
                    ->getAlignment()
                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        // Set bold col header report 1 
        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':F'.$r1_start_row_th)
                    ->getFont()
                    ->setBold(true);

        $objPHPExcel->getActiveSheet()
                    ->getRowDimension(4)
                    ->setRowHeight(23);

        $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$r1_start_row_th.':F'.$r1_start_row_td)
                    ->applyFromArray(array(
                        'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
                    ));

        // End styling
    }

    public function ajax_modal_get_ticket_detail($ticket_id) {
        $this->autoRender = false;
        $this->layout = null;

        if ($this->request->is('ajax')) {
            $ticket = $this->Ticket->getTicket($ticket_id);
            $ticket_statuses = array(
                'S' => 'SUBMIT',
                'C' => 'CLOSED',
                'P' => 'IN PROGRESS'
            );
            
            $this->set(compact(
                'ticket',
                'ticket_statuses'
            ));

            $this->response->type('text');
            $this->render('ajax_modal_ticket_detail');
        }
    }

    public function ajax_get_interaction($parent_id) {
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
