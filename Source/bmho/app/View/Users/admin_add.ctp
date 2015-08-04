<?php  
$breadcrumb = array(
	array(
		'label' => __('List all users'),
		'link'	=> '/admin/users'
	),
	array(
		'label'	=> __('Add')
	)
);
echo $this->element('breadcrumb',array('links' => $breadcrumb)); 
?>

<h2><?php echo __('Add user'); ?></h2>
<hr>
<div class="row-fluid">
	<div class="span4">
		<?php echo $this->element('form_users',array('action' => 'add', 'label' => __('Add User'))) ?>		
	</div>
</div>