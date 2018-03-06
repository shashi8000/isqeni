<div id="conta-page"><!--  conta -->
<div class="r-page"><!-- onebox -->
<img class="topic2" src="<?php echo base_url()?>images/logo2.jpg" />
<div class="head-page">
<img src="<?php echo base_url()?>images/icon-site.jpg" />
<h1><?php echo $Data['title'];?></h1>
</div>

<div class="not-mgla"><!-- div  not -->
<?php echo $Data['text2'];?>

</div><!-- end div not -->
<div class="clear"></div>

<div class="vist-link"><!-- vist-link -->
<div class="head-page">
<img src="<?php echo base_url()?>images/icon-site.jpg" />
<h1><?php echo lang("VisitOther")?></h1>
</div>

<ul>

<li><a href="<?php echo site_url("about")?>"><img src="<?php echo base_url()?>images/arr.png" /><h1><?php echo lang("AboutUs")?></h1></a></li>
<li><a href="<?php echo site_url("services")?>"><img src="<?php echo base_url()?>images/arr.png" /><h1><?php echo lang("Services")?></h1></a></li>
<li><a href="<?php echo site_url("team")?>"><img src="<?php echo base_url()?>images/arr.png" /><h1><?php echo lang("Team")?></h1></a></li>
<li><a href="<?php echo site_url("news")?>"><img src="<?php echo base_url()?>images/arr.png" /><h1><?php echo lang("News")?></h1></a></li>

</ul>



</div><!-- end vist-link -->
</div><!-- end r-page -->

