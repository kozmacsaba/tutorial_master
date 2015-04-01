<?php
App::uses('AppModel', 'Model');
/**
 * Video Model
 *
 * @property Tutorial $Tutorial
 */
class Video extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tutorial' => array(
			'className' => 'Tutorial',
			'foreignKey' => 'tutorial_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
