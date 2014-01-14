<?php
App::uses('AppController', 'Controller');
/**
 * SurveyDetails Controller
 *
 * @property SurveyDetail $SurveyDetail
 * @property PaginatorComponent $Paginator
 */
class SurveyDetailsController extends AppController {

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
		$this->SurveyDetail->recursive = 0;
		$this->set('surveyDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SurveyDetail->exists($id)) {
			throw new NotFoundException(__('Invalid survey detail'));
		}
		$options = array('conditions' => array('SurveyDetail.' . $this->SurveyDetail->primaryKey => $id));
		$this->set('surveyDetail', $this->SurveyDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SurveyDetail->create();
			if ($this->SurveyDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The survey detail has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey detail could not be saved. Please, try again.'));
			}
		}
		$surveys = $this->SurveyDetail->Survey->find('list');
		$questionDetails = $this->SurveyDetail->QuestionDetail->find('list');
		$this->set(compact('surveys', 'questionDetails'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SurveyDetail->exists($id)) {
			throw new NotFoundException(__('Invalid survey detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SurveyDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The survey detail has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SurveyDetail.' . $this->SurveyDetail->primaryKey => $id));
			$this->request->data = $this->SurveyDetail->find('first', $options);
		}
		$surveys = $this->SurveyDetail->Survey->find('list');
		$questionDetails = $this->SurveyDetail->QuestionDetail->find('list');
		$this->set(compact('surveys', 'questionDetails'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SurveyDetail->id = $id;
		if (!$this->SurveyDetail->exists()) {
			throw new NotFoundException(__('Invalid survey detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SurveyDetail->delete()) {
			$this->Session->setFlash(__('Survey detail deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Survey detail was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
