<?php
/**
 * TicketStatus Fixture
 */
class TicketStatusFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ticket_status';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ticket_status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ticket_status_desc' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ticket_status', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'ticket_status' => 'Lorem ipsum dolor sit ame',
			'ticket_status_desc' => 'Lorem '
		),
	);

}
