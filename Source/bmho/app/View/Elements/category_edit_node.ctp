<?php
$category = $data['Category'];
?>
<?php echo $this->Html->link($category['name'], array('action' => 'index', $category['id'])); ?>&nbsp;		
<span class="badge badge-info"><?php echo h($category['child_count']); ?></span>&nbsp;<?php if ( $category['child_count'] > 0 ) { echo $this->Html->link(__('Show'), array('controller' => 'products', 'action' => 'index', $category['id'], 'admin' => true), array('class' => 'btn btn-small', 'icon' => 'pencil')); } ?>&nbsp;
<div class="btn-group pull-right">
   <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['id']), array('class' => 'btn btn-warning btn-small', 'icon' => 'pencil white')); ?>
<!--   <?php echo $this->Html->link(__('Sub'), array('action' => 'add', $category['id']), array('class' => 'btn btn-small btn-primary', 'icon' => 'plus white')); ?> -->
   <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete, %s?', $category['name'])); ?>
</div>

