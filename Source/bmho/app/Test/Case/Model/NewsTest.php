<?php
App::uses('News', 'Model');

/**
 * News Test Case
 *
 */
class NewsTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.news'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->News = ClassRegistry::init('News');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->News);

		parent::tearDown();
	}

}
