<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo Configure::read('Application.name') ?> - <?php echo!empty($title_for_layout) ? $title_for_layout : ''; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-Equiv="Cache-Control" Content="no-cache">
		<meta http-Equiv="Pragma" Content="no-cache">
		<meta http-Equiv="Expires" Content="0">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>

		<?php echo $this->Html->css('normalize.css') ?>
		<?php echo $this->Html->css('bootstrap-' . Configure::read('Layout.theme') . '.min', null, array('data-extra' => 'theme')) ?>
		<?php echo $this->Html->css('bootstrap-responsive.min') ?>
		<?php echo $this->Html->css('colorbox') ?>
		<?php echo $this->Html->css('style') ?>



		<?php echo $this->Html->script('lib/modernizr') ?>

		<?php echo $this->fetch('scriptTop'); ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
            <![endif]-->

        <div class="container" role="main" id="main">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->Session->flash('auth'); ?>

            <div id="content">
				<?php echo $this->fetch('content'); ?>
            </div>

        </div> <!-- /container -->

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>-->
		<?php echo $this->Html->script('lib/jquery'); ?>
        <script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>

		<?php
		echo $this->Html->script(
				array(
					'lib/bootstrap.min',
					'lib/jquery.colorbox',
					'lib/iframeResizer.contentWindow.min',
					'src/scripts.js',
		));
		?>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<!--                      <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
          g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
          s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>-->

		<?php echo $this->fetch('scriptBottom'); ?>
		
		<?php echo $this->Js->writeBuffer(); ?>
    </body>
</html>