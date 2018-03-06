<?php $count = count($data); ?>



<div id="content" class="span10">
      <!-- content starts -->
      <div>
        <ul class="breadcrumb">
          <li>
            <?php echo lang("Home") ;?> <span class="divider">/</span>
          </li>
            <li>
                <?php echo lang("Purchase_Orders_Sales") ;?> <span class="divider">/</span>
            </li>
            <li>
            <?php echo lang("Orders")?>
          </li>
        </ul>
      </div>
            <div class="clear"></div>
            <form action="" method="get" id="search">
            <div class="control-group">
          <label class="control-label" for="selectError"><?php echo lang("DateFrom"); ?></label>
          <div class="controls">
          <input type="text" class="span6 datepicker" name="from" value="<?php echo $this->input->get('from')?>">
          </div>
      </div>
            <div class="control-group">
          <label class="control-label" for="selectError"><?php echo lang("DateTo"); ?></label>
          <div class="controls">
          <input type="text" class="span6 datepicker" name="to" value="<?php echo $this->input->get('to')?>">
          </div>
      </div>
            <div class="control-group">
        <label class="control-label" for="selectError2"><?php echo lang("Status"); ?></label>
        <div class="controls">
          <select id="selectError4" name="status">
             
              <option value=""><?php echo lang("All"); ?></option>
              <option value="1" <?php echo (isset($_REQUEST['status']) && $_REQUEST['status']=='1')?'selected':''; ?>><?php echo lang('PlacedOrder');?></option>
              <option value="2" <?php echo (isset($_REQUEST['status']) && $_REQUEST['status']=='2')?'selected':''; ?>><?php echo lang('CancelOrder');?></option>
              <option value="3" <?php echo (isset($_REQUEST['status']) && $_REQUEST['status']=='3')?'selected':''; ?>><?php echo lang('DeliveredOrder');?></option>
              <option value="4" <?php echo (isset($_REQUEST['status']) && $_REQUEST['status']=='4')?'selected':''; ?>><?php echo lang('PendingOrder');?></option>
          </select>
                              <p class="help-block">    </p>
        </div>
      </div>

            <div class="control-group">
        <label class="control-label" for="selectError2"><?php echo lang("PaymentMethod"); ?></label>
        <div class="controls">
          <select id="selectError5" name="pay">
              <option value=""><?php echo lang("All"); ?></option>
              <option value="COD" <?php echo (isset($_REQUEST['pay']) && $_REQUEST['pay']=='COD')?'selected':''; ?>>COD</option>
              <option value="HYPERPAY" <?php echo (isset($_REQUEST['pay']) && $_REQUEST['pay']=='HYPERPAY')?'selected':''; ?>>HYPERPAY</option>
              <option value="AMEX" <?php echo (isset($_REQUEST['pay']) && $_REQUEST['pay']=='AMEX')?'selected':''; ?>>AMEX</option>
			  <option value="PAYFORT" <?php echo (isset($_REQUEST['pay']) && $_REQUEST['pay']=='PAYFORT')?'selected':''; ?>>PAYFORT</option>
          </select>
           </div>
      </div>

             <div class="control-group">
                 <a style="margin-top: 22px;" class="btn btn-success"  href="javascript:document.getElementById('search').submit();">
         <i class="icon-zoom-in icon-white"></i>
          <?php echo lang("Filter"); ?>
         </a>
             </div>
              </form>

       <div class="clear"></div>

      <div class="row-fluid">
        <div class="box span12">
          <div class="box-header well" data-original-title>
            &nbsp;
            
          </div>
          <div class="box-content">
                  <form action="" method="post" id="table_form">
              <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                <tr>
                  <!--<th> <input type="checkbox" name="checkAll" id="checkAll">  </th>-->
                  <th><?php echo lang("InvoiceNumber") ;?></th>
                  <th><?php echo lang("ClientName") ;?></th>
                  <th><?php echo lang("ClientMobile") ;?></th>
                  <th><?php echo lang("ClientEmail") ;?></th>
                  <th><?php echo lang("ClientAddress") ;?></th>
                  <th><?php echo lang("Date") ;?></th>
                  <!--<th><?php echo lang("Time") ;?></th>-->
                  <th><?php echo lang("Total") ;?></th>
                  <th><?php echo lang("PaymentMethod") ;?></th>
                  <th><?php echo lang("OrderStatus") ;?></th>
                  
                  <th><?php echo lang("Assign_Driver") ;?></th>
                  <th><?php //echo lang("GPS") ;?></th>
                </tr>
              </thead>
              <tbody>
                <?php  $No = 0 ;


