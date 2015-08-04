<p>
	<?php echo __('Dear'); ?> <?php echo $name; ?>,
	<br /><br />
	<?php echo __('The seller have replied to your enquiry.'); ?> 
	<br /><br />
	<?php echo $this->Html->link(__('You may view and reply to the enquiry here.'), Router::url('/', true) . 'enquiries/view/' . $enquiry_id) ?>
</p>