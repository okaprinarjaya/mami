<?php
App::uses('AppModel', 'Model');

class TamsAgent extends AppModel {

	public $useTable = 'tams_agents';
    public $primaryKey = 'AGT_CODE';
	public $displayField = 'AGT_NM';

    public function getAGTCodes()
    {
        return $this->find('all', array(
            'group' => array('TamsAgent.AGT_CODE')
        ));
    }

}
