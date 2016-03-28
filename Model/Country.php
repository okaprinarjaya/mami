<?php
App::uses('AppModel', 'Model');

/**
 * Country Model
 *
 */
class Country extends AppModel {

	public $useTable = 'tta_country';
    public $primaryKey = 'COUNTRY_CD';

    
    public function getCountry()
    {
        return $this->find('all');
    }
}
