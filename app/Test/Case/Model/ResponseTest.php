<?php
App::uses('Response', 'Model');

/**
 * Response Test Case
 *
 */
class ResponseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.response',
		'app.question',
		'app.tutorial',
		'app.user',
		'app.score',
		'app.codezip',
		'app.powerpoint',
		'app.video',
		'app.respon'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Response = ClassRegistry::init('Response');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Response);

		parent::tearDown();
	}

}
