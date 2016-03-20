<?php
App::uses('AppController', 'Controller');

class CustomersController extends AppController {

	public $components = array('Paginator');
    public $uses = array('TamsAgent', 'TtaFieldValues');

    public function beforeRender()
    {
        $this->set('__module_title__', 'Customers');
    }

    public function index()
    {

    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Session->setFlash('Test flash message', 'Flash/success');
            return $this->redirect('/customers');
        }

        $agt_codes_fetch = $this->TamsAgent->getAGTCodes();
        $agt_codes = Hash::combine($agt_codes_fetch, '{n}.TamsAgent.AGT_CODE', '{n}.TamsAgent.AGT_NM');

        $sub_client_types_fetch = $this->TtaFieldValues->getSubClientTypes();
        $sub_client_types = Hash::combine(
            $sub_client_types_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );

        $client_types = array(
            '01' => 'Client Type 1',
            '02' => 'Client Type 2',
            '03' => 'Client Type 3'
        );

        $this->set(compact(
            'agt_codes',
            'sub_client_types',
            'client_types'
        ));
    }

}
