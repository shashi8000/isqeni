
<div id="conta-page"><!--  conta -->
<div class="r-page"><!-- onebox -->
<div class="head-page">
<img src="<?php echo base_url()?>images/icon-site.jpg" />
<h1><?php echo lang("Team")?> </h1>
</div>

<div class="not-mgla"><!-- div  not -->
<?php echo $setting['block2']?>
</div><!-- end div not -->

<div id="services">
<ul>
<!-- start gallery   -->

<?php
  foreach($Data AS $data_item){
    /*$ph = explode(".",$data_item['photo']) ;
    $count = count($ph) ;

    $ph[$count-2] = $ph[$count-2]."_thumb";
    $thumb = implode(".",$ph) ;*/
?>
<li>
<a href="#inline_demo<?php echo $data_item['id'];?>" rel="prettyPhoto[team]" >
<img src="<?php echo base_url()?>download/team/<?php echo $data_item['photo'];?>" width="215" height="150" alt="" />
</a>
<p><?php echo $data_item['name'];?></p>
</li>
<?php }

 ?>
</ul>
<?php
  foreach($Data AS $data_item){
?>
<div id="inline_demo<?php echo $data_item['id'];?>" style="display:none;">
<table width="100%" border="1" dir="rtl" class="table">

  <tr>
    <td class="right"><b><?php echo lang("Dname")?></b> : <?php echo $data_item['name'];?> <br />
    <b><?php echo lang("DSpech")?></b> : <?php echo $data_item['spech'];?>  <br />
    <b><?php echo lang("DOtherData")?></b> <br />
    <?php echo $data_item['other'];?></td>
    <td class="left"><img src="<?php echo base_url()?>download/team/<?php echo $data_item['photo'];?>" width="230" height="170" alt="" /> </td>
  </tr>
</table>

</div>
<?php } ?>
</div>
<?php echo $links;?>
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

