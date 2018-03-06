<?php
  if(isset($Data['id'])){
    $dd = $this->data->get("clients",$langId,array("id"=>$Data['client_id'])) ;
    $dd2 = $this->data->get("team",$langId,array("id"=>$Data['team_id'])) ;
?>
<div class="address">
<p class="font3"><?php echo lang("DisplayIssues")?></p>
</div>
<div id="issues-page">
<ul>
<li>
<div class="issues-page-t1"><?php echo lang("CoName")?></div>
<div class="issues-page-t2"><?php echo isset($dd['name'])?$dd['name']: lang("NoData") ;?></div>
</li>
<li>
<div class="issues-page-t1"><?php echo lang("CoTitle")?></div>
<div class="issues-page-t2"><?php echo isset($dd['lname'])?$dd['lname']: lang("NoData") ;?></div>
</li>
<li>
<div class="issues-page-t1"><?php echo lang("CoEmail")?></div>
<div class="issues-page-t2"><?php echo isset($dd['email'])?$dd['email']: lang("NoData") ;?></div>
</li>
<li>
<div class="issues-page-t1"><?php echo lang("CoPhone")?></div>
<div class="issues-page-t2"><?php echo isset($dd['mobile'])?$dd['mobile']: lang("NoData") ;?></div>
</li>
<li>
<div class="issues-page-t1"><?php echo lang("Ctype")?></div>
<div class="issues-page-t2"><?php echo isset($dd['ctype'])?$dd['ctype']: lang("NoData") ;?></div>
</li>
<li>
<div class="issues-page-t1"><?php echo lang("LawyerRespons")?></div>
<div class="issues-page-t2"><?php echo isset($dd2['name'])?$dd2['name']." ".$dd2['lname']: lang("NoData") ;?></div>
</li>
<li>
<div class="issues-page-t1"><?php echo lang("IssuesNumber")?></div>
<div class="issues-page-t2"><?php echo $Data['number']?></div>
</li>
<li>
<div class="issues-page-t1"><?php echo lang("IssuesNumbers")?></div>
<div class="issues-page-t2"><?php echo $this->data->countTable("issue",array("client_id"=>$dd['id']));?></div>
</li>
<li>
<div class="issues-page-t1"><?php echo lang("IssuesUpdates")?></div>
<?php
  foreach($Updates AS $Updates_item){
?>
<div class="issues-page-t3">
<p><?php echo $Updates_item['udate']?></p>
<div class="issues-page-t3-box">
<?php echo $Updates_item['desc']?>
</div>
</div>
<?php } ?>
</li>
</ul>
</div>
<?php }else { ?>
<div id="level2">
<div class="level2-t1">
<p><?php echo lang("FOLLOWUPISSUES")?></p>
</div>
<div id="level2-box">
<div class="logo"><a href="<?php echo base_url()?>"><img alt="" src="<?php echo base_url()?>images/logo.jpg"></a></div>
<form action="" method="get" class="level2-form">
<ul>
<li>
<p><?php echo lang("IssuesNumber")?></p>
<input name="isnum" type="text" class="level2-form-box" />
</li>
<li>
<p><?php echo lang("SecretCode")?></p>
<input name="secode" type="text" class="level2-form-box" />
</li>
<li>
<input name="" type="submit" value="<?php echo lang("Search")?>" class="level2-form-botton" />
</li>
</ul>
</form>
</div>
</div>
<?php } ?>

