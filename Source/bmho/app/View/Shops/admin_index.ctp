<div class="row-fluid">
    <div class="span12">
        <h3><?php echo __('All shops') ?></h3>
        <hr>
		<?php if (count($shops) > 0) : ?>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<!--<th style="width: 150px"><?php echo $this->Paginator->sort('shop_category_id'); ?></th>-->
						<th style="width: 200px"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
						<th><?php echo $this->Paginator->sort('product_count', __('Product Count')); ?></th>
						<th class="actions" style="width: 80px"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($shops as $shop) { ?>
						<tr>
							<!--<td><?php echo $shop['ShopCategory']['name'] ?></td>-->
							<td><?php echo $this->Html->link($shop['Shop']['name'], '/admin/shops/view/' . $shop['Shop']['id']); ?></td>
							<td><span class="badge badge-info"><?php echo $shop['Shop']['product_count'] ?></span></td>
							<td class="actions">
								<div class="btn-group">
									<?php echo $this->Html->link(null, array('action' => 'edit', $shop['Shop']['id']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>
									<?php echo $this->Form->postLink(null, array('action' => 'delete', $shop['Shop']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $shop['Shop']['name'])); ?>
								</div>
							</td>
						</tr>
					<?php } ?>
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
			<?php echo __('No record found.'); ?>
		<?php endif; ?>
    </div>
</div>