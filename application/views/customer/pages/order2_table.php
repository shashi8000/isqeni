<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $setting['site_name'];?> <?php echo $title ;?></title>
<meta name="description" content="<?php echo $setting['site_name']?> <?php echo $title ;?> <?php echo isset($data['desc'])? $data['desc']:"" ;?>" />
<meta name="keywords" content="<?php echo $setting['site_name']?> <?php echo $title ;?><?php echo isset($data['tags'])? $data['tags']:"" ;?>" />
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" type="text/css" />

<style>
body,img {max-width: 100% !important;}
</style>
</head>

<body>
<button style="background: #AAAAAA;color: #000;width: 200px;height: 40px;" name="Print" onclick="javascript:window.print();" id="Print" value=""><?php echo lang('Print'); ?></button>
<center><h2><?php echo lang('SalesReport'); ?></h2></center>

						<table class="table table-striped table-bordered bootstrap-datatable" width="100%" dir="rtl" border="1" cellpadding="0" cellspacing="0">
						  <thead>
							  <tr>
							    <th><?php echo lang('InvoiceNumber'); ?></th>
								<th><?php echo lang('Mobile'); ?></th>
								<th><?php echo lang('Date'); ?></th>
                                <th><?php echo lang('Time'); ?></th>
                                <th><?php echo lang('Total'); ?></th>
                                <th><?php echo lang('PaymentMethod'); ?></th>
                                <th><?php echo lang('Status'); ?></th>
                                <th><?php echo lang('ProductNum'); ?></th>
                                <th><?php echo lang('Quantity'); ?></th>
                                <th><?php echo lang('Price'); ?></th> 
                                <th><?php echo lang('GPS'); ?></th>
							  </tr>
						  </thead>
						  <tbody>
                    <?php $No = 0 ;
                          foreach($data as $data_item){
                    		// var_dump($data_item);
                          $No++ ; 
                               ?>
							<tr>
								<th><?php echo $data_item['id'] ;?></th>
                                <th class="center"><?php $dd = $this->data->get("clients",FALSE,array("id"=>$data_item['client_id'])) ; echo isset($dd['mobile'])?$dd['mobile'] :  lang("NoData") ;?></th>
								<th class="center"><?php echo $data_item['odate']?></th>
								<th class="center"><?php
                                $d = new DateTime($data_item['otime']);
                                $data_item['otime']  =  str_replace(":AM"," AM",$d->format('g:i:A'));
                                $data_item['otime']  =  str_replace(":PM"," PM",$data_item['otime']);
                                echo $data_item['otime']?></th>
                                <th class="center"><?php echo $this->data->getSum("cart","total_price",array("order_id"=>$data_item['id']));?></th>
                                <th class="center">
                                <?php 
                                    if($data_item['pay'] == 1) echo lang('MasterCard');
                                    if($data_item['pay'] == 2) echo lang('VisaCard');
                                    if($data_item['pay'] == 3) echo lang('Cash');
                                ?>
                                    
                                </th>
                                <th class="center">
                                    <?php 
                                        if($data_item['status'] == 0) echo lang('Pending');
                                        if($data_item['status'] == 1) echo lang('Shipped');
                                        if($data_item['status'] == 2) echo lang('Delivered');
                                    ?>
                                </th>
                                <th class="center"> 
                               <?php $prod_code = get_table('cart',['order_id'=>$data_item['id']]);
                                     foreach( $prod_code as $prods ){
                                     $prod_codez = $prods->prod_id;
                                     $prod_name = get_table('products',['id'=>$prod_codez]);
                                       foreach( $prod_name as $names ){
                                             echo $names->prod_num ."<br>";
                                         }
                                      } ?>
                                </th>
                                <th class="center"> 
                               <?php $prod_code = get_table('cart',['order_id'=>$data_item['id']]);
                                     foreach( $prod_code as $prods ){
                                     $prod_codez = $prods->prod_id;
                                     $prod_name = get_table('products',['id'=>$prod_codez]);
                                       foreach( $prod_name as $names ){
                                             echo $prods->count ."<br>";
                                         }
                                      } ?>
                                </th>
                                <th class="center"> 
                               <?php $prod_code = get_table('cart',['order_id'=>$data_item['id']]);
                                     foreach( $prod_code as $prods ){
                                     $prod_codez = $prods->prod_id;
                                     $prod_name = get_table('products',['id'=>$prod_codez]);
                                       foreach( $prod_name as $names ){
                                             echo $prods->price ."<br>";
                                         }
                                      } ?>
                                </th>
                                <th class="center"><?= $data_item['lng'] . " , " . $data_item['lat'] ?></th>
							</tr>
                            <?php } ?>
						  </tbody>
					  </table>
</body></html>