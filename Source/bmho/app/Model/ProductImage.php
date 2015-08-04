<?php
App::uses('AppModel', 'Model');

/**
 * ProductImage Model
 *
 * @property Product $Product
 */
class ProductImage extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'image';

	public $actsAs = array(
		'Uploader.Attachment' => array(
			'image' => array(
				'name' => 'formatFileName', // Name of the function to use to format filenames
				'baseDir' => '', // See UploaderComponent::$baseDir
				'uploadDir' => '/files/products/', // See UploaderComponent::$uploadDir
				'dbColumn' => 'image', // The database column name to save the path to
				'importFrom' => '', // Path or URL to import file
				'defaultPath' => '', // Default file path if no upload present
				'maxNameLength' => 100, // Max file name length
				'overwrite' => true, // Overwrite file with same name if it exists
				'stopSave' => true, // Stop the model save() if upload fails
				'allowEmpty' => true, // Allow an empty file upload to continue
				'transforms' => array(
					array('method' => 'resize', 'width' => 370, 'dbColumn' => 'thumbnail'),
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
			'image' => array(
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

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'product_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
			//'message' => 'Your custom message here',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Format the filename a specific way before uploading and attaching.
 * 
 * @access public
 * @param string $name	- The current filename without extension
 * @param string $field	- The form field name
 * @param array $file	- The $_FILES data
 * @return string
 */
	function formatFileName($name, $field, $file) {
		$file = pathinfo($name);
		$name = String::truncate($file['filename'], 20);
		return Inflector::slug($name) . '_' . uniqid();
	}

}
