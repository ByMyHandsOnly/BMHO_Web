<div class="row-fluid">
    <div class="span12">
        <h3><?php echo __('All Enquiry Replies'); ?></h3>
        <hr />
        <div class="btn-group">
			<?php echo $this->Html->link(__('Add New Enquiry Reply'), array('action' => 'add'), array('class' => 'btn btn-primary', 'icon' => 'plus white')); ?>        </div>
        <br />
		<?php if (count($enquiryReplies) > 0) : ?>
	        <table class="table table-bordered table-hover table-striped">
	            <thead>
	                <tr>
						<th style="width: 30px"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
						<th><?php echo $this->Paginator->sort('enquiry_id', __('Enquiry id')); ?></th>
						<th><?php echo $this->Paginator->sort('message', __('Message')); ?></th>
						<th><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
						<th><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
						<th class="actions" style="width: 80px"><?php echo __('Actions'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($enquiryReplies as $enquiryReply): ?>
						<tr>
							<td><?php echo h($enquiryReply['EnquiryReply']['id']); ?>&nbsp;</td>
							<td>
								<?php echo $this->Html->link($enquiryReply['Enquiry']['subject'], array('controller' => 'enquiries', 'action' => 'view', $enquiryReply['Enquiry']['id'])); ?>
							</td>
							<td><?php echo h($enquiryReply['EnquiryReply']['message']); ?>&nbsp;</td>
							<td><?php echo h($enquiryReply['EnquiryReply']['created']); ?>&nbsp;</td>
							<td><?php echo h($enquiryReply['EnquiryReply']['modified']); ?>&nbsp;</td>
							<td class="actions">
								<div class="btn-group">
									<?php echo $this->Html->link(null, array('action' => 'edit', $enquiryReply['EnquiryReply']['id']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>
									<?php echo $this->Form->postLink(null, array('action' => 'delete', $enquiryReply['EnquiryReply']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $enquiryReply['EnquiryReply']['id'])); ?>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
	            </tbody>
	        </table>
	        <div class="pull-right">
	            <p>
					<?php
					echo $this->Paginator->counter(array(
						'format' => __('Page {:page} of {:pages}, total records: {:count}.')
					));
					?>
	            </p>
					<?php $paging = $this->Paginator->params(); ?>
					<?php if ($paging['pageCount'] > 1) : ?>
						<?php echo $this->Paginator->pagination(); ?>
					<?php endif; ?>
	        </div>
			<?php else : ?>
			<?php echo __('No record(s) found.'); ?>
			<?php endif; ?>
    </div>
</div>