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
    
    var $hardCodedFormData = array();
    
    
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = $this->autoRender = false;
        $this->Auth->allow('api_login');
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
                    $this->_format_for_frontEnd($outlet);
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
    protected function _format_for_frontEnd($outlet){
        
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
        
    protected function _get_must_sku(){
        return array(
            array(
                'sku_title' => '',
                'sku_code' => '',
                'outlet_type' => '','is_new' => 0
            ),
            
        );
    }


    public function fetch_data(){
        $this->hardCodedFormData['must_sku'] = array();
    }
    
    public function receive_survey_data(){
        
    }
}
