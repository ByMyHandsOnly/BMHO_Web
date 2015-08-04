<h1><?php echo __('System settings'); ?></h1>
<p><?php echo __('You can modify the system settings here.'); ?> </p>
<hr />
<div class="settings form">
	<?php
	echo $this->Form->create(null, array(
		'action' => 'edit',
		'class' => 'form-horizontal',
		'type' => 'file',
	));
	?>
	<fieldset>
		<?php
//		echo $this->Form->input('company_name', array(
//			'class' => 'input-xlarge span3',
//			'default' => Configure::read('MyApp.company_name')
//		));

		echo $this->Form->input('website_title', array(
			'label' => __('Website title'),
			'class' => 'input-xlarge span3',
			'default' => Configure::read('MyApp.website_title')
		));

		echo $this->Form->input('website_header', array(
			'label' => __('Website header'),
			'class' => 'input-xlarge span3',
			'type' => 'text',
			'rows' => '4',
			'default' => Configure::read('MyApp.website_header')
		));

		echo $this->Form->input('website_desc', array(
			'label' => __('Website description'),
			'class' => 'input-xlarge span3',
			'type' => 'text',
			'rows' => '4',
			'default' => Configure::read('MyApp.website_desc')
		));

		echo $this->Form->input('email', array(
			'label' => __('Email'),
			'class' => 'input-xlarge span3',
			'default' => Configure::read('MyApp.email')
		));

		$banner = Configure::read('MyApp.banner');

		if (!empty($banner)) {
			echo '<div class="control-group"><div class="controls">';
			echo $this->Html->image('/' . Configure::read('MyApp.banner'), array('style' => 'height: 80px'));
			echo '</div></div>';
		}

		echo $this->Form->input('banner', array(
			'label' => __('Banner'),
			'class' => 'input-xlarge',
			'type' => 'file',
			'helpBlock' => __('Browse and select your banner\'s image.') . ' <b>' . __('Recommended size is 600px x 237px.') . '</b>',
		));

		echo $this->Form->input('currency', array(
			'label' => __('Currency'),
			'class' => 'input-xlarge span3',
			'default' => Configure::read('MyApp.currency')
		));
		?>
		<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Clear all samples data'), array('action' => 'clearAllData'), array('class' => 'btn btn-danger pull-right', 'icon' => 'trash white'), __('Are you sure?')); ?>
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
