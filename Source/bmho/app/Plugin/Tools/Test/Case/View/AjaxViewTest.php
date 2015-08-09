<?php
/**
 * PHP 5
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @author        Mark Scherer
 * @license http://opensource.org/licenses/mit-license.php MIT
 */

App::uses('Controller', 'Controller');
App::uses('CakeRequest', 'Network');
App::uses('CakeResponse', 'Network');
App::uses('AjaxView', 'Tools.View');

/**
 * AjaxViewTest
 *
 */
class AjaxViewTest extends CakeTestCase {

	public $Ajax;

	/**
	 * AjaxViewTest::setUp()
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		$this->Ajax = new AjaxView();

		App::build([
			'View' => [CakePlugin::path('Tools') . 'Test' . DS . 'test_app' . DS . 'View' . DS]
		], App::RESET);
	}

	/**
	 * AjaxViewTest::testSerialize()
	 *
	 * @return void
	 */
	public function testSerialize() {
		$Request = new CakeRequest();
		$Response = new CakeResponse();
		$Controller = new Controller($Request, $Response);
		$items = [
			['title' => 'Title One', 'link' => 'http://example.org/one', 'author' => 'one@example.org', 'description' => 'Content one'],
			['title' => 'Title Two', 'link' => 'http://example.org/two', 'author' => 'two@example.org', 'description' => 'Content two'],
		];
		$Controller->set(['items' => $items, '_serialize' => ['items']]);
		$View = new AjaxView($Controller);
		$result = $View->render(false);

		$this->assertSame('application/json', $Response->type());
		$expected = ['error' => null, 'content' => null, 'items' => $items];
		$expected = json_encode($expected);
		$this->assertTextEquals($expected, $result);
	}

	/**
	 * AjaxViewTest::testSerialize()
	 *
	 * @return void
	 */
	public function testRenderWithSerialize() {
		$Request = new CakeRequest();
		$Response = new CakeResponse();
		$Controller = new Controller($Request, $Response);
		$items = [
			['title' => 'Title One', 'link' => 'http://example.org/one', 'author' => 'one@example.org', 'description' => 'Content one'],
			['title' => 'Title Two', 'link' => 'http://example.org/two', 'author' => 'two@example.org', 'description' => 'Content two'],
		];
		$Controller->set(['items' => $items, '_serialize' => 'items']);
		$View = new AjaxView($Controller);
		$View->viewPath = 'Items';
		$result = $View->render('index');

		$this->assertSame('application/json', $Response->type());
		$expected = ['error' => null, 'content' => 'My Index Test ctp', 'items' => $items];
		$expected = json_encode($expected);
		$this->assertTextEquals($expected, $result);
	}

	/**
	 * AjaxViewTest::testError()
	 *
	 * @return void
	 */
	public function testError() {
		$Request = new CakeRequest();
		$Response = new CakeResponse();
		$Controller = new Controller($Request, $Response);
		$items = [
			['title' => 'Title One', 'link' => 'http://example.org/one', 'author' => 'one@example.org', 'description' => 'Content one'],
			['title' => 'Title Two', 'link' => 'http://example.org/two', 'author' => 'two@example.org', 'description' => 'Content two'],
		];
		$Controller->set(['error' => 'Some message', 'items' => $items, '_serialize' => ['error', 'items']]);
		$View = new AjaxView($Controller);
		$View->viewPath = 'Items';
		$result = $View->render('index');

		$this->assertSame('application/json', $Response->type());
		$expected = ['error' => 'Some message', 'content' => null, 'items' => $items];
		$expected = json_encode($expected);
		$this->assertTextEquals($expected, $result);
	}

	/**
	 * AjaxViewTest::testWithoutSubdir()
	 *
	 * @return void
	 */
	public function testWithoutSubdir() {
		$Request = new CakeRequest();
		$Response = new CakeResponse();
		$Controller = new Controller($Request, $Response);
		$View = new AjaxView($Controller);
		$View->viewPath = 'Items';
		$View->subDir = false;
		$result = $View->render('index');

		$this->assertSame('application/json', $Response->type());
		$expected = ['error' => null, 'content' => 'My Index Test ctp'];
		$expected = json_encode($expected);
		$this->assertTextEquals($expected, $result);
	}

}
