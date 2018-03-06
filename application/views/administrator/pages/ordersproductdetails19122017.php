<?php
//print_r($data);
//exit;
?>
<link href="<?php echo base_url()?>css/style.css" rel="stylesheet" type="text/css" />

<div id="content" class="span10">
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title="">
                &nbsp;
                <div class="box-icon">
                </div>
            </div>
            <div class="box-content">
                <legend>Order Details</legend>



                <table style="margin-bottom:1em;" width="600" cellpadding="0" cellspacing="0" align="center" class="table table-striped table-bordered bootstrap-datatable">
                    <tbody><tr align="left">
                        <th width="70%"><h2 style="color:rgba(51,51,51,1); font-size:20px; line-height:normal; font-weight:normal; margin-top:0; margin-bottom:0;">Shipped To</h2></th>
                        <th><h2 style="color:rgba(51,51,51,1); font-size:20px; line-height:normal; font-weight:normal; margin-top:0; margin-bottom:0;">Status</h2></th>
                    </tr>
                    <tr>
                        <td><p style="margin-top:0; margin-bottom:0;">
                              <?php
                                $cliendetails=$this->data->getclientdetails($data[0]['client_id'], $data[0]['shipping_id']);
                                  if(@$cliendetails[0]['name'] !=''){
                                      echo $cliendetails[0]['name'];
                                  }else{
                                      echo 'N/A';
                                  }
                              ?>
                                <br>
                                <?php
                                 if(@$cliendetails[0]['city'] !=''){$clientcity=$cliendetails[0]['city'];}else{$clientcity='N/A';}
                                 if(@$cliendetails[0]['street'] !=''){$street=$cliendetails[0]['street'];}else{$street='N/A';}
                                 if(@$cliendetails[0]['house'] !=''){$house=$cliendetails[0]['house'];}else{$house='N/A';}
                                 if(@$cliendetails[0]['landmark'] !=''){$landmark=$cliendetails[0]['landmark'];}else{$landmark='N/A';}

                                echo $clientcity.','.  $street .','. $house .','. $landmark;
                                ?>
                                <br>
                                <?php
                                if(@$cliendetails[0]['mobile'] !=''){
                                    echo 'Contact Number:'. $cliendetails[0]['mobile'];
                                }else{
                                    echo 'N/A';
                                }
                                ?>
                            </p></td>
                        <td><h3 style="margin-top:0; margin-bottom:0; font-weight:normal; font-size:18px;"><?php
                                if($data[0]['order_status'] ==1){
                                    echo 'placed';
                                }elseif($data[0]['order_status'] ==2){
                                    echo 'cancel';
                                }elseif($data[0]['order_status'] ==3){
                                    echo 'delivered';
                                }elseif($data[0]['order_status'] ==4){
                                    echo 'pending';
                                }
                        ?></h3></td>
                    </tr>
                    </tbody>
                </table>



                    <table style="width:100%" class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                        <?php
                        $No = 0 ;
                        $i = 0;
                        foreach($data as $data_item){
                            $No++;

                            //print '<pre>';
                            //print_r($data_item);
                        ?>
                            <tr>

                                <td colspan="9">
                                    <table   cellpadding="10" cellspacing="0" border="0" align="center" class="table table-striped table-bordered bootstrap-datatable">
                                        <tbody><tr >
                                            <td><table  class="table table-striped table-bordered bootstrap-datatable">
                                                    <tbody><tr colspan="9">
                                                        <th>Vendor Name</th>
                                                        <th>Assignedn To</th>
                                                        <th>Vhicle Type</th>
                                                        <th colspan="2">Vhicle Details</th>
                                                        <th>Driving Licence No.</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php if($this->config->config['language'] =='arabic'):?>
                                                            <?php
                                                                if($data_item['name'] !=''){
                                                                    echo $data_item['name'];
                                                                }else{
                                                                    echo 'N/A';
                                                                }
                                                            ?>
                                                            <?php else : ?>
                                                            <?php
                                                                if($data_item['name_en'] !=''){
                                                                    echo $data_item['name_en'];
                                                                }else{
                                                                    echo 'N/A';
                                                                }
                                                            ?>
                                                            <?php endif; ?></td>
                                                        <td>
                                                            <?php $driverdetails=$this->data->getdriverdetails($data_item['order_id']);
                                                            //echo '<pre>';
                                                           // print_r($driverdetails);
                                                            ?>
                                                            <?php if($this->config->config['language'] =='arabic'):?>
                                                                <?php
                                                                if($driverdetails[0]['name_ar'] !=''){
                                                                    echo $driverdetails[0]['name_ar'];
                                                                }else{
                                                                    echo 'N/A';
                                                                }
                                                                ?>
                                                            <?php else : ?>
                                                                <?php
                                                                if($driverdetails[0]['name_en'] !=''){
                                                                    echo $driverdetails[0]['name_en'];
                                                                }else{
                                                                    echo 'N/A';
                                                                }
                                                                ?>
                                                            <?php endif; ?>

                                                            <br>
                                                            Contact No. <strong><?php
                                                                if($driverdetails[0]['mobile'] !=''){
                                                                    echo $driverdetails[0]['mobile'];
                                                                }else{
                                                                    echo 'N/A';
                                                                }
                                                            ?></strong></td>
                                                        <td>
                                                            <?php if($this->config->config['language'] =='arabic'):?>
                                                                Color:<strong><?php
                                                                    if($driverdetails[0]['car_type_ar'] !=''){
                                                                        echo $driverdetails[0]['car_type_ar'];
                                                                    }else{
                                                                        echo 'N/A';
                                                                    }
                                                                ?></strong>
                                                            <?php else : ?>
                                                                Color:<strong><?php
                                                                    if($driverdetails[0]['car_type_en'] !=''){
                                                                        echo $driverdetails[0]['car_type_en'];
                                                                    }else{
                                                                        echo 'N/A';
                                                                    }
                                                                    ?></strong>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td colspan="2">
                                                            <?php if($this->config->config['language'] =='arabic'):?>
                                                                Color:<strong><?php
                                                                    if($driverdetails[0]['car_color_ar'] !=''){
                                                                        echo $driverdetails[0]['car_color_ar'];
                                                                    }else{
                                                                        echo 'N/A';
                                                                    }
                                                                ?></strong>
                                                            <?php else : ?>
                                                                Color:<strong><?php
                                                                    if($driverdetails[0]['car_color_en'] !=''){
                                                                        echo $driverdetails[0]['car_color_en'];
                                                                    }else{
                                                                        echo 'N/A';
                                                                    }
                                                                ?></strong>
                                                            <?php endif; ?>
                                                            <br>
                                                            Number: <strong><?php
                                                                if($driverdetails[0]['car_number'] !=''){
                                                                    echo $driverdetails[0]['car_number'];
                                                                }else{
                                                                    echo 'N/A';
                                                                }
                                                            ?></strong></td>
                                                        <td><?php
                                                            if($driverdetails[0]['driver_licence_number'] !=''){
                                                                echo $driverdetails[0]['driver_licence_number'];
                                                            }else{
                                                                echo 'N/A';
                                                            }
                                                        ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>QTY</th>
                                                        <th>Coupon</th>
                                                        <th>Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:70px;">
                                                            <?php $product=$this->data->getproductbyid($data_item['product_id']);?>
                                                            <img class="grayscale" src="<?php echo $product['photo'];?>" width="50px" alt="<?php echo $product['name'];?>"></td>
                                                        <td><strong><?php
                                                                if($this->config->config['language'] =='arabic'):
                                                                    ?>
                                                                    <?php echo $product['name'];?>
                                                                <?php else : ?>
                                                                    <?php echo $product['name_en'];?>
                                                                <?php endif; ?></strong></td>
                                                        <td><?php echo $data_item['price'];?></td>
                                                        <td><?php echo $data_item['qty'];?></td>
                                                        <td><?php if($data_item['coupon_code'] !='') {
                                                                echo $data_item['coupon_code'];
                                                            }else{
                                                                echo 'N/A';
                                                            }?></td>
                                                        <td><strong><?php echo $data_item['total_amount'];?></strong></td>
                                                    </tr>
                                                    </tbody></table></td>
                                        </tr>
                                        </tbody></table>

                                </td>
                            </tr>

                        <?php
                            @$amount += $data_item['total_amount'];
                            @$subtotal += $data_item['sub_total'];
                            $i++;
                        } ?>

                        <tr>
                            <td colspan="8" style="text-align:right"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="8" style="text-align:right"><strong>Order Total:</strong></td>
                            <td><strong><?php echo $amount;?></strong></td>
                        </tr>
                        </tbody>
                    </table>


                <!--
                <table cellpadding="0" cellspacing="0" border="0" align="center" class="table table-striped table-bordered bootstrap-datatable">
                    <tbody><tr>
                        <td>

                            <table bgcolor="#fff" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tbody><tr>

                                    <td width="100%">
                                        </td>

                                </tr>
                                </tbody></table></td>
                    </tr>

                    <tr bgcolor="#ffffff">
                        <td>

                            <table style="margin-bottom:1em;" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table table-striped table-bordered bootstrap-datatable">
                                <tbody><tr>

                                    <td></td>

                                </tr>


                                </tbody></table>
                            <table style="margin-bottom:1em;" width="600" cellpadding="0" cellspacing="0" align="center" class="table table-striped table-bordered bootstrap-datatable">
                                <tbody><tr align="left">
                                    <th width="70%"><h2 style="color:rgba(51,51,51,1); font-size:20px; line-height:normal; font-weight:normal; margin-top:0; margin-bottom:0;">Shipped To</h2></th>
                                    <th><h2 style="color:rgba(51,51,51,1); font-size:20px; line-height:normal; font-weight:normal; margin-top:0; margin-bottom:0;">Status</h2></th>
                                </tr>
                                <tr>
                                    <td><p style="margin-top:0; margin-bottom:0;">
                                            <?php
                                            $cliendetails=$this->data->getclientdetails($data[0]['client_id'], $data[0]['shipping_id']);
                                            echo $cliendetails[0]['name'];
                                            ?>,<br>
                                            <?php
                                            echo $cliendetails[0]['city'] .','.  $cliendetails[0]['street'] .','. $cliendetails[0]['house'] .','. $cliendetails[0]['landmark'];
                                            ?><br>
                                            <?php
                                            echo 'Contact Number:'. $cliendetails[0]['mobile'];
                                            ?></p></td>
                                    <td><h3 style="margin-top:0; margin-bottom:0; font-weight:normal; font-size:18px;">
                                        <?php
                                        if($data[0]['order_status'] ==1){
                                            echo 'placed';
                                        }elseif($data[0]['order_status'] ==2){
                                            echo 'cancel';
                                        }elseif($data[0]['order_status'] ==3){
                                            echo 'delivered';
                                        }elseif($data[0]['order_status'] ==4){
                                            echo 'pending';
                                        }
                                        ?>
                                        </h3></td>
                                </tr>
                                </tbody></table>
                            <table bgcolor="#f6f4f1" style="margin-bottom:15px;" width="560" cellpadding="0" cellspacing="0" border="0" align="center" class="table table-striped table-bordered bootstrap-datatable">
                                <tbody><tr>
                                    <td>


                                        <?php
                                        $No = 0 ;
                                        $i = 0;
                                        foreach($data as $data_item){
                                        $No++;

                                        //echo '<pre>';
                                        //print_r($data_item);
                                        ?>
                                        <table  cellpadding="10" cellspacing="0" border="0" align="center" class="table table-striped table-bordered bootstrap-datatable">
                                            <tbody><tr>
                                                <td>


                                                    <table class="table table-striped table-bordered bootstrap-datatable">
                                                        <tbody><tr>
                                                            <th>Vendor Name</th>
                                                            <th>Assignedn To</th>
                                                            <th>Vhicle Type</th>
                                                            <th colspan="2">Vhicle Details</th>
                                                            <th>Driving Licence No.</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Sabir Khan</td>
                                                            <td>Vasim Shaikh<br>
                                                                Contact No. <strong>8765432210</strong></td>
                                                            <td>Truck</td>
                                                            <td colspan="2">Color: <strong>Black</strong><br>
                                                                Number: <strong>DA457</strong></td>
                                                            <td>A454FGD</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>QTY</th>
                                                            <th>Coupon</th>
                                                            <th>Total</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:70px;">
                                                                <?php
                                                                $product=$this->data->getproductbyid($data_item['product_id']);
                                                                ?>
                                                                <img class="grayscale" src="<?php echo $product['photo'];?>" width="50px" alt="<?php echo $product['name'];?>"></td>
                                                            <td><strong><?php
                                                                    if($this->config->config['language'] =='arabic'):
                                                                        ?>
                                                                        <?php echo $product['name'];?>
                                                                    <?php else : ?>
                                                                        <?php echo $product['name_en'];?>
                                                                    <?php endif; ?><br>
                                                                    </strong></td>
                                                            <td><?php echo $data_item['price'];?></td>
                                                            <td><?php echo $data_item['qty'];?></td>
                                                            <td>ABC1234</td>
                                                            <td><strong><?php echo $data_item['total_amount'];?></strong></td>
                                                        </tr>
                                                        </tbody></table>


                                                </td>
                                            </tr>
                                            </tbody></table>

                                            <?php
                                            @$amount += $data_item['total_amount'];
                                            @$subtotal += $data_item['sub_total'];
                                            $i++;
                                        }?>
                                        <table class="datatable" class="table table-striped table-bordered bootstrap-datatable">
                                            <tbody>

                                            <tr>
                                                <td colspan="5" style="text-align:right"><strong>Order Total:</strong></td>
                                                <td><strong> <?php echo $amount;?></strong></td>
                                            </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                                </tbody></table>
                            <table bgcolor="#f6f4f1" style="margin-bottom:15px;" cellpadding="0" cellspacing="0" border="0" align="center" class="table table-striped table-bordered bootstrap-datatable">
                                <tbody><tr>
                                    <td></td>
                                </tr>
                                </tbody></table>



                             </td>
                    </tr>




                    <tr>
                        <td></td>
                    </tr>



                    <tr> </tr>


                    </tbody></table>
                    -->










            </div>

        </div><!--/span-->

    </div><!--/row-->

    <!-- content ends -->
</div><!--/#content.span10-->
</div><!--/fluid-row-->

<style>
    element.style {
        display: block;
    }
    #Activities,#Activities2 {
        background: #fff none repeat scroll 0 0;
        border: 5px solid #e26148;
        border-radius: 15px;
        display: none;
        left: 10%;
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
        opacity: 0;
    }
    #Activities .btn {
        margin: 0px 5px 15px 10px ;
    }
</style>