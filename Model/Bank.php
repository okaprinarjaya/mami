<?php
App::uses('AppModel', 'Model');

/**
 * Bank Model
 *
 */
class Bank extends AppModel {

	public $useTable = 'tta_bank_masters';
    public $primaryKey = 'BANK_ID';

    
    public function getBankMapp()
    {
        //$options['limit'] = '10';
        $options['fields'] = array(
            'DISTINCT BANK_CD_MAPP'
        );
        $options['conditions'] = array(
            'BANK_CD_MAPP !=' => ''
        );
        return $this->find('all' , $options);
    }
    
    public function getBankCode($name)
    {
        $options['conditions'] = array(
            'BANK_CD_MAPP' => $name
        );
        $options['fields'] = array(
            'BANK_ID' ,
            'BANK_BRANCH_NM'
        );
        return $this->find('all' , $options);
    }
    
    public function getBankName($code)
    {
        $options['conditions'] = array(
            'BANK_ID' => $code
        );
        $options['fields'] = array(
            'BANK_BRANCH_NM'
        );
        return $this->find('all' , $options);
    }
}
