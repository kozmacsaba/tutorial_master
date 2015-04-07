<?php
App::uses('Score', 'Model');

/**
 * Score Test Case
 *
 */
class ScoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.score',
		'app.tutorial',
		'app.user',
		'app.question',
		'app.codezip',
		'app.powerpoint',
		'app.video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Score = ClassRegistry::init('Score');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Score);

		parent::tearDown();
	}

}
