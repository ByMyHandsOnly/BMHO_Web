<?php
App::uses('AppController', 'Controller');

/**
 * EnquiryReplies Controller
 *
 * @property EnquiryReply $EnquiryReply
 */
class EnquiryRepliesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
//		$this->Auth->allow('add');
	}

	public function edit($id = null) {
		$this->EnquiryReply->id = $id;
		if (!$this->EnquiryReply->exists()) {
			throw new NotFoundException(__('Invalid enquiry reply'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EnquiryReply->save($this->request->data)) {
				$this->Session->setFlash(__('The mesasge has been saved'), 'flash_success');
				$this->redirect(array('controller' => 'enquiries', 'action' => 'view', $this->EnquiryReply->field('enquiry_id')));
			} else {
				$this->Session->setFlash(__('The mesasge could not be saved. Please, try again.'), 'flash_fail');
			}
		} else {
			$this->request->data = $this->EnquiryReply->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->EnquiryReply->id = $id;
		if (!$this->EnquiryReply->exists()) {
			throw new NotFoundException(__('Invalid enquiry reply'));
		}

		$enquiry_id = $this->EnquiryReply->field('enquiry_id');

		if ($this->EnquiryReply->delete()) {
			$this->Session->setFlash(__('Message reply deleted'), 'flash_success');
			$this->redirect(array('controller' => 'enquiries', 'action' => 'view', $enquiry_id));
		}
		$this->Session->setFlash(__('Message reply was not deleted'));
		$this->redirect(array('controller' => 'enquiries', 'action' => 'view', $enquiry_id));
	}

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->EnquiryReply->recursive = 0;
		$this->set('enquiryReplies', $this->paginate());
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {
		$this->EnquiryReply->id = $id;
		if (!$this->EnquiryReply->exists()) {
			throw new NotFoundException(__('Invalid enquiry reply'));
		}
		$this->set('enquiryReply', $this->EnquiryReply->read(null, $id));
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add($enquiry_id) {
		if ($this->request->is('post')) {
			$this->EnquiryReply->create();

			$this->request->data['EnquiryReply']['enquiry_id'] = $enquiry_id;

			if ($this->EnquiryReply->save($this->request->data)) {

				$this->Session->setFlash(__('Your message had been saved.'), 'flash_success');
				$this->redirect(array('controller' => 'enquiries', 'action' => 'view', $enquiry_id));
			} else {
				$this->Session->setFlash(__('Your message could not be saved. Please, try again.'), 'flash_fail');
			}
		}

		$this->render = 'enquiries/view';
	}

/**
 * manager_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_edit($id = null) {
		$this->EnquiryReply->id = $id;
		if (!$this->EnquiryReply->exists()) {
			throw new NotFoundException(__('Invalid enquiry reply'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EnquiryReply->save($this->request->data)) {
				$this->Session->setFlash(__('The mesasge has been saved'), 'flash_success');
				$this->redirect(array('controller' => 'enquiries', 'action' => 'view', $this->EnquiryReply->field('enquiry_id')));
			} else {
				$this->Session->setFlash(__('The mesasge could not be saved. Please, try again.'), 'flash_fail');
			}
		} else {
			$this->request->data = $this->EnquiryReply->read(null, $id);
		}
	}

/**
 * manager_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->EnquiryReply->id = $id;
		if (!$this->EnquiryReply->exists()) {
			throw new NotFoundException(__('Invalid enquiry reply'));
		}

		$enquiry_id = $this->EnquiryReply->field('enquiry_id');

		if ($this->EnquiryReply->delete()) {
			$this->Session->setFlash(__('Message reply deleted'), 'flash_success');
			$this->redirect(array('controller' => 'enquiries', 'action' => 'view', $enquiry_id));
		}
		$this->Session->setFlash(__('Message reply was not deleted'));
		$this->redirect(array('controller' => 'enquiries', 'action' => 'view', $enquiry_id));
	}

}
