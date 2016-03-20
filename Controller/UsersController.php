<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $layout = 'login';
    public $uses = array('User', 'TamsAgent');
    public $components = array('Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout', 'add');
    }

    public function login()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Session->setFlash('Login Failed', 'Flash/error');
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        //
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('New User Added!', 'Flash/success');
                return $this->redirect(array('action' => 'login'));
            }

            $this->Session->setFlash('There is an error', 'Flash/error');
        }

        $agents_fetch = $this->TamsAgent->find('all');
        $agents = Hash::combine($agents_fetch, '{n}.TamsAgent.AGT_CODE', '{n}.TamsAgent.AGT_NM');

        $this->set(compact('agents'));
    }
}
