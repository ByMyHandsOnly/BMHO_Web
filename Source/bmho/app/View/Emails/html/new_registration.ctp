<p>
	<?php echo __('Dear'); ?> <?php echo $name; ?>,
	<br /><br />
	<?php echo __('Your user account has been created.'); ?> <?php echo __('Please find your login info as per below.'); ?>
	<br /><br />
<table style="background-color: #a3c6d5;" border="0" cellspacing="4" cellpadding="4" width="450">
	<tbody>
		<tr>
			<td width="100"><?php echo __('Username'); ?></td>
			<td><?php echo $username; ?></td>
		</tr>
		<tr>
			<td><?php echo __('Password'); ?></td>
			<td><?php echo $password; ?></td>
		</tr>
	</tbody>
</table>
<br />
</p>