<div id="conta-page"><!--  conta -->
<div class="r-page"><!-- onebox -->
<div class="map"><?php echo html_entity_decode($data['map'])?></div>
<div class="head-page">
<img src="<?php echo base_url()?>images/icon-site.jpg" />
<h1><?php echo $data['title']?></h1>
</div>

<div class="not-mgla"><!-- div  not -->
<?php echo $data['desc']?>
<div class="clear"></div>
<br />
<ul class="contactUl">
   <li class="home"><?php echo $data['address']?>&nbsp; </li>
   <li class="phone"><?php echo $data['mobile']?>&nbsp; </li>
   <li class="email"><?php echo $setting['site_email']?>&nbsp; </li>
   <li class="skype"><?php echo $setting['skype']?>&nbsp; </li>
   <li class="facebook"><?php echo $setting['facebook']?>&nbsp; </li>
   <li class="twitter"><?php echo $setting['twttier']?>&nbsp;</li>
</ul>
</div><!-- end div not -->



</div><!-- end r-page -->

