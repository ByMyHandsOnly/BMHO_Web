<?php
App::uses('AppController', 'Controller');
/**
 * ShopCategories Controller
 *
 * @property ShopCategory $ShopCategory
 */
class ShopCategoriesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ShopCategory->recursive = 0;
		$this->set('shopCategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->ShopCategory->id = $id;
		if (!$this->ShopCategory->exists()) {
			throw new NotFoundException(__('Invalid shop category'));
		}
		$this->set('shopCategory', $this->ShopCategory->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ShopCategory->create();
			if ($this->ShopCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The shop category has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shop category could not be saved. Please, try again.'), 'flash_fail');
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->ShopCategory->id = $id;
		if (!$this->ShopCategory->exists()) {
			throw new NotFoundException(__('Invalid shop category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ShopCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The shop category has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shop category could not be saved. Please, try again.'), 'flash_fail');
			}
		} else {
			$this->request->data = $this->ShopCategory->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ShopCategory->id = $id;
		if (!$this->ShopCategory->exists()) {
			throw new NotFoundException(__('Invalid shop category'));
		}
		if ($this->ShopCategory->delete()) {
			$this->Session->setFlash(__('Shop category deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Shop category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
