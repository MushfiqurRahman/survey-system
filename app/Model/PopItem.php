<?php
App::uses('AppModel', 'Model');
/**
 * PopItem Model
 *
 * @property Category $Category
 * @property Subcategory $Subcategory
 * @property Outlet $Outlet
 * @property User $User
 * @property PopItemDetail $PopItemDetail
 */
class PopItem extends AppModel {

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
			'joinTable' => 'outlet_types_pop_items',
			'foreignKey' => 'pop_item_id',
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
        
        public function getPopItemList(){
            $popItems = $this->find('all', array(
                'fields' => array('id','head','descr'),
                'recursive' => -1
            ));
            
            $list = array();
            
            foreach($popItems as $pItm){
                $list[$pItm['PopItem']['id']] = $pItm['PopItem']['head'].' - '.$pItm['PopItem']['descr'];
            }
            
            return $list;
        }
}
