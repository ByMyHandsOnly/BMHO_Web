<style>
	.crop {
		width: 260px;
		height: 195px;
		overflow: hidden;
		position: relative;
	}

	.crop img {
		position: absolute;
		margin: auto;
		top: 0;
		bottom: 0;
		z-index: 10;
		display: inline-block;
	}
</style>

<ul id="tiles" class="thumbnails" style="position: relative" >
	<!-- These are our grid blocks -->
	<?php foreach ($products as $product) : ?>
		<li class="thumbnail">
			<?php if ($product['Product']['status'] == 'Out of stock') : ?>
				<div style="position: absolute; margin: -10px; z-index: 99"><img src="<?php echo $this->webroot; ?>img/ribbons/out_of_stock.png" /></div>
			<?php else : ?>
				<?php if ($product['Product']['created_in_days'] <= 6) : ?>
					<div style="position: absolute; margin: -10px; z-index: 99"><img src="<?php echo $this->webroot; ?>img/ribbons/new.png" /></div>
				<?php endif; ?>
			<?php endif; ?>

			<a href="<?php echo $this->webroot; ?>products/view/<?php echo $product['Product']['slug']; ?>">
				<div class="crop">
					<img src="<?php echo isset($product['ProductImage'][0]['thumbnail']) ? Router::url('/', true) . $product['ProductImage'][0]['thumbnail'] : "http://placehold.it/300x300&text=No photo"; ?>" width="260" style="width: 260px;"/>
				</div>
			</a>
			<div style="height: 70px" class="caption">
				<?php if (!empty($product['Product']['price_discounted'])) : ?>
					<div class="pull-right"><h4><?php echo $this->Number->currency($product['Product']['price_discounted'], Configure::read('MyApp.currency')); ?></h4> <span class="price_normal"><?php echo $this->Number->currency($product['Product']['price'], Configure::read('MyApp.currency')); ?></span></div>
				<?php else : ?>
					<div class="pull-right"><h4><?php echo $this->Number->currency($product['Product']['price'], Configure::read('MyApp.currency')); ?></h4> </div>
				<?php endif; ?>
				<p style="margin-top:10px;width: 150px;">
					<?php echo $this->Html->link($this->Text->truncate($product['Product']['name'], 42, array('ellipsis' => '...', 'exact' => true)), array('controller' => 'products', 'action' => 'view', $product['Product']['slug'])); ?>
					<!--				</p>
									<p>-->
					<?php //echo $this->Html->link('Details', array('controller' => 'products', 'action' => 'view', $product['Product']['slug']), array('class' => 'btn')); ?>
				</p>
			</div>
		</li>
	<?php endforeach; ?>
</ul>

<!--<div class="row-fluid">
<?php foreach ($products as $product) : ?>
				<div class="mythumbnail">
					<img style="width: 300px; height: 200px;" src="<?php echo $this->webroot . $product['Product']['image']; ?>" />
					<div class="caption">
						<a href="<?php echo $this->webroot . 'products/view/' . $product['Product']['slug']; ?>"><?php echo String::truncate($product['Product']['name'], 60); ?></a>
					</div>
				</div>
<?php endforeach; ?>
</div>-->