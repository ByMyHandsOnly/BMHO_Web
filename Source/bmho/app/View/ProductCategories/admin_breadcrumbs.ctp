<section id="breadcrumb">
<?php 
      if (empty($this->request->data['Product']['product_category.id'])) {
   	   $breadcrumb = array(  $this->Html->link(  __('Items'), 
   	                                             array('controller' => 'products', 'action' => 'index', '', 'admin' => 'true' ),
   	                                             array('class' => 'btn btn-warning btn-small', 'icon' => 'info white') ));
         }
      else { 
         if ( $this->request->data['Product']['product_category_id'] == 'e0caa174-2dfe-11e5-a7f8-7ce9d36ef50d' ) {          
    	   $breadcrumb = array(  $this->Html->link(  __('Items'), 
    	                                             array('controller' => 'products', 'action' => 'index', 'e0caa174-2dfe-11e5-a7f8-7ce9d36ef50d', 'admin' => 'true' ), 
    	                                             array('class' => 'btn btn-warning btn-small', 'icon' => 'info white'),
                               $this->Html->link( $this->request->data['ProductCategory']['name'], 
                                                   array('controller' => 'products', 'action' => 'index', $this->request->data['Product']['product_category_id'], 'admin' => 'true' ), 
                                                   array('class' => 'btn btn-warning btn-small', 'icon' => 'info white') ) ); 
            }
      	else {
    	   $breadcrumb = array(  $this->Html->link( __('Items'), array('controller' => 'products','action' => 'index', '', 'admin' => 'true' ), array('class' => 'btn btn-warning btn-small', 'icon' => 'info')),
    	                           __(' ... '),
                               $this->Html->link( $this->request->data['ProductCategory']['name'], array('action' => 'index', $this->request->data['ProductCategory']['id']), array('class' => 'btn btn-warning btn-small', 'icon' => 'checkbox') )); 
      	}
   	}
      echo $this->Html->breadcrumb( $breadcrumb );
?>
</section>

