<?php
App::uses('TicketStatus', 'Model');

/**
 * TicketStatus Test Case
 */
class TicketStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ticket_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TicketStatus = ClassRegistry::init('TicketStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TicketStatus);

		parent::tearDown();
	}

}
