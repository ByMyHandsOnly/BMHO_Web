<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link(__('List all enquiries'), '/admin/enquiries'),
		__('Manager Edit enquiry'),
	));
	?>
</section>
<div class="enquiries form">
	<?php echo $this->Form->create('Enquiry', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Enquiry'); ?> <small><?php echo __('Manager Edit enquiry'); ?></small></legend>
		<?php
		echo $this->Form->input('id', array(
			'label' => __('Id'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">Required</span>&nbsp;',
			'helpBlock' => 'help block here.'
		));
		echo $this->Form->input('shop_id', array(
			'label' => __('Shop Id'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">Required</span>&nbsp;',
			'helpBlock' => 'help block here.'
		));
		echo $this->Form->input('user_id', array(
			'label' => __('User Id'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">Required</span>&nbsp;',
			'helpBlock' => 'help block here.'
		));
		echo $this->Form->input('subject', array(
			'label' => __('Subject'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">Required</span>&nbsp;',
			'helpBlock' => 'help block here.'
		));
		echo $this->Form->input('message', array(
			'label' => __('Message'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">Required</span>&nbsp;',
			'helpBlock' => 'help block here.'
		));
		?>
		<?php echo $this->Form->submit('Save', array('class' => 'btn btn-primary')); ?>    </fieldset>
	<?php echo $this->Form->end(); ?>
</div>