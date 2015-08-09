<?php
App::uses('AppModel', 'Model');

/**
 * ProductCategory Model
 *
 * @property Shop $Shop
 * @property Product $Product
 */
class ProductCategory extends AppModel {
 var $name = 'ProductCategory';
 var $actsAs = array('Tree');

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

//	public $virtualFields = array(
//		'combine' => 'CONCAT(ProductCategory.name, " (", ProductCategory.product_count, ")")'
//	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Category name is required.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
//				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);


/**
 * belongsTo associations
 *
 * @var array
 */
   public $belongsTo = array(
		'ParentCategory' => array(
			'className' => 'ProductCategory',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'order' => 'ProductCategory.lft ASC',
			'counterCache' => true,
	   ),
  );
	
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_category_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
//		'ChildCategory' => array(
//			'className' => 'ProductCategory',
//			'foreignKey' => 'parent_id',
//			'dependent' => true,
//			'conditions' => '',
//			'fields' => array('ChildCategory.id', 'CONCAT(ChildCategory.name, " (", ChildCategory.product_count, ")")', 'ChildCategory.parent_id', 'ChildCategory.name', 'ChildCategory.slug'),
//			'order' => 'ChildCategory.name ASC',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		),
	);

	function beforeSave($options = Array()) {
      $pathCategories = '';
		if (empty($this->id)) {
			// On created
		   if (!empty($this->data['ProductCategory']['name'])) {
		      if (!empty($this->data['ParentCategory']['slug'])) {
   		      $pathCategories = $this->data['ParentCategory']['slug'] . '_';
		      }
	         $pathCategories .= trim($this->data['ProductCategory']['name']);
		      $this->data['ProductCategory']['slug'] = generateSlug(trim($pathCategories));
		   }
		} else {
		//$ TODO: HACKHACK to rebuild proper slugs -- remove this section !!!
			// On updated
		   if (!empty($this->data['ProductCategory']['name'])) {
		      if (!empty($this->data['ParentCategory']['slug'])) {
   		      $pathCategories = $this->data['ParentCategory']['slug'] . '_';
		      }
	         $pathCategories .= trim($this->data['ProductCategory']['name']);
		      $this->data['ProductCategory']['slug'] = Inflector::slug(trim($pathCategories));
		   }
		}

		return true;
	}

	public function generateSlug($name) {
		// check duplicate slug
		$slug = Inflector::slug(trim($name));

		$exits = $this->findBySlug($slug);

		if (empty($exits)) {
			return $slug;
		} else {
			return $slug . '_' . uniqid();
		}
	}


//	public function afterFind($results) {
//
//		foreach ($results as $key => $val) {
//
//			if (isset($val['ProductCategory']['id'])) {
//				$count_subcats = $this->ProductCategory->find('count', array('conditions' => array(
//						'ProductCategory.parent_id' => $val['ProductCategory']['id'],
//				)));
//
//				$results[$key]['ProductCategory']['count_subcats'] = $count_subcat;
//			}
//		}
//
//		return $results;
//	}

	public function getAllCategoriesByShopId($shop_id) {
		$this->Product->recursive = 1;
		$this->Product->unBindModel(array('hasMany' => array('ProductImage')));

		$categories = $this->Product->find('all', array(
			'conditions' => array('Product.shop_id' => $shop_id, 'Product.status' => 'Available'),
			'order' => array('ProductCategory.name ASC'),
			'fields' => array('ProductCategory.id','ProductCategory.parent_id','ProductCategory.name', 'ProductCategory.slug', 'COUNT(Product.id) AS count_products'),
			'group' => 'Product.product_category_id',
		));

//		$categories = $this->Product->query('
//			SELECT Categories.name, Categories.slug, COUNT( Products.id ) AS count_products
//			FROM Categories, Products
//			WHERE Categories.shop_id = \'' . $shop_id . '\'
//			AND Categories.id = Products.category_id
//			GROUP BY Products.category_id			
//			');

		$temp = array();

		foreach ($categories as $category) {
			$temp[$category['ProductCategory']['name'] . ' (' . $category['ProductCategory']['count_products'] . ')'] = $category['ProductCategory']['slug'];
		}

		return $temp;
	}

	public function getSubCategories($id=null) {
		$this->recursive = -1;
		
		$categories = $this->find('all', array(
			'fields' => array('ProductCategory.id', 'ProductCategory.parent_id', 'ProductCategory.name', 'ProductCategory.slug' ),
			'conditions' => array('ProductCategory.parent_id' => $id),
			'order' => array('ProductCategory.name ASC'),
			'limit' => 10
		));

	   return $categories;
   }
   
   public function getCategoryTree($id=null) {
		$this->recursive = -1;
		
		$categories = $this->find('all', array(
			'fields' => array('ProductCategory.id', 'ProductCategory.parent_id', 'ProductCategory.name', 'ProductCategory.slug' ),
			'conditions' => array('ProductCategory.parent_id' => $id),
			'order' => array('ProductCategory.name ASC'),
			'limit' => 10
		));

	   return $categories;
   }

}
