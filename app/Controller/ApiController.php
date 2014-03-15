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
    
    public function login(){
        $response = array();
        $response['success'] = true;
        if( $this->_is_valid_user_code() ){
            if( $this->_is_valid_outlet_codes() ){
                
            }else{
                $response['success'] = false;
                $response['message'] = 'Invaid Outlet Code! Please insert valid outlet codes.';
            }
        }else{
            $response['success'] = false;
            $response['message'] = 'Empty User Code is not allowed! Please give valid User Code';
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
            //$outletCodes = explo
        }
        return false;
    }


    public function fetch_data(){
        
    }
    
    public function receive_survey_data(){
        
    }
}
