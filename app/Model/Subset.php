<?php
App::uses('AppModel', 'Model');
/**
 * Subset Model
 *
 * @property Part $Part
 * @property Product $Product
 */
class Subset extends AppModel {

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
//				'message' => 'Subset must have survey attributes',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
        
        public $belongsTo = array(
                'Task' => array(
			'className' => 'Task',
			'foreignKey' => 'task_id',
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
		'Product' => array(
			'className' => 'Product',
			'joinTable' => 'products_subsets',
			'foreignKey' => 'subset_id',
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
        
        protected function _get_sku_code($productId ){
            return $this->Product->field('sku',array('Product.id' => $productId));
        }
        
        
        //'active_sku_code' means for which sku of a set spinner will be shown
        public function beforeSave($options = array()) {
            if( isset($this->data['Product']['Product']) && !empty($this->data['Product']['Product']) ){
                sort($this->data['Product']['Product']);
                
                //$this->log(print_r($this->data, true),'error');
                
                $totalProducts = count($this->data['Product']['Product']);
                $middleIndex = (int)$totalProducts/2;
                $this->data['Subset']['active_sku_code'] = $this->_get_sku_code($this->data['Product']['Product'][$middleIndex]);
                $this->data['Subset']['end_sku_code'] = $this->_get_sku_code($this->data['Product']['Product'][$totalProducts -1]);
                
                //$this->log(print_r($this->data, true),'error');
            }
            return true;
        }
        
}