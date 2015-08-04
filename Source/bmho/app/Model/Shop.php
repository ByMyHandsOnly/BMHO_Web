<?php
App::uses('AppModel', 'Model');

/**
 * Shop Model
 *
 * @property Page $Page
 * @property Product $Product
 */
class Shop extends AppModel {

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
				'message' => 'Shop name is required.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
//				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Shop email is required.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
//				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'website' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Website url is required.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
//				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $actsAs = array(
		'Uploader.Attachment' => array(
			'banner' => array(
				'name' => 'formatFileName', // Name of the function to use to format filenames
				'baseDir' => '', // See UploaderComponent::$baseDir
				'uploadDir' => '/files/banner/', // See UploaderComponent::$uploadDir
				'dbColumn' => 'banner', // The database column name to save the path to
				'importFrom' => '', // Path or URL to import file
				'defaultPath' => '', // Default file path if no upload present
				'maxNameLength' => 100, // Max file name length
				'overwrite' => true, // Overwrite file with same name if it exists
				'stopSave' => true, // Stop the model save() if upload fails
				'allowEmpty' => true, // Allow an empty file upload to continue
				'transforms' => array(
//					array('method' => 'resize', 'width' => 370, 'dbColumn' => 'thumbnail'),
				), // What transformations to do on images: scale, resize, etc
				's3' => array(), // Array of Amazon S3 settings
				'metaColumns' => array(// Mapping of meta data to database fields
					'ext' => '',
					'type' => '',
					'size' => '',
					'group' => '',
					'width' => '',
					'height' => '',
					'filesize' => ''
				)
			)
		),
		'Uploader.FileValidation' => array(
			'banner' => array(
//                'maxWidth' => array(
//                    'value' => 100,
//                    'error' => 'Width incorrect'
//                ),
//                'maxHeight' => array(
//                    'value' => 100,
//                    'error' => 'Height incorrect'
//                ),
				'extension' => array(
					'value' => array('gif', 'jpg', 'png', 'jpeg'),
					'error' => 'Incorrect file type.',
				),
				'filesize' => array(
					'value' => 5242880,
					'error' => 'Filesize is to high, please reduce it.'
				),
				'required' => array(
					'value' => true,
					'error' => 'File required.'
				)
			)
		)
	);

	public function alphaNumericDashUnderscore($check) {
		// $data array is passed using the form field name as the key
		// have to extract the value to make the function generic
		$value = array_values($check);
		$value = $value[0];

		return preg_match('|^[0-9a-zA-Z_-]*$|', $value);
	}

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ShopCategory' => array(
			'className' => 'ShopCategory',
			'foreignKey' => 'shop_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'shop_id',
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

	public function beforeSave($options = array()) {

		if (empty($this->id)) {
			//INSERT
			if (!empty($this->data['Shop']['domain'])) {
				$this->data['Shop']['domain'] = $this->data['Shop']['domain'] . '.' . $_SERVER['HTTP_HOST'];
			}
		} else {
			//UPDATE
		}

		return true;
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['Shop']['expiry_date'])) {
				$days_to_expired = $this->calculateDaysToExpired($val['Shop']['expiry_date']);

				if ($days_to_expired > 0) {
					$results[$key]['Shop']['is_expired'] = false;
				} else {
					$results[$key]['Shop']['is_expired'] = true;
				}

				$results[$key]['Shop']['days_to_expired'] = $days_to_expired;
			}
		}
		return $results;
	}

	public function calculateDaysToExpired($expiry_date) {
		$now = time();
		$expiryDate = strtotime($expiry_date);
		$datediff = $expiryDate - $now;
		$days_old = floor($datediff / (60 * 60 * 24));
		return $days_old + 1;
	}

	public function getRecentShops($limit = 5) {

		return $this->find('all', array(
					'order' => 'created DESC',
					'limit' => $limit,
		));

//		$this->virtualFields = array(
//			'total_products' => 'COUNT(Product.id)',
//		);
//		$options = array(
//			'fields' => array(
//				'Shop.id',
//				'Shop.name',
//				'Shop.domain',
//				'Shop.created',
//				'Shop.total_products',
//			),
//			'joins' => array(
//				array('table' => 'products',
//					'alias' => 'Product',
//					'type' => 'left',
//					'conditions' => array(
//						'Shop.id = Product.shop_id',
//					)
//				)
//			),
//			'conditions' => array(
//				'Shop.id = Product.shop_id',
//			),
//			'group' => array(
//				'Product.shop_id',
//			),
//			'order' => 'total_products DESC',
////			'limit' => $limit
//		);
//		return $this->find('all', $options);
	}

	public function countAll() {
		return $this->find('count');
	}

}
