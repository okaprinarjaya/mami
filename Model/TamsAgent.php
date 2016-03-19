<?php
App::uses('AppModel', 'Model');

class TamsAgent extends AppModel {

	public $useTable = 'tams_agents';
    public $primaryKey = 'AGT_CODE';
	public $displayField = 'AGT_NM';

    public function getAGTCodes()
    {
        $agt_codes_fetch = $this->find('all');
        $agt_codes = Hash::combine($agt_codes_fetch, '{n}.TamsAgent.AGT_CODE', '{n}.TamsAgent.AGT_NM');

        return $agt_codes;
    }

}
