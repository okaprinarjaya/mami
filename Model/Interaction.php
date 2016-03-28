<?php
App::uses('AppModel', 'Model');

class Interaction extends AppModel {

	public $useTable = 'interactions';
    public $primaryKey = 'id';
    public $displayField = 'interaction_title';

    public function getInteractions($parent_id = null)
    {
        return $this->find('list', array(
            'conditions' => array(
                'Interaction.parent_id' => $parent_id
            )
        ));
    }
}
