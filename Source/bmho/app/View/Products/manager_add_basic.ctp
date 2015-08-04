<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link(__('Items'), '/manager/products'),
		__('Sell Item [Seller]'),
	));
	?>
</section>
<div class="products form">
	<?php echo $this->Form->create('Product', array('class' => 'form-horizontal', 'type' => 'file')); ?>
    <fieldset>
        <legend><?php echo __('Sell Item - Basic'); ?> <small><?php echo __('[Seller]'); ?></small>        <hr />
</legend>
		<?php
		echo $this->Form->input('product_category_id', array(
			'label' => __('Categories'),
			'class' => 'input-xlarge',
			'style' => 'width: auto',
			'helpInline' => '',
			'helpBlock' => __('Check All That Apply.')
		));

		echo $this->Form->input('name', array(
			'label' => __('Name'),
			'class' => 'input-xlarge span5',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
			'helpBlock' => __('Enter Item Name here.')
		));

		echo $this->Form->input('description', array(
			'label' => __('Description'),
		));

		echo $this->Form->input('ProductImage.0.image', array(
			'label' => __('Image'),
			'class' => 'input-xlarge',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
			'helpBlock' => __('Browse and select item image.') . ' ' . __('Max file size is 5mb.') . '<br /><br /><div id="panelImages"></div><a id="addImage" class="btn btn-small btn-warning" icon="cart white">' . __('Upgrade') . '</a> to add more images.',
			'type' => 'file',
			'style' => 'width: auto'
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

//		echo $this->Form->input('price_discounted', array(
//			'label' => __('Discounted Price'),
//			'class' => 'input-xlarge span2',
//			'helpInline' => '',
//			'helpBlock' => __('Enter discounted price here (if any).'),
//			'prepend' => Configure::read('MyApp.currency'),
//			'placeholder' => '0.00',
//			'min' => '0',
//			'step' => 'any',
//		));

//		echo $this->Form->input('qty', array(
//			'label' => __('Qty'),
//			'class' => 'input-xlarge span1',
//			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
//			'helpBlock' => __('Enter available qty.'),
//			'default' => '1',
//		));

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
			'helpBlock' => __('Select item status.')
		));
		?>
		<?php echo $this->Form->submit(__('Save Item'), array('class' => 'btn btn-primary')); ?>    
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>

<?php $this->start('scriptBottom'); ?>
<script>
	$(document).ready(function() {
		$('#ProductDescription').redactor({
			buttons: ['html', '|', 'formatting', '|', 'bold', 'italic', 'deleted', '|',
				'unorderedlist', 'orderedlist', 'outdent', 'indent', '|',
				'table', 'link', '|',
				'fontcolor', 'backcolor', '|', 'alignment', '|', 'horizontalrule']
		});
//				$('#ProductDescription').redactor({
//					imageUpload: '/manager/pages/upload_image.json'
//				});

		$("#addImage").on("click", function() {

			var counter = 1;

			var cols = "";

			var inputName = 'data[ProductImage][' + counter + '][image]';

			while ($("input[name='" + inputName + "']").length > 0) {
				counter++;
				inputName = 'data[ProductImage][' + counter + '][image]';
			}

			cols += '<div class="file-inputs">';
			cols += '<input type="file" id="ProductImage' + counter + 'Image" style="width: auto" class="input-xlarge" name="data[ProductImage][' + counter + '][image]">';
			cols += '<a class="btn btn-small btn-danger"><i class="icon-trash icon-white"></i></a>';
			cols += '<br /><br /></div>';

			$('#panelImages').append(cols);
		});

		$("#panelImages").on("click", ".btn-danger", function(event) {
			$(this).closest("div.file-inputs").remove();
		});

	});
</script>

<?php $this->end(); ?>
