<?php $this->set('title_for_layout', __('Shop\'s Dashboard')); ?>

<div class="row-fluid">

    <div class="span12">
		<?php // echo $this->Session->flash() ?>

        <h3><?php echo __('Dashboard'); ?></h3>
        <hr />


        <div class="well summary">
            <ul>
                <li class="span6">
                    <a href="<?php echo $this->webroot . 'manager/products'; ?>"><span class="count"><?php echo $count_products; ?></span> <?php echo __('Total products'); ?></a>
                </li>
				<li class="span6">
                    <a href="<?php echo $this->webroot . 'manager/enquiries'; ?>"><span class="count"><?php echo $count_enquiries; ?></span> <?php echo __('Total enquiries'); ?></a>
                </li>
            </ul>
        </div>

        <h3><?php echo __('Recent Enquiries'); ?></h3>
        <hr />
		<?php if (count($recent_enquiries) > 0) : ?>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th style="width: 150px"><?php echo __('Date/Time'); ?></th>
						<th style="width: 150px"><?php echo __('User'); ?></th>
						<th><?php echo __('Subject'); ?></th>
						<th class="actions" style="width: 80px"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($recent_enquiries as $enquiry): ?>
						<tr>
							<td><?php echo $this->Time->format('j/n/Y g:ia', $enquiry['Enquiry']['created']); ?>&nbsp;</td>
							<td>
								<?php echo $this->Html->link($enquiry['User']['name'], array('controller' => 'users', 'action' => 'view', $enquiry['User']['id'])); ?>
							</td>
							<td><?php echo $this->Html->link($enquiry['Enquiry']['subject'], array('controller' => 'enquiries', 'action' => 'view', $enquiry['Enquiry']['id'])); ?>&nbsp;</td>

							<td class="actions">
								<div class="btn-group">
									<?php echo $this->Html->link(null, array('controller' => 'enquiries', 'action' => 'edit', $enquiry['Enquiry']['id']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>
									<?php echo $this->Form->postLink(null, array('controller' => 'enquiries', 'action' => 'delete', $enquiry['Enquiry']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $enquiry['Enquiry']['id'])); ?>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else : ?>
			<?php echo __('No record(s) found.'); ?>
		<?php endif; ?>
    </div>

</div>