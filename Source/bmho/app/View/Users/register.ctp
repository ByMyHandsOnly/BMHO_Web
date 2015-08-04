<?php $this->set('title_for_layout', __('Register')); ?>

<?php echo $this->Session->flash() ?>
<h1><?php echo __('Join us') ?></h1>
<p><?php echo __('Register below to join our marketplace.'); ?></p>
<hr>
<div class="row-fluid">
	<div class="span4">
		<?php
		echo $this->Form->create
				(
				'User', array
			(
			'class' => 'well',
			'inputDefaults' => array
				(
				'label' => false,
				'error' => false
			)
				)
		);
		?>		
		<?php
		echo $this->Form->input('name', array(
			'placeholder' => __('Name'),
			'class' => 'span12'
				)
		);

		echo $this->Form->input('username', array(
			'placeholder' => __('Username'),
			'class' => 'span12'
				)
		);

		echo $this->Form->input('password', array(
			'type' => 'password',
			'class' => 'span12',
			'placeholder' => __('Password')
				)
		);

		echo $this->Form->input('email', array(
			'type' => 'text',
			'class' => 'span12',
			'placeholder' => __('Email')
				)
		);
		?>
		<?php
		echo $this->Form->submit(__('Register'), array('class' => 'btn btn-primary'));
		echo $this->Form->end();
		?>
	</div>
</div>

