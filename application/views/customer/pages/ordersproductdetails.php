<?php
//$count=10;
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
                    <table>
                        <tr><td>This Order Submitted by:  <?php
                                //$clientDetails = $this->data->getorderid($Corderid);
                                //print $clientDetails['name'];
                                ?></td></tr>
                    </table>
                    <table style="width:100%" class="table table-striped table-bordered bootstrap-datatable">
                        <tbody><tr>
                            <th>Sr. No</th>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Sub Total</th>
                            <th>Discount</th>
                            <th>Total Amount</th>
                        </tr>
                        <?php
                        $No = 0 ;
                        $i = 0;
                        foreach($data as $data_item){
                            $No++;
                        ?>
                            <tr>
                                <td style="width:70px;"><?php echo $No ;?></td>
                                <td style="width:70px;">
                                <?php
                                $product=$this->data->getproductbyid($data_item['product_id']);
                                ?>
                                <img class="grayscale" src="<?php echo $product['photo'];?>" width="50px" alt="<?php echo $product['name'];?>">
                                </td>
                                <td><strong>
                            <?php
                                if($this->config->config['language'] =='arabic'):
                            ?>
                                    <?php echo $product['name'];?>
                                    <?php else : ?>
                                    <?php echo $product['name_en'];?>
                                    <?php endif; ?>
                                        </strong></td>
                                <td><?php echo $data_item['price'];?></td>
                                <td><?php echo $data_item['qty'];?></td>
                                <td><strong><?php echo $data_item['sub_total'];?></strong></td>
                                <td><strong><?php echo $data_item['discount'];?></strong></td>
                                <td><strong><?php echo $data_item['total_amount'];?></strong></td>
                            </tr>

                        <?php
                            @$amount += $data_item['total_amount'];
                            @$subtotal += $data_item['sub_total'];
                            $i++;
                        } ?>

                        <tr>
                            <td colspan="7" style="text-align:right"></td>
                            <td><strong></strong></td>
                        </tr>
                        <tr>
                            <td colspan="7" style="text-align:right"><strong>Order Total:</strong></td>
                            <td><strong><?php echo $amount;?></strong></td>
                        </tr>
                        </tbody>
                    </table>
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