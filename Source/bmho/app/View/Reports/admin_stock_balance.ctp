<?php // debug($items); ?>
<div class="row-fluid">
    <div class="span12">
        <h3><?php echo __('Stock Balance Report'); ?></h3>
        <hr />
        <?php if (count($items) > 0) : ?>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Stock Available</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) : ?>
                        <tr>
                            <td><?php echo $item['Item']['name']; ?></td>
                            <td><?php echo $item['Item']['stock_available']; ?></td>
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
        <?php else: ?>
            No item(s) found.
        <?php endif; ?>
    </div>
</div>