<section id="breadcrumb">
	<?php
	echo $this->Html->breadcrumb(array(
		$this->Html->link('View product', '/manager/products/view/' . $product_id),
		'Add image',
	));
	?>
</section>
<div class="images form">
	<?php echo $this->Form->create('ProductImage', array('class' => 'form-horizontal', 'type' => 'file')); ?>
    <fieldset>
        <legend>Image <small>Add image</small></legend>
		<?php
		echo $this->Form->input('ProductImage.0.image', array(
			'label' => 'Image',
			'class' => 'input-xlarge',
			'helpInline' => '<span class="label label-important">Required</span>&nbsp;',
			'helpBlock' => 'Browse and select your product\'s image. Max file size is 5mb.<br /><br /><div id="panelImages"></div><a id="addImage">Click here to add more images</a>.',
			'type' => 'file',
			'style' => 'width: auto'
		));
		
		?>
		<?php echo $this->Form->submit('Add', array('class' => 'btn btn-primary')); ?>    </fieldset>
		<?php echo $this->Form->end(); ?>
</div>

<?php $this->start('scriptBottom'); ?>
<script>
	$(document).ready(function() {

		$("#addImage").on("click", function() {

			var counter = 1

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