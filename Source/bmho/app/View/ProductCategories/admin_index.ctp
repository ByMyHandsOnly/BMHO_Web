<section id="breadcrumb">
<font color="#FFFFFF">
<?php 
      if (!isset($this->request->data['ProductCategory']['parent_id'])) {
   	   $breadcrumb = array(  __('Categories: '),
   	                         $this->Html->link(  __('All'), 
   	                                             array('controller' => 'product_categories', 'action' => 'index', '', 'admin' => 'true' ),
   	                                             array('class' => 'btn btn-warning btn-small') ));
         }
      else { 
    	   $breadcrumb = array(  __('Categories: '),
   	                         $this->Html->link(  __('All'), 
   	                                             array('controller' => 'product_categories', 'action' => 'index', '', 'admin' => 'true' ),
   	                                             array('class' => 'btn btn-small btn-warning') ),
   	                         __('/'),
                               $this->Html->link( __('Top'), array('controller' => 'product_categories','action' => 'index', null, 'admin' => 'true'), array('class' => 'btn btn-small btn-warning')), 
    	                         ( !isset( $this->request->data['ParentCategory']['parent_id'] ) ) ? __('/') : __(' ... '),
                               $this->Html->link( $productCategory['ParentCategory']['name'], array('controller' => 'product_categories','action' => 'index', $productCategory['ProductCategory']['parent_id'], 'admin' => 'true'), array('class' => 'btn btn-small btn-warning')),
                               $this->Html->link( $productCategory['ProductCategory']['name'], array('controller' => 'product_categories','action' => 'index', $productCategory['ProductCategory']['id'], 'admin' => 'true'), array('class' => 'btn btn-small btn-warning')) ); 
   	}
      echo $this->Html->breadcrumb( $breadcrumb );
?>
</font>
</section>
<div class="row-fluid">
   <div class="span12">
      <h3><?php echo __('Categories (Admin)'); ?></h3>
      <hr />
         <div>
            <div class="pull-right">
<?php 
               if (!isset($productCategory['ProductCategory']['parent_id']))
         		   echo $this->Form->input('ProductCategory.parent_id', array('label' => null, 'empty' => '-- [All] --', 'null' => '-- Top --', 'options'=>$parents) );
         	   else
         		   echo $this->Form->input('ProductCategory.parent_id', array('label' => null, 'empty' => '-- [All] --', 'null' => '-- Top --', 'options'=>$parents, 'selected' => $productCategory['ProductCategory']['parent_id'] ) );
?>
            </div>
<?php 
               if (!isset($this->request->data['ProductCategory']['parent_id']))
		            echo $this->Html->link(__('New Category'), array('action' => 'add', ''), array('class' => 'btn btn-primary', 'icon' => 'plus white'));
         	   else {
		            echo $this->Html->link(__('New Top-Category'), array('action' => 'add', null), array('class' => 'btn btn-primary', 'icon' => 'plus white'));
		            echo $this->Html->link(__('New Sub-Category'), array('action' => 'add', $productCategory['ProductCategory']['parent_id']), array('class' => 'btn btn-primary', 'icon' => 'plus white'));
		            }
?>
         </div>
        <br /><br />
		<?php if (count($productCategories) > 0) : ?>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th class="actions" style="width: 1px"><?php echo __('Move'); ?></th>
						<th style="width: 200px"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
						<th style="width: 200px"><?php echo $this->Paginator->sort('parent_id', __('Parent Category')); ?></th>
						<th style="width: 80px"><nobr><?php echo $this->Paginator->sort('product_count', __('Product Count')); ?></nobr></th>
						<th class="actions" style="width: 120px"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($productCategories as $productCategory): ?>
						<tr>
							<td>
							   <div class="btn-group">
							   	<?php echo $this->Html->link(null, array('action' => 'moveup', $productCategory['ProductCategory']['id']), array('class' => 'btn btn-small btn-success', 'icon' => 'arrow-up white')); ?>
									<?php echo $this->Html->link(null, array('action' => 'movedown', $productCategory['ProductCategory']['id']), array('class' => 'btn btn-small btn-success', 'icon' => 'arrow-down white')); ?>
								</div>
							</td>		
							<td>
							   <?php echo $this->Html->link($productCategory['ProductCategory']['name'], array('action' => 'index', $productCategory['ProductCategory']['id'])); ?>
							   &nbsp;
							</td>		
							<td><?php echo $this->Html->link($productCategory['ParentCategory']['name'], array('action' => 'view', $productCategory['ParentCategory']['id'])); ?>&nbsp;</td>		
							<td><span class="badge badge-info"><?php echo h($productCategory['ProductCategory']['product_count']); ?></span>&nbsp;
							   <?php if ( $productCategory['ProductCategory']['product_count'] > 0 ) { ?>
   								<div class="btn-group pull-right">
   						         <?php echo $this->Html->link(__('Products'), array('controller' => 'products', 'action' => 'index', $productCategory['ProductCategory']['id'], 'admin' => true), array('class' => 'btn btn-small', 'icon' => 'edit white')); ?>
   						      </div>   
							   <?php } ?>
							     &nbsp;</td>
							<td class="actions">
								<div class="btn-group pull-left">
							   	<?php echo $this->Html->link(null, array('action' => 'moveup', $productCategory['ProductCategory']['id']), array('class' => 'btn btn-small btn-success', 'icon' => 'arrow-up white')); ?>
									<?php echo $this->Html->link(null, array('action' => 'movedown', $productCategory['ProductCategory']['id']), array('class' => 'btn btn-small btn-success', 'icon' => 'arrow-down white')); ?>
								</div>
								<div class="btn-group pull-right">
									<?php echo $this->Html->link(null, array('action' => 'edit', $productCategory['ProductCategory']['id']), array('class' => 'btn btn-small btn-warning', 'icon' => 'pencil white')); ?>
									<?php echo $this->Html->link(__('Sub'), array('action' => 'add', $productCategory['ProductCategory']['id']), array('class' => 'btn btn-small btn-primary', 'icon' => 'plus white')); ?>
									<?php echo $this->Form->postLink(null, array('action' => 'delete', $productCategory['ProductCategory']['id']), array('class' => 'btn btn-small btn-danger', 'icon' => 'trash white'), __('Are you sure you want to delete, %s?', $productCategory['ProductCategory']['name'])); ?>
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
		<?php else : ?>
			<?php echo __('No record(s) found.'); ?>
		<?php endif; ?>
    </div>
</div>

<?php $this->start('scriptBottom'); ?>
<script>
	$('#ProductCategoryParentId').change(function() {
		window.location.href = '<?php echo Router::url('/', true); ?>admin/product_categories/index/' + $('#ProductCategoryParentId').val();
	});
</script>
<?php $this->end(); ?>
