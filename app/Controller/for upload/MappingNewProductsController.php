<?php
App::uses('AppController', 'Controller');
/**
 * MappingNewProducts Controller
 *
 * @property MappingNewProduct $MappingNewProduct
 * @property PaginatorComponent $Paginator
 */
class MappingNewProductsController extends AppController {

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
		$this->MappingNewProduct->recursive = 0;
		$this->set('mappingNewProducts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MappingNewProduct->exists($id)) {
			throw new NotFoundException(__('Invalid mapping new product'));
		}
		$options = array('conditions' => array('MappingNewProduct.' . $this->MappingNewProduct->primaryKey => $id));
		$this->set('mappingNewProduct', $this->MappingNewProduct->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                    if( $this->MappingNewProduct->isNewProductOrderExists($this->request->data)){
                        $this->Session->setFlash(__('Order Already exists, please select unique order'));
                    }else{
			$this->MappingNewProduct->create();
			if ($this->MappingNewProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The mapping new product has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mapping new product could not be saved. Please, try again.'));
			}
                    }
		}
                $this->set('products', $this->MappingNewProduct->Product->productsListWithSku());
                $this->set('outletTypes', $this->MappingNewProduct->OutletType->getOutletTypes());
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MappingNewProduct->exists($id)) {
			throw new NotFoundException(__('Invalid mapping new product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
                    if( $this->MappingNewProduct->isNewProductOrderExists($this->request->data)){
                        $this->Session->setFlash(__('Order Already exists, please select unique order'));
                    }else{
			if ($this->MappingNewProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The mapping new product has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mapping new product could not be saved. Please, try again.'));
			}
                    }
		} else {
			$options = array('conditions' => array('MappingNewProduct.' . $this->MappingNewProduct->primaryKey => $id));
			$this->request->data = $this->MappingNewProduct->find('first', $options);
		}
                $this->set('products', $this->MappingNewProduct->Product->productsListWithSku());
                $this->set('outletTypes', $this->MappingNewProduct->OutletType->getOutletTypes());
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MappingNewProduct->id = $id;
		if (!$this->MappingNewProduct->exists()) {
			throw new NotFoundException(__('Invalid mapping new product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MappingNewProduct->delete()) {
			$this->Session->setFlash(__('Mapping new product deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Mapping new product was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
