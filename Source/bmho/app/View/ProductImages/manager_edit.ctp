<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link('List all images', '/admin/images'),
		'Manager Edit image',
	));
	?>
</section>
<div class="images form">
	<?php echo $this->Form->create('Image', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend>Image <small>Manager Edit image</small></legend>
		<?php
		echo $this->Form->input('id', array(
			'label' => 'Id',
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">Required</span>&nbsp;',
			'helpBlock' => 'help block here.'
		));
		echo $this->Form->input('product_id', array(
			'label' => 'Product Id',
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">Required</span>&nbsp;',
			'helpBlock' => 'help block here.'
		));
		echo $this->Form->input('filename', array(
			'label' => 'Filename',
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">Required</span>&nbsp;',
			'helpBlock' => 'help block here.'
		));
		?>
		<?php echo $this->Form->submit('Save', array('class' => 'btn btn-primary')); ?>    </fieldset>
	<?php echo $this->Form->end(); ?>
</div>