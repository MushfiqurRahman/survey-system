<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow(array('login'));
        }
        
        public function login(){
            $this->layout = 'login';
            $this->set('title_for_layout', "Login");
            if( $this->request->is('post') && !empty($this->data) ){//pr($this->data);

                //if ($this->Auth->login($this->request->data['User'])) {
                if ($this->Auth->login()) {
                    
                    //var_dump($this->Auth->redirect());exit;
                    return $this->redirect($this->Auth->redirect());
                } else {
                    $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
                }
            
		} else if (empty($this->request->data)) {
            }
        }
        
        public function logout(){
            $this->redirect($this->Auth->logout());
        }

/**
 * index method
 *
 * @return void
 */
	public function index() {
            if( $this->loggedinUser['Role']['title']=='Admin'){
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
            }else{
                $this->Session->setFlash(__("You are not authorized to access that location!"));
                $this->redirect($this->Auth->redirect());
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                    if( $this->request->data['User']['password']==$this->request->data['User']['retype_password'] ){
                        unset($this->request->data['User']['retype_password']);
                        $this->request->data['User']['password'] = $this->Auth->password($this->data['User']['password']);
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
                    }else{
                        $this->Session->setFlash(__('Save Failed! Password and Retype Password mismatched'));
                    }
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
                    $this->request->data['User']['password'] = $this->Auth->password($this->data['User']['password']);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
                        $this->request->data['User']['password'] = '';
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
