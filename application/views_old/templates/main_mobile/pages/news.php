<div id="conta-page"><!--  conta -->
<div class="r-page"><!-- onebox -->
<img class="topic" src="<?php echo base_url()?>download/news/<?php echo $data['photo'];?>" />
<div class="head-page">
<img src="<?php echo base_url()?>images/icon-site.jpg" />
<h1> <?php echo lang("News")?>  - <?php echo $data['title'];?></h1>
</div>

<div class="not-mgla"><!-- div  not -->
<?php echo $data['text2'];?>

</div><!-- end div not -->
<div class="clear"></div>
<div class="social2">

<a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a>
<div class="fb-share-button" data-href="<?php echo site_url("news/news-".$data['id']);?>" data-layout="button"></div>
&nbsp;
</div>
<div class="fb-comments" data-href="<?php echo site_url("news/news-".$data['id']);?>" data-numposts="10" data-width="620"></div>
<?php
  if(count($mostRead) > 0){
?>
<div class="vist-link"><!-- vist-link -->
<div class="head-page">
<img src="<?php echo base_url()?>images/icon-site.jpg" />
<h1> <?php echo lang("MostReaded")?></h1>
</div>

<ul>
<?php
  foreach($mostRead AS $mostRead_item){
?>
<li><a href="<?php echo site_url("news/news-".$mostRead_item['id']);?>"><img src="<?php echo base_url()?>images/arr.png" /><h1><?php echo $mostRead_item['title'];?></h1></a></li>
<?php } ?>
</ul>



</div><!-- end vist-link -->
<?php } ?>
</div><!-- end r-page -->

