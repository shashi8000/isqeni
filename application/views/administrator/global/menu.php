<link href='<?php echo base_url(); ?>sidemenu/css/style.css' rel='stylesheet'>
<script src="<?php echo base_url(); ?>sidemenu/js/index.js"></script>

<div class="container-fluid">
<div class="row-fluid">
<!-- left menu starts -->
<div class="span2 main-menu-span">
  <div class="well nav-collapse sidebar-nav">
    <ul id="accordion" class="nav nav-tabs nav-stacked main-menu accordion">

      <li class="nav-header hidden-tablet dashboard-menu">
        <div class="link"> <a href="<?php echo site_url("administrator/dashboard")?>"><i class="fa fa-dashboard"></i><?=lang("Dashboard");?></a></div></li>


    <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "complaints" || $this->uri->segment(2) == "home" || $this->uri->segment(2) == "about" || $this->uri->segment(2) == "conditions"){ echo "open";}  ?>">
<div class="link"><i class="fa fa-home"></i><?=lang("Home")?><i class="fa fa-chevron-down"></i></div>       
<ul class="submenu" <?php if($this->uri->segment(2) == "complaints" || $this->uri->segment(2) == "home" || $this->uri->segment(2) == "about" || $this->uri->segment(2) == "conditions") { echo "style='display:block'"; }  ?>>      <li><a class="ajax-link" href="<?php echo site_url("administrator/home")?>"><i class="icon-home"></i><span class="hidden-tablet"> <?php echo lang("Messages")?> <span style="color: yellow; font-size: 13px; font-weight: bold;">( <?php echo $this->data->countTable("contact",array("read"=>"0"));?> )</span></span></a></li>

 <li><a class="ajax-link" href="<?php echo site_url("administrator/complaints")?>">
    <i class="icon-home"></i><span class="hidden-tablet"> <?php echo lang("Complaints")?> 
      <span style="color: yellow; font-size: 13px; font-weight: bold;"></span></span></a></li>

      
        <?php if (in_array("1",$this->session->userdata('permi')) || in_array("3",$this->session->userdata('permi'))) { ?>
      <li><a class="ajax-link" href="<?php echo site_url("administrator/about")?>"><i class="icon-home"></i><span class="hidden-tablet">
        <?=lang("AboutApp")?>
        </span></a></li>
      <li><a class="ajax-link" href="<?php echo site_url("administrator/conditions")?>"><i class="icon-home"></i><span class="hidden-tablet">
        <?=lang("Termsandconditions")?>
              </span></a></li></ul>
      <?php } ?>
      </li>
      <?php if (in_array("1",$this->session->userdata('permi')) || in_array("2",$this->session->userdata('permi'))) { ?>

        <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "settings" || $this->uri->segment(3) == "noti" || $this->uri->segment(3)=="delaynoti") { echo "open"; }  ?>">
      <div class="link"><i class="fa fa-cogs"></i><?=lang("Settings")?><i class="fa fa-chevron-down"></i></div>       
      <ul class="submenu" <?php if($this->uri->segment(2) == "settings" || $this->uri->segment(3) == "noti" || $this->uri->segment(3) == "delaynoti") { echo "style='display:block'"; }  ?>>  
            <li><a class="ajax-link" href="<?php echo site_url("administrator/settings/")?>"><i class="icon-wrench"></i><span class="hidden-tablet">
        <?=lang("GeneralSetting")?>
        </span></a></li>
      <li><a class="ajax-link" href="<?php echo site_url("administrator/settings/noti/")?>"><i class="icon-wrench"></i><span class="hidden-tablet">
        <?=lang("SendNotify")?>
              </span></a></li>

