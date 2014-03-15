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
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = $this->autoRender = false;
        $this->Auth->allow('*');
    }
    
    public function login(){
        //$this->layout = $this->autoRender = false;
        $this->loggedInOutlets = array();
        $response = array();
        $response['success'] = true;
        if( $this->_is_valid_user_code() ){
            if( $this->_is_valid_outlet_codes() ){
                $response['outlets'] = $this->loggedInOutlets;
            }else{
                $response['success'] = false;
                $response['message'] = 'Invaid Outlet Code! Please insert valid outlet codes.';
            }
        }else{
            $response['success'] = false;
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
            
            $this->loadModel('Outlet');

            $this->Outlet->Behaviors->load('Containable');
            
            foreach($outletCodes as $oC){
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
        $i = count($this->loggedInOutlets);
        $this->loggedInOutlets[$i]['region'] = $outlet['Town']['Territory']['Region']['title'];
        $this->loggedInOutlets[$i]['territory'] = $outlet['Town']['Territory']['title'];
        $this->loggedInOutlets[$i]['town'] = $outlet['Town']['title'];
        $this->loggedInOutlets[$i]['name'] = $outlet['Outlet']['name'];
        $this->loggedInOutlets[$i]['address'] = $outlet['Outlet']['address'];
        $this->loggedInOutlets[$i]['outlet_type'] = $outlet['OutletType']['title'];
        $this->loggedInOutlets[$i]['dms_code'] = $outlet['Outlet']['dms_code'];
        $this->loggedInOutlets[$i]['class'] = $outlet['Outlet']['class'];
    }


    public function fetch_data(){
        
    }
    
    public function receive_survey_data(){
        
    }
}
