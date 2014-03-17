<?php
App::uses('AppModel', 'Model');
/**
 * Task Model
 *
 * @property Part $Part
 * @property Product $Product
 */
class Task extends AppModel {

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
//		'surv_attr_ids' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				'message' => 'Task must have survey attributes',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
        
        public $belongsTo = array(
		'FrontEndMenu' => array(
			'className' => 'FrontEndMenu',
			'foreignKey' => 'front_end_menu_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
                        'dependent' => true
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Part' => array(
			'className' => 'Part',
			'joinTable' => 'parts_tasks',
			'foreignKey' => 'task_id',
			'associationForeignKey' => 'part_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'joinTable' => 'products_tasks',
			'foreignKey' => 'task_id',
			'associationForeignKey' => 'product_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
        
        public function beforeSave(){
            if( !empty($this->data['Task']['surv_attr_ids']) ){
                $this->data['Task']['surv_attr_ids'] = serialize($this->data['Task']['surv_attr_ids']);
                
                return true;
            }else{
                return false;
            }
        }

}
