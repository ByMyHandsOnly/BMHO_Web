<?php
echo $this->Form->create
		(
		'User', array
	(
	'url' => array
		(
		'controller' => 'users',
		'action' => 'login'
	),
	'class' => 'well',
	'inputDefaults' => array
		(
		'label' => false,
		'error' => false
	)
		)
);


echo $this->Form->input('username', array('placeholder' => __('Username'), 'class' => 'span12'));
echo $this->Form->input('password', array('placeholder' => __('Password'), 'type' => 'password', 'class' => 'span12'));
?> 
<div class="control-group">
    <div class="controls">
        <button id="btnLogin" type="submit" class="btn btn-primary"><i class="icon-play-circle icon-white"></i> <?php echo __('Login'); ?></button>      
		<a style="margin-left: 20px" href="<?php echo $this->webroot . 'users/register/' . $type; ?>"><?php echo __('Register'); ?></a>      
    </div>
</div>

<div class="control-group">
    <div class="controls">
        <span><?php echo $this->Html->link(__('Forgot your password?'), array('controller' => 'users', 'action' => 'remember_password', $type)); ?></span>
    </div>
</div> 
</form>