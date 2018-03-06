<div align="center"><img src="<?php echo $Data['photo']?>"></div>
<p style="direction: rtl; text-align: right;"><?php echo $Data['text2']?> </p>
<p><b><center>التعليقات</center></b></p>
<?php
  if(count($Comments) > 0){
      foreach($Comments AS $Comment){
          $user = $this->data->get("clients",FALSE,array("id"=>$Comment['client_id']));
?>
<p style="direction: rtl; text-align: right; background: #92defb;border-radius:10px;padding: 10px"><b><?php echo $user['name']?> : </b> <?php echo $Comment['comment']?></p>

<?php } } ?>
