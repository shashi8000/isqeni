<head>

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $setting['site_name'];?> <?php echo $title ;?></title>
	<meta name="description" content="<?php echo $setting['site_name']?> <?php echo $title ;?> <?php echo isset($data['desc'])? $data['desc']:"" ;?>" />
<meta name="keywords" content="<?php echo $setting['site_name']?> <?php echo $title ;?><?php echo isset($data['tags'])? $data['tags']:"" ;?>" />
</head>
	<div id="wrapper">
		<div class="container">
            <h2 style="text-align: center"><?php echo lang("Conditions")?></h2>
			<div class="page wow bounceInUp">
			  <?php echo $Data['text2']?>
			</div><!-- end page -->

		</div><!-- end container -->
	</div><!-- End Wrapper -->
<style>
body {
    max-width: 100% !important;
}
img {
    max-width: 100% !important;
}

</style>

