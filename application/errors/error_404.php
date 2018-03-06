<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title ;?></title>
<meta name="description" content="Charq,insurance,car insurance,home insurance" />
<meta name="keywords" content="Charq,insurance,car insurance,home insurance" />
<link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico" />
<link rel="bookmark icon" href="<?php echo base_url();?>images/favicon.ico" />
<link href="<?php echo base_url();?>css/styles.css" rel="stylesheet" type="text/css">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="grey" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
<script src="<?php echo base_url();?>js/jquery-1.7.0.js"></script>
<script src="<?php echo base_url();?>js/jquery.prettyPhoto.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.nivo.slider.js"></script>
<script src="<?php echo base_url();?>js/twitter.js"></script>
<script src="<?php echo base_url();?>js/jquery.isotope.min.js"></script>
<script src="<?php echo base_url();?>js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
<script>
	//// Start Simple Sliders ////
	$(function() {
		setInterval("rotateDiv()", 10000);
	});

		function rotateDiv() {
		var currentDiv=$("#simpleslider div.current");
		var nextDiv= currentDiv.next ();
		if (nextDiv.length ==0)
			nextDiv=$("#simpleslider div:first");

		currentDiv.removeClass('current').addClass('previous').fadeOut('2000');
		nextDiv.fadeIn('3000').addClass('current',function() {
			currentDiv.fadeOut('2000', function () {currentDiv.removeClass('previous');});
		});

	}
	//// End Simple Sliders ////
</script>
<script>
$(document).ready(function(){

    var $container = $('#portfolio-container')
    // initialize Isotope
        $container.isotope({
            // options...
            resizable: false, // disable normal resizing
            layoutMode : 'fitRows',
			itemSelector : '.element',
            animationEngine : 'best-available',

            // set columnWidth to a percentage of container width
            masonry: { columnWidth: $container.width() / 5 }
        });

        // update columnWidth on window resize
        $(window).smartresize(function(){
            $container.isotope({
            // update columnWidth to a percentage of container width
            masonry: { columnWidth: $container.width() / 5 }
            });
        });
        $container.imagesLoaded( function(){

                $container.isotope({
            // options...
                });
        });

        $('#portfolio-filter a').click(function(){
            var selector = $(this).attr('data-filter');
            $container.isotope({ filter: selector });
            return false;
        });
});
</script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto();
  });
</script>
</head>

<body>
<form action="" method="post" id="arabic_form">
    <input type="hidden" name="lang_submit" value="arabic">
    </form>
    <form action="" method="post" id="english_form">
    <input type="hidden" name="lang_submit" value="english">
    </form>
    <header style="position: relative ;">
	   <img class="logo" src="<?php echo base_url();?>images/logo.png" width="171" height="151" alt="" />

	</header>
<section id="intro">
        <img src="<?php echo base_url();?>images/slider.png" width="946" height="286" alt="" />
	</section>
	 <img src="<?php echo base_url();?>images/line.png" width="948" height="26" alt="" style="position: relative;top: -15px;" />
	<section id="content">
    <h1 style="text-align: center; font-size: 60px ;">لقد طلبت صفحة خاطئة</h1>
    <h2 style="text-align: center; font-size: 30px ;"><a href="<?php echo base_url();?>"> العودة للصفحة الرئيسية</a></h2>
	</section>
