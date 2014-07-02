<?php
App::uses('AppController', 'Controller');
/**
 * MappingPops Controller
 *
 * @property MappingPop $MappingPop
 * @property PaginatorComponent $Paginator
 */
class MappingPopsController extends AppController {

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
		//$this->MappingPop->recursive = 0;
//            pr($this->Paginator->paginate());
		$this->set('mappingPops', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MappingPop->exists($id)) {
			throw new NotFoundException(__('Invalid mapping pop'));
		}
		$options = array('conditions' => array('MappingPop.' . $this->MappingPop->primaryKey => $id));
		$this->set('mappingPop', $this->MappingPop->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                    if($this->MappingPop->isPopOrderExists($this->request->data)){
                        $this->Session->setFlash(__('Given Pop Order already exists. Please select unique pop order.'));
                    }else{
			$this->MappingPop->create();
			if ($this->MappingPop->save($this->request->data)) {
				$this->Session->setFlash(__('The mapping pop has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mapping pop could not be saved. Please, try again.'));
			}
                    }
		}
                $outletTypes = $this->MappingPop->OutletType->getOutletTypes();
                $popItems = $this->MappingPop->PopItem->getPopItemList();
                $this->set('outletTypes', $outletTypes);
                $this->set('popItems', $popItems);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MappingPop->exists($id)) {
			throw new NotFoundException(__('Invalid mapping pop'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
                    if($this->MappingPop->isPopOrderExists($this->request->data)){
                        $this->Session->setFlash(__('Given Pop Order already exists. Please select unique pop order.'));
                    }else{
			if ($this->MappingPop->save($this->request->data)) {
				$this->Session->setFlash(__('The mapping pop has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mapping pop could not be saved. Please, try again.'));
			}
                    }
		} else {
			$options = array('conditions' => array('MappingPop.' . $this->MappingPop->primaryKey => $id));
			$this->request->data = $this->MappingPop->find('first', $options);
		}
                $outletTypes = $this->MappingPop->OutletType->getOutletTypes();
                $popItems = $this->MappingPop->PopItem->getPopItemList();
                $this->set('outletTypes', $outletTypes);
                $this->set('popItems', $popItems);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MappingPop->id = $id;
		if (!$this->MappingPop->exists()) {
			throw new NotFoundException(__('Invalid mapping pop'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MappingPop->delete()) {
			$this->Session->setFlash(__('Mapping pop deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Mapping pop was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