<li><a class="ajax-link" href="<?php echo site_url("administrator/settings/delaynoti/")?>"><i class="icon-wrench"></i><span class="hidden-tablet">
       <?php echo lang('DelayNotificationDriver');?>
              </span></a></li>

            </ul>
      <?php } ?>
      </li>

       <?php if (in_array("1",$this->session->userdata('permi')) || in_array("4",$this->session->userdata('permi'))) { ?>

           <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "cats" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "cats")) { echo "open"; }  ?>">
          <div class="link"><i class="fa fa-building"></i><?=lang("Companies")?><i class="fa fa-chevron-down"></i></div>
        <ul class="submenu" <?php if($this->uri->segment(2) == "cats" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "cats")) { echo "style='display:block'"; }  ?>> <li><a class="ajax-link" href="<?php echo site_url("administrator/cats/")?>"><i class="icon-globe"></i><span class="hidden-tablet"> <?php echo lang("Show")?></span></a></li>
          <li><a class="ajax-link" href="<?php echo site_url("administrator/cats/add")?>"><i class="icon-plus-sign"></i><span class="hidden-tablet"> <?php echo lang("Add")?></span></a></li></ul>
      </li>

      <li class="nav-header hidden-tablet <?php if($this->uri->segment(1) == "driver" || $this->uri->segment(1) == "driver" || $this->uri->segment(1) == "conditions"){ echo "open";}  ?>">
      <div class="link"><i class="fa fa-car"></i><?=lang("Driver")?><i class="fa fa-chevron-down"></i></div>
      <ul class="submenu" <?php if($this->uri->segment(2) == "driver" || $this->uri->segment(1) == "driver" || $this->uri->segment(1) == "conditions") { echo "style='display:block'"; }  ?>>
      <li><a class="ajax-link" href="<?php echo site_url("administrator/driver/view_all")?>"><i class="icon-globe"></i><span class="hidden-tablet"><?=lang("Driver_List")?> </span></a></li>
      <li><a class="ajax-link" href="<?php echo site_url("administrator/driver/add")?>"><i class="icon-globe"></i><span class="hidden-tablet"><?=lang("add_driver")?> </span></a></li>
      </ul>
      </li>


       <li class="nav-header hidden-tablet <?php if($this->uri->segment(1) == "orders" || $this->uri->segment(1) == "orders" || $this->uri->segment(1) == "conditions" || $this->uri->segment(3) == "invoice"){ echo "open";}  ?>">
           <div class="link"><i class="fa fa-shopping-cart"></i><?=lang("Orders")?><i class="fa fa-chevron-down"></i></div>
           <ul class="submenu" <?php if($this->uri->segment(2) == "orders" || $this->uri->segment(1) == "orders" || $this->uri->segment(1) == "conditions") { echo "style='display:block'"; }  ?>>
               <li><a class="ajax-link" href="<?php echo site_url("administrator/orders/index")?>"><i class="icon-globe"></i><span class="hidden-tablet"><?=lang("Orders_List")?></span></a></li>
               <li><a class="ajax-link" href="<?php echo site_url("administrator/orders/invoice")?>"><i class="icon-globe"></i><span class="hidden-tablet"><?=lang("ORDER_INVOICE")?></span></a></li>
           </ul>
       </li>

 



      <?php } ?>










      <?php if (in_array("1",$this->session->userdata('permi')) || in_array("5",$this->session->userdata('permi'))) { ?>

          <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "products" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "products")) { echo "open"; }  ?>">
<div class="link"><i class="fa fa-paint-brush"></i><?=lang("Products")?><i class="fa fa-chevron-down"></i></div>   
     <ul class="submenu" <?php if($this->uri->segment(2) == "products" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "products")) { echo "style='display:block'"; }  ?>><li><a class="ajax-link" href="<?php echo site_url("administrator/products/")?>"><i class="icon-globe"></i><span class="hidden-tablet"> <?php echo lang("Products_list")?></span></a></li>
   <li><a class="ajax-link" href="<?php echo site_url("administrator/products/add")?>"><i class="icon-plus-sign"></i><span class="hidden-tablet"> <?php echo lang("add_product")?></span></a></li></ul>
      </li>

      <?php } ?>



      <?php if (in_array("1",$this->session->userdata('permi')) || in_array("6",$this->session->userdata('permi'))) { ?>
      <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "clients" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "clients")) { echo "open"; }  ?>">
<div class="link"><i class="fa fa-users"></i><?=lang("RegisteredCustomers")?><i class="fa fa-chevron-down"></i></div>
<ul class="submenu" <?php if($this->uri->segment(2) == "clients" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "clients")) { echo "style='display:block'"; }  ?>>     <li><a class="ajax-link" href="<?php echo site_url("administrator/clients/")?>"><i class="icon-user"></i><span class="hidden-tablet"> <?php echo lang("Show")?></span></a></li>
<!--<li><a class="ajax-link" href="<?php echo site_url("administrator/clients/add")?>"><i class="icon-plus-sign"></i><span class="hidden-tablet"> <?php echo lang("Add")?></span></a></li>-->
</ul>
</li>
      <?php } ?>


