

<?php $count = count($data); ?>
<script>
    $(function () {
        $("#checkAll").click(function () {
            if ($('#uniform-checkAll span').attr('class') =="checked") {
                for (var i=1;i<= <?php echo $count;?> ; i++)
                {
                    $("#uniform-checkbox"+i+" span").attr("class", "checked");
                }
                for (var i=1;i<= <?php echo $count;?> ; i++)
                {
                    $("#checkbox"+i).prop("checked", true);
                }
            } else {
                for (var i=1;i<= <?php echo $count;?> ; i++)
                {
                    $("#uniform-checkbox"+i+" span").attr("class", "");
                }
                for (var i=1;i<= <?php echo $count;?> ; i++)
                {
                    $("#checkbox"+i).prop("checked", false);
                }
            }
        });
    });
</script>
<script>
    function removeActivities(id)
    {
        $('.Items_'+id).fadeOut();
        $('.Shadow_'+id).fadeOut();
    }
    function showItems(id)
    {
        $('.Items_'+id).fadeIn();
        $('.Shadow_'+id).fadeIn();
    }
</script>
<div id="content" class="span10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url("products")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
            </li>
            <li>
                <?php echo lang("Orders")?>
            </li>
        </ul>
    </div>
    <div class="clear"></div>
    
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


    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                &nbsp;
                <!--<div class="box-icon">
                    <?php
                    $cat = $this->session->userdata('logged_in_customer');
                    ?>
                    <a class="btn btn-success" href="<?php echo site_url("customers/printD")?>?cat=<?=$this->session->userdata('logged_in_customer')['id'];?>" style="width:110px;" target="_blank">
                        <i class="icon-print icon-white"></i>
                        &nbsp;&nbsp;<?php echo lang("Print");?>&nbsp;&nbsp;
                    </a>
                </div>-->
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
                            <th><?php //echo lang("GPS") ;?></th>
                            <!--<th>Assign Driver</th>-->

                        </tr>
                        </thead>
                        <tbody>
                        <?php  $No = 0 ;




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
                                <td class="center">
                                     
									<?php echo $data_item['order_datetime']?>
                                     
                                </td>
                                <td class="center">


                                    <?php echo $data_item['total_amount']?>

                                     </td>
                                <td class="center">
                                    <?php
                echo $data_item['payment_method'];
	
                                    ?>
                                </td>
                                <td class="center">
                                    <?php
                                    

                    if($data_item['order_status'] == 1){ echo lang('PlacedOrder');}
                    if($data_item['order_status'] == 2) { echo lang('CancelOrder');}
                    if($data_item['order_status'] == 3) { echo lang('DeliveredOrder');}
                    if($data_item['order_status'] == 4) { echo lang('PendingOrder');}
                    ?>
                                    

                                </td>
                                <!--<td class="center"><a href="http://maps.google.com/maps?q=<?php echo $data_item['lat'].",".$data_item['lng'];?>" style="color: #ff0000;" target="_blank"><?php echo $data_item['lat'].",".$data_item['lng'];?></a></td>-->


                                <td class="center">


                                    <a class="btn btn-info" href="<?php echo site_url("administrator/orders/viewproductdetails/".$data_item['order_id']);?>">
                                        <i class="fa fa-eye icon-white"></i>View
                                    </a>

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