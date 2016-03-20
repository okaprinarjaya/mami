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
    
}
