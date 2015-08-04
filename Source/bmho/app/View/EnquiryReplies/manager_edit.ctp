<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link(__('View enquiry'), '/manager/enquiries/view/' . $this->request->data['EnquiryReply']['enquiry_id']),
		__('Edit message'),
	));
	?>
</section>
<div class="enquiryReplies form">
	<?php echo $this->Form->create('EnquiryReply', array('class' => 'form-horizontal')); ?>
    <fieldset>
		<?php
		echo $this->Form->input('id', array(
			'label' => __('Id'),
			'class' => 'input-xlarge span2',
		));
		echo $this->Form->input('message', array(
			'label' => __('Message'),
			'class' => 'input-xlarge span6',
		));
		?>
		<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-primary')); ?>    
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>