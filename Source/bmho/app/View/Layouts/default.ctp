<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo!empty($title_for_layout) ? $title_for_layout . ' | ' : ''; ?><?php echo Configure::read('MyApp.website_title') ?></title>
        <meta name="description" content="<?php echo!empty($page_description) ? $page_description : Configure::read('MyApp.website_desc') ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--
      <script type="text/javascript">var switchTo5x=true;</script>
      <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
      <script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
-->
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
		<?php $home    = Router::url('/', true) ;?> 
		<?php $terms   = $home . 'terms'  ;?>
		<?php $about   = $home . 'about'  ;?>
		<?php $contact = $home . 'contact';?>
		<?php $privacy = $home . 'privacy';?>

		<?php echo $this->Html->css('normalize.css') ?>
		<?php echo $this->Html->css('bootstrap-' . Configure::read('Layout.theme') . '.min', null, array('data-extra' => 'theme')) ?>
		<?php echo $this->Html->css('bootstrap-responsive.min') ?>
		<?php echo $this->Html->css('bootstrap-modal') ?>
		<?php echo $this->Html->css('colorbox') ?>
		<?php echo $this->Html->css('redactor') ?>
		<?php echo $this->Html->css('style') ?>

		<?php echo $this->Html->script('lib/modernizr') ?>

		<?php echo $this->fetch('scriptTop'); ?>

		<script type="text/javascript">var switchTo5x = true;</script>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
            <![endif]-->

		<?php echo $this->element('navbar'); ?>

        <div class="container" role="main" id="main">

			<?php echo $this->Session->flash(); ?>

            <div id="content">
				<?php echo $this->fetch('content'); ?>
            </div>

            <hr>
<div class="container">
	<div class="pull-right" >
         <a href="#" class="btn btn-primary btn-small"><i class="icon-white icon-shopping-cart"></i> Basic $1/month </a>
         <a href="#" class="btn btn-warning btn-small"><i class="icon-white icon-plus"></i> Basic Plus $5/month</a>
         <a href="#" class="btn btn-success btn-small"><i class="icon-white icon-star"></i> Premium $10/month </a>
   </div>
</div>
            <hr>
            <footer>
<!--
	   <a class="btn btn-info" href="<?php echo $this->webroot . 'manager/shops/register'; ?>"><i class="icon-shopping-cart icon-white"></i> <?php echo __('Sell'); ?></a>
-->								
                <p><a href="<?php echo $home ?>"><u>Home</u></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $about ?>"><u>About</u></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $contact ?>"><u>Contact</u></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $terms ?>"><u>Terms of Use</u></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $privacy ?>"><u>Privacy Policy</u></a><br><font size="-1">Website Design, Content, Text, Art &copy; 2015, <b><?php echo Configure::read('MyApp.website_title') ?></b>, LLC. Product Images &copy; Respective Owners</font></p>
            </footer>

        </div> <!-- /container -->

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>-->
		<?php echo $this->Html->script('lib/jquery'); ?>
        <script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>

		<?php
		echo $this->Html->script(
				array(
					'lib/bootstrap.min',
					'lib/jquery.colorbox',
					'lib/jquery.iframeResizer.min',
					'lib/jquery.scrollTo.min',
					'lib/redactor.min',
					'src/scripts.js',
					'bootstrap-modalmanager',
					'bootstrap-modal'
		));
		?>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<!--                      <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
          g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
          s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>-->
<!--
      <script type="text/javascript">stLight.options({publisher: "e2375b2a-b9b5-4c58-af7f-c85cfb1e192e", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
      <script>
      var options={ "publisher": "e2375b2a-b9b5-4c58-af7f-c85cfb1e192e", "position": "right", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
      var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
      </script>
-->
		<?php echo $this->fetch('scriptBottom'); ?>

		<?php echo $this->Js->writeBuffer(); ?>
    </body>
</html>
