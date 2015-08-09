<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {

var $name = 'Categories';  
var $helpers = array('Html', 'Form', 'Js', 'Tools.Tree');
             
function admin_index($id=null) {
  // if it's ajax, set ajax layout
  if (!empty($this->params['named']['isAjax']))
   $this->layout = 'ajax';
   
   if ($id==null) {
//      $currentCategory['id']
//      $currentCategory['name'] = 'Top';
//      $currentCategory['slug'] = 'Top';
//      $currentCategory['parent_id']
//      $currentCategory['lft']
//      $currentCategory['rght']
//      $currentCategory['child_count']
      $categories = $this->Category->find('threaded');
      }
   else {
      $this->data = $this->Category->read(null, $id);
//      $currentCategory = $this->data;
      $categories = $this->Category->children($id);
      }
   
//   $categories = $this->Category->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;');
//   $currentCategory = $categories;
   $this->set(compact('categories'));    
   }

function admin_add($parent_id=null) {
   if (!empty($this -> data) ) {
      $this->Category->save($this -> data);
      $this->Session->setFlash('A new category has been added');
      $this->redirect(array('action' => 'index'));
      }
   else {
      if(!empty($parent_id)) { 
         $this->parent = $this->Category->read(null, $parent_id);
         $this->parent_id = $parent_id;
         $parents = $this->Category->generateTreeList(null,null,null,"   ");
        }
      else {
      $this->parent_id = '';
//      $parents[0] = "[Top]";
      $parents = $this->Category->generateTreeList(null,null,null,"   ");
//   $categories = $this->Category->find('threaded');
//      if($categories) {
//         foreach ($categories as $key=>$value)
//            $parents[$key] = $value;
         }
      $this->set(compact('parents'));
      }
   }

function admin_edit($id=null) {
   if (!empty($this->data)) {
      if($this->Category->save($this->data)==false)
         $this->Session->setFlash('Error saving Node.');
      $this->redirect(array('action'=>'index'));
      } 
   else {
      if($id==null) die("No ID received");
      $this->data = $this->Category->read(null, $id);
//      $parents[0] = "[ Top ]";
      $parents = $this->Category->generateTreeList(null,null,null," - ");
//   $categories = $this->Category->find('threaded');
//      if($categories) 
//         foreach ($categories as $key=>$value)
//            $parents[$key] = $value;
      $this->set(compact('parents'));
      }
   }
   
function admin_delete($id=null) {
  if($id==null)
  die("No ID received");
  $this->Category->id=$id;
  if($this->Category->removeFromTree($id,true)==false)
     $this->Session->setFlash('The Category could not be deleted.');
   $this->Session->setFlash('Category has been deleted.');
   $this->redirect(array('action'=>'index'));
   }


}  // end class

?>
