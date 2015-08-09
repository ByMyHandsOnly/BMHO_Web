z<?php
$category = $data['Category'];
?>

<?php echo $this->Html->link($category['name'], array('action' => 'index', $category['id'])); ?>
<?php echo "&nbsp;"; ?>
<?php echo $this->Html->link($category['child_count'], array('controller' => 'products', 'action' => 'find', 'productcategory_id' => $category['id']), array('class'=>'badge') ); ?>

