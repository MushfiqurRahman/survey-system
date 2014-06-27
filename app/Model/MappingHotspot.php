<?php
App::uses('AppModel', 'Model');
/**
 * MappingHotspot Model
 *
 */
class MappingHotspot extends AppModel {

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
		'hot_spot_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'hotspot_order' => array(
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
		'HotSpot' => array(
			'className' => 'HotSpot',
			'foreignKey' => 'hot_spot_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        /**
         * check if the order value already exists 
         * @uses : In MappingTradePromotionsController add method
         */
        public function isHotSpotOrderExists($data) {
            $existingOrder = $this->find('first', array(
                'conditions' => array(
                    'outlet_type_id' => $data['MappingHotspot']['outlet_type_id'],
                    'hotspot_order' => $data['MappingHotspot']['hotspot_order']
                )
            ));
            if(empty($existingOrder) || $existingOrder==false ){
                return false;
            }//following conditions are essential for edit time
            else if( isset($data['MappingHotspot']['id']) &&
                    $data['MappingHotspot']['id']!=$existingOrder['MappingHotspot']['id']){
                return true;
            }
            else if( isset($data['MappingHotspot']['id']) &&
                    $data['MappingHotspot']['id']==$existingOrder['MappingHotspot']['id']){
                return false;
            }
            return true;
        }
}
