<div class="row-fluid">
    <div class="span12">
        <h3><?php echo __('All Shop Categories'); ?></h3>
        <hr />
		<div class="btn-group">
			<?php echo $this->Html->link(__('Add New Category'), array('action' => 'add'), array('class' => 'btn btn-primary', 'icon' => 'plus white')); ?>        
		</div>
        <br /><br />
		<?php if (count($shopCategories) > 0) : ?>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th style="width: 200px"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
						<th><?php echo $this->Paginator->sort('shop_count', __('Shop Count')); ?></th>
						<th class="actions" style="width: 80px"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($shopCategories as $shopCategory): ?>
						<tr>
							<td><?php echo $this->Html->link($shopCategory['ShopCategory']['name'], array('action' => 'view', $shopCategory['ShopCategory']['id'])); ?>&nbsp;</td>		
							<td><span class="badge badge-info"><?php echo h($shopCategory['ShopCategory']['shop_count']); ?></span>&nbsp;</td>
							<td class="actions">
								<div class="btn-group">
									<?php echo $this->Html->link(null, array('action' => 'edit', $shopCategory['ShopCategory']['id']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>
									<?php echo $this->Form->postLink(null, array('action' => 'delete', $shopCategory['ShopCategory']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete, %s?', $shopCategory['ShopCategory']['name'])); ?>
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