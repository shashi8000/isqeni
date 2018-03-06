<link href='<?php echo base_url(); ?>sidemenu/css/style.css' rel='stylesheet'>
<script src="<?php echo base_url(); ?>sidemenu/js/index.js"></script>

<div class="container-fluid">
<div class="row-fluid">
<!-- left menu starts -->
<div class="span2 main-menu-span">
  <div class="well nav-collapse sidebar-nav">
    <ul id="accordion" class="nav nav-tabs nav-stacked main-menu accordion">
      <!--<li class="nav-header hidden-tablet">المنتجات</li>
                              <li><a class="ajax-link" href="<?php echo site_url("products/")?>"><i class="icon-globe"></i><span class="hidden-tablet"> <?php echo lang("Show")?></span></a></li>
                              <li><a class="ajax-link" href="<?php echo site_url("products/add")?>"><i class="icon-plus-sign"></i><span class="hidden-tablet"> <?php echo lang("Add")?></span></a></li>-->
                              
                              
      <?php /*?><li class="nav-header hidden-tablet"><?php echo lang("PurchaseordersandSales")?></li><?php */?>
      
      
      <li class="nav-header hidden-tablet <?php if($this->uri->segment(1) == "product" || $this->uri->segment(1) == "products.html" || $this->uri->segment(1) == "orders.html"){ echo "open";}  ?>">
<div class="link"><i class="fa fa-home"></i><?=lang("PurchaseordersandSales")?><i class="fa fa-chevron-down"></i></div> 

<ul class="submenu" <?php if($this->uri->segment(1) == "product" || $this->uri->segment(1) == "products.html" || $this->uri->segment(1) == "orders.html") { echo "style='display:block'"; }  ?>> 
 
      <li><a class="ajax-link" href="<?php echo site_url("orders/")?>"><i class="icon-globe"></i><span class="hidden-tablet"> <?php /*echo lang("Show")*/?> Orders</span></a></li>
      <li><a class="ajax-link" href="<?php echo site_url("products/")?>"><i class="icon-globe"></i><span class="hidden-tablet"> <?php echo lang("Products")?></span></a></li>
      <li><a class="ajax-link" href="<?php echo site_url("products/add")?>"><i class="icon-globe"></i><span class="hidden-tablet"> <?php echo lang("add_product")?></span></a></li>
    </ul>
    </li>
    
    <li class="nav-header hidden-tablet <?php if($this->uri->segment(1) == "driver" || $this->uri->segment(1) == "driver" || $this->uri->segment(1) == "conditions"){ echo "open";}  ?>">
<div class="link"><i class="fa fa-home"></i><?=lang("Driver")?>Driver <i class="fa fa-chevron-down"></i></div> 

<ul class="submenu" <?php if($this->uri->segment(1) == "driver" || $this->uri->segment(1) == "driver" || $this->uri->segment(1) == "conditions") { echo "style='display:block'"; }  ?>> 
 
      
      <li><a class="ajax-link" href="<?php echo site_url("driver/add")?>"><i class="icon-globe"></i><span class="hidden-tablet"> Add Driver</span></a></li>
      <li><a class="ajax-link" href="<?php echo site_url("driver/view_all")?>"><i class="icon-globe"></i><span class="hidden-tablet"> Driver List</span></a></li>
      
    </ul>
    </li>
    
    <li class="nav-header hidden-tablet <?php if($this->uri->segment(1) == "coupon"){ echo "open";}  ?>">
<div class="link"><i class="fa fa-home"></i><?=lang("Driver")?>Coupon <i class="fa fa-chevron-down"></i></div> 

<ul class="submenu" <?php if($this->uri->segment(1) == "coupon" || $this->uri->segment(1) == "coupon" || $this->uri->segment(1) == "conditions") { echo "style='display:block'"; }  ?>> 
 
      
      <li><a class="ajax-link" href="<?php echo site_url("coupon/add")?>"><i class="icon-globe"></i><span class="hidden-tablet">Add Coupon</span></a></li>
      
    </ul>
    </li>
    
    </ul>
  </div>
  <!--/.well --> 
</div>

<!--/span--> 
<!-- left menu ends -->
<noscript>
<div class="alert alert-block span10">
  <h4 class="alert-heading">Warning!</h4>
  <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
</div>
</noscript>
