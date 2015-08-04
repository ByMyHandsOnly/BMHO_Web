<?php
/**
 * InventoryFixture
 *
 */
class InventoryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'datetime' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'numbers_in_out' => array('type' => 'integer', 'null' => true, 'default' => '0'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'datetime' => '2012-10-25 07:33:18',
			'item_id' => 1,
			'numbers_in_out' => 1
		),
	);

}
