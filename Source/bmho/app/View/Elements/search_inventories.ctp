<?php
echo $this->Form->create('Inventory', array(
    'url' => array_merge(array('action' => 'index'), $this->params['pass']),
    'class' => 'form-horizontal',
));
?>
<legend>Search Inventory</legend>
<?php echo $this->Form->input('date', array('label' => 'Date', 'type' => 'date', 'style' => 'width: auto', 'empty' => true, 'between' => ' ')); ?>
<?php echo $this->Form->input('item_id', array('label' => 'Item', 'style' => 'width: auto', 'empty' => '-- All --', 'between' => ' ')); ?>
<div class="form-actions" style="vertical-align: middle">
    <?php echo $this->Form->submit(__('Search'), array('class' => 'btn btn-info', 'div' => false)); ?>
    <?php echo $this->Html->link(__('Reset'), '#', array('class' => 'btn', 'div' => false, 'id' => 'resetBtn')); ?>
    <?php echo $this->Html->link(__('Close'), '#', array('class' => 'btn btn-link', 'id' => 'closeBtn')); ?>
</div>
<?php echo $this->Form->end(); ?>
