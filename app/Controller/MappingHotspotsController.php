<?php
App::uses('AppController', 'Controller');
/**
 * MappingHotspots Controller
 *
 * @property MappingHotspot $MappingHotspot
 * @property PaginatorComponent $Paginator
 */
class MappingHotspotsController extends AppController {

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
		$this->MappingHotspot->recursive = 0;
		$this->set('mappingHotspots', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MappingHotspot->exists($id)) {
			throw new NotFoundException(__('Invalid mapping hotspot'));
		}
		$options = array('conditions' => array('MappingHotspot.' . $this->MappingHotspot->primaryKey => $id));
		$this->set('mappingHotspot', $this->MappingHotspot->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MappingHotspot->create();
			if ($this->MappingHotspot->save($this->request->data)) {
				$this->Session->setFlash(__('The mapping hotspot has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mapping hotspot could not be saved. Please, try again.'));
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
		if (!$this->MappingHotspot->exists($id)) {
			throw new NotFoundException(__('Invalid mapping hotspot'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MappingHotspot->save($this->request->data)) {
				$this->Session->setFlash(__('The mapping hotspot has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mapping hotspot could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MappingHotspot.' . $this->MappingHotspot->primaryKey => $id));
			$this->request->data = $this->MappingHotspot->find('first', $options);
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
		$this->MappingHotspot->id = $id;
		if (!$this->MappingHotspot->exists()) {
			throw new NotFoundException(__('Invalid mapping hotspot'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MappingHotspot->delete()) {
			$this->Session->setFlash(__('Mapping hotspot deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Mapping hotspot was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
