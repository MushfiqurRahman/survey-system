<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property SurveyType $SurveyType
 * @property PaginatorComponent $Paginator
 */
class SurveyTypesController extends AppController {

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
		$this->SurveyType->recursive = 0;
		$this->set('surveyTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SurveyType->exists($id)) {
			throw new NotFoundException(__('Invalid SurveyType'));
		}
		$options = array('conditions' => array('SurveyType.' . $this->SurveyType->primaryKey => $id));
		$this->set('surveyTypes', $this->SurveyType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SurveyType->create();
			if ($this->SurveyType->save($this->request->data)) {
				$this->Session->setFlash(__('The Survey Type has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Survey Type could not be saved. Please, try again.'));
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
		if (!$this->SurveyType->exists($id)) {
			throw new NotFoundException(__('Invalid Survey Type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SurveyType->save($this->request->data)) {
				$this->Session->setFlash(__('The Survey Type has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Survey Type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SurveyType.' . $this->SurveyType->primaryKey => $id));
			$this->request->data = $this->SurveyType->find('first', $options);
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
		$this->SurveyType->id = $id;
		if (!$this->SurveyType->exists()) {
			throw new NotFoundException(__('Invalid Survey Type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SurveyType->delete()) {
			$this->Session->setFlash(__('SurveyType deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('SurveyType was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