<?php if (in_array("1",$this->session->userdata('permi')) || in_array("6",$this->session->userdata('permi'))) { ?>
    <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "coupon" || ($this->uri->segment(3) == "add" && $this->uri->segment(3) == "coupon")) { echo "open"; }  ?>">


<?php if($this->uri->segment(2) == "coupon" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "vendorpermi")) { echo "open"; }  ?>


        <div class="link"><i class="fa fa-tags"></i><?=lang("coupon")?><?php echo lang("coupon_sel");?><i class="fa fa-chevron-down"></i></div>
        <ul class="submenu" <?php if($this->uri->segment(2) == "coupon" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "coupon")) { echo "style='display:block'"; }  ?>>
            <li><a class="ajax-link" href="<?php echo site_url("administrator/coupon/")?>"><i class="icon-user"></i><span class="hidden-tablet"> <?php echo lang("View_Coupon")?></span></a></li>
      <li><a class="ajax-link" href="<?php echo site_url("administrator/coupon/addadmin")?>"><i class="icon-plus-sign"></i><span class="hidden-tablet"> <?php echo lang("Add_Coupon")?></span></a></li>
            <li><a class="ajax-link" href="<?php echo site_url("administrator/coupon/add")?>"><i class="icon-plus-sign"></i><span class="hidden-tablet"><?php echo lang("Assign_Multiple_Products")?></span></a></li>
        </ul>
    </li>
