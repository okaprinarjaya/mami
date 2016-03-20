<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {
 
    public $name = 'Home';
    public $uses = array();
    public $layout = 'login';

    public function beforeFilter()
    {
        $this->Auth->allow('index');
    }

    public function index()
    {

    }
}
