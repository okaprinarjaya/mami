<?php
App::uses('AppController', 'Controller');

class CustomersController extends AppController {

	public $components = array('Paginator');
    public $uses = array('TamsAgent');

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

        $agt_codes = $this->TamsAgent->getAGTCodes();
        $this->set(compact('agt_codes'));
    }

}
