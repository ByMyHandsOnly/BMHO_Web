<?php $this->set('title_for_layout', __('Admin Dashboard')); ?>

<div class="row-fluid">

    <div class="span12">
		<?php // echo $this->Session->flash() ?>

        <h3><?php echo __('Dashboard'); ?></h3>
        <hr />

        <div class="well summary">
            <ul>
                <li>
                    <a href="<?php echo $this->webroot; ?>admin/shops"><span class="count"><?php echo $count_shops; ?></span> <?php echo __('Total shops'); ?></a>
                </li>
                <li>
                    <a href="<?php echo $this->webroot; ?>admin/users"><span class="count"><?php echo $count_users; ?></span></span> <?php echo __('Total users'); ?></a>
                </li>
				<li>
                    <a href="<?php echo $this->webroot; ?>admin/products"><span class="count"><?php echo $count_products; ?></span></span> <?php echo __('Total products'); ?></a>
                </li>
				<li>
                    <a href="#"><span class="count"><?php echo $count_enquiries; ?></span></span> <?php echo __('Total enquiries'); ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>