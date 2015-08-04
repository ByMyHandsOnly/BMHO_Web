<div class="install form">
        <h2>Database configuration:</h2>
        <br />
        <?php echo $this->Form->create('Db') ?>
        <?php echo $this->Form->input('database', array('label' => 'Database name', 'default' => 'marketplace')) ?>
        <?php echo $this->Form->input('login', array('label' => 'Username', 'default' => 'root')) ?>
        <?php echo $this->Form->input('password', array('label' => 'Password')) ?>
        <?php echo $this->Form->input('host', array('label' => 'Host', 'default' => 'localhost')) ?>
        <?php echo $this->Form->end('Setup database') ?>
</div>