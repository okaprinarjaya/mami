<?php
App::uses('AppModel', 'Model');

/**
 * Customer Model
 *
 */
class Customer extends AppModel {

	public $useTable = 'customers';
    public $primaryKey = 'CUSTOMER_ID';
    
    public function saveDataCustomer($data)
    {
        $this->create();
        if($this->save($data))
            return true;
        
        return false;
    }
    
    public function editDataCustomer($data)
    {
        $this->id = $data['CUSTOMER_ID'];
        if($this->save($data))
            return true;
        
        return false;
    }
}
