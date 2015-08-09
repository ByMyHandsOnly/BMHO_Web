<?php $this->set('title_for_layout', ''); ?>

<div class="row-fluid">

<table border=0 width="100%">
	<tr>
		<td valign="top'>
	      <?php if (count($productCategories) > 0) : ?>
		      <div class="well text-center">
			      <ul class="inline">
				      <?php foreach ($productCategories as $productCategory): ?>
					      <li >
						      <nobr>
						      <?php echo $this->Html->link($productCategory['ProductCategory']['name'], array('controller' => 'products', 'action' => 'index', $productCategory['ProductCategory']['slug'])); ?>
						      <span class="badge badge-info"><?php echo $productCategory['ProductCategory']['product_count']; ?></span>
						      </nobr>
					      </li>
				      <?php endforeach; ?>
			      </ul>
		      </div>
	      <?php else : ?>
		      <p>
			      <br />
			      <?php echo __('No Categories found.'); ?>
		      </p>
	      <?php endif; ?>
      </td>
      <td valign="top">
<!--
         <div class="hero-unit" style="position:relative; min-height: 115px;line-height: 10px;background-image: url('files/pottery-making-small.jpg'); background-repeat: no-repeat; background-position: left top">
        <img style="position: absolute; top: 0; right: 15px;" src="<?php echo $this->webroot . 'img/ribbon-free.jpg'; ?>"/>
-->		
        	   <div style="text-align: right">
			      <p><h3 style="display: inline-block"><?php echo __('Welcome to'); ?></h3> <h2 style="display: inline-block"><?php echo Configure::read('MyApp.website_title'); ?></h2></p><br><br><br>
			      <p ><?php echo Configure::read('MyApp.website_desc'); ?></p>
            </div>
          </div>
		</td>
	<tr>
</table>
</div>


<?php echo $this->element('products'); ?>
