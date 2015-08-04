<?php $this->set('title_for_layout', 'User\'s profile'); ?>

<h1><?php echo __('User\'s profile'); ?></h1>
<hr>
<div class="form">
	<?php
	echo $this->Form->create(null, array('class' => 'form-horizontal'));
	?>		
	<fieldset>
		<?php
		echo '<div class="control-group"><label class="control-label">Gravatar</label><div class="controls">';
		echo $this->Gravatar->image($this->request->data['User']['email'], null, array('class' => 'img-rounded'));
		echo '<br /><br /><a target="_blank" href="http://en.gravatar.com/">' . __('Get or update your gravatar here.') . '</a>';
		echo '</div></div>';

		echo $this->Form->input('username', array(
			'placeholder' => __('Username'),
			'class' => 'span3',
			'disabled' => true,
				)
		);

		echo $this->Form->input('name', array(
			'placeholder' => __('Name'),
			'class' => 'span3'
				)
		);

		echo $this->Form->input('password', array(
			'type' => 'password',
			'class' => 'span3',
			'placeholder' => __('Password')
				)
		);

		echo $this->Form->input('email', array(
			'type' => 'text',
			'class' => 'span3',
			'placeholder' => __('Email')
				)
		);
		?>
		<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-primary')); ?>   
	</fieldset>
	<?php echo $this->Form->end(); ?>	
</div>