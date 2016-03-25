<?php
App::uses('AppModel', 'Model');

class TtaFieldValues extends AppModel {

    public $useTable = 'tta_field_values';
    public $primaryKey = 'id';

    public function getSubClientTypes()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'CLI_SUB_TYP'
            )
        ));
    }

    public function getReligion()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'RELIGION'
            )
        ));
    }
    
    public function getW8()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'W8_FORM'
            )
        ));
    }
    
    public function getEntity()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'ENTITY_TYP'
            )
        ));
    }
    
    
    public function getStatus()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'STATUS'
            )
        ));
    }
    
    public function getGender()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'SEX_CODE'
            )
        ));
    }
    
    public function getNation()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'NATION'
            )
        ));
    }
    
    public function getIdType()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'ID_TYP'
            )
        ));
    }
    
    public function getMaritalStatus()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'MARITAL_STATUS'
            )
        ));
    }
    
    public function getOccupation()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'OCCP_TYP'
            )
        ));
    }
    
    public function getAnnualIncome()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'ANNUAL_INCOME'
            )
        ));
    }
    
    public function getSpouseType()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'SPOUSE_ID_TYPE'
            )
        ));
    }
    
    public function getSourceFund()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'SOURCE_FUND'
            )
        ));
    }
    
    public function getRedFlag()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'RED_FLAG'
            )
        ));
    }
    
    public function getFactaStatus()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'CLI_FATCA_STAT'
            )
        ));
    }
    
    public function getWaifer()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'PRI_WAIVER'
            )
        ));
    }
    
    public function getSelfCert()
    {
        return $this->find('all', array(
            'conditions' => array(
                'TtaFieldValues.FLD_NM' => 'FATCA_SELF_CERT'
            )
        ));
    }
}
