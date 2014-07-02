<?php
App::uses('AppController', 'Controller');
/**
 * MappingTradePromotions Controller
 *
 * @property MappingTradePromotion $MappingTradePromotion
 * @property PaginatorComponent $Paginator
 */
class MappingTradePromotionsController extends AppController {

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
		//$this->MappingTradePromotion->recursive = 0;
		$this->set('mappingTradePromotions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MappingTradePromotion->exists($id)) {
			throw new NotFoundException(__('Invalid mapping trade promotion'));
		}
		$options = array('conditions' => array('MappingTradePromotion.' . $this->MappingTradePromotion->primaryKey => $id));
		$this->set('mappingTradePromotion', $this->MappingTradePromotion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                    if( $this->MappingTradePromotion->isPromotionOrderExists($this->request->data)){
                        $this->Session->setFlash(__('Given order already exists. Please, enter unique order.'));
                    }else{
			$this->MappingTradePromotion->create();
			if ($this->MappingTradePromotion->save($this->request->data)) {
				$this->Session->setFlash(__('The mapping trade promotion has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mapping trade promotion could not be saved. Please, try again.'));
			}
                    }
		} 
                $outletTypes = $this->MappingTradePromotion->OutletType->getOutletTypes();
                $programs = $this->MappingTradePromotion->Program->find('list');
                $this->set('outletTypes', $outletTypes);
                $this->set('programs', $programs);                    
                
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MappingTradePromotion->exists($id)) {
			throw new NotFoundException(__('Invalid mapping trade promotion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
                    if( $this->MappingTradePromotion->isPromotionOrderExists($this->request->data)){
                        $this->Session->setFlash(__('Given order already exists. Please, enter unique order.'));
                    }else{
			if ($this->MappingTradePromotion->save($this->request->data)) {
				$this->Session->setFlash(__('The mapping trade promotion has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mapping trade promotion could not be saved. Please, try again.'));
			}
                    }
		} else {
			$options = array('conditions' => array('MappingTradePromotion.' . $this->MappingTradePromotion->primaryKey => $id));
			$this->request->data = $this->MappingTradePromotion->find('first', $options);
		}
                $outletTypes = $this->MappingTradePromotion->OutletType->getOutletTypes();
                $programs = $this->MappingTradePromotion->Program->find('list');
                $this->set('outletTypes', $outletTypes);
                $this->set('programs', $programs);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MappingTradePromotion->id = $id;
		if (!$this->MappingTradePromotion->exists()) {
			throw new NotFoundException(__('Invalid mapping trade promotion'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MappingTradePromotion->delete()) {
			$this->Session->setFlash(__('Mapping trade promotion deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Mapping trade promotion was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
