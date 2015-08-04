<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link(__('Categories'), '/admin/productCategories'),
		__('Edit'),
	));
	?>
</section>
<?php $sub_cats = count($subCategories); ?>
<div class="productCategories form">
	<?php echo $this->Form->create('ProductCategory', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Category'); ?> <small> <?php echo __('Edit'); ?></small></legend>
		<?php
		echo $this->Form->input('id', array(
			'label' => __('Id'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
//			'helpBlock' => 'help block here.'
		));
		echo $this->Form->input('ParentCategory.id', array(
			'label' => __('Parent Category'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
		));

		echo $this->Form->input('name', array(
			'label' => __('Name'),
			'class' => 'input-xlarge span4',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
		));
		echo $this->Form->input('slug', array(
			'label' => __('Web Name'),
			'class' => 'input-xlarge span4',
			'readonly' => 'true',
		));
		
//		echo $this->Form->input('ChildCategories.parent_id', array(
//			'label' => __('Child Categories'),
//			'class' => 'input-xlarge',
//			'style' => 'width: auto',
//			'helpInline' => '',
//		));
		?>
		<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-primary')); ?>    
	</fieldset>
	<?php echo $this->Form->end(); ?>
	
   <b>Sub-Categories:</b><?php echo $this->Html->link(null, array('action' => 'add', $this->request->data['id']), array('class' => 'btn btn-small', 'icon' => 'plus')); ?><br>
<br>
<?php if ($sub_cats > 0) : ?>
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th style="width: 200px"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
				<th style="width: 20px"><nobr><?php echo $this->Paginator->sort('product_count', __('Product Count')); ?></nobr></th>
				<th class="actions" style="width: 80px"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($subCategories as $sub): ?>
				<tr>
					<td><?php echo $this->Html->link($sub['ProductCategory']['name'], array('action' => 'view', $sub['ProductCategory']['id'])); ?>&nbsp;</td>
					<td><span class="badge badge-info"><?php echo h($sub['ProductCategory']['product_count']); ?></span>&nbsp;<?php if ( $sub['ProductCategory']['product_count'] > 0 ) { echo $this->Html->link(__('Show'), array('controller' => 'products', 'action' => 'index', $sub['ProductCategory']['id'], 'admin' => true), array('class' => 'btn btn-small', 'icon' => 'read white')); } ?>&nbsp;</td>
					<td class="actions">
						<div class="btn-group">
							<?php echo $this->Html->link(null, array('action' => 'edit', $sub['ProductCategory']['id']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>
							<?php echo $this->Html->link(null, array('action' => 'add', $sub['ProductCategory']['id']), array('class' => 'btn btn-small', 'icon' => 'plus')); ?>
							<?php echo $this->Form->postLink(null, array('action' => 'delete', $sub['ProductCategory']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete, %s?', $sub['ProductCategory']['name'])); ?>
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
<?php endif; ?>
<br><br>

</div>
