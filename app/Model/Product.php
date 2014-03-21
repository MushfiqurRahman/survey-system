<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Task $Task
 */
class Product extends AppModel {

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
		'sku' => array(
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
                            'message' => 'This SKU already exists'
                        )
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Task' => array(
			'className' => 'Task',
			'joinTable' => 'products_tasks',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'task_id',
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
            'Subset' => array(
			'className' => 'Subset',
			'joinTable' => 'products_subsets',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'subset_id',
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
        
        public function productsListWithSku(){
            $products = $this->find('all', array('fields' => array('id','title','sku'),
                'order' => array('sku'),
                'recursive' => -1));
            $productsList = array();
            
            foreach($products as $pd){
                $productsList[ $pd['Product']['id'] ] = $pd['Product']['title'] . '---->' .$pd['Product']['sku'];
            }
            return $productsList;
        }

}
