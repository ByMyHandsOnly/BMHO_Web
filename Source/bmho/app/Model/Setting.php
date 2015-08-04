<?php
App::uses('AppModel', 'Model');

class Setting extends AppModel {

	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Name is required'
			)
		)
	);

	public function load() {
		$settings = $this->find('all');

		if (!empty($settings)) {
			foreach ($settings as $variable) {
				Configure::write(
						'MyApp.' . $variable['Setting']['name'], $variable['Setting']['value']
				);
			}
		}
	}

}
