<?php
App::uses('AppController', 'Controller');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiController
 *
 * @author root
 */
class ApiController extends AppController {
    //put your code here
    
    //Those outlets given at login time
    var $loggedInOutlets = array();
    var $outletCounter = -1;
    
    var $frontEndMenus;
    var $dataForFrontEnd = array();
    
//    var $menuItemCounter = array();
    var $counter = array();
    
    var $hardCodedFormData = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = $this->autoRender = false;
        $this->Auth->allow('api_login', 'get_form_data');
    }
    
    public function api_login(){
        $this->layout = $this->autoRender = false;
        $this->loggedInOutlets = array();
        $response = array();
        $response['status'] = true;
        if( $this->_is_valid_user_code() ){
            if( $this->_is_valid_outlet_codes() ){
                $response['outlets'] = $this->loggedInOutlets;
            }else{
                $response['status'] = false;
                $response['message'] = 'Invaid Outlet Code! Please insert valid outlet codes.';
            }
        }else{
            $response['status'] = false;
            $response['message'] = 'Invalid User code! Please give valid User Code';
        }
        echo json_encode($response);
    }
    
    /**
     * 
     * @param type $userCode
     * @return boolean
     */
    protected function _is_valid_user_code(){
        if( isset($this->request->data['user_code']) && !empty($this->request->data['user_code']) ){
            if( $this->request->data['user_code']=='1234' ){
                return true;
            }
        }
        return false;
    }
    
    /**
     * @used: in api_login method of this controller
     * 
     * @return boolean
     */
    protected function _is_valid_outlet_codes(){
        if( isset($this->request->data['outlet_codes']) && !empty($this->request->data['outlet_codes']) ){
            $outletCodes = explode(",", $this->request->data['outlet_codes']);
            
//            $this->log(print_r($outletCodes,true),'error');exit;         
            
            $this->loadModel('Outlet');

            $this->Outlet->Behaviors->load('Containable');
            
            foreach($outletCodes as $oC){
                
                $oC = trim($oC);
                $outlet = $this->Outlet->find('first', array('contain' => array(
                    'Town' => array(
                        'fields' => array('id','territory_id','title'),
                        'Territory' => array(
                            'fields' => array('id','region_id','title'),
                            'Region' => array('fields' => array('id','title')),
                        )
                    ),                
                    'OutletType' => array('fields' => array('id','title')),
                ),
                'fields' => array('id','town_id','name','address','dms_code', 'class'),
                'conditions' => array('Outlet.dms_code' => $oC),
                'order' => array('Outlet.name' => 'ASC')));
                
                if( $outlet ){
                    $this->_format_outlets_for_frontEnd($outlet);
                }
            }
            if( empty($this->loggedInOutlets) ){
                return false;
            }else{
                return true;
            }
        }
        return false;
    }
    
    /**
     * 
     * @param type $outlet
     */
    protected function _format_outlets_for_frontEnd($outlet){
        
        $this->outletCounter++;
        $this->loggedInOutlets[$this->outletCounter]['id'] = $outlet['Outlet']['id'];
        $this->loggedInOutlets[$this->outletCounter]['region'] = $outlet['Town']['Territory']['Region']['title'];
        $this->loggedInOutlets[$this->outletCounter]['territory'] = $outlet['Town']['Territory']['title'];
        $this->loggedInOutlets[$this->outletCounter]['town'] = $outlet['Town']['title'];
        $this->loggedInOutlets[$this->outletCounter]['name'] = $outlet['Outlet']['name'];
        $this->loggedInOutlets[$this->outletCounter]['address'] = $outlet['Outlet']['address'];
        $this->loggedInOutlets[$this->outletCounter]['outlet_type'] = $outlet['OutletType']['title'];
        $this->loggedInOutlets[$this->outletCounter]['dms_code'] = $outlet['Outlet']['dms_code'];
        $this->loggedInOutlets[$this->outletCounter]['classType'] = $outlet['Outlet']['class'];
    }
    
    /**
     * 
     */
    protected function _initialize_counter(){
        $this->counter['sku_counter'] = $this->counter['trade_promotion_counter'] = 0;
        $this->counter['pop_item_counter'] = $this->counter['hot_spot_counter'] = 0;
    }


    public function get_form_data(){
        $this->layout = $this->autoRender = false;
        $this->loadModel('Part');
        $this->Part->Behaviors->load('Containable');
        $this->frontEndMenus = $this->Part->FrontEndMenu->find('list', array('fields' => array('id','menu_code')));
        
        $this->_initialize_counter();
        
        $this->_get_trade_promotions();
        $this->_get_pop_items();
        $this->_get_hot_spots();
        
        foreach($this->frontEndMenus as $k => $menu){
            if( $menu=='hot_spots' || $menu=='pop_items' || $menu=='trade_promotion' )
                continue;
            //pr($this->Part->find('all',array('conditions' => array('Part.front_end_menu_id' => $k))));
            
            $menuData = $this->Part->find('all', array('contain' => array(
                'Task' => array(
                    'fields' => array('id', 'outlet_type_id','title'),
                    'Product' => array('fields' => array(
                        'id','title','sku'
                     )),
                    'Subset' => array('fields' => 
                        array('id','task_id','active_sku_code'),
                        'Product' => array('id','title','sku')),
                    'OutletType' => array('fields' => array(
                        'id','title'                ),

                    )),
                ),
                'conditions' => array('Part.front_end_menu_id' => $k),));
            //pr($menuData);
            
            if( !empty($menuData) ){
                $this->_format_sku_for_front_end($menuData, $menu);
            }
        }        
        pr($this->dataForFrontEnd);
        //echo json_encode($this->dataForFrontEnd);
    }
    
    function _format_sku_for_front_end($menuData, $menu){
        //pr($menuData);
        if( isset($menuData[0]['Task']) ){
            foreach( $menuData[0]['Task'] as $groupId => $task ){
                
                if( isset($task['Subset']) && !empty($task['Subset']) ){
                    foreach( $task['Subset'] as $subset){
                        
                        foreach($subset['Product'] as $product){
                            $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['id'] = $product['id'];
                            $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['sku_title'] = $product['title'];
                            $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['sku_code'] = $product['sku'];
                            $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['outlet_type'] = $task['OutletType']['title'];
                            $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['front_end_menu'] = $menu;
                            //$this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['group_id'] = $groupId;//for set purpose
                            $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['task_id'] = $task['id'];//for set purpose
                            $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['subset_id'] = $subset['id'];
                            if( $product['sku']== $subset['active_sku_code']){
                                $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['is_active_sku'] = 1;
                            }else{
                                $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['is_active_sku'] = 0;
                            }                            
                            $this->counter['sku_counter']++;
                        }
                    }
                }
                else if( isset($task['Product']) && count($task['Product'])>0 ){
                    foreach($task['Product'] as $product){                        
                        $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['id'] = $product['id'];
                        $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['sku_title'] = $product['title'];
                        $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['sku_code'] = $product['sku'];
                        $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['outlet_type'] = $task['OutletType']['title'];
                        $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['front_end_menu'] = $menu;
                        //$this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['group_id'] = $groupId;//for set purpose
                        $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['task_id'] = $task['id'];//for set purpose
                        $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['subset_id'] = -1;                        
                        $this->dataForFrontEnd['Sku'][ $this->counter['sku_counter'] ]['is_active_sku'] = -1;
                        
                        $this->counter['sku_counter']++;
                    }
                }
            }
        }
    }
    
    protected function _get_trade_promotions(){
        $this->loadModel('Program');
        $tradePromotionItems = $this->Program->find('all');
        foreach( $tradePromotionItems as $promoItem){
            $this->dataForFrontEnd['TradePromotion'][ $this->counter['trade_promotion_counter'] ]['program_name'] = $promoItem['Program']['title'];
            $this->counter['trade_promotion_counter']++;
        }
    }
    
    protected function _get_pop_items(){
        $this->loadModel('PopItem');
        $this->PopItem->Behaviors->load('Containable');
        
        $popItems = $this->PopItem->find('all', array('contain' => array(
            'OutletType' => array(
                'fields' => array('id','title'),
            ),),
            'fields' => array('id','head','descr'),));
        
        if( !empty($popItems) ){
            foreach($popItems as $pItem){
                foreach($pItem['OutletType'] as $outletType){
                    $this->dataForFrontEnd['PopItem'][ $this->counter['pop_item_counter'] ]['head'] = $pItem['PopItem']['head'];
                    $this->dataForFrontEnd['PopItem'][ $this->counter['pop_item_counter'] ]['descr'] = $pItem['PopItem']['descr'];
                    $this->dataForFrontEnd['PopItem'][ $this->counter['pop_item_counter'] ]['outlet_type'] = $outletType['title'];
                    $this->counter['pop_item_counter']++;
                }
            }
        }
    }
    
    protected function _get_hot_spots(){
        $this->loadModel('HotSpot');
        $this->HotSpot->Behaviors->load('Containable');
        
        $hotSpots = $this->HotSpot->find('all', array('contain' => array(
            'OutletType' => array(
                'fields' => array('id','title'),
            ),           
            ),
            'fields' => array('id','head','descr', 'first_compliance', 'second_compliance'),));
        
        if( !empty($hotSpots) ){
            foreach($hotSpots as $hSpot){
                foreach($hSpot['OutletType'] as $outletType){
                    $this->dataForFrontEnd['HotSpot'][ $this->counter['hot_spot_counter'] ]['head'] = $hSpot['HotSpot']['head'];
                    $this->dataForFrontEnd['HotSpot'][ $this->counter['hot_spot_counter'] ]['descr'] = $hSpot['HotSpot']['descr'];
                    $this->dataForFrontEnd['HotSpot'][ $this->counter['hot_spot_counter'] ]['first_compliance'] = $hSpot['HotSpot']['first_compliance'];
                    $this->dataForFrontEnd['HotSpot'][ $this->counter['hot_spot_counter'] ]['second_compliance'] = $hSpot['HotSpot']['second_compliance'];
                    $this->dataForFrontEnd['HotSpot'][ $this->counter['hot_spot_counter'] ]['outlet_type'] = $outletType['title'];
                    $this->counter['hot_spot_counter']++;
                }
            }
        }
    }
    
    /**
     * 
     */
    public function receive_survey_data(){
        
    }
}
