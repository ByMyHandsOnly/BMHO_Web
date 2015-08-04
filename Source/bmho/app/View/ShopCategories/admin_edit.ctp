<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link(__('List all Categories'), '/admin/shopCategories'),
		__('Edit shopCategory'),
	));
	?>
</section>
<div class="shopCategories form">
	<?php echo $this->Form->create('ShopCategory', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Shop Category'); ?> <small> <?php echo __('Edit shopCategory'); ?></small></legend>
		<?php
		echo $this->Form->input('id', array(
			'label' => __('Id'),
			'class' => 'input-xlarge span4',
			'helpInline' => '<span class="label label-important">Required</span>&nbsp;',
			'helpBlock' => 'help block here.'
		));
		echo $this->Form->input('name', array(
			'label' => __('Name'),
			'class' => 'input-xlarge span2',
		));
		?>
		<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-primary')); ?>    
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>