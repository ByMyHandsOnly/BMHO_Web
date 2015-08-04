<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link(__('Items'), '/admin/products'),
	));
	?>
</section>
<div class="row-fluid">
    <div class="span12">
        <legend><?php echo __('Items'); ?> <small><?php echo __('[Admin]'); ?></small></legend>
        <hr />
        <div>
            <div class="pull-right">
	    	   <?php echo $this->Form->input('Product.product_category_id', array('label' => false, 'empty' => '-- All --')); ?>
            </div>
            <?php echo $this->Html->link(__('Sell Item'), array('action' => 'add', $this->request->data['Product']['product_category_id']), array('class' => 'btn btn-primary', 'icon' => 'plus white')); ?>        
        </div>
        <br />
		<?php if (count($products) > 0) : ?>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th style="width: 20%"><?php echo $this->Paginator->sort('product_category_id', __('Category')); ?></th>
						<th style="width: 40%"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
						<th style="width: 40%"><?php echo $this->Paginator->sort('shop_id', __('Seller')); ?></th>
						<th><?php echo $this->Paginator->sort('status', __('Status')); ?></th>
						<th><?php echo $this->Paginator->sort('qty', __('Qty')); ?></th>
						<th align='right'><?php echo $this->Paginator->sort('price', __('Price')); ?></th>
<!--
						<th><?php echo $this->Paginator->sort('price_discounted', __('Price Discounted')); ?></th>
						<th class="actions" style="width: 80px"><?php echo __('Actions'); ?></th>
-->
					</tr>
				</thead>
				<tbody>
					<?php foreach ($products as $product): ?>
						<tr>
							<td>
								<?php echo $this->Html->link($product['ProductCategory']['name'], array('action' => 'index', $product['Product']['product_category_id'])); ?>&nbsp;
    						   	<div class="btn-group pull-right">
									<?php echo $this->Html->link(null, array('controller' => 'ProductCategories', 'action' => 'edit', $product['Product']['product_category_id']), array('class' => 'btn btn-small btn-warning', 'icon' => 'pencil white')); ?>
									<?php echo $this->Form->postLink(null, array('controller' => 'ProductCategories', 'action' => 'delete', $product['Product']['product_category_id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $product['Shop']['name'])); ?>
								</div>
							</td>		
							<td>
                                <?php echo $this->Html->link($product['Product']['name'], array('action' => 'view', $product['Product']['id'])); ?>&nbsp;
								<div class="btn-group pull-right">
									<?php echo $this->Html->link(null, array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-small btn-warning', 'icon' => 'pencil white')); ?>
									<?php echo $this->Form->postLink(null, array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $product['Product']['name'])); ?>
								</div>
							</td>
							<td>
								<?php echo $this->Html->link($product['Shop']['name'], array('controller' => 'Shops', 'action' => 'view', $product['Shop']['id'])); ?>&nbsp;
    						   	<div class="btn-group pull-right">
									<?php echo $this->Html->link(null, array('controller' => 'Shops', 'action' => 'edit', $product['Shop']['id']), array('class' => 'btn btn-small btn-warning', 'icon' => 'pencil white')); ?>
									<?php echo $this->Form->postLink(null, array('controller' => 'Shops', 'action' => 'delete', $product['Shop']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $product['Shop']['name'])); ?>
								</div>
							</td>		
							<td><?php echo h($product['Product']['status']); ?>&nbsp;</td>
							<td><?php echo h($product['Product']['qty']); ?>&nbsp;</td>
							<td align='right'><?php echo h($this->Number->currency($product['Product']['price'],  Configure::read('MyApp.currency')) ); ?>&nbsp;</td>
<!--
							<td><?php echo h($this->Number->currency($product['Product']['price_discounted'],  Configure::read('MyApp.currency'))) != '0' ? h($this->Number->currency($product['Product']['price_discounted'], 'USD')) : '-'; ?>&nbsp;</td>
							<td class="actions">
								<div class="btn-group">
									<?php echo $this->Html->link(null, array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-small btn-warning', 'icon' => 'pencil white')); ?>
									<?php echo $this->Form->postLink(null, array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $product['Product']['name'])); ?>
								</div>
							</td>
-->							
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
		window.location.href = '<?php echo Router::url('/', true); ?>admin/products/index/' + $('#ProductProductCategoryId').val();
	});
</script>
<?php $this->end(); ?>
