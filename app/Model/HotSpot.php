<?php
App::uses('AppModel', 'Model');
/**
 * HotSpot Model
 *
 * @property Category $Category
 * @property Subcategory $Subcategory
 * @property Outlet $Outlet
 * @property User $User
 * @property HotSpotDetail $HotSpotDetail
 */
class HotSpot extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'head' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descr' => array(
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

	public $hasAndBelongsToMany = array(
		'OutletType' => array(
			'className' => 'OutletType',
			'joinTable' => 'hot_spots_outlet_types',
			'foreignKey' => 'hot_spot_id',
			'associationForeignKey' => 'outlet_type_id',
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
	);
        
        public function getHotSpotList(){
            $hotSpots = $this->find('all', array(
                'fields' => array('id','head','descr','first_compliance','second_compliance'),
                'recursive' => -1
            ));
            
            $list = array();
            
            foreach($hotSpots as $hItm){
                $list[$hItm['HotSpot']['id']] = $hItm['HotSpot']['head'].' - '.$hItm['HotSpot']['descr'].
                    $hItm['HotSpot']['first_compliance'] ;
                
                if( $hItm['HotSpot']['second_compliance']!=''){
                    $list[ $hItm['HotSpot']['id'] ] .= ( ' - '.$hItm['HotSpot']['second_compliance']);
                }
            }
            
            return $list;
        }
}
