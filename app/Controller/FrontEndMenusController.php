<?php
App::uses('AppController', 'Controller');
/**
 * FrontEndMenus Controller
 *
 * @property FrontEndMenu $FrontEndMenu
 * @property PaginatorComponent $Paginator
 */
class FrontEndMenusController extends AppController {

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
		$this->FrontEndMenu->recursive = -1;
		$this->set('front_end_menus', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
//	public function view($id = null) {
//		if (!$this->FrontEndMenu->exists($id)) {
//			throw new NotFoundException(__('Invalid menu'));
//		}
//		$options = array('conditions' => array('FrontEndMenu.' . $this->FrontEndMenu->primaryKey => $id));
//		$this->set('menu', $this->FrontEndMenu->find('first', $options));
//	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FrontEndMenu->create();
			if ($this->FrontEndMenu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
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
		if (!$this->FrontEndMenu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FrontEndMenu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FrontEndMenu.' . $this->FrontEndMenu->primaryKey => $id),
                            'recursive' => -1);
			$this->request->data = $this->FrontEndMenu->find('first', $options);
                        //pr($this->request->data);exit;
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
		$this->FrontEndMenu->id = $id;
		if (!$this->FrontEndMenu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FrontEndMenu->delete()) {
			$this->Session->setFlash(__('FrontEndMenu deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('FrontEndMenu was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
