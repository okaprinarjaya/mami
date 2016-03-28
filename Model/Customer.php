<?php
App::uses('AppModel', 'Model');

/**
 * Customer Model
 *
 */
class Customer extends AppModel {

	public $useTable = 'customers';
    public $primaryKey = 'CUSTOMER_ID';
    
    public function createCustomer(array $data, $user_id)
    {
        $data_save = $data;
        $data_save['Customer']['CREATED_BY'] = $user_id;

        $this->create();
        if ($this->save($data_save)) {
            return $this->getLastInsertId();
        }

        return false;
    }
    
    public function updateCustomer(array $data)
    {       
        if ($this->save($data)) {
            return true;
        }
        
        return false;
    }
}
