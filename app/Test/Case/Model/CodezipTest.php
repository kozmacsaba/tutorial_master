<?php
App::uses('Codezip', 'Model');

/**
 * Codezip Test Case
 *
 */
class CodezipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.codezip',
		'app.tutorial',
		'app.user',
		'app.score',
		'app.powerpoint',
		'app.question'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Codezip = ClassRegistry::init('Codezip');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Codezip);

		parent::tearDown();
	}

}
