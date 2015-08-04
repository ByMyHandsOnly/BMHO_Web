<?php $this->set('title_for_layout', $page_title); ?>

<?php // debug($products);                ?>
<div class="row-fluid">
    <div class="page-header">
        <h1><?php echo $page_title ?></h1>
    </div>

	<?php if (count($products) > 0) : ?>

		<div class="row-fluid">
			<?php echo $this->element('products'); ?>
		</div>

	<?php else : ?>
		<div class="row-fluid">
			<?php echo __('No product(s) found.'); ?>
		</div>
	<?php endif; ?>
</div>
