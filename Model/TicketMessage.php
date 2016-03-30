<?php
App::uses('AppModel', 'Model');
/**
 * TicketMessage Model
 *
 */
class TicketMessage extends AppModel {

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'created_by'
        )
    );

}
