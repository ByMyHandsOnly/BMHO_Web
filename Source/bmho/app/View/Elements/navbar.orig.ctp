<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
			<?php echo $this->Html->link(Configure::read('MyApp.website_title'), "/", array('class' => 'brand')) ?>
            <div class="nav-collapse">
                <ul class="nav">
					<?php if (AuthComponent::user('id')) : ?>
						<?php if (!empty($user['Shop']['id'])) : ?>
							<li class="dropdown <?php echo $this->params->controller == 'shops' ? 'active' : ''; ?>">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									My Shop
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li class="<?php echo $this->params->controller == 'system' && $this->action == 'manager_dashboard' ? 'active' : ''; ?>">
										<?php echo $this->Html->link(__('Dashboard'), array('controller' => 'system', 'action' => 'dashboard', 'manager' => true)) ?>
									</li>
									<li class="<?php echo $this->params->controller == 'products' ? 'active' : ''; ?>">
										<?php echo $this->Html->link(__('Products'), array('controller' => 'products', 'action' => 'index', 'manager' => true)) ?>
									</li>
									<li class="<?php echo $this->params->controller == 'enquiries' ? 'active' : ''; ?>">
										<?php echo $this->Html->link(__('Enquiries'), array('controller' => 'enquiries', 'action' => 'index', 'manager' => true)) ?>
									</li>
									<li class="divider"></li>
									<li class="<?php echo $this->params->controller == 'settings' && $this->action != 'home' ? 'active' : ''; ?>">
										<?php echo $this->Html->link(__('Settings'), array('controller' => 'shops', 'action' => 'edit', 'manager' => true)); ?>
									</li>
								</ul>
							</li>
						<?php else : ?>
							<li>
								<div class="btn-group">
									<a class="btn btn-info" href="<?php echo $this->webroot . 'manager/shops/register'; ?>"><i class="icon-shopping-cart icon-white"></i> <?php echo __('Setup a Shop'); ?></a>
								</div>
							</li>
						<?php endif; ?>
					<?php endif; ?>

					<?php if (AuthComponent::user('role') == 'admin') : ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo __('Admin'); ?>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li class="<?php echo $this->params->controller == 'system' && $this->action == 'admin_dashboard' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Dashboard'), array('controller' => 'system', 'action' => 'dashboard', 'admin' => true)) ?>
								</li>
								<li class="<?php echo $this->params->controller == 'shops' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Shops'), array('controller' => 'shops', 'action' => 'index', 'admin' => true)) ?>
								</li>
								<li class="<?php echo $this->params->controller == 'products' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Products'), array('controller' => 'products', 'action' => 'index', 'admin' => true)) ?>
								</li>
								<li class="<?php echo $this->params->controller == 'users' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index', 'admin' => true)) ?>
								</li>
								<li class="<?php echo $this->params->controller == 'product_categories' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Product\'s Categories'), array('controller' => 'product_categories', 'action' => 'index', 'admin' => true)) ?>
								</li>
<!--								<li class="<?php echo $this->params->controller == 'shop_categories' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Shop\'s Categories'), array('controller' => 'shop_categories', 'action' => 'index', 'admin' => true)) ?>
								</li>-->
								<li class="divider"></li>
								<li class="<?php echo $this->params->controller == 'settings' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Settings'), array('controller' => 'settings', 'action' => 'edit', 'admin' => true)); ?>
								</li>
							</ul>
						</li>
					<?php endif; ?>
                </ul>

				<div id="menuUser">
					<?php echo $this->element('navbar_user'); ?>  
				</div>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<?php $this->start('scriptBottom'); ?>
<script>
//	$(document).ready(function() {
	function reloadUserMenu() {
		$.ajax({
			url: "<?php echo $this->webroot . 'users/status'; ?>",
			cache: false
		}).done(function(html) {
			$('#menuUser').html(html);
		});
	}
//	});

	window.reloadUserStatus = function() {
		$.ajax({
			url: "<?php echo $this->webroot . 'users/status'; ?>",
			cache: false
		}).done(function(html) {
			$('#menuUser').html(html);
		});
	};
</script>
<?php
$this->end();
