</div>
<div class="clear"></div>
</div>
<div id="bottom">
<div id="bottom-t">
<div class="bottom-t-logo"><img src="<?php echo base_url()?>images/logo2.jpg" alt="" /></div>
<div id="bottom-t-box-oll">
<div id="bottom-t-box">
<div class="bottom-t-box-adr"><?php echo lang("LatestNews")?></div>
<ul>
<?php
  foreach($latest_news AS $latest_news_item){
?>
<li><a href="<?php echo site_url("news/news-".$latest_news_item['id'])?>"><?php echo word_limiter($latest_news_item['title'],4)?></a></li>
<?php } ?>
</ul>
</div>
<div id="bottom-t-box">
<div class="bottom-t-box-adr"><?php echo lang("Services")?></div>
<ul>
<?php
  foreach($latest_service AS $latest_service_item){
?>
<li><a href="<?php echo site_url("services/article-".$latest_service_item['id'])?>"><?php echo word_limiter($latest_service_item['title'],4)?></a></li>
<?php } ?>
</ul>
</div>
<div id="bottom-t-box">
<div class="bottom-t-box-adr"><?php echo lang("StayConnected")?></div>
<ul>
<li style="line-height:33px;">
<img src="<?php echo base_url()?>images/f.png" alt="" />
<a target="_blank" href="<?php echo $setting['fbpage'];?>"><?php echo lang("FaceBook")?></a>
</li>
<li style="line-height:33px;">
<img src="<?php echo base_url()?>images/t.png" alt="" />
<a target="_blank" href="<?php echo $setting['twttier'];?>"><?php echo lang("Twitter")?></a>
</li>
<li style="line-height:33px;">
<img src="<?php echo base_url()?>images/y.png" alt="" />
<a target="_blank" href="<?php echo $setting['youtube'];?>"><?php echo lang("Youtube")?></a>
</li>
<li style="line-height:33px;">
<img src="<?php echo base_url()?>images/in.png" alt="" />
<a target="_blank" href="<?php echo $setting['in'];?>"><?php echo lang("LinkedIn")?></a>
</li>
</ul>
</div>
</div>

</div>
<div class="clear"></div>
</div>

