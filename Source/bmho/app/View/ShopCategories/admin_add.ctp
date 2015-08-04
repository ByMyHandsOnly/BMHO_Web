<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link(__('List all categories'), '/admin/shopCategories'),
		__('Add category'),
	));
	?>
</section>
<div class="shopCategories form">
	<?php echo $this->Form->create('ShopCategory', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Shop\'s Category'); ?> <small> <?php echo __('Add'); ?></small></legend>
		<?php
		echo $this->Form->input('name', array(
			'label' => __('Name'),
			'class' => 'input-xlarge span4',
		));
		?>
		<?php echo $this->Form->submit(__('Add'), array('class' => 'btn btn-primary')); ?>    
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>