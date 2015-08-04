<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {

	public $name = 'User';

	public function beforeSave($options = Array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

	public $validate = array(
		'name' => array(
			array(
				'rule' => array('notEmpty'),
				'message' => 'A name is required.',
				'on' => 'create'
			),
		),
		'username' => array(
			array(
				'rule' => array('notEmpty'),
				'message' => 'A username is required.'
			),
			array(
				'rule' => 'isUnique',
				'message' => 'This username already exists.',
				'on' => 'create'
			)
		),
		'email' => array(
			array(
				'rule' => array('notEmpty'),
				'message' => 'An email is required.'
			),
			array(
				'rule' => array('email'),
				'message' => 'Invalid email.',
				'on' => 'create'
			),
		),
		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A password is required',
			)
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Enquiry' => array(
			'className' => 'Enquiry',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'Enquiry.created DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EnquiryReply' => array(
			'className' => 'EnquiryReply',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'EnquiryReply.created DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public $hasOne = 'Shop';

	public function generateHashChangePassword() {
		$salt = Configure::read('Security.salt');
		$salt_v2 = Configure::read('Security.cipherSeed');
		$rand = mt_rand(1, 999999999);
		$rand_v2 = mt_rand(1, 999999999);

		$hash = hash('sha256', $salt . $rand . $salt_v2 . $rand_v2);

		return $hash;
	}

	public function countAll() {
		return $this->find('count');
	}
}