<?php
App::uses('TicketMessage', 'Model');

/**
 * TicketMessage Test Case
 */
class TicketMessageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ticket_message'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TicketMessage = ClassRegistry::init('TicketMessage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TicketMessage);

		parent::tearDown();
	}

}
