<p>
	<?php echo __('Dear'); ?> <?php echo $name; ?>,
	<br /><br />
	<?php echo __('The user have replied to the enquiry.'); ?> 
	<br /><br />
	<?php echo $this->Html->link(__('You may view and reply to the enquiry here.'), Router::url('/', true) . 'manager/enquiries/view/' . $enquiry_id) ?>
</p>