<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html>
<head><META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<input type="button" onclick="printDiv('printableArea')" value="Make Print" />
<div id="printableArea">
<?php
//echo '<pre>';
//print_r($data);

$dataV = $this->data->getVendorName($_REQUEST['vendor_id']);
//echo '<pre>';

//print_r($dataV);

 ?>



<div style="margin:0;padding:0;color:rgba(0,0,0,1)">
<table width="100%" style="margin:0;padding:0;border-spacing:0;border-collapse:collapse;vertical-align:middle">
  <tr>
    <td width="50%" style="color:rgba(22,104,130,1);font-size:24px;font-family:Arial;background:rgba(219,242,249,1);padding:15px 15px 20px 15px"><strong>ISQENI</strong></td>
    <td width="50%" colspan="2" align="right" style="background:rgba(22,104,130,1);font-size:24px;font-family:Arial;color:rgba(255,255,255,1);padding:15px 15px 20px 15px"><strong>PORCHES REQUEST ( طلب )  <?php echo $dataV[0]->name.'-'.$dataV[0]->name_en;?></strong></td>
  </tr>
  <tr>
    <td style="color:rgba(22,104,130,1);font-size:12px;font-family:Arial;background:rgba(219,242,249,1);padding:5px 15px">Al Awaly st</td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px;width:100px"><strong><!--Invoice No.:--></strong></td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px"><!--12345678--></td>
  </tr>
  <tr>
    <td style="color:rgba(22,104,130,1);font-size:12px;font-family:Arial;background:rgba(219,242,249,1);padding:5px 15px">Riyadh, Saudi Arabia</td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px"><strong>Request Date:</strong></td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px"><?php echo date('Y-m-d'); ?></td>
  </tr>
  <tr>
    <td style="color:rgba(22,104,130,1);font-size:12px;font-family:Arial;background:rgba(219,242,249,1);padding:5px 15px"><a href="mailto:mohammed@isqeni.com" target="_blank">mohammed@isqeni.com</a></td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px"><strong>Due of month:</strong></td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px"><?php 

     echo $_REQUEST['year_month'];

   

     ?></td>
  </tr>
  <tr>
    <td style="color:rgba(22,104,130,1);font-size:12px;font-family:Arial;background:rgba(219,242,249,1);padding:5px 15px"><a href="http://www.isqeni.com" target="_blank">www.isqeni.com</a></td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px"><strong>BR:</strong></td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px"></td>
  </tr>
  <tr>
    <td style="color:rgba(22,104,130,1);font-size:12px;font-family:Arial;background:rgba(219,242,249,1);padding:5px 15px">118107881</td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px"><strong><!--AL Rajhi Bank--></strong></td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px"></td>
  </tr>
  <tr>
    <td style="color:rgba(22,104,130,1);font-size:12px;font-family:Arial;background:rgba(219,242,249,1);padding:5px 15px">502888235</td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px"></td>
    <td align="left" style="background:rgba(22,104,130,1);font-size:12px;font-family:Arial;color:rgba(255,255,255,1);padding:5px 15px"></td>
  </tr>
</table>
<table width="100%" style="margin:0;padding:0;border-spacing:0;border-collapse:collapse;vertical-align:middle">
  <tr>
    <td width="50%" style="font-size:12px;font-family:Arial;padding:10px 15px"><strong>BILL TO:</strong></td>
    <td width="50%" align="left" style="font-size:12px;font-family:Arial;padding:10px 15px"><strong>:</strong></td>
  </tr>
