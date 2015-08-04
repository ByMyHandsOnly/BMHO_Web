<div class="row-fluid">
    <div class="span12">
        <h3><?php echo __('All Users') ?></h3>
        <hr>
<!--        <div class="btn-group">
            <?php echo $this->Html->link(__('Add New User'), array('action' => 'add'), array('class' => 'btn btn-primary', 'icon' => 'plus white')); ?>
        </div>
        <br />-->
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th style="width: 150px"><?php echo $this->Paginator->sort('username', __('Username')); ?></th>
					<th style="width: 200px"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                    <th class="hidden-phone"><?php echo $this->Paginator->sort('role', __('Role')); ?></th>
					<th class="hidden-phone" style="width: 100px; text-align: center"><?php echo __('Got shop?'); ?></th>
                    <th class="actions" style="width: 80px"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $this->Html->link($user['User']['username'], '/admin/users/view/' . $user['User']['id']); ?></td>
                        <td><?php echo $user['User']['name'] ?></td>
						<td class="hidden-phone"><?php echo $user['User']['role'] ?></td>
						<td class="hidden-phone" style="text-align: center">
							<?php if (!empty($user['Shop']['id'])) : ?>
							<i class="icon-ok"></i>
							<?php endif; ?>
						</td>
                        <td class="actions">
                            <div class="btn-group">
                                <?php echo $this->Html->link(null, array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>
                                <?php echo $this->Form->postLink(null, array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', $user['User']['username'])); ?>
                                <?php
//                                echo $this->Html->link(
//                                        null, '#UsersModal', array(
//                                    'class' => 'btn btn-small btn-danger btn-remove-modal',
//                                    'icon' => 'trash white',
//                                    'data-toggle' => 'modal',
//                                    'role' => 'button',
//                                    'data-uid' => $user['User']['id'],
//                                    'data-uname' => $user['User']['username']
//                                ));
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
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
    </div>
</div>
<!--
<div class="modal hide" id="UsersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><?php echo __('Remove user') ?></h3>
    </div>
    <div class="modal-body">
        <p><?php echo __('Are you sure you want to delete the user ') ?><span class="label-uname strong"></span> ?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo __('Cancel') ?></button>
        <?php echo $this->Html->link(__('Delete'), '/admin/users/delete/0', array('class' => 'btn btn-danger delete-user-link')) ?>
    </div>
</div>-->