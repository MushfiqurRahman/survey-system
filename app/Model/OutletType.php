<?php
App::uses('AppModel', 'Model');
/**
 * OutletType Model
 *
 * @property Outlet $Outlet
 */
class OutletType extends AppModel {

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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Outlet' => array(
			'className' => 'Outlet',
			'foreignKey' => 'outlet_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
            'Task' => array(
                'className' => 'Task',
                'foreignKey' => 'outlet_type_id',
                'dependent' => false,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'exclusive' => '',
                'finderQuery' => '',
                'counterQuery' => ''
            )
	);
        
        public function getOutletTypes(){
            $outletTypes = array();
            $types = $this->find('all', array('fields' => array('id','title','class'),
                'recursive' => -1));
            
            foreach($types as $type){
                if( $type['OutletType']['class'] ){
                    $outletTypes[ $type['OutletType']['id'] ] = $type['OutletType']['title'].'_'.$type['OutletType']['class'];
                }else{
                    $outletTypes[ $type['OutletType']['id'] ] = $type['OutletType']['title'];
                }
            }
            return $outletTypes;
        }

}
