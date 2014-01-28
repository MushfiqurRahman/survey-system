<?php
App::uses('AppController', 'Controller');
/**
 * SurveyAttributes Controller
 *
 * @property SurveyAttribute $SurveyAttribute
 * @property PaginatorComponent $Paginator
 */
class SurveyAttributesController extends AppController {

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
		$this->SurveyAttribute->recursive = 0;
		$this->set('surveyAttributes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SurveyAttribute->exists($id)) {
			throw new NotFoundException(__('Invalid survey attribute'));
		}
		$options = array('conditions' => array('SurveyAttribute.' . $this->SurveyAttribute->primaryKey => $id));
		$this->set('surveyAttribute', $this->SurveyAttribute->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SurveyAttribute->create();
			if ($this->SurveyAttribute->save($this->request->data)) {
				$this->Session->setFlash(__('The survey attribute has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey attribute could not be saved. Please, try again.'));
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
		if (!$this->SurveyAttribute->exists($id)) {
			throw new NotFoundException(__('Invalid survey attribute'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SurveyAttribute->save($this->request->data)) {
				$this->Session->setFlash(__('The survey attribute has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey attribute could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SurveyAttribute.' . $this->SurveyAttribute->primaryKey => $id));
			$this->request->data = $this->SurveyAttribute->find('first', $options);
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
		$this->SurveyAttribute->id = $id;
		if (!$this->SurveyAttribute->exists()) {
			throw new NotFoundException(__('Invalid survey attribute'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SurveyAttribute->delete()) {
			$this->Session->setFlash(__('Survey attribute deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Survey attribute was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
