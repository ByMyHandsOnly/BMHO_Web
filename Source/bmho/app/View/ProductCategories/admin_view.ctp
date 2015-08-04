<section id="breadcrumb">
	<?php echo $this->Html->breadcrumb(array($this->Html->link(__('Categories'), '/admin/productCategories'), __('View'),)); ?>
</section>
<?php $sub_cats = count($subCategories); ?>

<div class="productCategories form">
	<?php echo $this->Form->create('ProductCategory', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Category'); ?> <small> <?php echo __('View'); ?></small></legend>
		<?php
		echo $this->Form->input('id', array(
			'label' => __('Id'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
//			'helpBlock' => 'help block here.'
		));
		echo $this->Form->input('ProductCategory.parent_id', array(
			'label' => __('Parent Category'),
			'class' => 'input-xlarge span2',
			'helpInline' => '',
			'readonly' => true,
		));

		echo $this->Form->input('name', array(
			'label' => __('Name'),
			'class' => 'input-xlarge span4',
			'readonly' => true,
		));
		echo $this->Form->input('slug', array(
			'label' => __('Web Name'),
			'class' => 'input-xlarge span4',
			'readonly' => true,
		));
		?>
	</fieldset>
	<?php echo $this->Form->end(); ?>
	
<div class="productCategories view">
    <h3><?php echo __('View Category Details'); ?></h3>
    <hr />
    <dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productCategory['ProductCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent'); ?></dt>
		<dd>
		   <?php echo $this->Html->link($productCategory['ParentCategory']['name'], array('action' => 'view', $productCategory['ParentCategory']['id'])); ?>
		   &nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($productCategory['ProductCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Web Name'); ?></dt>
		<dd>
			<?php echo h($productCategory['ProductCategory']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Count'); ?></dt>
		<dd>
			<?php echo h($productCategory['ProductCategory']['product_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub-Cat Count'); ?></dt>
		<dd>
			<?php echo h($sub_cats); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub-Categories'); ?></dt>
		<dd>
         <?php if ($sub_cats > 0) : ?>
	         <table class="table table-bordered table-hover table-striped">
		         <thead>
			         <tr>
				         <th style="width: 200px"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
				         <th style="width: 20px"><nobr><?php echo $this->Paginator->sort('product_count', __('Product Count')); ?></nobr></th>
			         </tr>
		         </thead>
		         <tbody>
			         <?php foreach ($subCategories as $sub): ?>
				         <tr>
					         <td><?php echo $this->Html->link($sub['ProductCategory']['name'], array('action' => 'view', $sub['ProductCategory']['id'])); ?>&nbsp;</td>		
					         <td><span class="badge badge-info"><?php echo h($sub['ProductCategory']['product_count']); ?></span>&nbsp;</td>
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
 			&nbsp;
		</dd>
    </dl>
    

<br><br>
</div>
