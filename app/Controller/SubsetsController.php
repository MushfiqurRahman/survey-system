<?php
App::uses('AppController', 'Controller');
/**
 * Subsets Controller
 *
 * @property Subset $Subset
 * @property PaginatorComponent $Paginator
 */
class SubsetsController extends AppController {

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
		$this->Subset->recursive = 0;
		$this->set('subsets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Subset->exists($id)) {
			throw new NotFoundException(__('Invalid subset'));
		}
		$options = array('conditions' => array('Subset.' . $this->Subset->primaryKey => $id));
		$this->set('subset', $this->Subset->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subset->create();
			if ($this->Subset->save($this->request->data)) {
				$this->Session->setFlash(__('The subset has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subset could not be saved. Please, try again.'));
			}
		}
		$tasks = $this->Subset->Task->taskListWithOutletType();
                $products = $this->Subset->Product->productsListWithSku();
		$this->set(compact('tasks', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Subset->exists($id)) {
			throw new NotFoundException(__('Invalid subset'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subset->save($this->request->data)) {
				$this->Session->setFlash(__('The subset has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subset could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Subset.' . $this->Subset->primaryKey => $id));
			$this->request->data = $this->Subset->find('first', $options);
		}
		$tasks = $this->Subset->Task->taskListWithOutletType();
                $products = $this->Subset->Product->productsListWithSku();
		$this->set(compact('tasks', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Subset->id = $id;
		if (!$this->Subset->exists()) {
			throw new NotFoundException(__('Invalid subset'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Subset->delete()) {
			$this->Session->setFlash(__('Subset deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Subset was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
