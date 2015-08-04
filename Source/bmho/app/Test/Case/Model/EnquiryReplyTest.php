<?php
App::uses('EnquiryReply', 'Model');

/**
 * EnquiryReply Test Case
 *
 */
class EnquiryReplyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.enquiry_reply',
		'app.enquiry',
		'app.shop',
		'app.user',
		'app.shop_category',
		'app.product',
		'app.product_category',
		'app.product_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EnquiryReply = ClassRegistry::init('EnquiryReply');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EnquiryReply);

		parent::tearDown();
	}

}
