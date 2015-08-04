<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link(__('List all enquiryReplies'), '/admin/enquiryReplies'),
		__('Manager Add enquiryReply'),
	));
	?>
</section>
<div class="enquiryReplies form">
	<?php echo $this->Form->create('EnquiryReply', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Enquiry Reply'); ?> <small><?php echo __('Manager Add enquiryReply'); ?></small></legend>
		<?php
		echo $this->Form->input('enquiry_id', array(
			'label' => __('Enquiry Id'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
//		 'helpBlock' => 'help block here.'
		));
		echo $this->Form->input('message', array(
			'label' => __('Message'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
//		 'helpBlock' => 'help block here.'
		));
		?>
		<?php echo $this->Form->submit(__('Add'), array('class' => 'btn btn-primary')); ?>    
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>