<?php
App::uses('AppModel', 'Model');

/**
 * Customer Model
 *
 */
class Customer extends AppModel {

	public $useTable = 'customers';
    public $primaryKey = 'CUSTOMER_ID';

    public $virtualFields = array(
        "ID_EXPIRY_DT" => "DATE_FORMAT(Customer.ID_EXPIRY_DT, '%d/%m/%Y')",
        "BIRTH_DT" => "DATE_FORMAT(Customer.BIRTH_DT, '%d/%m/%Y')",
        "TAX_REG_DT" => "DATE_FORMAT(Customer.TAX_REG_DT, '%d/%m/%Y')",
        "RENEWAL_DATE" => "DATE_FORMAT(Customer.RENEWAL_DATE, '%d/%m/%Y')"
    );
    
    public function createCustomer(array $data, $user_id)
    {
        $data_save = $data;
        $data_save['Customer']['CREATED_BY'] = $user_id;
        $data_save['Customer']['ID_EXPIRY_DT'] = !empty($data_save['Customer']['ID_EXPIRY_DT']) ? date('Y-m-d', strtotime(str_replace('/', '-', $data_save['Customer']['ID_EXPIRY_DT']))) : null;
        $data_save['Customer']['BIRTH_DT'] = !empty($data_save['Customer']['BIRTH_DT']) ? date('Y-m-d', strtotime(str_replace('/', '-', $data_save['Customer']['BIRTH_DT']))) : null;
        $data_save['Customer']['TAX_REG_DT'] = !empty($data_save['Customer']['TAX_REG_DT']) ? date('Y-m-d', strtotime(str_replace('/', '-', $data_save['Customer']['TAX_REG_DT']))) : null;
        $data_save['Customer']['RENEWAL_DATE'] = !empty($data_save['Customer']['RENEWAL_DATE']) ? date('Y-m-d', strtotime(str_replace('/', '-', $data_save['Customer']['RENEWAL_DATE']))) : null;

        $this->create();
        if ($this->save($data_save)) {
            return $this->getLastInsertId();
        }

        return false;
    }
    
    public function updateCustomer(array $data)
    {
        $data_save = $data;
        $data_save['Customer']['ID_EXPIRY_DT'] = !empty($data_save['Customer']['ID_EXPIRY_DT']) ? date('Y-m-d', strtotime(str_replace('/', '-', $data_save['Customer']['ID_EXPIRY_DT']))) : null;
        $data_save['Customer']['BIRTH_DT'] = !empty($data_save['Customer']['BIRTH_DT']) ? date('Y-m-d', strtotime(str_replace('/', '-', $data_save['Customer']['BIRTH_DT']))) : null;
        $data_save['Customer']['TAX_REG_DT'] = !empty($data_save['Customer']['TAX_REG_DT']) ? date('Y-m-d', strtotime(str_replace('/', '-', $data_save['Customer']['TAX_REG_DT']))) : null;
        $data_save['Customer']['RENEWAL_DATE'] = !empty($data_save['Customer']['RENEWAL_DATE']) ? date('Y-m-d', strtotime(str_replace('/', '-', $data_save['Customer']['RENEWAL_DATE']))) : null;

        if ($this->save($data_save)) {
            return true;
        }
        
        return false;
    }
}
