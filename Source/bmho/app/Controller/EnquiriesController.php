<?php
App::uses('AppController', 'Controller');

/**
 * Enquiries Controller
 *
 * @property Enquiry $Enquiry
 */
class EnquiriesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
//		$this->Auth->allow('add');
	}

	public function add($shop_id, $product_id = null) {
		$this->layout = 'ajax_bootstrap';

		if ($this->request->is('post')) {
			$this->Enquiry->create();

			// set default data
			$this->request->data['Enquiry']['user_id'] = $this->Auth->user('id');

			if ($this->Enquiry->save($this->request->data)) {

				// get enquiry details
				$enquiry = $this->Enquiry->read(null, $this->Enquiry->id);

				// notify shop's owner
				$this->notifyShopOwner($enquiry);

				$this->Session->setFlash(__('Your enquiry has been sent to the seller.'), 'flash_success');
				$this->redirect(array('action' => 'thankyou'));
			} else {
				$this->Session->setFlash(__('Your enquiry could not be sent. Please, try again.'), 'flash_fail');
			}
		}

		if (!empty($product_id)) {
			// get product details
			$this->loadModel('Product');
			$product = $this->Product->read(null, $product_id);
			$this->set('product', $product);

			$this->request->data['Enquiry']['subject'] = 'Enquiry for Product: ' . $product['Product']['name'];
			$this->request->data['Enquiry']['shop_id'] = $product['Shop']['id'];
			
			$this->set('product_id', $product_id);
		}
		
		$this->set('shop_id', $shop_id);
	}

	public function thankyou() {
		$this->layout = 'ajax_bootstrap';
	}

	public function index() {
		$this->Enquiry->recursive = 0;

		$this->paginate = array(
			'conditions' => array('Enquiry.user_id' => $this->Auth->user('id')),
			'order' => 'Enquiry.created DESC',
			'limit' => 10
		);

		$this->set('enquiries', $this->paginate());
	}

	public function view($id = null) {
		$this->Enquiry->id = $id;
		if (!$this->Enquiry->exists()) {
			throw new NotFoundException(__('Invalid enquiry'));
		}

		if ($this->request->is('post')) {

			$this->loadModel('EnquiryReply');
			$this->EnquiryReply->create();

			$this->request->data['EnquiryReply']['enquiry_id'] = $id;
			$this->request->data['EnquiryReply']['user_id'] = $this->Auth->user('id');

			if ($this->EnquiryReply->save($this->request->data)) {

				$this->loadModel('EnquiryReply');
				$enquiryReply = $this->EnquiryReply->read(null, $this->EnquiryReply->id);

				$this->notifyShopOwnerOnEnquiryRepy($enquiryReply);

				$this->Session->setFlash(__('Your message had been saved and the seller has been notifed.'), 'flash_success');
			} else {
				$this->Session->setFlash(__('Your message could not be saved. Please, try again.'), 'flash_fail');
			}
		}

		$this->Enquiry->recursive = 0;
		$this->set('enquiry', $this->Enquiry->read(null, $id));

		// get enquiry_replies
		$this->loadModel('EnquiryReply');
		$enquiry_replies = $this->EnquiryReply->find('all', array(
			'conditions' => array(
				'EnquiryReply.enquiry_id' => $id,
			),
			'order' => 'EnquiryReply.created ASC',
		));
		$this->set('enquiry_replies', $enquiry_replies);
	}

	public function notifyUserOnEnquiryReply($enquiryReply) {
		/**
		 *  notify user
		 */
		$email = new CakeEmail();

		// load config
		$email->config('default');

		// get enquiry details
		$this->loadModel('Enquiry');
		$enquiry = $this->Enquiry->read(null, $enquiryReply['Enquiry']['id']);

		$vars = array(
			'name' => $enquiry['User']['name'],
			'enquiry_id' => $enquiryReply['Enquiry']['id'],
		);

		$email->viewVars($vars);

		$emailFrom = Configure::read('MyApp.email');
		$emailTo = $enquiryReply['User']['email'];

		$email->from($emailFrom);

		$website_title = Configure::read('MyApp.website_title');

		$email->template('new_replies', 'default')
				->subject($website_title . ' - ' . __('New reply on your enquiry'))
				->emailFormat('html')
				->to($emailTo)
				->send();
	}

	public function notifyShopOwnerOnEnquiryRepy($enquiryReply) {
		/**
		 * notify shop's owner
		 */
		$email = new CakeEmail();
		// load config
		$email->config('default');

		// get enquiry details
		$this->loadModel('Enquiry');
		$enquiry = $this->Enquiry->read(null, $enquiryReply['Enquiry']['id']);

		$this->loadModel('User');
		$user = $this->User->find('first', array(
			'conditions' => array(
				'Shop.id' => $enquiry['Shop']['id'],
			),
		));

		$vars = array(
			'name' => $user['User']['name'],
			'enquiry_id' => $enquiryReply['Enquiry']['id'],
		);

		$email->viewVars($vars);

		$emailTo = $enquiry['Shop']['email'];
		$emailFrom = $enquiryReply['User']['email'];

		$email->from($emailFrom);

		$website_title = Configure::read('MyApp.website_title');

		$email->template('new_replies_admin', 'default')
				->subject($website_title . ' - ' . __('New reply on the submitted enquiry'))
				->emailFormat('html')
				->to($emailTo)
				->send();
	}

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->Enquiry->recursive = 0;

		$this->paginate = array(
			'conditions' => array('Enquiry.shop_id' => $this->user['Shop']['id']),
			'order' => 'Enquiry.created DESC',
			'limit' => 10
		);

		$this->set('enquiries', $this->paginate());
	}

