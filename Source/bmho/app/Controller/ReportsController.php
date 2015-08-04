<?php

App::uses('AppController', 'Controller');

/**
 * Reports Controller
 *
 * @property Inventory $Inventory
 */
class ReportsController extends AppController {

    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Item.name' => 'asc'
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function admin_stock_balance() {

        $this->loadModel('Item');
        $this->Item->recursive = 0;
        $this->set('items', $this->paginate('Item'));
    }

    public function admin_stock_alert() {
        $this->loadModel('Inventory');
        $invs = $this->Inventory->stock_exceed_min();

        $this->set('invs', $invs);
    }

}
