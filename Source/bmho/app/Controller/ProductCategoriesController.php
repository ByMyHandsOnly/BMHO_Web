<?php
App::uses('AppController', 'Controller');
/**
 * ProductCategories Controller
 *
 * @property ProductCategory $ProductCategory
 */
class ProductCategoriesController extends AppController {
	
    var $helpers = array('Tools.Tree');

	 public $paginate = array(
        'limit' => 10,
        'order' => array(
            'ProductCategory.lft' => 'asc'
        )
    );

public function index($id=null) {
		$this->ProductCategory->recursive = 2;

  // if it's ajax, set ajax layout
  if (!empty($this->params['named']['isAjax']))
   $this->layout = 'ajax';
   
   if ($id==null) {
      $productCategories = $this->ProductCategory->find('threaded');
      }
   else {
      $productCategory = $this->ProductCategory->read(null, $id);
      $parentCategory = $this->ProductCategory->ParentCategory->read(null, $parent_id);
      $productCategories = $this->ProductCategory->children($id);
      }
   
//   $categories = $this->Category->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;');
//   $currentCategory = $categories;
   $this->set(compact('productCategories'));    
   }

	
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($product_category_id=null) {
		$this->ProductCategory->recursive = 2;
		// special handling for ALL items, TOP items, Parent items:
		// if null comes in, change to empty '' and show ALL
		if ($product_category_id!=null)) {
		   // if empty comes in, change to null, and show TOP
		   if ($product_category_id=='') {
		         $product_category_id=null;
		      }
		   else {
		      }
		      
         $this->ProductCategory->id = $product_category_id;
         if  ($this->ProductCategory->exists()) {
         
		      $this->paginate = array(
			      'conditions' => array('ProductCategory.parent_id' => $product_category_id),
			      'order' => array('ProductCategory.lft' => 'ASC'),
			      'limit' => 10
		      );

      //		   $subCategories = $this->ProductCategory->children($product_category_id);
      //		   $this->set('subCategories', $subCategories );

	         $productCategory = $this->ProductCategory->read(null, $product_category_id);
	         $parentCategory = $this->ProductCategory->read(null, $productCategory['ProductCategory']['parent_id']);
	   //      $this->request->data = $curCategory;
		      $this->set('ProductCategory', $productCategory);
		      $this->set('ParentCategory', $parentCategory);
        	   $this->request->data['ProductCategory']['parent_id'] = $product_category_id;
		      }
		   else {
				$this->Session->setFlash(__('The category was not found'), 'flash_error');
   		   $this->redirect(array('action' => 'index', '' ));
		      }
		   }
		else {
			$this->paginate = array(
				'order' => 'ProductCategory.lft ASC',
				'limit' => 10
			);
		}

		$parentCategories = $this->ProductCategory->ParentCategory->find('list');
		$this->set('parentCategories', $parentCategories);

		$parents = $this->ProductCategory->ParentCategory->generateTreeList(null,null,null,"--- ");
		$this->set('parents', $parents);

		$productCategories = $this->paginate();
		$this->set('productCategories', $productCategories);

//      foreach( $parentCategories as $sub ) {
//         $subCategories = $this->ProductCategory->children( $sub['ProductCategory']['id'] );
//         $sub['ProductCategory']['count_children']=$subCategories->count;
//      }
      
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
		
		$parentCategories = $this->ProductCategory->ParentCategory->generateTreeList(null,null,null,"--- ");
		$this->set('parentCategories', $parentCategories);

		$subCategories = $this->ProductCategory->children($id);
		$this->set('subCategories', $subCategories );

		$productCategories = $this->ProductCategory->find('threaded');
		$this->set('productCategories', $productCategories);
      
		
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
	   $this->request->data['ProductCategory']['parent_id'] = $parent_id;
      $this->set('ProductCategory', $this->request->data);
      $this->ProductCategory->parent_id = $parent_id;
      
		$parentCategories = $this->ProductCategory->ParentCategory->generateTreeList(null,null,null,"--- ");
		$this->set('parentCategories', $parentCategories);
   
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

		$productCategories = $this->ProductCategory->find('threaded');
		$this->set('productCategories', $productCategories);

		$parentCategories = $this->ProductCategory->ParentCategory->find('list');
		$this->set('parentCategories', $parentCategories);

		$subCategories = $this->ProductCategory->children($id);
		$this->set('subCategories', $subCategories );
   }

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @param boolean $prune : true to delete children, false to promote children up
 * @return void
 */
	public function admin_delete($id = null, $prune=false) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ProductCategory->id = $id;
		if (!$this->ProductCategory->exists()) {
			throw new NotFoundException(__('Invalid product category'));
		}
		
		if ($this->ProductCategory->removeFromTree($prune)) {
		   if ( $prune )
			   $this->Session->setFlash(__('Product category and sub-categories deleted'), 'flash_success');
			else
			   $this->Session->setFlash(__('Product category deleted, sub-categories promoted to parent'), 'flash_success');
			      
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_moveup method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_moveup($product_category_id=null) {
		$this->ProductCategory->id = $product_category_id;
		if (!$this->ProductCategory->exists()) {
			throw new NotFoundException(__('Invalid product category'));
		}
		
      if ( $this->ProductCategory->moveUp($product_category_id) )
		   $this->Session->setFlash(__('Product category moved up'), 'flash_success');
		else
			$this->Session->setFlash(__('Product category was not moved'), 'flash_error');

		$this->redirect(array('action' => 'index'));
   }

/**
 * admin_movedown method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_movedown($product_category_id=null) {
		$this->ProductCategory->id = $product_category_id;
		if (!$this->ProductCategory->exists()) {
			throw new NotFoundException(__('Invalid product category'));
		}
		
      if ( $this->ProductCategory->moveDown($product_category_id) )
		   $this->Session->setFlash(__('Product category moved down'), 'flash_success');
		else
			$this->Session->setFlash(__('Product category was not moved'), 'flash_error');

		$this->redirect(array('action' => 'index'));
   }
   
}

