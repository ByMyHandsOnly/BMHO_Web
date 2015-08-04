<?php
App::uses('AppController', 'Controller');

/**
 * ProductImages Controller
 *
 * @property ProductImage $ProductImage
 */
class ProductImagesController extends AppController {

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->ProductImage->recursive = 0;
		$this->set('images', $this->paginate());
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {
		$this->ProductImage->id = $id;
		if (!$this->ProductImage->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		$this->set('image', $this->ProductImage->read(null, $id));
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add($product_id) {

		$this->request->data['Product']['id'] = $product_id;

		if ($this->request->is('post')) {
			$this->loadModel('Product');
			if ($this->Product->saveAssociated($this->request->data, array('deep' => true))) {
				$this->Session->setFlash(__('The image has been uploaded'), 'flash_success');
				$this->redirect(array('controller' => 'products', 'action' => 'view', $product_id, 'manager' => true));
			} else {
				$this->Session->setFlash(__('The image could not be uploaded. Please, try again.'), 'flash_fail');
			}
		}
		$this->set('product_id', $product_id);
	}

/**
 * manager_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_edit($id = null) {
		$this->ProductImage->id = $id;
		if (!$this->ProductImage->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProductImage->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'), 'flash_fail');
			}
		} else {
			$this->request->data = $this->ProductImage->read(null, $id);
		}
		$products = $this->ProductImage->Product->find('list');
		$this->set(compact('products'));
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
		$this->ProductImage->id = $id;

		$product_id = $this->ProductImage->field('product_id');

		if (!$this->ProductImage->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		
		if ($this->ProductImage->delete()) {
			$this->Session->setFlash(__('Image deleted'), 'flash_success');
			$this->redirect(array('controller' => 'products', 'action' => 'view', $product_id, 'manager' => true));
		}
		
		$this->Session->setFlash(__('Image was not deleted'));
		$this->redirect(array('controller' => 'products', 'action' => 'view', $product_id, 'manager' => true));
	}

}
