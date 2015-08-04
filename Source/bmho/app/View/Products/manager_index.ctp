<div class="row-fluid">
    <div class="span12">
        <h3><?php echo __('Items [Seller]'); ?></h3>
        <hr />
        <div>
            <div class="pull-right">
				<?php echo $this->Form->input('Product.product_category_id', array('label' => false, 'empty' => '-- All --')); ?>
            </div>
			<?php echo $this->Html->link(__('Sell Item'), array('action' => 'add'), array('class' => 'btn btn-primary', 'icon' => 'plus white')); ?>        
			<?php // echo $this->Html->link(__('Manage Options'), array('controller' => 'options','action' => 'index'), array('class' => 'btn')); ?>        
        </div>
        <br />
		<?php if (count($products) > 0) : ?>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th style="width: 300px"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
						<th><?php echo $this->Paginator->sort('price', __('Price')); ?></th>
						<th><?php echo $this->Paginator->sort('price_discounted', __('Price Discounted')); ?></th>
						<th><?php echo $this->Paginator->sort('qty', __('Qty')); ?></th>
						<th><?php echo $this->Paginator->sort('status', __('Status')); ?></th>
						<th class="actions" style="width: 80px"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($products as $product): ?>
						<tr>
							<td><?php echo $this->Html->link($product['Product']['name'], array('action' => 'view', $product['Product']['id'])); ?>&nbsp;</td>		
							<td><?php echo h($this->Number->currency($product['Product']['price'], 'USD')); ?>&nbsp;</td>
							<td><?php echo h($this->Number->currency($product['Product']['price_discounted'], 'USD')) != '0' ? h($this->Number->currency($product['Product']['price_discounted'], 'USD')) : '-'; ?>&nbsp;</td>
							<td><?php echo h($product['Product']['qty']); ?>&nbsp;</td>
							<td><?php echo h($product['Product']['status']); ?>&nbsp;</td>
							<td class="actions">
								<div class="btn-group">
									<?php echo $this->Html->link(null, array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>
									<?php echo $this->Form->postLink(null, array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $product['Product']['name'])); ?>
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

<?php $this->start('scriptBottom'); ?>
<script>
	$('#ProductProductCategoryId').change(function() {
		window.location.href = '<?php echo Router::url('/', true); ?>manager/products/index/' + $('#ProductProductCategoryId').val();
	});
</script>
<?php $this->end(); ?>
