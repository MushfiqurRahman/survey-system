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
        public $newProductMaps;
        public $popMaps;
        public $hotSpotMaps;
        public $tradePromotionMaps;
        public $currentOutletTypeId;
        /**
         * Suppose UGS_B has three row of hotspots, but UGS_G may has 4 rows of hotspot
         * or pop etc. Data has been stored as $outletTypeWiseTotalRow['total_new_product']['outlet_type_id']['count']
         */
        public $outletTypeWiseTotalRow;

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
     * Since in a month an outlet can't be surveyed twice.
     * This menthod has been used in ApiController.php
     * 
     * @param type $data
     * @return boolean
     */
    public function isCurrentMonthSurveyExists($data){
        $outletId = $this->Outlet->field('id', array('dms_code' => $data['dms_code']));
        $currentMonth = date('M',  time());
        $currentYear = date('Y', time());
        
        $lastSurvey = $this->find('first', array(
            'conditions' => array(
                'Survey.outlet_id' => $outletId
            ),
            'limit' => 1,
            'order' => 'Survey.id DESC',
            'recursive' => -1
        ));
//        $this->log(print_r($lastSurvey,true),'error');
        
        if( !empty($lastSurvey) ){
            $lastMonth = date('M',strtotime($lastSurvey['Survey']['created']));
            $lastYear = date('Y',strtotime($lastSurvey['Survey']['created']));
            
            if( $lastYear!=$currentYear ) return false;
            if($lastMonth != $currentMonth ) return false;
            
            return true;
        }
        return false;
    }

        
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
            
            //$this->log(print_r($outletIds,true),'error');
            
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
            $fields = array('Survey.id','Survey.outlet_id','Survey.must_sku','Survey.is_failure');            
        }else if( $data['report_type']=='fixed_display'){
            $fields = array('Survey.id','Survey.outlet_id','Survey.fixed_display','Survey.is_failure');
        }else{
            $fields = array('Survey.id','Survey.outlet_id','Survey.new_product','Survey.trade_promotion',
                'Survey.pop','Survey.hot_spot','Survey.additional_info','Survey.is_failure');
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
        
//        $this->log(print_r($reportData,true),'error');
        
        if( $data['report_type']=='must_sku' ){            
            $formattedData = $this->_formatForMustSku($reportData);
        }else if( $data['report_type']=='fixed_display'){
            $startTime = microtime(true);
            $formattedData = $this->_formatForFixedDisplay($reportData);
            $endTime = microtime(true);            
            //$this->log('total time taken: '. ($endTime-$startTime), 'error');
        }else{
            $formattedData = $this->_formatOthers($reportData);
        }       
        return $formattedData;
    }
    
    protected function _formatForMustSku($data){
        $formatted = array();
        $count = 0;
        $slNo = 1;
        
        foreach($data as $dt){
            if(!$dt['Survey']['is_failure']){
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
        }
        return $formatted;
    }
    
    
    protected function _formatForFixedDisplay($data){
        $formatted = array();
        $count = 0;
        $slNo = 1;
        
        $productModel = ClassRegistry::init('Product');
        $productlist = $productModel->find('list', array('fields' => array('sku','title',)));
        $categoryList = $productModel->Category->find('list', array('fields' => array('id','title')));
        $productsListWithCategoryId = $productModel->find('list', 
                array('fields' => array('sku','category_id'),
                'recursive' => -1));
        
        //$this->log(print_r($productsListWithCategoryId, true),'error');exit;
                        
        foreach($data as $dt){
            
            if(!$dt['Survey']['is_failure']){

                $dt['Survey']['fixed_display'] = $this->_removeQuoteNBrace($dt['Survey']['fixed_display']);
                $fixedDisplay = explode(",", $dt['Survey']['fixed_display']);

                $fixedDisplayValues = array();

                foreach($fixedDisplay as $v){
                    $tmp = explode(":",$v);
                    //extracting the sku code from string
                    preg_match_all('/^([0-9]{3})/', $tmp[0], $skuCode);

                    //$tmp[0] contains a string like: 158_dis_count
                    $this->_extractValues($fixedDisplayValues, $skuCode[0][0], $tmp[0], $tmp[1]);
                }


                //now formatting for xls export
                foreach($fixedDisplayValues as $k => $fv){
                    $formatted[$count]['slno'] =  $slNo;
                    $formatted[$count]['outlet_id'] = $dt['Outlet']['dms_code'];//though column name is id but actually it's dms_code
                    $formatted[$count]['item_desc'] = $productlist[$k];
                    $formatted[$count]['category_name'] = $categoryList[ $productsListWithCategoryId[$k] ];
                    $formatted[$count]['item_code'] = $k;
                                    if( !isset($fv['availability']) ){
                                            $formatted[$count]['availability'] = 0;
                                    }else{
                                            $formatted[$count]['availability'] = $fv['availability']=='true' ? 1 : 0;
                                    }                
                    $formatted[$count]['display_qty'] = $fv['display_count'];
                    $formatted[$count]['face_up'] = $fv['faceup_count'];
                                    if( !isset($fv['sequence']) ){
                                            $formatted[$count]['sequence'] = 0;
                                    }else{
                                            $formatted[$count]['sequence'] = $fv['sequence']=='true' ? 1 : 0;
                                    }

                    $formatted[$count]['shop_type'] = $dt['Outlet']['OutletType']['title'];
                    $formatted[$count]['shop_class'] = $dt['Outlet']['OutletType']['class'];
                    $formatted[$count]['outlet_name'] = $dt['Outlet']['name'];

                    $count++;
                }
                $slNo++;
            }
        }
        //$this->log(print_r($formatted, true),'error');
        return $formatted;
    }
    
    /**
     * Extract values for FixedDisplay
     * @param type $fixedDisplayValues
     * @param type $skuCode
     * @param type $str
     * @param type $value
     */
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
    
    protected function _getOutletTypeWiseTotalRow(){
        //Getting outlet type wise various mapping counting
        $this->outletTypeWiseTotalRow['total_new_product'] = array();
        $this->outletTypeWiseTotalRow['total_trade_promotion'] = array();
        $this->outletTypeWiseTotalRow['total_pop'] = array();
        $this->outletTypeWiseTotalRow['total_hot_spot'] = array();
        
        foreach($this->newProductMaps as $np){
            if(isset($this->outletTypeWiseTotalRow['total_new_product'][ $np['MappingNewProduct']['outlet_type_id'] ])){
                $this->outletTypeWiseTotalRow['total_new_product'][ $np['MappingNewProduct']['outlet_type_id'] ]++;
            }else{
                $this->outletTypeWiseTotalRow['total_new_product'][ $np['MappingNewProduct']['outlet_type_id'] ] = 1;
            }
        }
        
        foreach($this->tradePromotionMaps as $trdPr){
            if(isset($this->outletTypeWiseTotalRow['total_trade_promotion'][ $trdPr['MappingTradePromotion']['outlet_type_id'] ])){
                $this->outletTypeWiseTotalRow['total_trade_promotion'][ $trdPr['MappingTradePromotion']['outlet_type_id'] ]++;
            }else{
                $this->outletTypeWiseTotalRow['total_trade_promotion'][ $trdPr['MappingTradePromotion']['outlet_type_id'] ] = 1;
            }
        }
        
        foreach($this->popMaps as $np){
            if(isset($this->outletTypeWiseTotalRow['total_pop'][ $np['MappingPop']['outlet_type_id'] ])){
                $this->outletTypeWiseTotalRow['total_pop'][ $np['MappingPop']['outlet_type_id'] ]++;
            }else{
                $this->outletTypeWiseTotalRow['total_pop'][ $np['MappingPop']['outlet_type_id'] ] = 1;
            }
        }
        
        foreach($this->hotSpotMaps as $htSpt){
            if(isset($this->outletTypeWiseTotalRow['total_hot_spot'][ $htSpt['MappingHotspot']['outlet_type_id'] ])){
                $this->outletTypeWiseTotalRow['total_hot_spot'][ $htSpt['MappingHotspot']['outlet_type_id'] ]++;
            }else{
                $this->outletTypeWiseTotalRow['total_hot_spot'][ $htSpt['MappingHotspot']['outlet_type_id'] ] = 1;
            }
        }        
//        $this->log(print_r($this->outletTypeWiseTotalRow, true),'error');exit;
    }


    /**
     * Fetching all the mapped data
     */
    protected function _initialize_mappings(){
        $mappingNewProduct = ClassRegistry::init('MappingNewProduct');
        $mappingTradePromotion = ClassRegistry::init('MappingTradePromotion');
        $mappingPop = ClassRegistry::init('MappingPop');
        $mappingHotspot = ClassRegistry::init('MappingHotspot');
        
        $this->newProductMaps = $mappingNewProduct->find('all', array('recursive' => -1));
        $this->tradePromotionMaps = $mappingTradePromotion->find('all', array('recursive' => -1));
        $this->popMaps = $mappingPop->find('all', array('recursive' => -1));
        $this->hotSpotMaps = $mappingHotspot->find('all', array('recursive' => -1));
        
        $this->_getOutletTypeWiseTotalRow();
        
//        $this->log(print_r($this->newProductMaps, true),'error');
//        $this->log(print_r($this->tradePromotionMaps, true),'error');
//        $this->log(print_r($this->popMaps, true),'error');
//        $this->log(print_r($this->hotSpotMaps, true),'error');
    }
    
    
    /**
     * Formats the New Product, Trade Promotion, HotSpots, Pop items and Additional info
     * @param type $data
     * @return array
     */
    protected function _formatOthers($data){
        //fetching all the mapping first
        $this->_initialize_mappings();       
        
        $formatted = array();
        $count = 0;
        $slNo = 1;
        
        foreach($data as $dt){
            //following value is essential for mapping. Used in method
            $this->currentOutletTypeId = $dt['Outlet']['outlet_type_id'];
            
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
                        
            $formatted[$count]['slno'] = $slNo;
            $formatted[$count]['outlet_id'] = $dt['Outlet']['dms_code'];
            $formatted[$count]['shop_type'] = $dt['Outlet']['OutletType']['title'];
            $formatted[$count]['slab'] = $dt['Outlet']['OutletType']['class'];
            
            if(!$dt['Survey']['is_failure']){
                $this->_extractHotSpots($formatted[$count], $hotSpot);
                $this->_extractPopItems($formatted[$count], $pop);
            }
            
            $this->_extractAdditionalInfo($formatted[$count], $additionalInfo);
            
            if(!$dt['Survey']['is_failure']){
                $this->_extractNewProduct($formatted[$count], $newProduct);
                $this->_extractTradePromotion($formatted[$count], $tradePromotion);
            }
            $slNo++;
            $count++;
        }
        return $formatted;
    }
    
    /**
     * 
     */
    protected function _get_mapping_order($mappingType, $itemId){
        //since for pop there's no preceeding text like '_first' etc
        if( $mappingType!='pop' && $mappingType!='new_product'){
            $itemId = str_replace(substr($itemId, strpos($itemId,'_')),'',$itemId);
        }
        switch ($mappingType){
            case 'new_product':                
                foreach($this->newProductMaps as $np){
                    if( $np['MappingNewProduct']['outlet_type_id']==$this->currentOutletTypeId &&
                        $np['MappingNewProduct']['sku']==$itemId){
                        return $np['MappingNewProduct']['product_order'];
                    }
                }
                break;
            
            case 'trade_promotion':
                foreach($this->tradePromotionMaps as $np){
                    if( $np['MappingTradePromotion']['outlet_type_id']==$this->currentOutletTypeId &&
                        $np['MappingTradePromotion']['program_id']==$itemId){
                        return $np['MappingTradePromotion']['trade_promotion_order'];
                    }
                }
                break;
            
            case 'pop':
                foreach($this->popMaps as $np){
                    if( $np['MappingPop']['outlet_type_id']==$this->currentOutletTypeId &&
                        $np['MappingPop']['pop_item_id']==$itemId){
                        return $np['MappingPop']['pop_order'];
                    }
                }
                break;
            
            case 'hot_spot':
                foreach($this->hotSpotMaps as $np){
                    if( $np['MappingHotspot']['outlet_type_id']==$this->currentOutletTypeId &&
                        $np['MappingHotspot']['hot_spot_id']==$itemId){
                        return $np['MappingHotspot']['hotspot_order'];
                    }
                }
                break;
        }   
    }


    protected function _extractNewProduct(&$formatted, $data){
        $newProds = array();
        
        $formatted['NPD1'] = 0;
        $formatted['NPD2'] = 0;
        
        foreach($data as $dt){
            $temp = explode(":",$dt);           
            $order = $this->_get_mapping_order('new_product', $temp[0]);
            
            if( $order>0) {
                $formatted['NPD'.$order] = $temp[1];//==true ? 1 : 0;
            }
                      
            
//            $newProds[] = $temp[1];
        }
//        foreach($newProds as $np){
//            $npOrder = 
//        }
        //since the data is coming is reversed order
//        $formatted['NPD1'] = isset($newProds[1]) ? $newProds[1] : 0;
//        $formatted['NPD2'] = isset($newProds[0]) ? $newProds[0] : 0;
    }


    protected function _extractTradePromotion(&$formatted, $data){
//        $tradePromo = array();
        
        for($i=1;$i<=3;$i++){
            $formatted['avail._trade_brochure'.$i] = 0;
            $formatted['trade_brochure_update'.$i] = 0;
        }
        
        foreach($data as $dt){
            $temp = explode(":", $dt);
            
            $order = $this->_get_mapping_order('trade_promotion', $temp[0]);
            
            if( $order>0) {
                if( strstr($temp[0], 'avail') ){
                    $formatted['avail._trade_brochure'.$order] = $temp[1]== 'true' ? 1 : 0;
                }else{
                    $formatted['trade_brochure_update'.$order] = $temp[1]== 'true' ? 1 : 0;
                }
            }          
            
//            switch( $temp[0] ){                
//                case '1_avail':
//                    $tradePromo[1] = $temp[1]==true ? 1 : 0;
//                    break;
//                
//                case '1_update':
//                    $tradePromo[2] = $temp[1]==true ? 1 : 0;
//                    break;
//                
//                case '2_avail':
//                    $tradePromo[3] = $temp[1]==true ? 1 : 0;
//                    break;
//                case '2_update':
//                    $tradePromo[4] = $temp[1]==true ? 1 : 0;
//                    break;                
//                
//                case '3_avail':
//                    $tradePromo[5] = $temp[1]==true ? 1 : 0;
//                    break;
//                case '3_update':
//                    $tradePromo[6] = $temp[1]==true ? 1 : 0;
//                    break;
//            }            
        }
//        for($i=1; $i<=3; $i++){            
//            $formatted['avail._trade_brochure'.$i] = isset($tradePromo[($i*2)-1]) ? $tradePromo[$i] : 0;
//            $formatted['trade_brochure_update'.$i] = isset($tradePromo[$i*2]) ? $tradePromo[$i*2] : 0;
//        }
    }
    
    protected function _extractHotSpots(&$formatted, $data){
        $hotSpots = array();
        
        for($i=1;$i<=8;$i++){
            $formatted['hotspot'.$i] = 0;
        }
        
        foreach($data as $dt){
            $temp = explode(":", $dt);
            
            //$this->log(print_r($temp,true),'error');
            
            //var_
            
            $order = $this->_get_mapping_order('hot_spot', $temp[0]);
            if( $order>0) {
                if( strstr($temp[0], 'first') ){
                    $formatted['hotspot'.$order] = $temp[1]=='true' ? 1 : 0;
                }else{
    //                $this->log('current outlet type id'.$this->currentOutletTypeId,'error');
                    if( isset($this->outletTypeWiseTotalRow['total_hot_spot'][$this->currentOutletTypeId]) ){
                        $order = $order+$this->outletTypeWiseTotalRow['total_hot_spot'][$this->currentOutletTypeId];
                    }
                    $formatted['hotspot' . $order] = $temp[1]=='true' ? 1 : 0;
                }
            }
            
//            switch( $temp[0] ){                
//                case '1_first':
//                    $hotSpots[1] = $temp[1]==true ? 1 : 0;
//                    break;
//                
//                case '1_second':
//                    $hotSpots[2] = $temp[1]==true ? 1 : 0;
//                    break;
//                
//                case '2_first':
//                    $hotSpots[3] = $temp[1]==true ? 1 : 0;
//                    break;
//                
//                case '2_second':
//                    $hotSpots[4] = $temp[1]==true ? 1 : 0;
//                    break;
//                
//                case '3_first':
//                    $hotSpots[5] = $temp[1]==true ? 1 : 0;
//                    break;
//                
//                case '3_second':
//                    $hotSpots[6] = $temp[1]==true ? 1 : 0;
//                    break;
//                
//                case '4_first':
//                    $hotSpots[7] = $temp[1]==true ? 1 : 0;
//                    break;
//                
//                case '4_second':
//                    $hotSpots[8] = $temp[1]==true ? 1 : 0;
//                    break;
//            }
        }        
//        for($i=1; $i<=8; $i++){
//            $formatted['hotspot'.$i] = isset($hotSpots[$i]) ? $hotSpots[$i] : 0;
//        }
    }
    
    protected function _extractPopItems(&$formatted, $data){
        $pops = array();
        
        for($i=1;$i<=5;$i++){
            $formatted['pop'.$i] = 0;
        }
        
        foreach($data as $dt){
            $temp = explode(":", $dt);
            
            $order = $this->_get_mapping_order('pop', $temp[0]); 
            if( $order>0) {
                $formatted['pop'.$order] = $temp[1]== 'true' ? 1 : 0;
            }
            
//            $pops[$temp[0]] = isset($temp[1]) && $temp[1]==true ? 1 : 0;
        }
//        $totalPopItems = $this->_get_total_pop_items();
//        for($i=1; $i<=$totalPopItems; $i++){
//            $formatted['pop'.$i] = isset($pops[$i]) ? $pops[$i] : 0;
//        }
    }
    
    /**
     * 
     */
//    protected function _get_total_pop_items(){
//        $PopItem = ClassRegistry::init('PopItem');
//        return $PopItem->find('count');
//    }
    
    protected function _extractAdditionalInfo(&$formatted, $data){
        foreach($data as $dt){
            if(strstr($dt, "datetime:")){
                $formatted['date'] = substr($dt, 9);
            }else if(strstr($dt, "cell:")){
                $formatted['phone'] = substr($dt, 5);
            }else{
                $formatted['name'] = substr($dt, 5);
            }
        }
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