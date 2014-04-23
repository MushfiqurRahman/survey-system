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

        
        public function saveSurvey($data, $firstImage = '', $secondImage = ''){
            
//            $this->log(print_r($data, 'error'));
            
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
    
    /**
     * Used in SurveysController export_report method
     * @param type $data
     * @return type
     */
    public function getReportData($data){
        
        $this->Behaviors->load('Containable');
        
        if( $data['report_type']=='must_sku' ){            
            $fields = array('Survey.id','Survey.outlet_id','Survey.must_sku');            
        }else if( $data['report_type']=='fixed_display'){
            $fields = array('Survey.id','Survey.outlet_id','Survey.fixed_display');
        }else{
            $fields = array('Survey.id','Survey.outlet_id','Survey.new_product','Survey.trade_promotion',
                'Survey.pop','Survey.hot_spot','Survey.additional_info');
        }        
        $reportData = $this->find('all', array(
                    'fields' => $fields,
                    'contain' => array(
                        'Outlet' => array(
                            'fields' => array('id','outlet_type_id','name', 'dms_code'),
                            'OutletType' => array('title','class'))),
                    'conditions' => array('DATE(date_time) >=' => $data['start_date'], 
                        'DATE(date_time) <=' => $data['end_date']),
                    ));
        
        //$this->log(print_r($reportData,true),'error');
        
        if( $data['report_type']=='must_sku' ){            
            $formattedData = $this->_formatForMustSku($reportData);
        }else if( $data['report_type']=='fixed_display'){
            $startTime = microtime(true);
            $formattedData = $this->_formatForFixedDisplay($reportData);
            $endTime = microtime(true);
            
            $this->log('total time taken: '. ($endTime-$startTime), 'error');
        }else{
            $formattedData = $this->_formatForAdditionalInfo($reportData);
        }       
        return $formattedData;
    }
    
    protected function _formatForMustSku($data){
        $formatted = array();
        $count = 0;
        $slNo = 1;
        
        foreach($data as $dt){
            $dt['Survey']['must_sku'] = $this->_removeQuoteNBrace($dt['Survey']['must_sku']);
            $skus = explode(",", $dt['Survey']['must_sku']);
            
            foreach($skus as $sku){
                $codeNcount = explode(":",$sku);
                
                $formatted[$count]['Slno'] =  $slNo;
                $formatted[$count]['Outlet_id'] = $dt['Outlet']['dms_code'];
                $formatted[$count]['Shop_Type'] = $dt['Outlet']['OutletType']['title'];
                $formatted[$count]['Shop_Class'] = $dt['Outlet']['OutletType']['class'];
                $formatted[$count]['Outlet_Name'] = $dt['Outlet']['name'];
                $formatted[$count]['Product_Code'] = $codeNcount[0];
                $formatted[$count]['Qty'] = $codeNcount[1];
                
                $count++;
            }
            $slNo++;
        }
        return $formatted;
    }
    
    
    protected function _formatForFixedDisplay($data){
        $formatted = array();
        $count = 0;
        $slNo = 1;
        
        $productModel = ClassRegistry::init('Product');
        $productlist = $productModel->find('list', array('fields' => array('sku','title',)));
        
        foreach($data as $dt){
            
            $dt['Survey']['fixed_display'] = $this->_removeQuoteNBrace($dt['Survey']['fixed_display']);
            $fixedDisplay = explode(",", $dt['Survey']['fixed_display']);
            
            $fixedDisplayValues = array();
            
            foreach($fixedDisplay as $v){
                $tmp = explode(":",$v);
                //extracting the sku code from string
                preg_match_all('/^([0-9]{3})/', $tmp[0], $skuCode);
//                
//                $this->log(print_r($skuCode, true),'error');
//                $this->log(print_r($v, true),'error');
//                $this->log(print_r($tmp, true),'error');
                
                //$tmp[0] contains a string like: 158_dis_count
                $this->_extractValues($fixedDisplayValues, $skuCode[0][0], $tmp[0], $tmp[1]);
            }
            
//            $this->log(print_r($fixedDisplayValues, true),'error');exit;
            
            //now formatting for xls export
            foreach($fixedDisplayValues as $k => $fv){
                $formatted[$count]['slno'] =  $slNo;
                $formatted[$count]['outlet_id'] = $dt['Outlet']['dms_code'];//though column name is id but actually it's dms_code
                $formatted[$count]['item_desc'] = $productlist[$k];
                $formatted[$count]['item_code'] = $k;
                $formatted[$count]['availability'] = isset($fv['availability']) ? $fv['availability'] : false;
                $formatted[$count]['display_qty'] = $fv['display_count'];
                $formatted[$count]['face_up'] = $fv['faceup_count'];
                $formatted[$count]['sequence'] = isset($fv['sequence']) ? $fv['sequence'] : false;
                $formatted[$count]['shop_type'] = $dt['Outlet']['OutletType']['title'];
                $formatted[$count]['shop_class'] = $dt['Outlet']['OutletType']['class'];
                $formatted[$count]['outlet_name'] = $dt['Outlet']['name'];
//                $formatted[$count]['category'] = $codeNcount[1];

                $count++;
            }
            $slNo++;
        }
        
        //$this->log(print_r($formatted, true),'error');
        return $formatted;
    }
    
    protected function _extractValues(&$fixedDisplayValues, $skuCode, $str, $value){
        if( !isset($fixedDisplayValues[$skuCode])){
            $fixedDisplayValues[$skuCode] = array();
        }
        
        $str = str_replace($skuCode,"", $str);
        if( $str=='_dis_count'){
            $fixedDisplayValues[$skuCode]['display_count'] = $value;
        }else if( $str=='_face_count'){
            $fixedDisplayValues[$skuCode]['faceup_count'] = $value;
        }else if($str =='_availability'){
            $fixedDisplayValues[$skuCode]['availability'] = $value;
        }else if( $str=='_sequence'){
            $fixedDisplayValues[$skuCode]['sequence'] = $value;
        }        
    }
    
    protected function _formatForAdditionalInfo($data){
        $formatted = array();
        $count = 0;
        $slNo = 1;
        
        foreach($data as $dt){
            $dt['Survey']['new_product'] = $this->_removeQuoteNBrace($dt['Survey']['new_product']);
            $dt['Survey']['trade_promotion'] = $this->_removeQuoteNBrace($dt['Survey']['trade_promotion']);
            $dt['Survey']['pop'] = $this->_removeQuoteNBrace($dt['Survey']['pop']);
            $dt['Survey']['hot_spot'] = $this->_removeQuoteNBrace($dt['Survey']['hot_spot']);
            $dt['Survey']['additional_info'] = $this->_removeQuoteNBrace($dt['Survey']['additional_info']);
            
            $newProduct = explode(",", $dt['Survey']['new_product']);
            $tradePromotion = explode(",", $dt['Survey']['trade_promotion']);
            $pop = explode(",", $dt['Survey']['pop']);
            $hotSpot = explode(",", $dt['Survey']['hot_spot']);
            $additionalInfo = explode(",", $dt['Survey']['additional_info']);
            
//            $this->log(print_r($newProduct, true),'error');
//            $this->log(print_r($tradePromotion, true),'error');
//            $this->log(print_r($pop, true),'error');
//            $this->log(print_r($hotSpot, true),'error');
//            $this->log(print_r($additionalInfo, true),'error');
            
//            foreach($skus as $sku){
//                $codeNcount = explode(":",$sku);
//                
//                $formatted[$count]['Slno'] =  $slNo;
//                $formatted[$count]['Outlet_id'] = $dt['Outlet']['dms_code'];
//                $formatted[$count]['Shop_Type'] = $dt['Outlet']['OutletType']['title'];
//                $formatted[$count]['Shop_Class'] = $dt['Outlet']['OutletType']['class'];
//                $formatted[$count]['Outlet_Name'] = $dt['Outlet']['name'];
//                $formatted[$count]['Product_Code'] = $codeNcount[0];
//                $formatted[$count]['Qty'] = $codeNcount[1];
//                
//                $count++;
//            }
//            $slNo++;
        }
        $this->log(print_r($formatted,true),'error');
        return $formatted;
    }
    
    /**
     * Remove " and { and } from fetched data
     * @param type $string
     * @return type
     */
    protected function _removeQuoteNBrace($string){
        $string = str_replace("\"","",$string);
        $string = str_replace("{","",$string);
        $string = str_replace("}","",$string);
        return $string;
    }
}
