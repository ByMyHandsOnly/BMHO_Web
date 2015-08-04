<ul class="nav pull-right">
        <li><form id="FormSerach" method="get" action="<?php echo $this->webroot . 'products/search'; ?>" class="navbar-form" action="" style="text-align: right">
														<div class="btn-group input-append" style="display: block; margin-top: 10px; margin-right: 10px">
															<input type="text" id="ProductTerm" name="term" class="span4" placeholder="<?php echo __('Enter keyword'); ?>...">
															<button id="btnSubmit" type="submit" class="btn btn-info" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; border-top-left-radius: 0px; border-top-right-radius: 0px; padding: 5px 20px"><?php echo __('Search'); ?></button>
						</div>
					</form>
        </li>
	<li>
		<?php echo $this->Html->link(__('Home'), '/'); ?>
	</li>
	<li>
		<?php echo $this->Html->link(__('About'), '/about'); ?>
	</li>
	<li>
		<?php echo $this->Html->link(__('Contact'), '/contact'); ?>
	</li>

	<?php if (AuthComponent::user('id')) : ?>
		<li id="fat-menu" class="dropdown">
			<a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
				<!--<i class="icon-white icon-user"></i>-->
				<?php echo $this->Gravatar->image(AuthComponent::user('email'), array('size' => '25'), array('class' => 'img-rounded')); ?>
				<?php echo AuthComponent::user('username'); ?> <b class="caret"></b></a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
				<li>
					<?php
					echo $this->Html->link(
							'<i class="icon-white icon-user"></i> ' . __('Profile'), '/users/profile', array(
						'tabindex' => '-1',
						'escape' => false
							)
					)
					?>
				</li>
				<li>
					<?php
					echo $this->Html->link(
							'<i class="icon-white icon-envelope"></i> ' . __('Inquiries'), '/enquiries', array(
						'tabindex' => '-1',
						'escape' => false
							)
					)
					?>
				</li>
				<li class="divider"></li>
				<li>
					<?php
					echo $this->Html->link(
							'<i class="icon-white icon-off"></i> ' . __('Logout'), '/users/logout', array(
						'tabindex' => '-1',
						'escape' => false
							)
					)
					?>
				</li>
			</ul>
		</li>
	<?php else : ?>
		<li>
			<?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login', 'default')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Join Free!'), array('controller' => 'users', 'action' => 'register', 'default')); ?>
		</li>
	<?php endif; ?>
</ul>   

<?php $this->start('scriptBottom'); ?>
<script>
	$(document).ready(function () {
		$('#SettingLanguage').change(function () {
			$('#SettingChangeLanguageForm').submit();
		});
	});

</script>
<?php
$this->end();
