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

$treeOptions = array('id' => 'main-categories', 'model' => 'ProductCategory', 'element' => 'category_node');
echo $this->Tree->generate($productCategories, $treeOptions);
?>
<br>
<?php echo $this->Html->link(__('Suggest Category'), array('action' => 'add'), array('class' => 'btn btn-small btn-primary', 'icon' => 'plus white')); ?>

