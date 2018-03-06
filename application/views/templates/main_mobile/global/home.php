<div id="navbar"><!-- navbar -->
<ul class="ul-nav">
<li class="<?php if($this->uri->segment(1) == ""){echo "active";}else {echo "";}?>"><a href="<?php echo base_url();?>"><?php echo lang("Home")?></a></li>
<li class="<?php if($this->uri->segment(1) == "about"){echo "active";}else {echo "";}?>"><a href="<?php echo site_url("about")?>"><?php echo lang("AboutUs")?></a></li>
<li class="<?php if($this->uri->segment(1) == "services"){echo "active";}else {echo "";}?>"><a href="<?php echo site_url("services")?>"><?php echo lang("Services")?></a></li>
<li class="<?php if($this->uri->segment(1) == "team"){echo "active";}else {echo "";}?>"><a href="<?php echo site_url("team")?>"><?php echo lang("Team")?></a></li>
<li class="<?php if($this->uri->segment(1) == "news"){echo "active";}else {echo "";}?>"><a href="<?php echo site_url("news")?>"><?php echo lang("News")?></a></li>
<li class="<?php if($this->uri->segment(1) == "magazin"){echo "active";}else {echo "";}?>"><a href="<?php echo site_url("magazin")?>"><?php echo lang("Magazin")?></a></li>
<li class="<?php if($this->uri->segment(1) == "gallery"){echo "active";}else {echo "";}?>"><a href="<?php echo site_url("gallery")?>"><?php echo lang("Gallery")?></a></li>
</ul>
</div><!-- end navbar -->

</div><!-- end header -->