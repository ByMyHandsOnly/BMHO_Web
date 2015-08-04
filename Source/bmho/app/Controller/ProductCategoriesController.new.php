<?php
App::uses('AppController', 'Controller');
/**
 * ProductCategories Controller
 *
 * @property ProductCategory $ProductCategory
 */
class ProductCategoriesController extends AppController {
	
	 public $paginate = array(
        'limit' => 10,
        'order' => array(
            'ProductCategory.name' => 'asc'
        )
    );

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($product_category_id=null) {
		$this->ProductCategory->recursive = 2;
		
		if (!empty($product_category_id)) {
			$this->paginate = array(
				'conditions' => array('ProductCategory.parent_id' => $product_category_id),
				'order' => array('ProductCategory.name' => 'ASC'),
				'limit' => 10
			);

		$this->request->data = $this->ProductCategory->read(null, $product_category_id);
		$this->set('ProductCategory', $this->ProductCategory->read(null, $product_category_id));
		//	$this->request->data['ProductCategory']['parent_id'] = $product_category_id;
		} else {
			$this->paginate = array(
				'order' => 'ProductCategory.name ASC',
				'limit' => 10
			);
		}
		$productCategories = $this->paginate();
		$this->set('productCategories', $productCategories);

      foreach( $productCategories as $sub ) {
         $subCategories = $this->ProductCategory->getSubCategories( $sub['id'] );
         $sub['count_children']=$subCategories->count;
      }
      
		$parentCategories = $this->ProductCategory->ParentCategory->find('list');
		$this->set('parentCategories', $parentCategories);

//		$this->parentCategories('set', $parentCategories);
//		$productCategories = $this->ProductCategory->ProductCategory->find('list');
//		$this->set('productCategories', $productCategories);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
   	$this->ProductCategory->recursive = 2;

		$this->ProductCategory->id = $id;
		if (!$this->ProductCategory->exists()) {
			throw new NotFoundException(__('Invalid product category'));
		}
		
		$productCategories = $this->ProductCategory->find('all');
		$this->set('productCategories', $productCategories);
      
		$parentCategories = $this->ProductCategory->ParentCategory->find('list');
		$this->set('parentCategories', $parentCategories);

		$subCategories = $this->ProductCategory->getSubCategories($id);
		$this->set('subCategories', $subCategories );
		
//		$this->request->data = $this->ProductCategory->read(null, $id);
//		$this->set('ProductCategory', $this->ProductCategory->read(null, $id));

//		$this->paginate = array(
//			'conditions' => array('ProductCategory.parent_id' => $id),
//		   'order' => array('ProductCategory.name' => 'ASC'),
// 		'limit' => 10
//   	);
//   	$this->request->data['SubCategory']['parent_id'] = $id;
//		$subCategories = $this->paginate();
//		$this->set('subCategories', $subCategories);
//	   $this->subCategories('set', $subCategories);
		
//   	$this->request->data['SubCategory']['parent_id'] = $id;
//		$subCategories = $this->ProductCategory->SubCategory->find('list', array(
//			'conditions' => array('SubCategory.parent_id' => $id)));
//		$this->set('subCategories', $subCategories);

//		$subCategories = $this->ProductCategory->SubCategory->find('list', array('order' => 'SubCategory.name ASC'));
//	   $this->set('subCategories', $subCategories);

//    $parentCategories = $this->ProductCategory->ParentCategory->find('list', array(
//			'fields' => array('ParentCategory.id', 'ParentCategory.name', 'CONCAT(ParentCategory.name, " (", ParentCategory.product_count, ") ") as combine'),
//			'order' => 'ParentCategory.name ASC'
//		));
//		$this->set('parentCategories', $parentCategories);
		
		//$parentCategories = $this->ProductCategory->ParentCategory->find('list', array('order' => 'ParentCategory.name ASC'));
		//$this->set('parentCategories', $parentCategories);
		
//		$this->parentCategories('set', $parentCategories);

//		$subCategories = $this->ProductCategory->getSubCategories($id);
	}


/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($parent_id = null) {
	   $this->ProductCategory->recursive = 2;
	   if (empty($parent_id)) {
         $parent_id = 'e0caa174-2dfe-11e5-a7f8-7ce9d36ef50d';
         }
      $this->request->data['ProductCategory']['parent_id'] = $parent_id;
      $this->set('ProductCategory', $this->request->data);
      $this->ProductCategory->parent_id = $parent_id;
      
		$parentCategories = $this->ProductCategory->ParentCategory->find('list');
		$this->set('parentCategories', $parentCategories);
		$this->set('parent_id', $parentCategories );
   
		$productCategories = $this->ProductCategory->find('all');
		$this->set('productCategories', $productCategories);

   	if ($this->request->is('post')) {
			$this->ProductCategory->create();
			
			if ($this->ProductCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'), 'flash_success');
				//$this->redirect(array('action' => 'index'));
				$this->redirect(array('action' => 'view',$this->ProductCategory->id));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'), 'flash_fail');
			}
		}
		
//    parentCategories = $this->ProductCategory->ParentCategory->find('list', array(
//			'fields' => array('ParentCategory.id', 'CONCAT(ParentCategory.name, " (", ParentCategory.product_count, ")") as combine'),
//			'order' => 'ParentCategory.name ASC'
//		));
//		$this->set('parentCategory', $parentCategories);
		
		//$parentCategories = $this->ProductCategory->ParentCategory->find('list', array('order' => 'ParentCategory.name ASC'));
		//$this->set('parentCategories', $parentCategories);

//		$parentCategories = $this->ProductCategory->ParentCategory->find('list');
//		$this->set('parentCategories', $parentCategories);

//		$productCategories = $this->ProductCategory->ProductCategory->find('list');
//		$this->set('productCategories', $producttCategories);
   }

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
   	$this->ProductCategory->recursive = 2;
		$this->ProductCategory->id = $id;
		if (!$this->ProductCategory->exists()) {
			throw new NotFoundException(__('Invalid product category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProductCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'), 'flash_success');
				$this->redirect(array('action' => 'view', $this->ProductCategory->id));
			} else {
				$this->Session->setFlash(__('The product category could not be saved. Please, try again.'), 'flash_fail');
			}
		} else {
		   $this->request->data = $this->ProductCategory->read(null, $id);
		   $this->set('ProductCategory', $this->ProductCategory->read(null, $id));
		}
		
//		$this->paginate = array(
//			'conditions' => array('ProductCategory.parent_id' => $id),
//			'order' => 'ProductCategory.name ASC',
//  	   	'limit' => 10
//   	);
   	//$this->request->data['SubCategory']['parent_id'] = $id;
//		$this->set('subCategories', $this->paginate());

		//$parentCategories = $this->ProductCategory->ParentCategory->find('list', array('order' => 'ParentCategory.name ASC'));
	   //$this->set('parentCategories', $parentCategories);

		$productCategories = $this->ProductCategory->find('all');
		$this->set('productCategories', $productCategories);

		$parentCategories = $this->ProductCategory->ParentCategory->find('list');
		$this->set('parentCategories', $parentCategories);

		$subCategories = $this->ProductCategory->getSubCategories($id);
		$this->set('subCategories', $subCategories );
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
		$this->ProductCategory->id = $id;
		if (!$this->ProductCategory->exists()) {
			throw new NotFoundException(__('Invalid product category'));
		}
		if ($this->ProductCategory->delete()) {
			$this->Session->setFlash(__('Product category deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
