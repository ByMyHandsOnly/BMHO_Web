<?php
App::uses('AppModel', 'Model');

/**
 * ShopCategory Model
 *
 * @property Shop $Shop
 * @property Product $Product
 */
class ShopCategory extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'name';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A category name is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
//				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Shop' => array(
			'className' => 'Shop',
			'foreignKey' => 'shop_category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	function beforeSave($options = Array()) {
		if (!empty($this->data['ShopCategory']['name'])) {
			$this->data['ShopCategory']['slug'] = Inflector::slug(trim($this->data['ShopCategory']['name']));
		}

		return true;
	}

//	public function afterFind($results) {
//
//		foreach ($results as $key => $val) {
//
//			if (isset($val['ShopCategory']['id'])) {
//				$qty_available = $this->Product->find('count', array('conditions' => array(
//						'Product.category_id' => $val['ShopCategory']['id'],
//				)));
//
//				$results[$key]['ShopCategory']['count_products'] = $qty_available;
//			}
//		}
//
//		return $results;
//	}

	public function getAllCategoriesByShopId($shop_id) {
		$this->Product->recursive = 1;
		$this->Product->unBindModel(array('hasMany' => array('ProductImage')));

		$categories = $this->Product->find('all', array(
			'conditions' => array('ShopCategory.shop_id' => $shop_id, 'Product.status' => 'Available'),
			'order' => array('ShopCategory.name ASC'),
			'fields' => array('ShopCategory.name', 'ShopCategory.slug', 'COUNT(Product.id) AS count_products'),
			'group' => 'Product.category_id',
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
			$temp[$category['ShopCategory']['name']. ' ('.$category[0]['count_products'].')'] = $category['ShopCategory']['slug'];
		}

		return $temp;
	}

}

