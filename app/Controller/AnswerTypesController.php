<?php
App::uses('AppController', 'Controller');
/**
 * AnswerTypes Controller
 *
 * @property AnswerType $AnswerType
 * @property PaginatorComponent $Paginator
 */
class AnswerTypesController extends AppController {

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
		$this->AnswerType->recursive = 0;
		$this->set('answerTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AnswerType->exists($id)) {
			throw new NotFoundException(__('Invalid answer type'));
		}
		$options = array('conditions' => array('AnswerType.' . $this->AnswerType->primaryKey => $id));
		$this->set('answerType', $this->AnswerType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AnswerType->create();
			if ($this->AnswerType->save($this->request->data)) {
				$this->Session->setFlash(__('The answer type has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer type could not be saved. Please, try again.'));
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
		if (!$this->AnswerType->exists($id)) {
			throw new NotFoundException(__('Invalid answer type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AnswerType->save($this->request->data)) {
				$this->Session->setFlash(__('The answer type has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The answer type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AnswerType.' . $this->AnswerType->primaryKey => $id));
			$this->request->data = $this->AnswerType->find('first', $options);
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
		$this->AnswerType->id = $id;
		if (!$this->AnswerType->exists()) {
			throw new NotFoundException(__('Invalid answer type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AnswerType->delete()) {
			$this->Session->setFlash(__('Answer type deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Answer type was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
