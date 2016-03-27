<?php
App::uses('AppModel', 'Model');

class Department extends AppModel {

	public $useTable = 'departments';
    public $primaryKey = 'id';
    public $displayField = 'department_name';

    public $validate = array(
        'department_name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A name is required'
            )
        )
    );

    public function getDepartments()
    {
        return $this->find('all');
    }

}
