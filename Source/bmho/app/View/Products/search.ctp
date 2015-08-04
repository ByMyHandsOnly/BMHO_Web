<?php // debug($products);              ?>
<div class="row-fluid">
    <div class="page-header">
        <h1><?php echo __('Search Product(s)'); ?></h1>
    </div>
	<?php if (count($products) > 0) : ?>
		<?php echo $this->element('products'); ?>
	<?php else : ?>
		<?php echo __('No product(s) found.'); ?>
	<?php endif; ?>
</div>
<?php $this->start('scriptBottom'); ?>
<!-- Modal -->
<div id="modalAddCart" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel"><?php echo __('Item Added'); ?></h3>
	</div>
	<div class="modal-body">
		<p><?php echo __('The item successfully added to your shopping cart.'); ?></p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo __('Close'); ?></button>
		<a class="btn btn-primary" href="/carts" target="_self"><?php echo __('View your shopping cart'); ?></a>
	</div>
</div>

<script>
	$(document).ready(function() {
		// ajax: add item to shopping cart
		$(".callModal").bind("click", function(event) {
			$.ajax({async: true, dataType: "html", success: function(data, textStatus) {
					$("#totalorders").html(data);
				}, url: "\/carts\/add\/" + $(this).data("id")});

			// show modal
			$('#modalAddCart').modal('show');
			return false;
		});
	});
</script>
<?php $this->end(); ?>