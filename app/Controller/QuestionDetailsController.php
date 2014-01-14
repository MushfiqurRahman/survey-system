<?php
App::uses('AppController', 'Controller');
/**
 * QuestionDetails Controller
 *
 * @property QuestionDetail $QuestionDetail
 * @property PaginatorComponent $Paginator
 */
class QuestionDetailsController extends AppController {

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
		$this->QuestionDetail->recursive = 0;
		$this->set('questionDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QuestionDetail->exists($id)) {
			throw new NotFoundException(__('Invalid question detail'));
		}
		$options = array('conditions' => array('QuestionDetail.' . $this->QuestionDetail->primaryKey => $id));
		$this->set('questionDetail', $this->QuestionDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuestionDetail->create();
			if ($this->QuestionDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The question detail has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question detail could not be saved. Please, try again.'));
			}
		}
		$questions = $this->QuestionDetail->Question->find('list');
		$answerTypes = $this->QuestionDetail->AnswerType->find('list');
		$this->set(compact('questions', 'answerTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QuestionDetail->exists($id)) {
			throw new NotFoundException(__('Invalid question detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuestionDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The question detail has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuestionDetail.' . $this->QuestionDetail->primaryKey => $id));
			$this->request->data = $this->QuestionDetail->find('first', $options);
		}
		$questions = $this->QuestionDetail->Question->find('list');
		$answerTypes = $this->QuestionDetail->AnswerType->find('list');
		$this->set(compact('questions', 'answerTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->QuestionDetail->id = $id;
		if (!$this->QuestionDetail->exists()) {
			throw new NotFoundException(__('Invalid question detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QuestionDetail->delete()) {
			$this->Session->setFlash(__('Question detail deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Question detail was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
