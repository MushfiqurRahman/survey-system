<?php
App::uses('AppModel', 'Model');
/**
 * MappingNewProduct Model
 *
 */
class MappingNewProduct extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'outlet_type_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'product_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'product_order' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
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
        
        public $belongsTo = array(
		'OutletType' => array(
			'className' => 'OutletType',
			'foreignKey' => 'outlet_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        public function beforeSave($options = array()) {
            parent::beforeSave($options);
            
            if( !empty($this->data['MappingNewProduct']) ){
                $Product = ClassRegistry::init('Product');
                $skuCode = $Product->field('sku',array('Product.id' => $this->data['MappingNewProduct']['product_id']));
                $this->data['MappingNewProduct']['sku'] = $skuCode;                                
                return true;
            }
            return false;
        }
        
        
        
        /**
         * check if the order value already exists 
         * @uses : In MappingTradePromotionsController add method
         */
        public function isNewProductOrderExists($data) {
            $existingOrder = $this->find('first', array(
                'conditions' => array(
                    'outlet_type_id' => $data['MappingNewProduct']['outlet_type_id'],
                    
                    'product_order' => $data['MappingNewProduct']['product_order']
                )
            ));
            if(empty($existingOrder) || $existingOrder==false ){
                return false;
            }//following conditions are essential for edit time
            else if( isset($data['MappingNewProduct']['id']) &&
                    $data['MappingNewProduct']['id']!=$existingOrder['MappingNewProduct']['id']){
                return true;
            }
            else if( isset($data['MappingNewProduct']['id']) &&
                    $data['MappingNewProduct']['id']==$existingOrder['MappingNewProduct']['id']){
                return false;
            }
            return true;
        }
}
