<section id="breadcrumb">
    <?php    echo $this->Html->breadcrumb(array(       $this->Html->link('List all images', '/admin/images'),        'View image details',    ));    ?>
</section>
<div class="images view">
    <h3><?php  echo __('Image Details');?></h3>
    <hr />
    <dl class="dl-horizontal">
        		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($image['Image']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($image['Product']['name'], array('controller' => 'products', 'action' => 'view', $image['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($image['Image']['filename']); ?>
			&nbsp;
		</dd>
    </dl>
</div>
