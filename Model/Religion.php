<?php
App::uses('AppModel', 'Model');

/**
 * Country Model
 *
 */
class Religion extends AppModel {

	public $useTable = 'tta_country';
    public $primaryKey = 'COUNTRY_CD';

    
    public function getReligion()
    {
        return $this->find('all');
    }
}
