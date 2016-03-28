<?php
App::uses('Interaction', 'Model');

/**
 * Interaction Test Case
 */
class InteractionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.interaction'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Interaction = ClassRegistry::init('Interaction');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Interaction);

		parent::tearDown();
	}

}
