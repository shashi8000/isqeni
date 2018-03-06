<div id="new-page">
<ul>
<?php
  foreach($Data AS $data_item){
?>
<li>
  <img width="167" height="185" src="<?php echo base_url()?>download/team/<?php echo $data_item['photo'];?>" alt="" />
  <p class="font2"><?php echo $data_item['name'];?> <?php echo $data_item['lname'];?></p>
  </li>
  <hr />
  <?php } ?>

</ul>


</div>
<?php echo $links;?>  


