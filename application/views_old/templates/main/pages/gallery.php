
<div id="conta-page"><!--  conta -->
<div class="r-page"><!-- onebox -->
<div class="head-page">
<img src="<?php echo base_url()?>images/icon-site.jpg" />
<h1><?php echo lang("Gallery")?> - <?php echo $cat['title'];?>  </h1>
</div>


<div id="gallery">
<ul>
<!-- start gallery   -->

<?php
  foreach($Data AS $data_item){
    $ph = explode(".",$data_item['photo']) ;
    $count = count($ph) ;

    $ph[$count-2] = $ph[$count-2]."_thumb";
    $thumb = implode(".",$ph) ;
?>
<li>
<a href="<?php echo base_url()?>download/gallery/<?php echo $data_item['photo'];?>" >
<img src="<?php echo base_url()?>download/gallery/<?php echo $thumb;?>" width="215" height="150" alt="" />
</a>
</li>
<?php }

 ?>
</ul>
</div>


</div><!-- end r-page -->

