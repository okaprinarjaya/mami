<?php
App::uses('TamsAgent', 'Model');

/**
 * TamsAgent Test Case
 */
class TamsAgentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tams_agent'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TamsAgent = ClassRegistry::init('TamsAgent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TamsAgent);

		parent::tearDown();
	}

}
