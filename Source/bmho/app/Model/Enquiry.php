<?php
App::uses('AppModel', 'Model');

/**
 * Enquiry Model
 *
 * @property Shop $Shop
 * @property User $User
 */
class Enquiry extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'subject';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'shop_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
			//'message' => 'Your custom message here',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
			//'message' => 'Your custom message here',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'subject' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Subject is required',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'message' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Message is required',
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
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EnquiryReply' => array(
			'className' => 'EnquiryReply',
			'foreignKey' => 'enquiry_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'EnquiryReply.created ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

	public function countByShopId($shop_id) {
		return $this->find('count', array(
					'conditions' => array('Enquiry.shop_id' => $shop_id),
		));
	}

	public function recentEnquiryByShopId($shop_id, $limit) {
		return $this->find('all', array(
					'conditions' => array('Enquiry.shop_id' => $shop_id),
					'limit' => $limit,
					'order' => 'Enquiry.created DESC',
		));
	}

	public function countAll() {
		return $this->find('count');
	}

}
