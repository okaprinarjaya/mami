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

}
