<div class="row-fluid">
    <div class="span12">
        <h3><?php echo __('All Images');?></h3>
        <hr />
        <div class="btn-group">
            <?php echo $this->Html->link(__('Add New Image'), array('action' => 'add'), array('class' => 'btn btn-primary', 'icon' => 'plus white')); ?>        </div>
        <br />
        <?php if (count($images) > 0) : ?>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                                                                        <th style="width: 30px"><?php echo $this->Paginator->sort('id');?></th>
                                                                                                <th><?php echo $this->Paginator->sort('product_id');?></th>
                                                                                                <th><?php echo $this->Paginator->sort('filename');?></th>
                                                                <th class="actions" style="width: 80px"><?php echo __('Actions');?></th>
                </tr>
            </thead>
            <tbody>
                <?php
	foreach ($images as $image): ?>
	<tr>
		<td><?php echo h($image['Image']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($image['Product']['name'], array('controller' => 'products', 'action' => 'view', $image['Product']['id'])); ?>
		</td>
		<td><?php echo h($image['Image']['filename']); ?>&nbsp;</td>
		<td class="actions">
				<div class="btn-group">
					<?php echo $this->Html->link(null, array('action' => 'edit', $image['Image']['id']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>
					<?php echo $this->Form->postLink(null, array('action' => 'delete', $image['Image']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?>
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
        	No record(s) found.
        <?php endif; ?>
    </div>
</div>