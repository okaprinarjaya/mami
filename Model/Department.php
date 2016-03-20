<?php
App::uses('AppModel', 'Model');

class Department extends AppModel {

	public $useTable = 'departments';
    public $primaryKey = 'id';
    public $displayField = 'department_name';

    public function getDepartments()
    {
        return $this->find('all');
    }

}
