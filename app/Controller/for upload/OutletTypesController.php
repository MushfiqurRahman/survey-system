<?php
App::uses('AppController', 'Controller');
/**
 * OutletTypes Controller
 *
 * @property OutletType $OutletType
 * @property PaginatorComponent $Paginator
 */
class OutletTypesController extends AppController {

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
		$this->OutletType->recursive = 0;
                $this->paginate = array('order' => array('OutletType.tytle' => 'ASC'));//not working
		$this->set('outletTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OutletType->exists($id)) {
			throw new NotFoundException(__('Invalid outlet type'));
		}
		$options = array('conditions' => array('OutletType.' . $this->OutletType->primaryKey => $id));
		$this->set('outletType', $this->OutletType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OutletType->create();
			if ($this->OutletType->save($this->request->data)) {
				$this->Session->setFlash(__('The outlet type has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The outlet type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OutletType->exists($id)) {
			throw new NotFoundException(__('Invalid outlet type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OutletType->save($this->request->data)) {
				$this->Session->setFlash(__('The outlet type has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The outlet type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OutletType.' . $this->OutletType->primaryKey => $id));
			$this->request->data = $this->OutletType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OutletType->id = $id;
		if (!$this->OutletType->exists()) {
			throw new NotFoundException(__('Invalid outlet type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OutletType->delete()) {
			$this->Session->setFlash(__('Outlet type deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Outlet type was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
