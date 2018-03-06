<script>

window.onload=function(){
    window.setTimeout(function() { document.getElementById('PayForm4').submit(); }, 100);
};
</script>

<div>
<img src="<?php echo base_url()?>images/loading.gif" alt="" style="width: 20%; top: 50%; margin: 0px auto; position: absolute; left: 40%;" />
</div>
<?php
    if($setting['paypalOn'] == 1)
    {
      $LLINK = "https://www.paypal.com/cgi-bin/webscr";
    }
    else
    {
       $LLINK = "https://www.sandbox.paypal.com/cgi-bin/webscr";
    }
  ?>
<form action = "<?php echo $LLINK;?>" method = "post" id="PayForm4">
<input name = "cmd" value = "_xclick" type = "hidden">
<input name = "upload" value = "1" type = "hidden">
<input name = "no_note" value = "0" type = "hidden">
<input name = "bn" value = "PP-BuyNowBF" type = "hidden">
<input name = "tax" value = "0" type = "hidden">
<input name = "rm" value = "2" type = "hidden">

<input name = "business" value = "<?php echo $setting['paypal']?>" type = "hidden">
<input name = "handling_cart" value = "0" type = "hidden">
<input name = "currency_code" value = "USD" type = "hidden">
<input name = "lc" value = "GB" type = "hidden">
<input name = "return" value = "<?php echo site_url("home/buyAds2/".$client_id."/".$adsNumber)?>" type = "hidden">
<input name = "cbt" value = "Return to <?php echo $setting['site_name']?>" type = "hidden">
<input name = "cancel_return" value = "<?php echo site_url("home/buyAds/".$client_id."/".$adsNumber)?>" type = "hidden">
<input name = "custom" value = "paypal" type = "hidden">
<input name = "item_name" value = "شراء عدد <?php echo $adsNumber;?> إعلان type = "hidden">
<input name = "quantity" value = "1" type = "hidden">
<input name = "amount" value = "<?php echo $price;?>" type = "hidden">

</form>