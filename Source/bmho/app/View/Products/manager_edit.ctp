<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link(__('Ads'), '/manager/products'),
		__('Edit Ad (Seller)'),
	));
	?>
</section>
<div class="products form">
	<?php echo $this->Form->create('Product', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Ad'); ?> <small><?php echo __('Edit (Seller)'); ?></small> <?php echo $this->Html->link('Manage Images', array('action' => 'view', $this->request->data['Product']['id']), array('class' => 'btn btn-small pull-right')); ?></legend>
		<?php
		echo $this->Form->input('shop_id', array(
			'label' => __('Shop'),
			'class' => 'input-xlarge',
			'style' => 'width: auto',
			'helpInline' => '',
		));
      echo $this->Form->input('id', array(
			'label' => __('Id'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
//			'helpBlock' => 'help block here.'
		));

		echo $this->Form->input('product_category_id', array(
			'label' => __('Category'),
			'class' => 'input-xlarge span2',
			'helpInline' => '',
		));

		echo $this->Form->input('name', array(
			'label' => __('Name'),
			'class' => 'input-xlarge span5',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
			'helpBlock' => __('Enter product name here.')
		));

		echo $this->Form->input('description', array(
			'label' => __('Description'),
//			'class' => 'span6',
//			'helpInline' => '<span class="label label-important">Required</span>&nbsp;',
//			'helpBlock' => 'Enter product description here.'
		));

		echo $this->Form->input('price', array(
			'label' => __('Price'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
			'helpBlock' => __('Enter sale price here.'),
			'prepend' => Configure::read('MyApp.currency'),
			'placeholder' => '0.00',
			'min' => '0',
			'step' => 'any',
		));

		echo $this->Form->input('price_discounted', array(
			'label' => __('Discounted Price'),
			'class' => 'input-xlarge span2',
			'helpInline' => '',
			'helpBlock' => __('Enter discounted price here (if any).'),
			'prepend' => Configure::read('MyApp.currency'),
			'placeholder' => '0.00',
			'min' => '0',
			'step' => 'any',
		));

		echo $this->Form->input('qty', array(
			'label' => __('Qty'),
			'class' => 'input-xlarge span1',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
			'helpBlock' => __('Enter available qty.')
		));

		$options = array(
			'Available' => 'Available',
			'Out of stock' => 'Out of stock',
			'Pre-order' => 'Pre-order',
		);

		echo $this->Form->input('status', array(
			'options' => $options,
			'label' => __('Status'),
			'class' => 'input-xlarge span2',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
			'helpBlock' => __('Select product status.')
		));
		?>

		<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-primary')); ?>    
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>

<?php $this->start('scriptBottom'); ?>
<script>

</script>

<script>
	$(document).ready(
			function()
			{
				$('#ProductDescription').redactor({
					buttons: ['html', '|', 'formatting', '|', 'bold', 'italic', 'deleted', '|',
						'unorderedlist', 'orderedlist', 'outdent', 'indent', '|',
						'table', 'link', '|',
						'fontcolor', 'backcolor', '|', 'alignment', '|', 'horizontalrule']
				});
//				$('#ProductDescription').redactor({
//					imageUpload: '/manager/pages/upload_image.json'
//				});
			}
	);
</script>

<?php $this->end(); ?>
