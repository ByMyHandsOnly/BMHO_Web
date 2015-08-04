<h2><?php echo Configure::read('MyApp.name') ?></h2>

<p><?php echo __('For resetting your password, visit the link below:'); ?> <?php echo $this->Html->link(__('Register new password'), Router::url('/', true) . 'users/remember_password_step_2/' . $hash) ?></p>

<p><?php echo __('If you did not request a new password, please ignore this email.'); ?></p>