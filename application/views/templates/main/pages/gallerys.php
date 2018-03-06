
<div id="conta-page"><!--  conta -->
<div class="r-page"><!-- onebox -->
<div class="head-page">
<img src="<?php echo base_url()?>images/icon-site.jpg" />
<h1> <?php echo lang("Gallery")?> </h1>
</div>
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
<a href="<?php echo site_url('gallery/album-'.$data_item['id'])?>" >
<img src="<?php echo base_url()?>download/gallery/<?php echo $data_item['photo'];?>" width="215" height="150" alt="" />
</a>
<p><?php echo $data_item['title'];?></p>
</li>
<?php }

 ?>
</ul>
</div>
<?php echo $links;?>
</div><!-- end r-page -->

