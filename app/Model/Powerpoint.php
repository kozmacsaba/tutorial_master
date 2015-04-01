<?php
App::uses('AppModel', 'Model');
/**
 * Powerpoint Model
 *
 * @property Tutorial $Tutorial
 */
class Powerpoint extends AppModel {


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
