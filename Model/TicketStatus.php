<?php
App::uses('AppModel', 'Model');
/**
 * TicketStatus Model
 *
 */
class TicketStatus extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'ticket_status';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ticket_status';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ticket_status_desc';

    public function getTicketStatuses()
    {
        return $this->find('list');
    }

}
