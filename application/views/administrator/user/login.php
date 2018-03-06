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
	<title><?php echo $setting['site_name']?> - <?php echo lang("ControlPanel") ;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, bo2otstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link href="<?php echo base_url(); ?>css/administrator/bootstrap-redy.css" rel="stylesheet">
	<style type="textcss">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="<?php echo base_url(); ?>js/administrator/bootstrap-responsive.css" rel="stylesheet">
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

        <?php if($this->session->userdata('admin_lang') == '1')
{
  echo "<link rel='stylesheet' href='".base_url()."css/administrator/my-style.css' type='text/css' />";
}
 else {
  echo "<link rel='stylesheet' href='".base_url()."css/administrator/my-style-arabic.css' type='text/css' />";
}
        ?>
        
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">

</head>

<body class="<?php if($this->uri->segment(1)=='administrator'){
    echo $this->uri->segment(2);
}else{
    echo $this->uri->segment(1);
}     ?>">
		<div class="container-fluid">
		<div class="row-fluid">

			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2><?php echo $setting['site_name']?> - <?php echo lang("ControlPanel") ;?></h2>
				</div><!--/span-->
			</div><!--/row-->

			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						<?php echo isset ($message)? $message : '' ;?>
					</div>
					<form class="form-horizontal" action="" method="post">
						<fieldset>
                        <p class="uplabel"><?php echo lang("UserName") ;?></p>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="txtUserName" id="txtUserName" type="text" value="" />
							</div>
							<div class="clearfix"></div>
                            <p class="uplabel"><?php echo lang("Password") ;?></p>
							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="txtPassword" id="txtPassword" type="password" value="" />
							</div>
							<div class="clearfix"></div>

							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary"><?php echo lang("Login") ;?></button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->

	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
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
	<script src="<?php echo base_url(); ?>js/administrator/jquery.dataTables.min.js"></script>

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
	<script src="<?php echo base_url(); ?>js/administrator/charisma.js"></script>


</body>
</html>