//echo '<pre>';
//print_r($data);

                    if ( $data ) foreach($data AS $data_item){
                    $No++ ;
                       //print '<pre>';
                       //print_r($data_item);
                       //exit;
                    ?>
              <tr>
                <!--<td><input type="checkbox" name="check[]" id="checkbox<?php echo $No ;?>" class="checkbox" value="<?php echo $data_item['id'] ;?>"/></td>-->
                <td><?php echo $data_item['order_id'] ;?></td>
                <td class="center"><?php
                    $clientdetail=$this->data->getclientshipdetails($data_item['client_id'], $data_item['shipping_id']);

                    //print'<pre>';
                    //print_r( $clientdetail);

                    if(@$clientdetail[0]['client_name'] !=''){
                        echo @$clientdetail[0]['client_name'];
                    }else{
                        echo 'N/A';
                    }

                     ?>
                    </td>
                <td class="center"><?php if(@$clientdetail[0]['mobile'] !=''){
                        echo @$clientdetail[0]['mobile'];
                    }else{
                        echo 'N/A';
                    }?></td>
                <td class="center"><?php if(@$clientdetail[0]['email'] !=''){
                        echo @$clientdetail[0]['email'];
                    }else{
                        echo 'N/A';
                    }?></td>
                <td class="center">

                    <?php

                    if(@$clientdetail[0]['street'] !='' ){
                        echo @$clientdetail[0]['street'] . ',';
                    }else{
                        echo 'N/A' . ',';
                    }

                    if(@$clientdetail[0]['house'] !='' ){
                        echo @$clientdetail[0]['house'] . ',';
                    }else{
                        echo 'N/A' . ',';
                    }

                    if(@$clientdetail[0]['landmark'] !='' ){
                        echo @$clientdetail[0]['landmark'] ;
                    }else{
                        echo 'N/A' ;
                    }



                    ?></td>
                <td class="center"><?php echo $data_item['order_datetime']?></td>
                <!--<td class="center">
                    <?php
                        $d = new DateTime($data_item['otime']);
                        $data_item['otime']  =  str_replace(":AM"," AM",$d->format('g:i:A'));
                        $data_item['otime']  =  str_replace(":PM"," PM",$data_item['otime']);
                        echo $data_item['otime'];?>
                </td>-->
                <td class="center">
                    <?php
                   $selvals = $this->data->order_vendel_totla($vendorId, $data_item['order_id']);
                    $i = 0;
                    $amount;
                    foreach($selvals as $selval) {
                        @$amount += $selval['total_amount'];
                        //echo '<pre>';
                        //print_r($selval['total_amount']);
                        $i++;
                    }
                    if (isset($amount))
                    {
                        echo $amount;
                    }

                    //echo $this->data->getSum("cart","total_price",array("order_id"=>$data_item['id']));
                    //print '<pre>';
                    //print_r($data_item);
                    ?></td>
                <td class="center">
                    <?php
                    echo $data_item['payment_method'];
                    /*
                    if($data_item['payment_method'] == 'cod') echo 'COD';
                    if($data_item['payment_method'] == 'hyperpay') echo 'Hyper Pay';
                    if($data_item['payment_method'] == 'AMEX') echo 'AMEX';
					if($data_item['payment_method'] == 'PAYFORT') echo 'PAYFORT';
          */
                    ?>
                </td>
                <td class="center">
                    <?php
                    $valVStatus = $this->data->getOrderVendorStatus($data_item['order_id']);
                    
                    if($valVStatus[0]['status'] == 1){ echo lang('PlacedOrder');}
                    if($valVStatus[0]['status'] == 2) { echo lang('CancelOrder');}
                    if($valVStatus[0]['status'] == 3) { echo lang('DeliveredOrder');}
                    if($valVStatus[0]['status'] == 4) { echo lang('PendingOrder');}
                    if($valVStatus[0]['status'] == 6) { echo lang('PendingOrder');}
                    ?>
                </td>
                <!--<td class="center"><a href="http://maps.google.com/maps?q=<?php echo $data_item['lat'].",".$data_item['lng'];?>" style="color: #ff0000;" target="_blank"><?php echo $data_item['lat'].",".$data_item['lng'];?></a></td>-->
                  <td class="center">
                      <?php
                      
                      $sqlcoupon = "SELECT * from drivers as p WHERE vendor_id ='".$vendorId."'   AND device_token IS NOT NULL and deleted_at IS  NULL ";
				 //echo $sqlcoupon;
                      $query=$this->db->query($sqlcoupon);
                      $rows = $query->result();
                      //echo '<pre>';
                      //print_r($rows);
					//echo $data_item['driver_id'];			
                      if($data_item['driver_id']){
                      $sqlcoupon = "SELECT * from drivers as p WHERE p.id ='".$data_item['driver_id']."' ";
                      $query=$this->db->query($sqlcoupon);
                      $rows1 = $query->result_array();
                      
                        echo $rows1[0]['name_ar'].'--'.$rows1[0]['name_en'];
                      }else{  
						//echo '111111';

                      ?>
                      <select  style="width:100px; !important" name="Cform[coupon]" id="selectError3" required onChange="getCoupons(<?=$data_item['order_id'];?>,<?=$vendorId;?>,this);">
                          <option value=""><?php echo 'Assign' ;?></option>
                          <?php foreach($rows as $each){?>
                              <option <?php if($data_item['driver_id']==$each->id){ echo 'selected';} ?> value="<?php echo $each->id; ?>"><?php echo $each->name_en; ?>--<?php echo $each->name_ar; ?></option>';
                          <?php }?>
                      </select>
                      <?php } ?>
                  </td>

                  <td class="center">
                    <!--
                      <a class="btn btn-info" href="<?php echo site_url("customers/edit/".$data_item['id']);?>">
                        <i class="icon-edit icon-white"></i> <?php echo lang("Edit") ;?>
                    </a>

                    <a class="btn btn-info" target="_blank" href="<?php echo site_url("bill/".$data_item['id'])."?cat=".$this->session->userdata('logged_in_customer')['id'];?>">
                        <i class="icon-print icon-white"></i> <?php echo lang("InvoiceDetails") ;?>
                    </a>
                    -->
                   <!--
                   <a onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger" href="<?php echo site_url("customers/delete/".$data_item['id']);?>">
                    <i class="icon-trash icon-white"></i>
                    <?php echo lang("Delete") ;?>
                  </a>
                  -->

                      <a class="btn btn-info" href="<?php echo site_url("orders/viewproductdetails/".$data_item['order_id']);?>">
                          <i class="fa fa-eye icon-white"></i>View
                      </a>
                      <?php if($valVStatus[0]['status'] == 1){?> 

                      <a

class="btn btn-danger" 




                       href="orders/rejection/<?php echo $data_item['order_id'];?>">
                          <i class="fa fa-eye icon-white"></i>Reject
                      </a>
                      <?php }?>

                </td>

              </tr>
                                 <?php } ?>
              </tbody>
            </table>
                      </form>
                      <?php // echo $links;?>
          </div>
        </div><!--/span-->
      </div><!--/row-->
          <!-- content ends -->
      </div><!--/#content.span10-->
        </div><!--/fluid-row-->


