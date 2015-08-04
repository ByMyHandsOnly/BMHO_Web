<?php
App::uses('AppController', 'Controller');

/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {

	public $helpers = array('Number', 'Js' => array('Jquery'));

	public function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('view', 'index', 'search');
	}

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index($product_category_id = null) {
		$this->Product->recursive = 0;

		if (!empty($product_category_id)) {
			$this->paginate = array(
				'conditions' => array('Product.product_category_id' => $product_category_id, 'Product.shop_id' => $this->user['Shop']['id']),
				'order' => 'Product.created DESC',
				'limit' => 10
			);

			$this->request->data['Product']['product_category_id'] = $product_category_id;
		} else {
			$this->paginate = array(
				'conditions' => array('Product.shop_id' => $this->user['Shop']['id']),
				'order' => 'Product.created DESC',
				'limit' => 10
			);
		}
		$this->set('products', $this->paginate());

		$productCategories = $this->Product->ProductCategory->find('list', array('order' => 'ProductCategory.name ASC'));
		$this->set('productCategories', $productCategories);
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {

		$this->Product->recursive = 2;

		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add() {
		// init shop_id
		$this->request->data['Product']['shop_id'] = $this->user['Shop']['id'];

		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->saveAssociated($this->request->data, array('deep' => true))) {
				$this->Session->setFlash(__('The product has been saved.') . ' ' . __('You may proceed to add another product\'s image.') . __(' OR ') . '<a href="manager/products/add">' . __('Click here to add another product') . '.</a>', 'flash_success');
				$this->redirect(array('controller' => 'products', 'action' => 'view', $this->Product->id, 'manager' => true));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash_fail');
			}
		}

		$productCategories = $this->Product->ProductCategory->find('list', array('order' => 'ProductCategory.name ASC'));
		$this->set('productCategories', $productCategories);
	}

/**
 * manager_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_edit($id = null) {

		$this->Product->recursive = 2;
		$this->Product->id = $id;

		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->Product->saveAssociated($this->request->data, array('deep' => true))) {
				$this->Session->setFlash(__('The product has been saved'), 'flash_success');
				$this->redirect(array('controller' => 'products', 'action' => 'view', $this->Product->id, 'manager' => true));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash_fail');
			}
		} else {
			$this->request->data = $this->Product->read(null, $id);
		}

		$productCategories = $this->Product->ProductCategory->find('list', array('order' => 'ProductCategory.name ASC'));
		$this->set('productCategories', $productCategories);
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Product deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function view($slug) {

		$product = $this->Product->findBySlug($slug);

		if (empty($product)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('product', $product);
	}

	public function index($category_slug = null) {

		$this->Product->recursive = 1;

//		if (!empty($category_slug)) {
//			$this->paginate = array(
//				'conditions' => array('Category.slug' => $category_slug, 'Product.shop_id' => $this->shop_id),
//				'order' => 'Product.created DESC',
////				'limit' => 10
//			);
//		} else {
//			$this->paginate = array(
//				'conditions' => array('Product.shop_id' => $this->shop_id),
//				'order' => 'Product.created DESC',
////				'limit' => 10
//			);
//		}
//
//		$this->set('products', $this->paginate());


		if (!empty($category_slug)) {
			$products = $this->Product->find('all', array(
				'conditions' => array('ProductCategory.slug' => $category_slug),
				'order' => 'Product.created DESC',
			));
		} else {
			$products = $this->Product->find('all', array(
				'order' => 'Product.created DESC',
			));
		}

		$this->set('products', $products);

		$this->set('page_title', Inflector::humanize($category_slug));
	}

	public function search() {

		$term = $this->request->query['term'];

		if (empty($term)) {
			throw new NotFoundException(__('Invalid search term'));
		}

		$this->Product->recursive = 1;

		$this->paginate = array(
			'conditions' => array(
				'Product.name LIKE' => '%' . $term . '%',
			),
			'order' => 'Product.created DESC'
		);

		$this->set('products', $this->paginate());
	}

/**
 * Upload image via Redactor
 */
	public function manager_upload_image() {
		// files storage folder
//		$dir = 'D:\\www03\\shopstrap.com\\dev\\app\\webroot\\files\\products_description\\';
		$dir = APP . 'webroot' . DS . 'files' . DS . 'products_description' . DS;

		$this->log($dir);

		$_FILES['file']['type'] = strtolower($_FILES['file']['type']);

		if ($_FILES['file']['type'] == 'image/png' || $_FILES['file']['type'] == 'image/jpg' || $_FILES['file']['type'] == 'image/gif' || $_FILES['file']['type'] == 'image/jpeg' || $_FILES['file']['type'] == 'image/pjpeg') {

			// setting file's mysterious name
			//$filename = md5(date('YmdHis')) . '.jpg';
			$filename = uniqid() . '.jpg';

			$file = $dir . $filename;

			// copying
			copy($_FILES['file']['tmp_name'], $file);

			// displaying file    
			$array = array(
				'filelink' => '/files/products_description/' . $filename
			);

			$this->set('result', $array);
		}
	}

	public function admin_index($product_category_id = null) {
		$this->Product->recursive = 0;

		if (!empty($product_category_id)) {
			$this->paginate = array(
				'conditions' => array('Product.product_category_id' => $product_category_id),
				'order' => 'Product.created DESC',
				'limit' => 10
			);

			$this->request->data['Product']['product_category_id'] = $product_category_id;
		} else {
			$this->paginate = array(
				'order' => 'Product.created DESC',
				'limit' => 10
			);
		}
		$this->set('products', $this->paginate());

		$productCategories = $this->Product->ProductCategory->find('list', array(
			'fields' => array('ProductCategory.id', 'ProductCategory.combine'),
			'order' => 'ProductCategory.name ASC'
		));
		$this->set('productCategories', $productCategories);
	}

	public function admin_view($id = null) {

		$this->Product->recursive = 2;

		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

}
