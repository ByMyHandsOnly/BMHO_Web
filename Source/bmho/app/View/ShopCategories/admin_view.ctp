<section id="breadcrumb">
	<?php echo $this->Html->breadcrumb(array($this->Html->link(__('List all shopCategories'), '/admin/shopCategories'), __('View shopCategory details'),)); ?>
</section>
<div class="shopCategories view">
    <h3><?php echo __('Shop Category Details'); ?></h3>
    <hr />
    <dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shopCategory['ShopCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($shopCategory['ShopCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($shopCategory['ShopCategory']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shop Count'); ?></dt>
		<dd>
			<?php echo h($shopCategory['ShopCategory']['shop_count']); ?>
			&nbsp;
		</dd>
    </dl>
</div>