</table>
<table width="100%" style="margin:0;margin-top:20px;padding:0;border-spacing:0;border-collapse:collapse;vertical-align:middle">
  <tr style="background:#166882">
    <th width="33%" align="left" style="font-size:14px;font-family:Arial;padding:10px 15px;color:rgba(240,240,240,1);font-weight:normal">ORDER ID</th>
    
    <th width="33%" align="left" style="font-size:14px;font-family:Arial;padding:10px 15px;color:rgba(240,240,240,1);font-weight:normal">DESCRIPTION</th>
    <th width="33%" align="left" style="font-size:14px;font-family:Arial;padding:10px 15px;color:rgba(240,240,240,1);font-weight:normal">PAYMENT METHOD</th>
    <th width="33%" align="left" style="font-size:14px;font-family:Arial;padding:10px 15px;color:rgba(240,240,240,1);font-weight:normal">DRIVER NAME</th>
    <th width="33%" align="left" style="font-size:14px;font-family:Arial;padding:10px 15px;color:rgba(240,240,240,1);font-weight:normal">CREARED DATE</th>
      
    <th width="33%" align="right" style="font-size:14px;font-family:Arial;padding:10px 15px;color:rgba(240,240,240,1);font-weight:normal">AMOUNT</th>
      
  </th></th></tr>
  <tr>
    <td style="font-size:12px;font-family:Arial;padding:10px 15px"> </td>
 

    <td align="left" style="font-size:12px;font-family:Arial;padding:10px 15px"> </td>
  </tr>
<?php 
$i=0;
$total=0;

//echo '<pre>';
//print_r($data);
foreach ($data as $value) { ?>
  <tr <?php if($i%2==0){ echo 'style="background:#dbf2f9"';} ?>>
    <td style="font-size:12px;font-family:Arial;padding:10px 15px">#<?php echo $value->id;?></td>
    <td style="font-size:12px;font-family:Arial;padding:10px 15px"><?php echo $value->product_name;?></td>
    <td style="font-size:12px;font-family:Arial;padding:10px 15px"><?php echo $value->payment_method;?></td>
    <td align="right" style="font-size:12px;font-family:Arial;padding:10px 15px;direction:rtl"><?php echo $value->name_ar.'/'.$value->name_en;?></td>
    <td align="right" style="font-size:12px;font-family:Arial;padding:10px 15px;direction:rtl"><?php echo $value->created;?></td>

    <td align="right" style="font-size:12px;font-family:Arial;padding:10px 15px;direction:rtl"><?php 
    echo $value->total_amount;
    $total = $total+$value->total_amount;

    ?></td>
  </tr>
<?php 
$i++;
}?>
  
<tr>
    <td style="font-size:12px;font-family:Arial;padding:10px 15px" align="right">TOTAL</td>
    <td style="font-size:12px;font-family:Arial;padding:10px 15px;direction:rtl;border-bottom:1px solid #166882" align="right"><?php echo $total;?></td>
  </tr>
  <tr>
    <td style="font-size:12px;font-family:Arial;padding:10px 15px" align="right">TOTAL DUE @ <?php echo $dataV[0]->percentage;?>%</td>
    <td style="font-size:12px;font-family:Arial;padding:10px 15px;direction:rtl;border-bottom:1px solid #166882" align="right"><?php echo round(($total*$dataV[0]->percentage)/100);?></td>
  </tr>

   <tr>
    <td style="font-size:14px;font-family:Arial;padding:5px 15px">Make all checks payable to &quot;&amp; CompanyName</td>
    <td align="right" style="font-size:12px;font-family:Arial;padding:5px 15px;direction:rtl"> </td>
  </tr>
  <tr>
    <td style="font-size:14px;font-family:Arial;padding:5px 15px;color:rgba(22,104,130,1)"><strong>Thank you for your business!</strong></td>
    <td align="right" style="font-size:12px;font-family:Arial;padding:5px 15px;direction:rtl"> </td>
  </tr>
  <tr>
    <td style="font-size:12px;font-family:Arial;padding:5px 15px"><strong>Saad Al Ajlan, G M D:</strong></td>
    <td align="right" style="font-size:12px;font-family:Arial;padding:5px 15px;direction:rtl"> </td>
  </tr>
</table>
</div>
</div>
<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body></html>