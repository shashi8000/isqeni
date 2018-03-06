<div id="conta-page"><!--  conta -->
<div class="r-page"><!-- onebox -->
<div class="head-page">
<img src="<?php echo base_url()?>images/icon-site.jpg" />
<h1> <?php echo lang("Magazin")?> </h1>
</div>

<div class="not-mgla"><!-- div  not -->
<?php echo $setting['block3']?>
</div><!-- end div not -->

<!--  محتوى اخبار المجله -->
<?php
  foreach($Data AS $data_item){
?>
<div class="one-t-mgla">

<div class="m7-mgla"><!-- nd m7-mgla -->
<div class="tit-5br-m"><a href="<?php echo site_url('magazin/article-'.$data_item['id'])?>">  <?php echo $data_item['title'];?> </a></div>
<div class="m7t-5br-m">
<p>
 <?php echo $data_item['desc'];?>
</p>
<a href="<?php echo site_url('magazin/article-'.$data_item['id'])?>"><?php echo lang("ReadMore")?></a>
</div>

</div><!-- end m7-mgla -->
</div><!-- end one-topic-mgla -->
<?php }
echo $links;
 ?>


<!--  محتوى اخبار المجله نهايه -->


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

