<div class="hero-unit" style="position:relative; min-height: 0px;line-height: 10px;background-image: url(<?php echo Configure::read('MyApp.banner'); ?>); background-repeat: no-repeat; background-position: left top">

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse">
                <ul class="nav">
					<?php if (AuthComponent::user('id')) : ?>
						<?php if (!empty($user['Shop']['id'])) : ?>
							<li class="dropdown <?php echo $this->params->controller == 'shops' ? 'active' : ''; ?>">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									Manage
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li class="<?php echo $this->params->controller == 'system' && $this->action == 'manager_dashboard' ? 'active' : ''; ?>">
										<?php echo $this->Html->link(__('Dashboard'), array('controller' => 'system', 'action' => 'dashboard', 'manager' => true)) ?>
									</li>
									<li class="<?php echo $this->params->controller == 'products' ? 'active' : ''; ?>">
										<?php echo $this->Html->link(__('Items'), array('controller' => 'products', 'action' => 'index', 'manager' => true)) ?>
									</li>
									<li class="<?php echo $this->params->controller == 'enquiries' ? 'active' : ''; ?>">
										<?php echo $this->Html->link(__('Inquiries'), array('controller' => 'enquiries', 'action' => 'index', 'manager' => true)) ?>
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
									<a class="btn btn-info" href="<?php echo $this->webroot . 'manager/shops/register'; ?>"><i class="icon-shopping-cart icon-white"></i> <?php echo __('Sell'); ?></a>
                           <a href="#" class="btn btn-info btn-large"><i class="icon-white icon-star"></i> Free Trial - 1 Item / 1 MonthS</a>						
                           <a href="#" class="btn btn-primary btn-large"><i class="icon-white icon-star"></i> Basic - 1 Item / $1 / 1 Mo.</a>
                           <a href="#" class="btn btn-success btn-large"><i class="icon-white icon-star"></i> Basic Plus - 10 Items /  $10 / 10 Months.</a>
                           <a href="#" class="btn btn-warning btn-large"><i class="icon-white icon-star"></i> Premium - Unl Items /  $50 / Months.</a>
								</div>
							</li>
						<?php endif; ?>
					<?php endif; ?>

					<?php if (AuthComponent::user('role') == 'admin') : ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo __('Manage'); ?>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li class="<?php echo $this->params->controller == 'system' && $this->action == 'admin_dashboard' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Dashboard'), array('controller' => 'system', 'action' => 'dashboard', 'admin' => true)) ?>
								</li>
								<li class="<?php echo $this->params->controller == 'shops' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Sellers'), array('controller' => 'shops', 'action' => 'index', 'admin' => true)) ?>
								</li>
								<li class="<?php echo $this->params->controller == 'products' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Items'), array('controller' => 'products', 'action' => 'index', 'admin' => true)) ?>
								</li>
								<li class="<?php echo $this->params->controller == 'users' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index', 'admin' => true)) ?>
								</li>
								<li class="<?php echo $this->params->controller == 'product_categories' ? 'active' : ''; ?>">
									<?php echo $this->Html->link(__('Categories'), array('controller' => 'product_categories', 'action' => 'index', 'admin' => true)) ?>
								</li>
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
