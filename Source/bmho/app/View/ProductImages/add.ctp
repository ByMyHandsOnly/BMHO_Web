<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link(__('List all images'), '/admin/images'),
		__('Add image'),
	));
	?>
</section>
<div class="images form">
	<?php echo $this->Form->create('Image', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Image'); ?> <small><?php echo __('Add image'); ?></small></legend>
		<?php
		echo $this->Form->input('product_id', array(
			'label' => __('Product Id'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
//		 'helpBlock' => 'help block here.'
		));
		echo $this->Form->input('filename', array(
			'label' => __('Filename'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
//		 'helpBlock' => 'help block here.'
		));
		?>
		<?php echo $this->Form->submit(__('Add'), array('class' => 'btn btn-primary')); ?>    
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>