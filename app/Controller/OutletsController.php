<?php
App::uses('AppController', 'Controller');
/**
 * Outlets Controller
 *
 * @property Outlet $Outlet
 * @property PaginatorComponent $Paginator
 */
class OutletsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Outlet->recursive = 0;
		$this->set('outlets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Outlet->exists($id)) {
			throw new NotFoundException(__('Invalid outlet'));
		}
		$options = array('conditions' => array('Outlet.' . $this->Outlet->primaryKey => $id));
		$this->set('outlet', $this->Outlet->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Outlet->create();
			if ($this->Outlet->save($this->request->data)) {
				$this->Session->setFlash(__('The outlet has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The outlet could not be saved. Please, try again.'));
			}
		}
		$outletTypes = $this->Outlet->OutletType->find('list');
		$towns = $this->Outlet->Town->find('list');
		$users = $this->Outlet->User->find('list');
		$this->set(compact('outletTypes', 'towns', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Outlet->exists($id)) {
			throw new NotFoundException(__('Invalid outlet'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Outlet->save($this->request->data)) {
				$this->Session->setFlash(__('The outlet has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The outlet could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Outlet.' . $this->Outlet->primaryKey => $id));
			$this->request->data = $this->Outlet->find('first', $options);
		}
		$outletTypes = $this->Outlet->OutletType->find('list');
		$towns = $this->Outlet->Town->find('list');
		$users = $this->Outlet->User->find('list');
		$this->set(compact('outletTypes', 'towns', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Outlet->id = $id;
		if (!$this->Outlet->exists()) {
			throw new NotFoundException(__('Invalid outlet'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Outlet->delete()) {
			$this->Session->setFlash(__('Outlet deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Outlet was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
