<?php
App::uses('Video', 'Model');

/**
 * Video Test Case
 *
 */
class VideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.video',
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
		$this->Video = ClassRegistry::init('Video');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Video);

		parent::tearDown();
	}

}
