<?php
App::uses('AppModel', 'Model');
/**
 * MappingTradePromotion Model
 *
 */
class MappingTradePromotion extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'outlet_type_id' => array(
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
		'program_id' => array(
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
		'trade_promotion_order' => array(
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
		'Program' => array(
			'className' => 'Program',
			'foreignKey' => 'program_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        /**
         * check if the order value already exists 
         * @uses : In MappingTradePromotionsController add method
         */
        public function isPromotionOrderExists($data) {
            $existingOrder = $this->find('first', array(
                'conditions' => array(
                    'outlet_type_id' => $data['MappingTradePromotion']['outlet_type_id'],
                    'trade_promotion_order' => $data['MappingTradePromotion']['trade_promotion_order']
                )
            ));
            
            if(empty($existingOrder) || $existingOrder==false ){
                return false;
            }//following condition is essential for edit time
            else if( isset($data['MappingTradePromotion']['id']) &&
                    $data['MappingTradePromotion']['id']!=$existingOrder['MappingTradePromotion']['id']){
                return true;
            }
            else if( isset($data['MappingTradePromotion']['id']) &&
                    $data['MappingTradePromotion']['id']==$existingOrder['MappingTradePromotion']['id']){
                return false;
            }
            return true;
        }
}
