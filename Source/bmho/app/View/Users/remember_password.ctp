<?php $this->set('title_for_layout', __('Remember password')); ?>

<?php echo $this->Session->flash() ?>
<div class="row-fluid">
	<div class="span12">
	<?php
	echo $this->Form->create
	(
		'User',
		array
		(
//			'url' => array
//			(
//				'controller' => 'users',
//				'action'	 => 'remember_password'
//			),
			'class'			=> 'well span12 center',
			'inputDefaults' => array
			(
				'label' => false,
				'error' => false
			)
		)
	); 
	?>
		<h3><?php echo __('Forgot your password?') ?></h3>
		<p><?php echo __('Enter your username below to reset your password.'); ?></p>

	<?php echo $this->Form->input('username',array('placeholder' => __('Username'),'class' => 'span3 email-field')); ?> 
	  <div class="control-group">
	    <div class="controls">
	      <button type="submit" class="btn btn-primary"><?php echo __('Remember my password') ?></button>      
	    </div>
	  </div>

	</form>
	</div>
</div>