<?php $lang = $this->session->userdata('langId'); ?>
<h1><?php $cat  = $this->session->userdata('logged_in_customer')['id'];?></h1>

<table width="100%" dir="rtl">
    <tr>
        <th width="40%"><?php echo lang('InvoiceNumber'); ?> : </th>
        <th style="color: #3300FF"><?php echo $Data['id']?></th>
    </tr>
    <tr>
        <th><?php echo lang('Time'); ?> : </th>
        <th style="color: #3300FF">
        <?php
        $x =  date_format(date_create($Data['odate']." ".$Data['otime']), 'Y-m-d g:i A');
        $x  =  str_replace("AM"," AM",$x);
        $x  =  str_replace("PM"," PM",$x);
        echo $x ;
        ?> 
        </th>
    </tr>
    <tr>
        <th><?php echo lang('Name'); ?> : </th>
        <th style="color: #3300FF"><?php echo $Data['name'];?></th>
    </tr>
    <tr>
        <th><?php echo lang('Mobile'); ?> : </th>
        <th style="color: #3300FF"><?php echo $Data['mobile'];?></th>
    </tr>
    <tr>
        <th><?php echo lang('Email'); ?> : </th>
        <th style="color: #3300FF"><?php echo $Data['email'];?></th>
    </tr>
    <tr>
        <th><?php echo lang('Address'); ?> : </th>
        <th style="color: #3300FF"><?php echo $Data['address'];?></th>
    </tr>
    <tr>
        <th><?php echo lang('GPS'); ?> : </th>
        <th style="color: #3300FF"><?php echo $Data['lat'].','.$Data['lng'];?></th>
    </tr>
    <tr>
        <th><?php echo lang('Status'); ?> : </th>
        <?php $status = get_this('orders',['id'=>$this->uri->segment(2)]);?> 
        <th style="color: #3300FF">
        <?php 
            if ( $status['status'] == 0 ) echo lang('Pending');
            elseif( $status['status'] == 1 ) echo lang('Shipped');
            elseif( $status['status'] == 2 ) echo lang('Delivered');
        ?>
        </th>
    </tr>
</table>

<hr />

<table width="100%" dir="rtl">
<?php $price = 0 ;
      $count = 0 ;
     
     if(isset($_GET['cat'])){
         
        $cat = $_GET['cat'];
        foreach($items AS $item){
            $product    = $this->data->get('products',FALSE,array("id"=>$item['prod_id'],"cat_id"=>$cat),1);
            $address    = $this->data->get("address",FALSE,array("id"=>$item['address_id']),1);
            $area       = @$this->data->get("area",FALSE,array("id"=>$address['area_id']),1);
            $price      = $item['total_price'] ;
            $count      = $item['count'] ;
?>

   <?php if (!empty($product['prod_num']) || !empty($product['prod_name'])){ ?>
   <tr>
   
   <th><?php echo lang('ProductNum'); ?></th>
   <th style="color: #3300FF"><?php echo isset($product['prod_num'])?$product['prod_num']:"";?></th>
   
   <th><?php echo lang('ProductName'); ?></th>
   <th style="color: #3300FF"><?php echo isset($product['name'])?$product['name']:"";?></th>
   
   </tr>

   <tr>
   
   <th><?php echo lang('Price'); ?></th>
    <th style="color: #3300FF"><?php echo $item['price']?></th>
    <th><?php echo lang('Quantity'); ?></th>
    <th style="color: #3300FF"><?php echo $item['count']?></th>
   </tr>
   
   <tr>
     <th colspan="4" style="background: #757575">&nbsp;</th>
   </tr>

</table>

<hr />

<table width="100%" dir="rtl">
    <tr>
        <th width="40%"><?php echo lang('Total'); ?></th>
        <th style="color: #3300FF"><?php echo $price ; ?> </th>
    </tr>
    <tr>
        <th><?php echo lang('TotalQuantity'); ?></th>
        <th style="color: #3300FF"><?php echo $count; ?></th>
    </tr>
</table>



   <?php } ?>


   <?php } ?>
<button style="background: #AAAAAA;color: #000;width: 200px;height: 40px;" name="Print" onclick="javascript:window.print();" id="Print" value=""><?php echo lang('Print'); ?></button>    


<?php }else{
     
     foreach($items AS $item){
        $product    = $this->data->get("products",FALSE,array("id"=>$item['prod_id']),1);    
        $address    = $this->data->get("address",FALSE,array("id"=>$item['address_id']),1);
        $area       = @$this->data->get("area",FALSE,array("id"=>$address['area_id']),1);
        $price      += $item['total_price'] ;
        $count      += $item['count'] ;
?>
   
    <tr>
   
        <th><?php echo lang('ProductNum'); ?></th>
        <th style="color: #3300FF"><?php echo isset($product['prod_num'])?$product['prod_num']:"";?></th>
   
        <th><?php echo lang('ProductName'); ?></th>
        <th style="color: #3300FF"><?php echo isset($product['name'])?$product['name']:"";?></th>
   
   </tr>
   
   <tr>
        <th><?php echo lang('Price'); ?></th>
        <th style="color: #3300FF"><?php echo $item['price']?></th>
        <th><?php echo lang('Quantity'); ?></th>
        <th style="color: #3300FF"><?php echo $item['count']?></th>
   </tr>
   
   <tr>
        <th colspan="4" style="background: #757575">&nbsp;</th>
   </tr>
<?php } ?>

</table>

<hr />

<table width="100%" dir="rtl">
    <tr>
        <th width="40%"><?php echo lang('Total'); ?></th>
        <th style="color: #3300FF"><?php echo $price ; ?> </th>
    </tr>
    <tr>
        <th><?php echo lang('TotalQuantity'); ?></th>
        <th style="color: #3300FF"><?php echo $count; ?></th>
    </tr>
</table>

<button style="background: #AAAAAA;color: #000;width: 200px;height: 40px;" name="Print" onclick="javascript:window.print();" id="Print" value=""><?php echo lang('Print'); ?></button>

<?php } ?>