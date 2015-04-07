<?php
/**
 * ScoreFixture
 *
 */
class ScoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'),
		'total_score' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 100, 'unsigned' => false),
		'tutorial_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
		'question_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
		'respons' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
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
			'total_score' => 1,
			'tutorial_id' => 1,
			'question_id' => 1,
			'respons' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'user_id' => 1
		),
	);

}
