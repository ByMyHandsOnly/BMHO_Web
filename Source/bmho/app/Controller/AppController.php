<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $user = array();

	public $components = array('Auth' => array('authorize' => 'Controller'), 'Session', 'Error', 'DebugKit.Toolbar');

	public $helpers = array(
		'Session',
		'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
		'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
		'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
	);

/** Default pagination settings */
	public $paginate = array(
		'prevPage' => true,
		'nextPage' => true,
		'limit' => 10,
	);

	public function beforeFilter() {

		$this->initAuth();

		$this->initData();

		# To enable portuguese language as main
		#Configure::write('Config.language', 'por');
	}

	public function isAuthorized($user) {
		// Any registered user can access public functions
		if (empty($this->request->params['admin'])) {
			return true;
		}

		// Only admins can access admin functions
		if (isset($this->request->params['admin'])) {
			return (bool) ($user['role'] === 'admin');
		}

		// Default deny
		return false;
	}

	public function initAuth() {
		$this->Auth->authenticate = array('Form');
		$this->Auth->loginAction = array('action' => 'login', 'controller' => 'users', 'admin' => false);
		$this->Auth->loginRedirect = array('action' => 'home', 'controller' => 'pages', 'admin' => false);
		$this->Auth->logoutRedirect = array('action' => 'home', 'controller' => 'pages', 'admin' => false);
		$this->Auth->authError = __('Please login to continue');
		$this->Auth->flash = array('element' => 'auth_error', 'key' => 'auth', 'params' => '');
	}

	public function initData() {

		// load global configuration
		$this->loadModel('Setting');

		if (isset($this->Setting) && !empty($this->Setting->table)) {
			$this->Setting->load();
		}
		
		// current user
		$this->loadModel('User');
		$this->User->recursive = 0;
		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->Auth->user('id'),
			),
		));

		$this->user = $user;
		$this->set('user', $user);

		if (($this->request->prefix != 'manager') && ($this->request->prefix != 'admin')) {

			// get product's categories
			$this->loadModel('ProductCategory');
			$this->ProductCategory->recursive = 0;
			$productCategories = $this->ProductCategory->find('all', array(
				'order' => 'ProductCategory.name ASC',
			));
			$this->set('productCategories', $productCategories);
		}
	}

}
