<?php
App::uses('AppModel', 'Model');
/**
 * SurveyAttribute Model
 *
 */
class SurveyAttribute extends AppModel {

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
                    'isUnique' => array(
                        'rule' => 'isUnique',
                        'message' => 'This attribute already exists'
                    )
		),
            
	);
}
