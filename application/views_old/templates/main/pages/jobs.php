<div id="new-page">
<ul>
<?php
  foreach($Data AS $data_item){
?>
<li>
  <img width="167" height="185" src="<?php echo base_url()?>download/jobs/<?php echo $data_item['photo'];?>" alt="" />
  <p class="font2"><?php echo $data_item['title'];?></p>
  <p><?php echo $data_item['desc'];?> </p>
<div class="new-page-more"><a href="<?php echo site_url('jobs/job-'.$data_item['id'])?>"><?php echo lang("Apply")?></a></div>
  </li>
  <hr />
  <?php } ?>

</ul>


</div>
<?php echo $links;?>  


