<?php
App::uses('AppModel', 'Model');

/**
 * Product Model
 *
 * @property Shop $Shop
 * @property Image $Image
 * @property Item $Item
 */
class Product extends AppModel {

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
				'message' => 'Item name is required.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Item price is required.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
//		'qty' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
//				'message' => 'Quantity must be in numbers.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
		'status' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Item status is required',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Shop' => array(
			'className' => 'Shop',
			'foreignKey' => 'shop_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		),
		'ProductCategory' => array(
			'className' => 'ProductCategory',
			'foreignKey' => 'product_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		),
	);

   public $hasManyAndBelongsTo= array(
	);
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ProductImage' => array(
			'className' => 'ProductImage',
			'foreignKey' => 'product_id',
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
	);

	function beforeSave($options = Array()) {
		if (empty($this->id)) {
			// On created
			if (!empty($this->data['Product']['name'])) {
				$this->data['Product']['slug'] = $this->generateSlug($this->data['Product']['name']);
			}
		} else {
			// On updated
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

	public function afterFind($results, $primary = false) {

		if ($this->recursive != 2) {
			foreach ($results as $key => $val) {
				if (isset($results[$key]['ProductImage'][0]['id'])) {
					if (isset($results[$key]['ProductImage'][0]['image'])) {
						$results[$key]['Product']['image'] = $results[$key]['ProductImage'][0]['thumbnail'];
					} else {
						$results[$key]['Product']['image'] = 'http://placehold.it/225x225&text=No photo';
					}
				}

				if (isset($results[$key]['Product']['created'])) {
					$results[$key]['Product']['created_in_days'] = $this->calculateDaysFromToday($results[$key]['Product']['created']);
				}
			}
		}

		return $results;
	}

	public function getAllProductsByShopId($shop_id) {
		$products = $this->find('all', array(
			'conditions' => array('Product.shop_id' => $shop_id),
			'order' => array('Product.created DESC'),
		));

		return $products;
	}

	public function countByShopId($shop_id) {
		return $this->find('count', array(
					'conditions' => array('Product.shop_id' => $shop_id),
		));
	}

	public function countAll() {
		return $this->find('count');
	}

	public function getRecentProductsByShopId($shop_id) {
		$limit = 12;

		$products = $this->find('all', array(
			'conditions' => array('Product.shop_id' => $shop_id),
			'order' => array('Product.created DESC'),
			'limit' => $limit,
		));

		return $products;
	}

}
