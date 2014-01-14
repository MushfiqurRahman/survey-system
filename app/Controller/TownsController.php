<?php
App::uses('AppController', 'Controller');
/**
 * Towns Controller
 *
 * @property Town $Town
 * @property PaginatorComponent $Paginator
 */
class TownsController extends AppController {

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
		$this->Town->recursive = 0;
		$this->set('towns', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Town->exists($id)) {
			throw new NotFoundException(__('Invalid town'));
		}
		$options = array('conditions' => array('Town.' . $this->Town->primaryKey => $id));
		$this->set('town', $this->Town->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Town->create();
			if ($this->Town->save($this->request->data)) {
				$this->Session->setFlash(__('The town has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The town could not be saved. Please, try again.'));
			}
		}
		$territories = $this->Town->Territory->find('list');
		$this->set(compact('territories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Town->exists($id)) {
			throw new NotFoundException(__('Invalid town'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Town->save($this->request->data)) {
				$this->Session->setFlash(__('The town has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The town could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Town.' . $this->Town->primaryKey => $id));
			$this->request->data = $this->Town->find('first', $options);
		}
		$territories = $this->Town->Territory->find('list');
		$this->set(compact('territories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Town->id = $id;
		if (!$this->Town->exists()) {
			throw new NotFoundException(__('Invalid town'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Town->delete()) {
			$this->Session->setFlash(__('Town deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Town was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
