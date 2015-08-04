<?php
App::uses('AppController', 'Controller');

class SystemController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('ajax_loader');
	}

	public function ajax_loader() {
		$this->layout = 'ajax';
	}

	public function manager_dashboard() {
		// count products
		$this->loadModel('Product');
		$this->set('count_products', $this->Product->countByShopId($this->user['Shop']['id']));

		// count enquiries
		$this->loadModel('Enquiry');
		$this->set('count_enquiries', $this->Enquiry->countByShopId($this->user['Shop']['id']));

		// recent enquiries
		$this->set('recent_enquiries', $this->Enquiry->recentEnquiryByShopId($this->user['Shop']['id'], 5));
	}

	public function admin_dashboard() {
		// count users
		$this->loadModel('User');
		$this->set('count_users', $this->User->countAll());

		// count shops
		$this->loadModel('Shop');
		$this->set('count_shops', $this->Shop->countAll());

		// count products
		$this->loadModel('Product');
		$this->set('count_products', $this->Product->countAll());

		// count enquiries
		$this->loadModel('Enquiry');
		$this->set('count_enquiries', $this->Enquiry->countAll());
	}
}
