<?php
App::uses('AppController', 'Controller');

/**
 * Shops Controller
 *
 * @property Shop $Shop
 */
class ShopsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();

//		$this->Auth->allow('notify_shop_expired', 'test_email_amazon');
	}

/**
 * Managers
 * 
 * @throws NotFoundException
 */
	public function manager_edit() {
		$this->Shop->id = $this->user['Shop']['id'];
		if (!$this->Shop->exists()) {
			throw new NotFoundException(__('Invalid shop'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Shop->save($this->request->data)) {
				$this->Session->setFlash(__('The shop\'s settings has been saved.'), 'flash_success');
			} else {
				$this->Session->setFlash(__('The shop\'s settings could not be saved. Please, try again.'), 'flash_fail');
			}
		}

		// get shop details
		$this->request->data = $this->Shop->read(null, $this->shop_id);

		$this->loadModel('ShopCategory');
		$shopCategories = $this->ShopCategory->find('list', array(
			'order' => 'ShopCategory.name ASC',
		));
		$this->set('shopCategories', $shopCategories);
	}

	public function manager_register() {

		if ($this->request->is('post') || $this->request->is('put')) {

			$this->Shop->create();

			// set user id
			$this->request->data['Shop']['user_id'] = $this->Auth->user('id');

			if ($this->Shop->save($this->request->data)) {
				$this->Session->setFlash(__('Your shop\'s successfully created. You may add your product now.'), 'flash_success');

				$this->redirect(array('controller' => 'system', 'action' => 'dashboard', 'manager' => true));
			} else {
				$this->Session->setFlash(__('Your shop\'s could not be saved. Please, try again.'), 'flash_fail');
			}
		}

		$this->loadModel('ShopCategory');
		$shopCategories = $this->ShopCategory->find('list', array(
			'order' => 'ShopCategory.name ASC',
		));
		$this->set('shopCategories', $shopCategories);
	}

	public function admin_index() {
		$this->Shop->recursive = 0;
		$this->set('shops', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->Shop->id = $id;

		if (!$this->Shop->exists()) {
			throw new NotFoundException(__('Invalid shop'));
		}

		$this->set('shop', $this->Shop->read(null, $id));
	}

	public function admin_delete($id = null) {
		$this->Shop->id = $id;

		if (!$this->Shop->exists()) {
			throw new NotFoundException(__('Invalid shop'));
		}

		if ($this->Shop->delete()) {
			$this->Session->setFlash(__('Shop deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}

		$this->Session->setFlash(__('Shop was not deleted'), 'flash_fail');

		$this->redirect(array('action' => 'index'));
	}

}
