<?php
App::uses('Powerpoint', 'Model');

/**
 * Powerpoint Test Case
 *
 */
class PowerpointTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.powerpoint',
		'app.tutorial',
		'app.user',
		'app.score',
		'app.question'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Powerpoint = ClassRegistry::init('Powerpoint');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Powerpoint);

		parent::tearDown();
	}

}
