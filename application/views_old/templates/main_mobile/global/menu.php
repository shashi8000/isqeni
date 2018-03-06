<div id="footer_bg">
<div id="all_res">
<div class="logo"><img src="<?php echo base_url();?>images/logo.png" /></div><!-- end logo -->
<div class="clear"></div>
<div id="allpage">
<div class="header">
<div class="up-header">
<div class="nav-upheader">
<ul>
<li><a href="<?php echo site_url("gdda")?>"><?php echo lang("AboutGdda")?></a></li>
<li><a href="<?php echo site_url("contact")?>"><?php echo lang("ContactUs")?></a></li>
<?php
  if($this->setting->getLang($this->session->userdata('site_lang')) == "english"){
?>
<li><a href="javascript:document.getElementById('arabic_form').submit();">عربي </a></li>
<?php }else if($this->setting->getLang($this->session->userdata('site_lang')) == "arabic"){ ?>
<li><a href="javascript:document.getElementById('english_form').submit();">English </a></li>
<?php } ?>
</ul>
</div>
</div><!-- end upheader -->
<div class="logosocial">
<div class="social">
<ul>
<?php if(!empty($setting['facebook'])){?><li><a target="_blank" href="<?php echo $setting['facebook'];?>"><img src="<?php echo base_url();?>images/facebook.jpg" /></a></li><?php } ?>
<?php if(!empty($setting['twttier'])){?><li><a target="_blank" href="<?php echo $setting['twttier'];?>"><img src="<?php echo base_url();?>images/twiiter.jpg" /></a></li>  <?php } ?>
<?php if(!empty($setting['plus'])){?><li><a target="_blank" href="<?php echo $setting['plus'];?>"><img src="<?php echo base_url();?>images/google.jpg" /></a></li>   <?php } ?>
<?php if(!empty($setting['in'])){?><li><a target="_blank" href="<?php echo $setting['in'];?>"><img src="<?php echo base_url();?>images/in.jpg" /></a></li>  <?php } ?>
<?php if(!empty($setting['instagram'])){?><li><a target="_blank" href="<?php echo $setting['instagram'];?>"><img src="<?php echo base_url();?>images/instagram.png" /></a></li>  <?php } ?>

</ul>
</div><!-- end social -->
</div><!-- logosocial -->

