<section id="breadcrumb">
	<?php echo $this->Html->breadcrumb(array($this->Html->link(__('List all enquiryReplies'), '/admin/enquiryReplies'), __('View enquiryReply details'),)); ?>
</section>
<div class="enquiryReplies view">
    <h3><?php echo __('Enquiry Reply Details'); ?></h3>
    <hr />
    <dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($enquiryReply['EnquiryReply']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enquiry'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enquiryReply['Enquiry']['subject'], array('controller' => 'enquiries', 'action' => 'view', $enquiryReply['Enquiry']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($enquiryReply['EnquiryReply']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($enquiryReply['EnquiryReply']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($enquiryReply['EnquiryReply']['modified']); ?>
			&nbsp;
		</dd>
    </dl>
</div>
