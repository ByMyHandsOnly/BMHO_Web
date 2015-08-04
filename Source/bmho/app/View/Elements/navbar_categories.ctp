<div class="row-fluid">
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</a>
				<div class="nav-collapse collapse navbar-responsive-collapse">
              <ul class="nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('CATEGORIES'); ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php foreach ($productCategories as $productCategory) : ?>
									<li><a href="<?php echo $this->webroot . 'products/index/' . $productCategory['ProductCategory']['slug']; ?>"><?php echo $productCategory['ProductCategory']['name']; ?> <span class="badge badge-info"><?php echo $productCategory['ProductCategory']['product_count']; ?></span></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
					</ul>

					<ul class="nav pull-right span6">
						<form id="FormSearch" method="get" action="<?php echo $this->webroot . 'products/search'; ?>" class="navbar-form pull-right span12" action="" style="text-align: right">
							<div class="input-append" style="display: block; margin-top: 10px; margin-right: 10px">
								<input type="text" id="ProductTerm" name="term" class="span9" placeholder="<?php echo __('Enter keyword'); ?>...">
								<button id="btnSubmit" type="submit" class="btn" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; padding: 5px 20px"><?php echo __('Search'); ?></button>
							</div>
						</form>
						<?php // echo $this->Form->create('Product', array('controller' => 'products', 'action' => 'search'), array('navbar-search pull-right')); ?>
						<?php // echo $this->Form->input('search', array('label' => false, 'class' => 'span6', 'div' => false)); ?>
						<?php // echo $this->Form->submit('Go', array('class' => 'btn', 'div' => false)); ?>
						<?php // echo $this->Form->end(); ?>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div>
</div>
