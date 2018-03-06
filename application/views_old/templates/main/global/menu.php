<div id="top">
<div id="top-t">
<div id="top-social">
<ul>
<li><a target="_blank" href="<?php echo $setting['fbpage'];?>"><img src="<?php echo base_url()?>images/f.jpg" alt="" /></a></li>
<li><a target="_blank" href="<?php echo $setting['twttier'];?>"><img src="<?php echo base_url()?>images/t.jpg" alt="" /></a></li>
<li><a target="_blank" href="<?php echo $setting['youtube'];?>"><img src="<?php echo base_url()?>images/y.jpg" alt="" /></a></li>
<li><a target="_blank" href="<?php echo $setting['in'];?>"><img src="<?php echo base_url()?>images/in.jpg" alt="" /></a></li>
</ul>
</div>
<div class="lang">
<?php
  if($this->setting->getLang($this->session->userdata('site_lang')) == "english"){
?>
<a href="javascript:document.getElementById('arabic_form').submit();">عربى</a>
<?php }else if($this->setting->getLang($this->session->userdata('site_lang')) == "arabic"){ ?>
<a href="javascript:document.getElementById('english_form').submit();">English</a>
<?php } ?>
</div>
<div class="top-search">
<form action="<?php echo site_url("search")?>" method="get" class="top-search">
<input type="submit" class="top-search-button" value="" name="">
<input name="search" type="search" placeholder="<?php echo lang("Search")?>" class="top-search-box" value="<?php echo $this->input->get("search")?>" />
</form>
</div>
</div>
</div>
<div id="werb">
<div id="header">
<div id="header-t">
<div id="header-t1">
<div class="logo"><a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>images/logo.jpg" alt="" /></a></div>
<div class="logo-t"><a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>images/logo-t.png" alt="" /></a></div>
</div>
</div>
<div id="top-menu">
<ul id="jMenu">
<li class="<?php if($this->uri->segment(1) == ""){echo "jMenu-style";}else {echo "";}?>"><a href="<?php echo base_url()?>"><?php echo lang("Home")?></a></li>
<span></span>
<li class="<?php if($this->uri->segment(1) == "about"){echo "jMenu-style";}else {echo "";}?>"><a href="<?php echo site_url("about")?>"><?php echo lang("AboutUs")?></a></li>
<span></span>
<li class="<?php if($this->uri->segment(1) == "area"){echo "jMenu-style";}else {echo "";}?>"><a href="<?php echo site_url("area")?>"><?php echo lang("PracticeArea")?></a></li>
<span></span>
<li class="<?php if($this->uri->segment(1) == "lowyer"){echo "jMenu-style";}else {echo "";}?>"><a href="<?php echo site_url("lowyer")?>"><?php echo lang("Lowyer")?></a></li>
<span></span>
<li class="parent <?php if($this->uri->segment(1) == "jobs"){echo "jMenu-style";}else {echo "";}?>">
<img src="<?php echo base_url()?>images/parent.png" />
<a href="<?php echo site_url("jobs")?>"><?php echo lang("jobs")?></a>
<ul class="child">
<li><a href="<?php echo site_url("jobs")?>"><?php echo lang("jobs")?></a></li>
<li><a href="<?php echo site_url("jobs/cv")?>"><?php echo lang("Apply")?></a></li>
</ul>
</li>
<span></span>
<li class="parent <?php if($this->uri->segment(1) == "clients"){echo "jMenu-style";}else {echo "";}?>">
<img src="<?php echo base_url()?>images/parent.png" />
<a href="<?php echo site_url("clients")?>"><?php echo lang("Clients")?></a>
<ul class="child">
<li><a href="<?php echo site_url("clients")?>"><?php echo lang("Silver")?></a></li>
<li><a href="<?php echo site_url("clients/golden")?>"><?php echo lang("Golden")?></a></li>
<li><a href="<?php echo site_url("clients/diamond")?>"><?php echo lang("Diamond")?></a></li>
</ul>
</li>
<span></span>
<li class="<?php if($this->uri->segment(1) == "contact"){echo "jMenu-style";}else {echo "";}?>"><a href="<?php echo site_url("contact")?>"><?php echo lang("ContactUs")?></a></li>

        </ul>
</div>
<div class="banner" id="slides">
<div class="slides_container">
<?php
  foreach($sliders AS $slider) {
?>
<div>
<img src="<?php echo base_url()?>download/slider/<?php echo $slider['photo']?>" />
<div class="banner-t"><?php echo $slider['desc']?></div>
</div>
<?php } ?>
</div>
</div>
</div>

<div id="content">