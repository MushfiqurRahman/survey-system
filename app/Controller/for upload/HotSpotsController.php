<?php
App::uses('AppController', 'Controller');
/**
 * HotSpotss Controller
 *
 * @property HotSpots $HotSpots
 * @property PaginatorComponent $Paginator
 */
class HotSpotsController extends AppController {

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
		$this->HotSpot->recursive = 0;
		$this->set('hot_spots', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HotSpot->exists($id)) {
			throw new NotFoundException(__('Invalid hot_spot'));
		}
		$options = array('conditions' => array('HotSpot.' . $this->HotSpot->primaryKey => $id));
		$this->set('hot_spot', $this->HotSpot->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                    //pr($this->request->data);exit;
			$this->HotSpot->create();
			if ($this->HotSpot->save($this->request->data)) {
				$this->Session->setFlash(__('The hot_spot has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hot_spot could not be saved. Please, try again.'));
			}
		}
                $outletTypes = $this->HotSpot->OutletType->getOutletTypes();
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
		if (!$this->HotSpot->exists($id)) {
			throw new NotFoundException(__('Invalid hot_spot'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HotSpot->save($this->request->data)) {
				$this->Session->setFlash(__('The hot_spot has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hot_spot could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('HotSpot.' . $this->HotSpot->primaryKey => $id));
			$this->request->data = $this->HotSpot->find('first', $options);
                        $outletTypes = $this->HotSpot->OutletType->getOutletTypes();
                $this->set('OutletType', $outletTypes);
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
		$this->HotSpot->id = $id;
		if (!$this->HotSpot->exists()) {
			throw new NotFoundException(__('Invalid hot_spot'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HotSpot->delete()) {
			$this->Session->setFlash(__('HotSpot deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('HotSpot was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
