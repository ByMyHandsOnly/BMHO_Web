<h1>Categories</h1>
<h2>Edit</h2>
<h3>[Admin]</h3>
<p>
<?php
if ( isset($id) ) {
   echo $this->data['name'];
//   $currentCategory['Category']=$this->data;
   }
else {
   echo "Top";
//   $currentCategory['Category']['lft']=0;
//   $currentCategory['Category']['rght']=0;
   }

$treeOptions = array('id' => 'main-categories', 'model' => 'Category', 'element' => 'category_edit_node');
echo $this->Tree->generate($categories, $treeOptions);
?>
<br>
<?php echo $this->Html->link(__('Add Category'), array('action' => 'add'), array('class' => 'btn btn-small btn-primary', 'icon' => 'plus white')); ?>

