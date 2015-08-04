<?php
App::uses('AppController', 'Controller');

class SettingsController extends AppController {

//    public $components = array('Security');

	public $path_upload = 'files/';

	function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow('change_language');
	}

	public function admin_edit() {
		if ($this->request->is('post')) {

//			debug($this->data['Setting']); die();

			if (!empty($this->data['Setting'])) {
				foreach ($this->data['Setting'] as $field => $value) {
					$cur_setting = $this->Setting->findByName($field);

					if (!empty($cur_setting)) {
						$this->Setting->read(null, $cur_setting['Setting']['id']);
					} else {
						$this->Setting->create();
					}

					// for banner
					if (($field == 'banner') && !empty($this->data['Setting']['banner']['name'])) {
						/*
						 * Upload file
						 */
						$this->Uploader = new Uploader(array('tempDir' => TMP, 'uploadDir' => $this->path_upload));
						$data = $this->Uploader->upload('banner', array('overwrite' => true, 'name' => 'banner'));

						$value = 'files/banner.' . $data['ext'];

						$this->Setting->set('name', $field);
						$this->Setting->set('value', $value);
						$this->Setting->save();
					}

					// other than banner
					if ($field != 'banner') {
						$this->Setting->set('name', $field);
						$this->Setting->set('value', $value);
						$this->Setting->save();
					}
				}
			}

			$this->Session->setFlash('System settings successfully saved.', 'flash_success');
		}
	}

	public function admin_clearAllData() {
		// clear all samples data
		$this->Setting->query('TRUNCATE TABLE enquiries;');
		$this->Setting->query('TRUNCATE TABLE enquiry_replies;');
		$this->Setting->query('TRUNCATE TABLE products;');
		$this->Setting->query('TRUNCATE TABLE product_categories;');
		$this->Setting->query('TRUNCATE TABLE product_images;');
		$this->Setting->query('TRUNCATE TABLE shops');

		// clear users with role = user
		$this->loadModel('User');
		$this->User->deleteAll(array('User.role' => 'user'));

		$this->Session->setFlash(__('All samples data successfully deleted.'), 'flash_success');

		$this->redirect(array('controller' => 'settings', 'action' => 'edit', 'admin' => true));
	}
}