/**
 * manager_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_view($id = null) {
		$this->Enquiry->id = $id;
		if (!$this->Enquiry->exists()) {
			throw new NotFoundException(__('Invalid enquiry'));
		}

		if ($this->request->is('post')) {

			$this->loadModel('EnquiryReply');
			$this->EnquiryReply->create();

			$this->request->data['EnquiryReply']['enquiry_id'] = $id;
			$this->request->data['EnquiryReply']['user_id'] = $this->Auth->user('id');

			if ($this->EnquiryReply->save($this->request->data)) {

				// notify to user
				$this->loadModel('EnquiryReply');
				$enquiryReply = $this->EnquiryReply->read(null, $this->EnquiryReply->id);

				$this->notifyUserOnEnquiryReply($enquiryReply);

				$this->Session->setFlash(__('Your message had been saved and the user has been notified.'), 'flash_success');
			} else {
				$this->Session->setFlash(__('Your message could not be saved. Please, try again.'), 'flash_fail');
			}
		}

		$this->Enquiry->recursive = 0;
		$this->set('enquiry', $this->Enquiry->read(null, $id));

		// get enquiry_replies
		$this->loadModel('EnquiryReply');
		$enquiry_replies = $this->EnquiryReply->find('all', array(
			'conditions' => array(
				'EnquiryReply.enquiry_id' => $id,
			),
			'order' => 'EnquiryReply.created ASC',
		));
		$this->set('enquiry_replies', $enquiry_replies);
	}

/**
 * manager_add method
 *
 * @return void
 */
	public function manager_add() {
		if ($this->request->is('post')) {
			$this->Enquiry->create();
			if ($this->Enquiry->save($this->request->data)) {
				$this->Session->setFlash(__('The enquiry has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enquiry could not be saved. Please, try again.'), 'flash_fail');
			}
		}
		$shops = $this->Enquiry->Shop->find('list');
		$users = $this->Enquiry->User->find('list');
		$this->set(compact('shops', 'users'));
	}

/**
 * manager_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_edit($id = null) {
		$this->Enquiry->id = $id;
		if (!$this->Enquiry->exists()) {
			throw new NotFoundException(__('Invalid enquiry'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Enquiry->save($this->request->data)) {
				$this->Session->setFlash(__('The enquiry has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enquiry could not be saved. Please, try again.'), 'flash_fail');
			}
		} else {
			$this->request->data = $this->Enquiry->read(null, $id);
		}
		$shops = $this->Enquiry->Shop->find('list');
		$users = $this->Enquiry->User->find('list');
		$this->set(compact('shops', 'users'));
	}

/**
 * manager_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Enquiry->id = $id;
		if (!$this->Enquiry->exists()) {
			throw new NotFoundException(__('Invalid enquiry'));
		}
		if ($this->Enquiry->delete()) {
			$this->Session->setFlash(__('Enquiry deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Enquiry was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function notifyShopOwner($enquiry) {
		// email 
		$email = new CakeEmail();

		// load config
		$email->config('default');

		$this->loadModel('User');
		$user = $this->User->find('first', array(
			'conditions' => array(
				'Shop.id' => $enquiry['Shop']['id'],
			),
		));

		// setup email vars
		$vars = array(
			'name' => $user['User']['name'],
			'enquiry_id' => $enquiry['Enquiry']['id'],
		);

		$email->viewVars($vars);

		$emailTo = $enquiry['Shop']['email'];
		$emailFrom = $enquiry['User']['email'];

		$email->from($emailFrom);

		$website_title = Configure::read('MyApp.website_title');

		$email->template('new_enquiry', 'default')
				->subject($website_title . ' - ' . __('New enquiry'))
				->emailFormat('html')
				->to($emailTo)
				->send();

		return true;
	}

}
