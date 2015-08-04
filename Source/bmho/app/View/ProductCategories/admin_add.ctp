<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link(__('Categories'), '/admin/productCategories'),
		__('Add'),
	));
	?>
</section>
<div class="productCategories form">
	<?php echo $this->Form->create('ProductCategory', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Category'); ?> <small> <?php echo __('Add'); ?></small></legend>
		<?php
		echo $this->Form->input('ProductCategory.parent_id', array(
			'label' => __('Parent Category'),
			'value' => 'ParentCategory.name',
			'class' => 'input-xlarge span2',
			'options' => 'parentCategories',
			'helpInline' => '',
		));

		echo $this->Form->input('name', array(
			'label' => __('Name'),
			'class' => 'input-xlarge span4',
		));
		echo $this->Form->input('slug', array(
			'label' => __('Web Name'),
			'class' => 'input-xlarge span4',
		));
		?>
		<?php echo $this->Form->submit(__('Add'), array('class' => 'btn btn-primary')); ?>    
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
