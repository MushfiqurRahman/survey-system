<?php
App::uses('AppController', 'Controller');
/**
 * PopItems Controller
 *
 * @property PopItem $PopItem
 * @property PaginatorComponent $Paginator
 */
class PopItemsController extends AppController {

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
		$this->PopItem->recursive = 0;
		$this->set('pop_items', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PopItem->exists($id)) {
			throw new NotFoundException(__('Invalid pop_item'));
		}
		$options = array('conditions' => array('PopItem.' . $this->PopItem->primaryKey => $id));
		$this->set('pop_item', $this->PopItem->find('first', $options));
                
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                    //pr($this->request->data);exit;
			$this->PopItem->create();
			if ($this->PopItem->saveMany($this->request->data)) {
				$this->Session->setFlash(__('The pop_item has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pop_item could not be saved. Please, try again.'));
			}
		}
                $outletTypes = $this->PopItem->OutletType->getOutletTypes();
                $this->set('OutletType', $outletTypes);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PopItem->exists($id)) {
			throw new NotFoundException(__('Invalid pop_item'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PopItem->save($this->request->data)) {
				$this->Session->setFlash(__('The pop_item has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pop_item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PopItem.' . $this->PopItem->primaryKey => $id));
			$this->request->data = $this->PopItem->find('first', $options);
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
		$this->PopItem->id = $id;
		if (!$this->PopItem->exists()) {
			throw new NotFoundException(__('Invalid pop_item'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PopItem->delete()) {
			$this->Session->setFlash(__('PopItem deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('PopItem was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
