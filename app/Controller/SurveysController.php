<?php
App::uses('AppController', 'Controller');
/**
 * Surveys Controller
 *
 * @property Survey $Survey
 * @property PaginatorComponent $Paginator
 */
class SurveysController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->set('regions', $this->Survey->Outlet->Town->Territory->Region->find('list'));
        }
        
        /**
         * Used in /View/Surveys/index.ctp file
         */
        public function ajaxGetListData(){
            $this->layout = $this->autoRender = false;
            if($this->request->is('ajax')){
                $response = array();
                $response['success'] = true;
                if( isset($this->request->data['region_id'])){
                    $response['data'] = $this->Survey->Outlet->Town->Territory->find('list', array(
                        'conditions' => array('region_id' => $this->request->data['region_id']),
                    ));
                }else if( isset($this->request->data['territory_id'])){
                    $response['data'] = $this->Survey->Outlet->Town->find('list', array(
                        'conditions' => array('territory_id' => $this->request->data['territory_id']),
                    ));
                }else{
                    $response['success'] = FALSE;
                    $response['data'] = 'Failed to retrieve data';
                }
                echo json_encode($response);
            }
        }

/**
 * index method
 *
 * @return void
 */
	public function index() {            
            //pr($this->request->query);
            
            $this->Survey->Behaviors->load('Containable');

            $this->paginate = array(
                'fields' => array('id','outlet_id','date_time'),
                'contain' => $this->Survey->get_contain_array(),
                'conditions' => $this->Survey->set_conditions($this->request->query),
                'order' => array('Survey.created' => 'DESC'),
                'limit' => 20,
            );
            $Surveys = $this->paginate();
            //pr($Surveys);exit;
            $this->set('surveys', $Surveys);
            if( !empty($this->request->query)){
                $this->set('data',$this->request->query);
            }
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Survey->exists($id)) {
			throw new NotFoundException(__('Invalid survey'));
		}
                $this->Survey->Behaviors->load('Containable');
                
		$options = array(
                    'contain' => array(
                        'Outlet' => array(
                            'fields' => array('id','outlet_type_id', 'town_id','name','phone','address','dms_code'),
                            'OutletType' => array('title','class'),
                            'Town' => array(
                                'fields' => array('title'),
                                'Territory' => array(
                                    'fields' => array('title'),
                                    'Region' => array('fields' => array('title')))),
                    )),
                    'fields' => array('id','outlet_id','lattitude','longitude','first_image','second_image','date_time'),
                    'conditions' => array('Survey.' . $this->Survey->primaryKey => $id));
		$this->set('survey', $this->Survey->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Survey->create();
			if ($this->Survey->save($this->request->data)) {
				$this->Session->setFlash(__('The survey has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Survey->Category->find('list');
		$subcategories = $this->Survey->Subcategory->find('list');
		$outlets = $this->Survey->Outlet->find('list');
		$users = $this->Survey->User->find('list');
		$this->set(compact('categories', 'subcategories', 'outlets', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Survey->exists($id)) {
			throw new NotFoundException(__('Invalid survey'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Survey->save($this->request->data)) {
				$this->Session->setFlash(__('The survey has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Survey.' . $this->Survey->primaryKey => $id));
			$this->request->data = $this->Survey->find('first', $options);
		}
		$categories = $this->Survey->Category->find('list');
		$subcategories = $this->Survey->Subcategory->find('list');
		$outlets = $this->Survey->Outlet->find('list');
		$users = $this->Survey->User->find('list');
		$this->set(compact('categories', 'subcategories', 'outlets', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Survey->id = $id;
		if (!$this->Survey->exists()) {
			throw new NotFoundException(__('Invalid survey'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Survey->delete()) {
			$this->Session->setFlash(__('Survey deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Survey was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
        
        public function view_location($id){
            $lattitude = $this->Survey->field('lattitude',array('id' => $id));
            $longitude = $this->Survey->field('longitude',array('id' => $id));
            $this->set('lattitude', $lattitude);
            $this->set('longitude', $longitude);
        }
}
