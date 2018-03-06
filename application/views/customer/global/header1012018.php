<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
    <?php
    $setting = $this->setting->get();
     ?>
	<title><?php echo isset($setting['site_name'])? $setting['site_name'] : "";?> - لوحة التحكم</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link href="<?php echo base_url();?>css/administrator/bootstrap-redy.css" id="bscss" rel="stylesheet">
   <!-- <link href="<?php echo base_url();?>css/administrator/rtl.css" rel="stylesheet" type="text/css">  -->
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
    <?php
    if($this->config->item('language') == "arabic"){ ?>
    <link href="<?php echo base_url();?>css/administrator/rtl.css" rel="stylesheet" type="text/css">
    <?php } ?>
	<link href="<?php echo base_url(); ?>css/administrator/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/administrator/charisma-app.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/administrator/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?php echo base_url(); ?>css/administrator/fullcalendar.css' rel='stylesheet'>
	<link href='<?php echo base_url(); ?>css/administrator/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?php echo base_url(); ?>css/administrator/chosen.css' rel='stylesheet'>
	<link href='<?php echo base_url(); ?>css/administrator/uniform.default.css' rel='stylesheet'>
	<link href='<?php echo base_url(); ?>css/administrator/colorbox.css' rel='stylesheet'>
	<link href='<?php echo base_url(); ?>css/administrator/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?php echo base_url(); ?>css/administrator/jquery.noty.css' rel='stylesheet'>
	<link href='<?php echo base_url(); ?>css/administrator/noty_theme_default.css' rel='stylesheet'>
	<link href='<?php echo base_url(); ?>css/administrator/elfinder.min.css' rel='stylesheet'>
	<link href='<?php echo base_url(); ?>css/administrator/elfinder.theme.css' rel='stylesheet'>
	<link href='<?php echo base_url(); ?>css/administrator/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?php echo base_url(); ?>css/administrator/opa-icons.css' rel='stylesheet'>
	<link href='<?php echo base_url(); ?>css/administrator/uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/font-awesome/css/font-awesome.min.css' rel='stylesheet'>

	
           
     <?php if($this->session->userdata('admin_lang') == '1')
{
  echo "<link rel='stylesheet' href='http://35.196.171.153/isqenidev/css/administrator/my-style.css' type='text/css' />";
}
 else {
  echo "<link rel='stylesheet' href='http://35.196.171.153/isqenidev/css/administrator/my-style-arabic.css' type='text/css' />";
}
        ?>  

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
     	<script src="<?php echo base_url(); ?>js/administrator/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="<?php echo base_url(); ?>js/administrator/bo2otstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery.co2okie.js"></script>
	<!-- calander plugin -->
	<script src="<?php echo base_url(); ?>js/administrator/fullcalendar.min.js"></script>
	<!-- data table plugin -->
	
	
	<?php if($this->config->item('language') == "arabic"){ ?>
    <script src="<?php echo base_url(); ?>js/administrator/jquery.dataTables.min_ar.js"></script>
    <?php }else{ ?>
    <script src="<?php echo base_url(); ?>js/administrator/jquery.dataTables.min.js"></script>
    <?php } ?>

	<!-- chart libraries start -->
	<script src="<?php echo base_url(); ?>js/administrator/excanvas.js"></script>
	<script src="<?php echo base_url(); ?>js/administrator/jquery.flot.min.js"></script>
	<script src="<?php echo base_url(); ?>js/administrator/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url(); ?>js/administrator/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url(); ?>js/administrator/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="<?php echo base_url(); ?>js/administrator/ch2os.m2in.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?php echo base_url(); ?>js/administrator/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<?php if($this->config->item('language') == "arabic"){ ?>
    <script src="<?php echo base_url(); ?>js/administrator/charisma_ar.js"></script>
    <?php }else{ ?>
    <script src="<?php echo base_url(); ?>js/administrator/charisma.js"></script>
    <?php } ?>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico">
</head>
<body class="<?= $this->uri->segment(2);  ?>">
