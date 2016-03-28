<?php
App::uses('AppModel', 'Model');

/**
 * Bank Model
 *
 */
class OwnerOccupation extends AppModel {

	public $useTable = 'mvcws_ta_owner_occp_mappings';
    public $primaryKey = 'id';

    
    public function getOwnerOccupation()
    {
       return $this->find('all');
    }
}
