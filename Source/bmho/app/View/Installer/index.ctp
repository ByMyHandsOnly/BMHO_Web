<div class="install index">
    <h2><?php echo $title_for_layout; ?></h2>
    <?php
        $check = true;

        // tmp is writable
        if (is_writable(TMP)) {
            echo '<p class="success">' . __('Your tmp directory is writable.', true) . '</p>';
        } else {
            $check = false;
            echo '<p class="error">' . __('Your tmp directory is NOT writable.', true) . '</p>';
        }

        // config is writable
        if (is_writable(APP.'Config')) {
            echo '<p class="success">' . __('Your config directory is writable.', true) . '</p>';
        } else {
            $check = false;
            echo '<p class="error">' . __('Your config directory is NOT writable.', true) . '</p>';
        }

        // php version
        if (version_compare(PHP_VERSION, '5.2.8', '>=')) {
            echo '<p class="success">' . sprintf(__('Your version of PHP is 5.2.8 or higher.', true), phpversion()) . '</p>';
        } else {
            $check = false;
            echo '<p class="error">' . sprintf(__('Your version of PHP is too low. You need PHP 5.2.8 or higher to use this system.', true), phpversion()) . '</p>';
        }

        if ($check) {
            echo '<p>' . $this->Html->link('Click here to begin installation', array('action' => 'database')) . '</p>';
        } else {
            echo '<p>' . __('Installation cannot continue as minimum requirements are not met.', true) . '</p>';
        }
    ?>
</div>