<p>
	<?php echo __('Dear'); ?> <?php echo $name?>,
	<br /><br />
	<?php echo __('There are new enquiry submitted by your customer.'); ?> 
	<br /><br />
	<?php echo $this->Html->link(__('You may view and reply to the enquiry here.'), Router::url('/', true) . '/manager/enquiries/view/' . $enquiry_id) ?>
</p>