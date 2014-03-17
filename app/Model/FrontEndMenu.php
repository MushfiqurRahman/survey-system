<?php
App::uses('AppModel', 'Model');
/**
 * FrontEndMenu Model
 *
 * @property Territory $Territory
 * @property Outlet $Outlet
 * @property User $User
 */
class FrontEndMenu extends AppModel {

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
	public $hasMany = array(
		'Task' => array(
			'className' => 'Task',
			'foreignKey' => 'front_end_menu_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        public function beforeSave($options = array()){
            $this->data['FrontEndMenu']['menu_code'] = strtolower(str_replace(' ', '_', $this->data['FrontEndMenu']['title']));
            return true;
        }


}
