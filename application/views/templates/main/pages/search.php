<div id="new-page">
<?php
  if(isset($searchNews) && count($searchNews) > 0){
?>
<ul>
<?php
  foreach($searchNews AS $data_item){
?>
<li>
  <img width="167" height="185" src="<?php echo base_url()?>download/news/<?php echo $data_item['photo'];?>" alt="" />
  <p class="font2"><?php echo $data_item['title'];?></p>
  <p><?php echo $data_item['desc'];?> </p>
<div class="new-page-more"><a href="<?php echo site_url('news/news-'.$data_item['id'])?>"><?php echo lang("ReadMore")?></a></div>
  </li>
  <hr />
  <?php } ?>

</ul>
<?php }else { ?>
<h2><?php echo lang("NoSearch")?></h2>
<?php } ?>

</div>



