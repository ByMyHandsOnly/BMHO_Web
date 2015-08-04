<?php $this->set('title_for_layout', __('Setup a Shop')); ?>

<div class="row">
	<div class="span9">
		<div class="shops form">
			<?php echo $this->Form->create('Shop', array('class' => 'form-horizontal')); ?>
			<fieldset>
				<legend>Register My Shop</legend>
				<?php
				echo $this->Form->input('name', array(
					'label' => __('Name'),
					'class' => 'input-xlarge span4',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
					'helpBlock' => __('Enter your shop name here.')
				));
				echo $this->Form->input('description', array(
					'label' => __('Description'),
					'class' => 'input-xlarge span4',
					'helpInline' => '',
					'helpBlock' => __('Enter your shop description here.')
				));
//				echo $this->Form->input('shop_category_id', array(
//					'label' => 'Category',
//					'class' => 'input-xlarge',
//					'style' => 'width: auto',
//				));
				echo $this->Form->input('email', array(
					'label' => __('Email'),
					'class' => 'input-xlarge span4',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
					'helpBlock' => __('Enter your shop\'s email here.'),
					'placeholder' => 'example@email.com',
				));
				echo $this->Form->input('website', array(
					'label' => __('Website'),
					'class' => 'input-xlarge span4',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
					'helpBlock' => __('Enter your shop website address here.'),
					'placeholder' => 'http://www.example.com',
				));
				?>
			</fieldset>
			<?php echo $this->Form->submit(__('Register'), array('class' => 'btn btn-primary')); ?>    
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