<?php } ?>




      <?php if (in_array("1",$this->session->userdata('permi')) || in_array("7",$this->session->userdata('permi'))) { ?>
          <!-- <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "orders" || ($this->uri->segment(3) == "companies" && $this->uri->segment(2) == "orders")) { echo "open"; }  ?>">
  <div class="link"><i class="fa fa-shopping-bag"></i><?=lang("PurchaseordersandSales")?><i class="fa fa-chevron-down"></i></div>      <ul class="submenu" <?php if($this->uri->segment(2) == "orders" || ($this->uri->segment(3) == "companies" && $this->uri->segment(2) == "orders")) { echo "style='display:block'"; }  ?>>   <li><a class="ajax-link" href="<?php echo site_url("administrator/orders/")?>"><i class="icon-globe"></i><span class="hidden-tablet"> <?php echo lang("Show")?></span></a></li>
      <li><a class="ajax-link" href="<?php echo site_url("administrator/orders/companies")?>"><i class="icon-globe"></i><span class="hidden-tablet">
        <?=lang("ShowByCompanies")?>
        </span></a></li></ul>
      </li>-->

     <?php } ?>
     <?php if (in_array("1",$this->session->userdata('permi')) || in_array("8",$this->session->userdata('permi'))) { ?>

         <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "group" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "group")) { echo "open"; }  ?>">
        <div class="link"><i class="fa fa-eye"></i><?=lang("ManagePerm")?><i class="fa fa-chevron-down"></i></div>        <ul class="submenu" <?php if($this->uri->segment(2) == "group" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "group")) { echo "style='display:block'"; }  ?>>      <li><a class="ajax-link" href="<?php echo site_url("administrator/group/")?>"><i class="icon-user"></i><span class="hidden-tablet"> <?php echo lang("Show")?></span></a></li>
      <li><a class="ajax-link" href="<?php echo site_url("administrator/group/add")?>"><i class="icon-plus-sign"></i><span class="hidden-tablet"> <?php echo lang("Add")?></span></a></li></ul>
      </li>

      <?php } ?>
     <?php if (in_array("1",$this->session->userdata('permi')) || in_array("8",$this->session->userdata('permi'))) { ?>

         <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "users" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "users")) { echo "open"; }  ?>">
        <div class="link"><i class="fa fa-male"></i><?=lang("Management")?><i class="fa fa-chevron-down"></i></div>             <ul class="submenu" <?php if($this->uri->segment(2) == "users" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "users")) { echo "style='display:block'"; }  ?>>      <li><a class="ajax-link" href="<?php echo site_url("administrator/users/")?>"><i class="icon-user"></i><span class="hidden-tablet"> <?php echo lang("Show")?></span></a></li>
      <li><a class="ajax-link" href="<?php echo site_url("administrator/users/add")?>"><i class="icon-plus-sign"></i><span class="hidden-tablet"> <?php echo lang("Add")?></span></a></li></ul>
      </li>

      <?php } ?>

     

    <?php if (in_array("1",$this->session->userdata('permi')) || in_array("8",$this->session->userdata('permi'))) { ?>

         <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "vendorpermi" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "vendorpermi")) { echo "open"; }  ?>">
        <div class="link"><i class="fa fa-male"></i><?php echo lang("Vendor_permission")?><i class="fa fa-chevron-down"></i></div><ul class="submenu" <?php if($this->uri->segment(2) == "vendorpermi" || ($this->uri->segment(3) == "add" && $this->uri->segment(2) == "vendorpermi")) { echo "style='display:block'"; }  ?>>
                 <li><a class="ajax-link" href="<?php echo site_url("administrator/vendorpermi/")?>"><i class="icon-user"></i><span class="hidden-tablet"><?php echo lang("Vendor_permission_master")?> </span></a></li>
      <li><a class="ajax-link" href="<?php echo site_url("administrator/vendorpermi/add")?>"><i class="icon-plus-sign"></i><span class="hidden-tablet"><?php echo lang('Vendor_permission_add');?></span></a></li>
                 <li><a class="ajax-link" href="<?php echo site_url("administrator/vendorpermi/viewpermission")?>"><i class="icon-plus-sign"></i><span class="hidden-tablet"><?php echo lang('Vendor_permission_view');?></span></a></li></ul>
      </li>
      <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "emergency"){ echo "open";}  ?>"><div class="link"><i class="fa fa-tags"></i><?php echo lang("EmegencyReason") ;?> <i class="fa fa-chevron-down"></i></div>
        <ul class="submenu" <?php if($this->uri->segment(2) == "emergency" || $this->uri->segment(2) == "emergency" || $this->uri->segment(2) == "conditions") { echo "style='display:block'"; }  ?>>
          
          <li><a class="ajax-link" href="<?php echo site_url("administrator/emergency")?>"><i class="icon-globe"></i><span class="hidden-tablet"><?php echo lang("EmegencyReason") ;?></span></a></li>
          
        </ul>
    </li>


      <?php } ?>












      <?php if (in_array("1",$this->session->userdata('permi')) || in_array("9",$this->session->userdata('permi'))) { ?>

          <!--<li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "complaints" || $this->uri->segment(2) == "question") { echo "open"; }  ?>">
      <div class="link"><i class="fa fa-list-alt"></i><?php echo lang("Complaints")?><i class="fa fa-chevron-down"></i></div>
      <ul class="submenu" <?php if($this->uri->segment(2) == "complaints" || $this->uri->segment(2) == "question") { echo "style='display:block'"; }  ?>><li><a class="ajax-link" href="<?php echo site_url("administrator/complaints/")?>"><i class="icon-wrench"></i><span class="hidden-tablet"> <?php echo lang("Show")?></span></a></li>
      <?php echo lang("Rates")?>
      <li><a class="ajax-link" href="<?php echo site_url("administrator/question/")?>"><i class="icon-wrench"></i><span class="hidden-tablet"> <?php echo lang("Show")?></span></a></li></ul>
      </li>-->

     <?php } ?>
     <?php if (in_array("1",$this->session->userdata('permi')) || in_array("9",$this->session->userdata('permi'))) { ?>

         <!--<li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "maintenance") { echo "open"; }  ?>"><div class="link"><i class="fa fa-refresh"></i><?php echo lang("Maintenance")?><i class="fa fa-chevron-down"></i></div>
     <ul class="submenu" <?php if($this->uri->segment(2) == "maintenance") { echo "style='display:block'"; }  ?>> <li><a class="ajax-link" href="<?php echo site_url("administrator/maintenance/backup")?>"><i class="icon-wrench"></i><span class="hidden-tablet"> <?php echo lang("Backup")?></span></a></li></ul>
      </li>-->

     <?php } ?>
      
      <!--
      <li class="nav-header hidden-tablet <?php if($this->uri->segment(2) == "vouchers") { echo "open"; }  ?>"><div class="link"><i class="fa fa-refresh"></i><?php echo lang("vouchers")?><i class="fa fa-chevron-down"></i></div>
     <ul class="submenu" <?php if($this->uri->segment(2) == "vouchers") { echo "style='display:block'"; }  ?>> <li><a class="ajax-link" href="<?php echo site_url("administrator/vouchers/add")?>"><i class="icon-wrench"></i><span class="hidden-tablet"> <?php echo lang("Add")?></span></a></li>
     <li><a class="ajax-link" href="<?php echo site_url("administrator/vouchers/show")?>"><i class="icon-wrench"></i><span class="hidden-tablet"> <?php echo lang("Show")?></span></a></li>
     </ul>
      </li>
      -->
        
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