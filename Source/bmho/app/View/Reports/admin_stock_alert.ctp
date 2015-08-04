<?php // debug($invs); ?>
<div class="row-fluid">
    <div class="span12">
        <h3><?php echo __('Stock Alert Report'); ?></h3>
        <hr />
        <?php if (count($invs) > 0) : ?>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Stock Available</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invs as $inv) : ?>
                    <tr>
                        <td><?php echo $inv['Item']['name']; ?></td>
                        <td><?php echo $inv['Inventory']['stock_balance']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        All items meet minimum stock availability.
        <?php endif; ?>
    </div>
</div>