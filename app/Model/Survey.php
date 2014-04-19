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
        
        public function saveSurvey($data, $firstImage = '', $secondImage = ''){
            
//            $this->log(print_r($data, 'error'));
//            $this->log('received in model','error');
            
            $response['success'] = true;
            
            $formatted = array();
                        
            $formatted['Survey']['outlet_id'] = $this->Outlet->field('id', array('dms_code' => $data['dms_code']));
            $formatted['Survey']['user_id'] = 1;
            if( $data['is_failure']=='true' || $data['is_failure']=='1'){
                $formatted['Survey']['is_failure'] = true;
                $formatted['Survey']['failure_cause'] = $data['failure_cause'];                
            }else{
                $formatted['Survey']['is_failure'] = false;
                $formatted['Survey']['failure_cause'] = $data['failure_cause'];
                $formatted['Survey']['must_sku'] = $data['must_have_sku'];
                $formatted['Survey']['fixed_display'] = $data['fixed_display'];
                $formatted['Survey']['new_product'] = $data['new_product'];
                $formatted['Survey']['trade_promotion'] = $data['trade_promotion'];
                $formatted['Survey']['pop'] = $data['pop_item'];
                $formatted['Survey']['hot_spot'] = $data['hot_spot'];
                $formatted['Survey']['additional_info'] = $data['additional_info'];                
                             
                $formatted['Survey']['first_image'] = $firstImage;
                $formatted['Survey']['second_image'] = $secondImage;
                
                //for test only
                //$formatted['Survey']['outlet_id'] = $formatted['Survey']['']
            }
            $formatted['Survey']['lattitude'] = $data['lattitude'];
            $formatted['Survey']['longitude'] = $data['longitude'];
            $formatted['Survey']['date_time'] = $data['datetime'];   
            
            //$this->log(print_r($formatted, true),'error');
            
            if( $this->save($formatted) ){
                if(!isset($data['first_image']) ){
                    $response['message'] = 'Data has been saved but image couldn\'t';
                }else{
                    $response['message'] = 'Data has been saved';
                }
            }else{
                $response['success'] = false;
                $response['message'] = 'Save failed!';
            }
            
            return $response;
        }
        
    /**
     *
     * @return type
     */
    public function get_contain_array() {

//        $conditions = array();
//        if (isset($data['start_date'])) {
//            $conditions[]['DATE(Feedback.created) >= '] = $data['start_date'];
//        }
//        if (isset($data['end_date'])) {
//            $conditions[]['DATE(Feedback.created) <='] = $data['end_date'];
//        }
        return array(
            'Outlet' => array(
                'fields' => array('id','outlet_type_id', 'town_id','name','phone','address','dms_code','class'),
                'OutletType' => array('title','class'),
                'Town' => array(
                    'fields' => array('title'),
                    'Territory' => array(
                        'fields' => array('title'),
                        'Region' => array('fields' => array('title')))),
            ),
        );
    }
    
    /**
     * Used in SurveysController's index method
     * @param type $data
     */
    public function set_conditions($data){
        $conditions = array();
//        if( isset($data['Survey'])){
//            $outletIds = array();
//            
//            if( !empty($data['Survey']['dms_code']) ){
//                $outletIds = $this->Outlet->find('list', array('conditions' => 
//                    array('dms_code' => $data['Survey']['dms_code'])));
//            }else if( !empty($data['Survey']['town_id']) ){
//                $outletIds = $this->Outlet->find('list', array('conditions' => 
//                    array('town_id' => $data['Survey']['town_id'])));
//                
//            }else if( !empty($data['Survey']['territory_id']) ){
//                $townIds = $this->Outlet->Town->find('list', array('conditions' => 
//                    array('territory_id' => $data['Survey']['territory_id'])));
//                
//                $outletIds = $this->Outlet->find('list', array('conditions' => 
//                    array('town_id' => $townIds)));
//            }else if( !empty($data['Survey']['region_id'])){
//                $territoryIds = $this->Outlet->Town->Territory->find('list', array(
//                    'conditions' => array('region_id' => $data['Survey']['region_id'])
//                ));
//                $townIds = $this->Outlet->Town->find('list', array('conditions' => 
//                    array('territory_id' => $territoryIds)));
//                
//                $outletIds = $this->Outlet->find('list', array('conditions' => 
//                    array('town_id' => $townIds)));
//            }
//            
//            if( !empty($outletIds) ){
//                $conditions['outlet_id'] = $outletIds;
//            }
//            
//            if( !empty($data['Survey']['year']) ){
//                $conditions['YEAR(date_time)'] = $data['Survey']['year'];
//            }
//            if( !empty($data['Survey']['month']) ){
//                $conditions['MONTH(date_time)'] = $data['Survey']['month'];
//            }
//        }
        if( !empty($data)){
            $outletIds = array();
            
            if( !empty($data['dms_code']) ){
                $outletIds = $this->Outlet->find('list', array('conditions' => 
                    array('dms_code' => $data['dms_code'])));
                $outletIds = $this->id_from_list($outletIds);
                
            }else if( !empty($data['town_id']) ){
                $outletIds = $this->Outlet->find('list', array('conditions' => 
                    array('town_id' => $data['town_id'])));
                
                $outletIds = $this->id_from_list($outletIds);
                
            }else if( !empty($data['territory_id']) ){
                $townIds = $this->Outlet->Town->find('list', array('conditions' => 
                    array('territory_id' => $data['territory_id'])));
                $townIds = $this->id_from_list($townIds);
                
                $outletIds = $this->Outlet->find('list', array('conditions' => 
                    array('town_id' => $townIds)));
                $outletIds = $this->id_from_list($outletIds);
                
            }else if( !empty($data['region_id'])){
                $territoryIds = $this->Outlet->Town->Territory->find('list', array(
                    'conditions' => array('region_id' => $data['region_id'])
                ));
                $territoryIds = $this->id_from_list($territoryIds);
                
                $townIds = $this->Outlet->Town->find('list', array('conditions' => 
                    array('territory_id' => $territoryIds)));
                $townIds = $this->id_from_list($townIds);
                
                $outletIds = $this->Outlet->find('list', array('conditions' => 
                    array('town_id' => $townIds)));
                $outletIds = $this->id_from_list($outletIds);
            }
            
            if( !empty($outletIds) ){
                $conditions['outlet_id'] = $outletIds;
            }
            
            if( !empty($data['year_id']) ){
                $conditions['YEAR(date_time)'] = $data['year_id'];
            }else{
                $conditions['YEAR(date_time)'] = date('Y');
            }
            if( !empty($data['month_id']) ){
                $conditions['MONTH(date_time)'] = $data['month_id'];
            }else{
                $conditions['MONTH(date_time)'] = date('m');
            }
        }
        return $conditions;
    }
    
    /**
     * 
     * @param type $list
     * @return type
     */
    public function id_from_list($list){
        $ids = array();
        foreach($list as $k => $v){
            $ids[] = $k;
        }
        return $ids;
    }
}
