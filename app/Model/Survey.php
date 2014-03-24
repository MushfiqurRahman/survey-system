<?php
App::uses('AppModel', 'Model');
/**
 * Survey Model
 *
 * @property Category $Category
 * @property Subcategory $Subcategory
 * @property Outlet $Outlet
 * @property User $User
 * @property SurveyDetail $SurveyDetail
 */
class Survey extends AppModel {

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
		'outlet_id' => array(
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
		'lattitude' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'longitude' => array(
			'decimal' => array(
				'rule' => array('decimal'),
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
	public $belongsTo = array(
		'Outlet' => array(
			'className' => 'Outlet',
			'foreignKey' => 'outlet_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
//	public $hasMany = array(
//		'SurveyDetail' => array(
//			'className' => 'SurveyDetail',
//			'foreignKey' => 'survey_id',
//			'dependent' => false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		)
//	);
        
        public function saveSurvey($data){
            $formatted = array();
                        
            $formatted['Survey']['outlet_id'] = $this->Outlet->field('id', array('dms_code' => $data['dms_code']));
            $formatted['Survey']['user_id'] = 1;
            if( $data['is_failure']==false || $data['is_failure']==0 || $data['is_failure']=='false'){
                $formatted['Survey']['is_failure'] = true;
                $formatted['Survey']['failure_cause'] = $data['failure_cause'];
            }else{
                $formatted['Survey']['outlet_id'] = $this->Outlet->field('id', array('dms_code' => $data['dms_code']));
                $formatted['Survey']['is_failure'] = false;
                $formatted['Survey']['failure_cause'] = $data['failure_cause'];
                $formatted['Survey']['must_sku'] = $data['must_have_sku'];
                $formatted['Survey']['fixed_display'] = $data['fixed_display'];
                $formatted['Survey']['new_product'] = $data['new_product'];
                $formatted['Survey']['trade_promotion'] = $data['trade_promotion'];
                $formatted['Survey']['pop'] = $data['pop_item'];
                $formatted['Survey']['hot_spot'] = $data['hot_spot'];
                $formatted['Survey']['additional_info'] = $data['additional_info'];                
                $formatted['Survey']['lattitude'] = $data['lattitude'];
                $formatted['Survey']['longitude'] = $data['longitude'];
                $formatted['Survey']['date_time'] = $data[''];                
                $formatted['Survey']['first_image'] = isset($data['first_image']) ? $data['first_image'] : '';
                $formatted['Survey']['second_image'] = isset($data['second_image']) ? $data['second_image'] : '';
            }
            
            if( $this->save($formatted) ){
                if(!isset($data['first_image']) ){
                    return 'Data has been saved but image couldn\'t';
                }
                return 'Data has been saved';
            }
        }
}
