<?php  
$breadcrumb = array(
	array(
		'label' => __('List all users'),
		'link'	=> '/admin/users'
	),
	array(
		'label'	=> $user['User']['username']
	)
);
echo $this->element('breadcrumb',array('links' => $breadcrumb)); 
?>	


<h3><?php echo $user['User']['username'] ?></h3>
<hr>
<strong><?php echo __('Username'); ?>: </strong><?php echo $user['User']['username'] ?><br/>
<strong><?php echo __('Role'); ?>: </strong><?php echo $user['User']['role'] ?>