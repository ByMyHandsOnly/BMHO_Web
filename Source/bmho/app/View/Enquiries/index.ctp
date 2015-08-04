<?php $this->set('title_for_layout', 'My Enquiries'); ?>

<div class="row-fluid">
    <div class="span12">
        <h3><?php echo __('My Enquiries'); ?></h3>
        <hr />
		<?php if (count($enquiries) > 0) : ?>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th style="width: 150px"><?php echo $this->Paginator->sort('created', __('Date/Time')); ?></th>
						<th><?php echo __('Subject'); ?></th>
						<th class="actions" style="width: 80px"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($enquiries as $enquiry): ?>
						<tr>
							<td><?php echo $this->Time->format('j/n/Y g:ia', $enquiry['Enquiry']['created']); ?>&nbsp;</td>
							<td><?php echo $this->Html->link($enquiry['Enquiry']['subject'], array('action' => 'view', $enquiry['Enquiry']['id'])); ?>&nbsp;</td>

							<td class="actions">
								<!--<div class="btn-group">-->
									<?php // echo $this->Html->link(null, array('action' => 'edit', $enquiry['Enquiry']['id']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>
									<?php echo $this->Form->postLink(null, array('action' => 'delete', $enquiry['Enquiry']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $enquiry['Enquiry']['id'])); ?>
								<!--</div>-->
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