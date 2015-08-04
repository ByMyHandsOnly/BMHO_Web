<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Pages';

    /**
     * Default helper
     *
     * @var array
     */
    public $helpers = array('Html', 'Session');

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    public function beforeFilter() {
	//to allow to be visible for non-logged in users, if you are using login system
        $this->Auth->allow('about', 'contact', 'terms', 'home', 'privacy', 'content');
	parent::beforeFilter();
    }

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     */
    public function display() {
        
    }

    /* Public page to login */

    public function home() {
		// get recent products
		$this->loadModel('Product');
		$this->Product->recursive = 1;
		$products = $this->Product->find('all', array(
			'limit' => 16,
			'order' => 'Product.created DESC',
		));
		$this->set('products', $products);
		
		
    }

    public function terms($layout = null) {
        $this->set('title_for_layout', 'Terms of Use');    
    }
    public function about($layout = null) {
        $this->set('title_for_layout', 'About');    
    }
    public function contact($layout = null) {
        $this->set('title_for_layout', 'Contact');    
    }
    public function privacy($layout = null) {
        $this->set('title_for_layout', 'Privacy');    
    }

}
