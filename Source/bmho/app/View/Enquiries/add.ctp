<div class="row-fluid">
	<p>
		<?php echo __('You may contact the seller using the following form.'); ?>
	</p>
	<form class="ajax" method="post" action="<?php echo $this->webroot . 'enquiries/add/' . $shop_id . '/' . $product_id; ?>">
		<?php echo $this->Form->create(); ?>
		<fieldset>
			<?php
			echo $this->Form->hidden('shop_id');
			
			echo $this->Form->input('subject', array(
				'label' => false,
				'placeholder' => __('Enter subject'),
				'class' => 'span12'
			));
			
			echo $this->Form->input('message', array(
				'label' => false,
				'placeholder' => __('Enter message'),
				'class' => 'span12'
			));
			?>
		</fieldset>
		<div class="form-actions">
			<?php echo $this->Form->submit('Send', array('class' => 'btn btn-primary')); ?>
		</div>
		<?php echo $this->Form->end(); ?>
</div>

<?php $this->start('scriptBottom'); ?>
<script>
	$(document).ready(function() {
		window.parent.reloadUserStatus();
	});
</script>
<?php
$this->end();
