<div class="address">
<p class="font1"><?php echo $Data['title']?></p>
</div>
<?php
  if(! empty($Data['photo'])){
?>
<img width="435" height="283" src="<?php echo base_url()?>download/article/<?php echo $Data['photo']?>" class="img-r" />
<?php } ?>
<p><?php echo $Data['text2']?> </p>
