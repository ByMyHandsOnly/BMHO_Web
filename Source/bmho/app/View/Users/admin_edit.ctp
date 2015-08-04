<?php  
$breadcrumb = array(
	array(
		'label' => __('List all users'),
		'link'	=> '/admin/users'
	),
	array(
		'label'	=> $user['User']['username'],
		'link'	=> '/admin/users/view/'.$user['User']['id']
	),
	array(
		'label'	=> __('edit')
	)
);
echo $this->element('breadcrumb',array('links' => $breadcrumb)); 
?>

<h2><?php echo __('Edit user'); ?></h2>
<hr>
<div class="row-fluid">
	<div class="span4">
		<?php echo $this->element('form_users',array('action' => '', 'label' => __('Edit User'))) ?>		
	</div>
</div>