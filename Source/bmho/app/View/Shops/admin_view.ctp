<?php  
$breadcrumb = array(
	array(
		'label' => __('List all shops'),
		'link'	=> '/admin/shops',
	),
	array(
		'label'	=> $shop['Shop']['name'],
	)
);
echo $this->element('breadcrumb',array('links' => $breadcrumb)); 
?>	


<h3><?php echo $shop['Shop']['name'] ?></h3>
<hr>
<strong><?php echo __('Description'); ?>: </strong><?php echo $shop['Shop']['description'] ?><br/>
<strong><?php echo __('Email'); ?>: </strong><?php echo $shop['Shop']['email'] ?><br/>
<strong><?php echo __('Website'); ?>: </strong><?php echo $shop['Shop']['website'] ?><br/>