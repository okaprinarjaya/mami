<?php
App::uses('AppModel', 'Model');

/**
 * Customer Model
 *
 */
class Customer extends AppModel {

	public $useTable = 'customers';
    public $primaryKey = 'CUSTOMER_ID';
    
    public function createCustomer(array $data, $user_id, $user_id_agt)
    {
        $data_save = $data;
        $data_save['Customer']['CREATED_BY'] = $user_id;
        $data_save['Customer']['CREATED_BY_AGT'] = $user_id_agt;        

        $this->create();
        if ($this->save($data_save)) {
            return $this->getLastInsertId();
        }

        return false;
    }
    
    public function editCustomer(array $data)
    {
        $this->id = $data['CUSTOMER_ID'];
        
        if ($this->save($data)) {
            return true;
        }
        
        return false;
    }
}
