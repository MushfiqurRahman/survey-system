<?php
App::uses('AppModel', 'Model');
/**
 * Program Model
 *
 * @property ProgramType $ProgramType
 * @property Town $Town
 * @property Survey $Survey
 * @property User $User
 */
class Program extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
//	public $belongsTo = array(
//		'ProgramType' => array(
//			'className' => 'ProgramType',
//			'foreignKey' => 'outlet_type_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		)
//	);

/**
 * hasMany associations
 *
 * @var array
 */
//	public $hasMany = array(
//		'Survey' => array(
//			'className' => 'Survey',
//			'foreignKey' => 'outlet_id',
//			'dependent' => false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		)
//	);
}
