<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {

 var $name = 'Categories';
 var $helpers = array('Html', 'Form', 'Js');

 function admin_index() {
  // if it's ajax, set ajax layout
  if (!empty($this->params['named']['isAjax']))
   $this->layout = 'ajax';
  
  $categories = $this->Category->find('threaded');
  $this->set(compact('categories'));
 }

 function admin_add() {
  if (!empty($this->data)) {
   $this->Category->create();
   if ($this->Category->save($this->data)) {
    $this->Session->setFlash(__('The Category has been saved', true));
    //$this->redirect(array('action'=>'index'));
   } else {
    $this->Session->setFlash(__('The Category could not be saved. Please, try again.', true));
   }
  }
  $this->render(false);
 }

 function admin_edit($id = null) {
  if (!$id && empty($this->data)) {
   $this->Session->setFlash(__('Invalid Category', true));
   $this->redirect(array('action'=>'index'));
  }
  if (!empty($this->data)) {
   if ($this->Category->save($this->data)) {
    $this->Session->setFlash(__('The Category has been saved', true));
    //$this->redirect(array('action'=>'index'));
   } else {
    $this->Session->setFlash(__('The Category could not be saved. Please, try again.', true));
   }
  }
  if (empty($this->data)) {
   $this->data = $this->Category->read(null, $id);
  }
  $this->render(false);
 }

 function admin_delete($id = null) {
  if (!$id) {
   $this->Session->setFlash(__('Invalid id for Category', true));
   $this->redirect(array('action'=>'index'));
  }
  if ($this->Category->del($id)) {
   $this->Session->setFlash(__('Category deleted', true));
   $this->redirect(array('action'=>'index'));
  }
 }
}
?>
