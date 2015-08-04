<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	public function weekRange($date) {
		$ts = strtotime($date);
		$start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
		return array(date('Y-m-d', $start),
			date('Y-m-d', strtotime('next sunday', $start)));
	}

	public function monthRange() {
		return array(
			date('Y-m-d', strtotime('first day of this month', time())),
			date('Y-m-d', strtotime('first day of next month', time()))
		);
	}

	public function calculateDaysFromToday($timestamp) {
		$now = time(); // or your date as well
		$your_date = strtotime($timestamp);
		$datediff = $now - $your_date;
		return floor($datediff / (60 * 60 * 24));
	}

}
