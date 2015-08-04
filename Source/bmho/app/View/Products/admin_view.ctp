<?php // debug($product);             ?>
<section id="breadcrumb">
	 <?php echo $this->Html->breadcrumb(array($this->Html->link(__('Manage Items'), '/admin/products'), __('View Item [Admin]'),)); ?>
</section>
<div class="products view">
        <legend><?php echo __('View Item'); ?> <small><?php echo __('[Admin]'); ?></small> </legend>
       <hr />
    <div class="row-fluid">
        <div class="span6">
            <dl class="dl-horizontal">
                <dt><?php echo __('Seller'); ?></dt>
                <dd>
					<?php echo h($shop['Shop']['name']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Category'); ?></dt>
                <dd>
					<?php echo h($product['ProductCategory']['name']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Name'); ?></dt>
                <dd>
					<?php echo h($product['Product']['name']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Slug'); ?></dt>
                <dd>
					<?php echo h($product['Product']['slug']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Description'); ?></dt>
                <dd>
					<?php echo $product['Product']['description']; ?>
                    &nbsp;
                </dd>
<!--
   				<dt><?php echo __('Shipping rate'); ?></dt>
                <dd>
					<?php echo $product['Product']['shipping_rate']; ?>
                    &nbsp;
                </dd>
                
				<?php if (isset($product['Product']['weight'])) : ?>
					<dt><?php echo __('Weight'); ?></dt>
	                <dd>
						<?php echo $product['Product']['weight']; ?> KG
	                    &nbsp;
	                </dd>
				<?php endif; ?>
 -->				
                <dt><?php echo __('Price'); ?></dt>
                <dd>
					<?php echo $this->Number->currency($product['Product']['price'], 'USD'); ?>
                    &nbsp;
                </dd>
<!--
                <dt><?php echo __('Price Discounted'); ?></dt>
                <dd>
					<?php echo $this->Number->currency($product['Product']['price_discounted'], 'USD'); ?>
                    &nbsp;
                </dd>
                
                <dt><?php echo __('Qty'); ?></dt>
                <dd>
					<?php echo h($product['Product']['qty']); ?>
                    &nbsp;
                </dd>
 -->                
                <dt><?php echo __('Status'); ?></dt>
                <dd>
					<?php echo h($product['Product']['status']); ?>
                    &nbsp;
                </dd>
            </dl>

			<br /><br /><br />
			<div class="btn-group">
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $product['Product']['name'])); ?>
			</div>
        </div>
        <div class="span6">
            <div class="well">
                <div class="pull-right">
					<?php echo $this->Html->link(__('Add image'), array('controller' => 'product_images', 'action' => 'add', $product['Product']['id'], 'manager' => true), array('class' => 'btn btn-primary', 'icon' => 'plus white')); ?>
                </div>
                <h4>Product's images</h4>
                <div style="display: inline-block">
                    <ul class="products-images">
						<?php foreach ($product['ProductImage'] as $image) : ?>
							<li>
								<img src="<?php echo Router::url('/', true) . $image['thumbnail']; ?>"/>
								<br />
								<div style="text-align: center">
									<?php echo $this->Form->postLink(null, array('controller' => 'product_images', 'action' => 'delete', $image['id'], 'manager' => true), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white', 'style' => 'margin: 5px'), __('Are you sure?')); ?>
								</div>
							</li>
						<?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
