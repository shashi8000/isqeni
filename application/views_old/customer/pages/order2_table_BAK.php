<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $setting['site_name'];?> <?php echo $title ;?></title>
<meta name="description" content="<?php echo $setting['site_name']?> <?php echo $title ;?> <?php echo isset($data['desc'])? $data['desc']:"" ;?>" />
<meta name="keywords" content="<?php echo $setting['site_name']?> <?php echo $title ;?><?php echo isset($data['tags'])? $data['tags']:"" ;?>" />
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" type="text/css" />

<style>
body,img {
    max-width: 100% !important;
}

</style>
</head>

<body>
<button style="background: #AAAAAA;color: #000;width: 200px;height: 40px;" name="Print" onclick="javascript:window.print();" id="Print" value="طباعة الفاتورة">طباعة التقرير</button>
<center><h2>تقرير مبيعات</h2></center>
<?php
  if($this->input->get("from")) {
    $fTxt = "بداية من ".$this->input->get("from") ;
  }else{
    $fTxt = "";
  }
?>
<?php
  if($this->input->get("to")) {
    $tTxt = "الي تاريخ ".$this->input->get("to") ;
  }else{
    $tTxt = "";
  }
?>
<center><h4>اجمالي المبيعات <?php echo $fTxt;?> <?php echo $tTxt;?></h4>   </center>
<center><h3>اجمالي المبيعات <?php echo $this->data->getSum("cart","total_price",array("order_id"=>$CountSearch)) ;?></h3>   </center>
						<table class="table table-striped table-bordered bootstrap-datatable" width="100%" dir="rtl" border="1" cellpadding="0" cellspacing="0">
						  <thead>
							  <tr>
								  <th>رقم الفاتورة</th>
								  <th>موبايل العميل</th>
                                  <th>تاريخ الطلب</th>
                                  <th>وقت الطلب</th>
                                  <th>اجمالي الفاتورة</th>
                                  <th>طريقة الدفع</th>
                                  <th>حاله الطلب</th>
							  </tr>
						  </thead>
						  <tbody>
                          <?php $gets = $this->db->get_where('orders',['client_id'=>$this->session->userdata('logged_in_customer')['id']])->result_array();
                                $No = 0 ;
                                foreach($gets AS $data_item){
                                $No++ ; ?>
							<tr>
								<th><?php echo $data_item['id'] ;?></th>
                                <th class="center"><?php $dd = $this->data->get("clients",FALSE,array("id"=>$data_item['client_id'])) ; echo isset($dd['mobile'])?$dd['mobile'] :  lang("NoData") ;?></th>
								<th class="center"><?php echo $data_item['odate']?></th>
								<th class="center"><?php
                                 $d = new DateTime($data_item['otime']);
                                $data_item['otime']  =  str_replace(":AM"," صباحا",$d->format('g:i:A'));
                                $data_item['otime']  =  str_replace(":PM"," مساءا",$data_item['otime']);
                                echo $data_item['otime']?></th>
                                <th class="center"><?php echo $this->data->getSum("cart","total_price",array("order_id"=>$data_item['id']));?></th>
                                <th class="center"><?php echo getPay($data_item['pay']);?></th>
                                <th class="center"><?php echo getImportance($data_item['status']);?></th>

							</tr>
                            <?php } ?>

						  </tbody>
					  </table>

</body></html>