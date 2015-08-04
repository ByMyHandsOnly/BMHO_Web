<?php

class UsersController extends AppController {

	public $helpers = array('Gravatar');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'status', 'register', 'logout', 'change_password', 'remember_password', 'remember_password_step_2');
	}

	public function home() {
		
	}

	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function login($type = null) {
		$redirect = $this->Session->read('Auth.redirect');

		if (strpos($redirect, 'enquiries/add') !== false) {
			$this->layout = 'ajax_bootstrap';
			$this->set('type', 'ajax');
		} else {
			$this->set('type', 'default');
		}

		if ($type == 'ajax') {
			$this->layout = 'ajax_bootstrap';
		}

		if ($type == 'default') {
			$this->layout = 'default';
			$this->Session->delete('Auth.redirect');
		}

		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'), 'flash_fail');
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function status() {
		$this->layout = 'ajax';
	}

	public function manager_view($id = null) {
		$this->User->id = $id;

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		$this->set('user', $this->User->read(null, $id));
	}

	public function admin_view($id = null) {
		$this->User->id = $id;

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		$this->set('user', $this->User->read(null, $id));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				# Create a loop with validation errors
//                $this->Error->set($this->User->invalidFields());
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_fail');
			}
		}
	}

	public function admin_edit($id = null) {
		$this->User->id = $id;

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		$user = $this->User->findById($id);
		$this->set('user', $user);

		if ($this->request->is('post') || $this->request->is('put')) {
			if (empty($this->request->data['User']['password'])) {
				unset($this->request->data['User']['password']);
			}

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_fail');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
		}
	}

	public function admin_delete($id = null) {
		$this->User->id = $id;

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}

		$this->Session->setFlash(__('User was not deleted'), 'flash_fail');

		$this->redirect(array('action' => 'index'));
	}

	public function register($type = null) {

		if ($type == 'ajax') {
			$this->layout = 'ajax_bootstrap';
		} else {
			$this->layout = 'default';
			$this->Session->delete('Auth.redirect');
		}

		if ($this->request->is('post')) {
			$this->User->create();

			// set default role
			$this->request->data['User']['role'] = 'user';

			if ($this->User->save($this->request->data)) {

				$id = $this->User->id;

				// notify user
				$this->notifyUser($this->request->data);

				$this->request->data['User'] = array_merge(
						$this->request->data['User'], array('id' => $id)
				);

				$this->Auth->login($this->request->data['User']);

				$this->Session->setFlash(__('Your user account has been created'), 'flash_success');

				$this->redirect($this->Auth->redirect());
			} else {
				# Create a loop with validation errors
				$this->Error->set($this->User->validationErrors);
			}
		}
	}

	public function notifyUser($user) {
		$email = new CakeEmail();

		// setup email vars
		$vars = array(
			'name' => $user['User']['name'],
			'username' => $user['User']['username'],
			'password' => $user['User']['password'],
		);

		$email->viewVars($vars);

		$email->template('new_registration', 'default')
				->config('default')
				->emailFormat('html')
				->subject(__('Your user account') . ' - ' . Configure::read('MyApp.website_title'))
				->to($user['User']['email'])
				->from(Configure::read('MyApp.email'))
				->send();
	}

	public function change_password() {
		$user = $this->User->read(null, AuthComponent::user('id'));
		$this->set('user', $user);

		if ($this->request->is('post')) {
			# Verify if password matches
			if ($this->request->data['User']['password'] === $this->request->data['User']['re_password']) {
				# Verify if user is logged in
				if (AuthComponent::user('id')) {
					$this->request->data['User']['id'] = AuthComponent::user('id');
				} else { # Maybe hes comming from change password form
					# Check the hash in database
					$user = $this->User->findByHashChangePassword($this->request->data['User']['hash']);

					if (!empty($user)) {
						$this->request->data['User']['id'] = $user['User']['id'];

						# Clean users hash in database
						$this->request->data['User']['hash_change_password'] = '';
					} else {
						throw new MethodNotAllowedException(__('Invalid action'));
					}
				}

				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('Password updated successfully!'), 'flash_success');
					$this->redirect(array('controller' => 'system', 'action' => 'dashboard', 'admin' => true));
				}
			} else {
				$this->Session->setFlash(__('Passwords do not match.'), 'flash_fail');
			}
		}
	}

/**
 * Email form to inform the process of remembering the password.
 * After entering the email is checked if this email is valid and if so, a message is sent containing a link to change your password
 */
	public function remember_password($type = null) {
		if ($type == 'ajax') {
			$this->layout = 'ajax_bootstrap';
		}

		if ($this->request->is('post')) {
			$user = $this->User->findByUsername($this->request->data['User']['username']);

			if (empty($user)) {
				$this->Session->setFlash(__('This username does not exist in our database.'), 'flash_fail');
			} else {

				$hash = $this->User->generateHashChangePassword();

				$data = array(
					'User' => array(
						'id' => $user['User']['id'],
						'hash_change_password' => $hash
					)
				);

				$this->User->save($data);

				$email = new CakeEmail();
				$email->template('remember_password', 'default')
						->config('default')
						->emailFormat('html')
						->subject(__('Remember password') . ' - ' . Configure::read('MyApp.website_title'))
						->to($user['User']['email'])
						->from(Configure::read('MyApp.email'))
						->viewVars(array('hash' => $hash))
						->send();

				$this->Session->setFlash(__('Check your email to continue the process of recovering password.'), 'flash_success');
			}
		}
	}

/**
 * Step 2 to change the password.
 * This step verifies that the hash is valid, if it is, show the form to the user to inform your new password
 */
	public function remember_password_step_2($hash = null) {

		$user = $this->User->findByHashChangePassword($hash);

		if ($user['User']['hash_change_password'] != $hash || empty($user)) {
			throw new NotFoundException(__('Link invalid.'));
		}

		# Sends the hash to the form to check before changing the password
		$this->set('hash', $hash);

		$this->render('/Users/change_password');
	}

	public function profile() {
		if ($this->request->is('post') || $this->request->is('put')) {
			if (empty($this->request->data['User']['password'])) {
				unset($this->request->data['User']['password']);
			}

			$this->User->id = $this->Auth->user('id');

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Your account has been saved'), 'flash_success');
			} else {
				$this->Session->setFlash(__('Your account could not be saved. Please, try again.'), 'flash_fail');
			}
		} else {
			$this->request->data = $this->User->read(null, $this->Auth->user('id'));
			unset($this->request->data['User']['password']);
		}

		$this->request->data = $this->User->read(null, $this->Auth->user('id'));
		unset($this->request->data['User']['password']);
	}

}
