<?php
/**
 * Ticket Fixture
 */
class TicketFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'cif' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'interaction_code1' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'interaction_code2' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'interaction_code3' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'ticket_number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 16, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'department_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'employee_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'agt_code' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'ticket_status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_closed' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'customer_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 16, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telephone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 16, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'subject' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'channel_type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sla' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'due_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'message' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'id' => 1,
			'cif' => 'Lorem ipsum dolor sit amet',
			'interaction_code1' => 1,
			'interaction_code2' => 1,
			'interaction_code3' => 1,
			'ticket_number' => 'Lorem ipsum do',
			'department_id' => 1,
			'employee_id' => 1,
			'agt_code' => 1,
			'ticket_status' => 'Lorem ipsum dolor sit ame',
			'is_closed' => 'Lorem ipsum dolor sit ame',
			'customer_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum do',
			'telephone' => 'Lorem ipsum do',
			'subject' => 'Lorem ipsum dolor sit amet',
			'channel_type' => 'Lorem ',
			'sla' => 1,
			'due_date' => '2016-03-20',
			'message' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2016-03-20 06:45:48',
			'created_by' => 1
		),
	);

}
