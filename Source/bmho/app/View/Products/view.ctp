<?php // debug($product);                                                                                         ?>
<?php $this->set('page_title', $product['Product']['name']); ?>
<?php $this->set('page_description', strip_tags($product['Product']['name'])); ?>
<?php $this->set('page_image', $product['Product']['image']); ?>
<?php $this->set('title_for_layout', $product['Product']['name']); ?>

<div class="row-fluid">
    <ul class="breadcrumb">
        <li>
            <a href="<?php echo Router::url('/', true); ?>"><?php echo __('Home'); ?></a> 
            <span class="divider">/</span>
        </li>
        <li>
            <a href="<?php echo Router::url('/', true); ?>products/index/<?php echo $product['ProductCategory']['slug']; ?>"><?php echo $product['ProductCategory']['name']; ?></a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
			<?php echo $product['Product']['name']; ?>
        </li>
    </ul>

    <div class="row-fluid">
        <h1><?php echo $product['Product']['name']; ?></h1>
        <hr>

        <div class="row-fluid">
            <div class="span8">

				<div class="hidden-phone">
					<a id="ProductMainImageLink" title="<?php echo $product['Product']['name']; ?>" href="<?php echo isset($product['ProductImage'][0]['image']) ? Router::url('/', true) . $product['ProductImage'][0]['image'] : 'http://placehold.it/300x300&text=No photo'; ?>">
						<img id="ProductMainImage" src="<?php echo isset($product['ProductImage'][0]['thumbnail']) ? Router::url('/', true) . $product['ProductImage'][0]['thumbnail'] : 'http://placehold.it/300x300&text=No photo'; ?>" alt="">
					</a>

					<br /><span style="font-size: 10px;"><?php echo __('Click to enlarge.'); ?></span><br /><br />
				</div>

				<?php if (count($product['ProductImage']) > 1) : ?>

					<ul class="thumbnails">
						<?php foreach ($product['ProductImage'] as $image) : ?>
							<li class="span3">
								<a class="thumbnail" href="#" img-url="<?php echo Router::url('/', true) . $image['image']; ?>" thumbnail-url="<?php echo Router::url('/', true) . $image['thumbnail']; ?>">
									<img style="" alt="" src="<?php echo Router::url('/', true) . $image['thumbnail']; ?>">
								</a>
							</li>
						<?php endforeach; ?>
					</ul>

					<?php
					$this->Js->get('.thumbnail')->event('click', '
                    $("#ProductMainImageLink").attr("href", $(this).attr("img-url")); 
                    $("#ProductMainImage").attr("src", $(this).attr("thumbnail-url")); 
                    ');
					?>

				<?php endif; ?>

				<div class="row-fluid">
					<?php echo $product['Product']['description']; ?>

					<br />
					<br />

					<div>
						<fb:comments href="<?php echo Router::url(null, true); ?>" width="470" num_posts="5"></fb:comments>
					</div>

				</div>
            </div>	 
            <div class="span4">
				<div class="row-fluid">
					<div class="well">
						<div>
							<?php // if (Configure::read('debug') == 0) : ?>
							<span class='st_sharethis_large' displayText='ShareThis'></span>
							<span class='st_facebook_large' displayText='Facebook'></span>
							<span class='st_googleplus_large' displayText='Google +'></span>
							<span class='st_twitter_large' displayText='Tweet'></span>
							<span class='st_pinterest_large' displayText='Pinterest'></span>
							<span class='st_email_large' displayText='Email'></span>
							<?php // endif; ?>
						</div>

						<br /><br />
						<div>
							<strong><?php echo __('Availability:'); ?></strong> <span><?php echo $product['Product']['status']; ?></span><br>
						</div>	
						<?php if (!empty($product['Product']['price_discounted'])) : ?>
							<div>
								<h2 style="display: inline">
									<strong>Price: <?php echo $this->Number->currency($product['Product']['price_discounted'], Configure::read('MyApp.currency')); ?></strong>
								</h2>
								<span class="price_normal"><?php echo $this->Number->currency($product['Product']['price'], Configure::read('MyApp.currency')); ?></span>
							</div>
						<?php else : ?>
							<div>
								<h2 style="display: inline">
									<strong>Price: <?php echo $this->Number->currency($product['Product']['price'], Configure::read('MyApp.currency')); ?></strong>
								</h2>
							</div>
						<?php endif; ?>
					</div>

					<div class="well">
						<?php echo __('By'); ?> <b><?php echo $product['Shop']['name']; ?></b>
						<br />
						<?php echo __('Joined about'); ?> <?php echo $this->Time->timeAgoInWords($product['Shop']['created']); ?>
						<br /><br />
						<p>
							<?php echo $product['Shop']['description']; ?>
						</p>
					</div>

					<!--<a data-toggle="modal" href="<?php echo $this->webroot . 'enquiries/add/' . $product['Shop']['id']; ?>" data-target="#modalContactSeller" style="margin: 0px 0px 20px 0px" class="btn btn-primary btn-large span12"><i class="icon-envelope icon-white"></i> Contact Seller</a>-->

					<!--<a class="open-dialog btn btn-primary btn-large span12" rel="sample2-dialog" href="<?php echo $this->webroot . 'enquiries/add/' . $product['Shop']['id']; ?>" style="margin: 0px 0px 20px 0px"><i class="icon-envelope icon-white"></i> Contact Seller</a>-->
					<a href="#" class="btn btn-primary btn-large span12" id="openBtn" style="margin: 0px 0px 20px 0px"><i class="icon-envelope icon-white"></i> <?php echo __('Contact Seller'); ?></a>

					<a target="_blank" href="<?php echo $product['Shop']['website']; ?>" style="margin: 0px 0px 20px 0px" class="btn btn-large span12"><i class="icon-globe icon-white"></i> <?php echo __('Visit Website'); ?></a>
				</div>

            </div>	
        </div>
    </div>
</div>

<?php $this->start('scriptBottom'); ?>
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" >
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3><?php echo __('Contact Seller'); ?></h3>
	</div>
	<div class="modal-body" style="">
		<div id="loadingIndicator" style="text-align: center">
			<img src="<?php echo $this->webroot . 'img/ajax-loader.gif'; ?>" style="border: none"/>
		</div>
		<iframe id="iframeContactSeller" width="99.6%" scrolling="no" allowtransparency="true" frameborder="0" style="display: none; overflow-y: hidden;">
		</iframe>
	</div>
	<!--	<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Close</button>
		</div>-->
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#iframeContactSeller').load(function () {
			$('#loadingIndicator').hide();
			$('#iframeContactSeller').show();


		});

		$("#ProductMainImageLink").colorbox({rel: 'group1'});

		var frameSrc = "<?php echo $this->webroot . 'enquiries/add/' . $product['Shop']['id'] . '/' . $product['Product']['id']; ?>";

		$('#openBtn').click(function () {
			$('#myModal').on('show', function () {
				$('#loadingIndicator').show();
				$('#iframeContactSeller').hide();
				$('#iframeContactSeller').attr("src", frameSrc);

			});
			$('#myModal').modal({show: true});
		});
	});
</script>

<script type="text/javascript">

	$('#iframeContactSeller').iFrameSizer({
		log: false, // For development
		contentWindowBodyMargin: 8, // Set the default browser body margin style (in px)
		doHeight: true, // Calculates dynamic height
		doWidth: false, // Calculates dynamic width
		interval: 32, // interval in ms to recalculate body height, 0 to disable refreshing
		enablePublicMethods: true, // Enable methods within iframe hosted page 
		autoResize: true // Trigering resize on events in iFrame
	});


</script>

<?php
$this->end();
