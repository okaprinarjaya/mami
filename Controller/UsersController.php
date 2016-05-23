<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $uses = array('User');
    public $components = array('Paginator');

    public function beforeRender()
    {
        $this->set('__module_title__', 'Settings - Users');
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout');
    }

    public function login()
    {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash('Login Failed', 'Flash/error');
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

	public function index() {
		$this->User->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('User.role !=' => 'ROOT')
        );

		$this->set('users', $this->Paginator->paginate());
        $this->set('roles', Configure::read('user_roles'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('New User Added!', 'Flash/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('There is an error', 'Flash/error');
			}
		}

		$departments = $this->User->Department->find('list');
        $roles = Configure::read('user_roles');

		$this->set(compact('departments', 'roles'));
	}

	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is(array('post', 'put'))) {
            
            if (!isset($this->request->data['Foo'])) {
                unset($this->User->validate['password']);
            }

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('User Updated!', 'Flash/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('There is an error!', 'Flash/error');
			}

		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
            $this->request->data['User']['password'] = '';
		}

		$departments = $this->User->Department->find('list');
        $roles = Configure::read('user_roles');

		$this->set(compact('departments', 'roles'));
	}

	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash('User Deleted!', 'Flash/success');
		} else {
			$this->Session->setFlash('There is an error!', 'Flash/error');
		}

		return $this->redirect(array('action' => 'index'));
	}
}