<script>
    function getCoupons(orderid,vendorid,is) {
        var driverid = is.value;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('orders/driverdatain'); ?>?orderid="+orderid+"&vendorid="+vendorid+"&driverid="+driverid,

            success: function(data){
                $("#couponcodeSelIds").html(data);
            }
        });
    }
    $("#saveRejection").click(function (){
      $.ajax({
            type: "POST",
            url: "orders/driverdatain?orderid="+orderid+"&vendorid="+vendorid;

            success: function(data){
                $("#couponcodeSelIds").html(data);
            }
        });
   });
</script>


<style>
element.style {
        display: block;
}
#Items  {
        background: #fff none repeat scroll 0 0;
    border: 5px solid #e26148;
    border-radius: 15px;
    display: none;
    left: 20%;
    min-height: 300px;
    max-height: 500px;
    overflow: auto;
    font-family: ge,tahoma;
    padding: 20px;
    position: fixed;
    top: 10%;
    width: 50%;
    z-index: 99999;
}
#Shadow {
          background: #000 none repeat scroll 0 0;
    display: none;
    height: 100%;
    position: fixed;
    top: 0;
     left: 0;
    width: 100%;
    z-index: 999;
    opacity: .5;
}
#Activities .btn {
        margin: 0px 5px 15px 10px ;
}
.errorcls {
        box-shadow : 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(255, 0, 0, 0.6) !important   ;
    border-color: rgba(255, 0, 0, 0.8) !important;
}
#search .control-group {
    float: left !important;
    margin: 0 5px;
}
</style>