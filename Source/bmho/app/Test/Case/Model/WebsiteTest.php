<?php
App::uses('Website', 'Model');

/**
 * Website Test Case
 *
 */
class WebsiteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.website'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Website = ClassRegistry::init('Website');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Website);

		parent::tearDown();
	}

}
