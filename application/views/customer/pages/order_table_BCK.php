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
            <a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
          </li>
                    <li>
            <?php echo lang("Orders")?>
          </li>
        </ul>
      </div>
            <div class="clear"></div>
            <form action="" method="get" id="search">
            <div class="control-group">
          <label class="control-label" for="selectError">التاريخ من</label>
          <div class="controls">
          <input type="text" class="span6 datepicker" name="from" value="<?php echo $this->input->get('from')?>">
          </div>
      </div>
            <div class="control-group">
          <label class="control-label" for="selectError">التاريخ إلي</label>
          <div class="controls">
          <input type="text" class="span6 datepicker" name="to" value="<?php echo $this->input->get('to')?>">
          </div>
      </div>
            <div class="control-group">
        <label class="control-label" for="selectError2">الحاله</label>
        <div class="controls">
          <select id="selectError4" name="status" data-placeholder="الحاله" data-rel="chosen">
                     <?php
                      if($this->input->get('status') == "1"){$A1 = "selected";$I1="";$I2="";$I3="";}
                      elseif($this->input->get('status') == "2"){$A1 = "";$I1="selected";$I2="";$I3="";}
                      elseif($this->input->get('status') == "3"){$A1 = "";$I1="";$I2="selected";$I3="";}
                      elseif($this->input->get('status') == "0"){$A1 = "";$I1="";$I2="";$I3="selected";}
                      else{$A1 = "";$I1="";$I2="";$I3="";}
                    ?>
          <option value="0" <?php echo $I3; ?> >كل الحالات</option>
          <option value="1" <?php echo $A1; ?> >معلق</option>
          <option value="2" <?php echo $I1; ?> >تم الشحن</option>
          <option value="3" <?php echo $I2 ?> >تم التسليم للعميل</option>
          </select>
                              <p class="help-block">    </p>
        </div>
      </div>

            <div class="control-group">
        <label class="control-label" for="selectError2">طريقة الدفع</label>
        <div class="controls">
          <select id="selectError5" name="pay" data-placeholder="الحاله" data-rel="chosen">
                     <?php
                      if($this->input->get('pay') == "1"){$A1 = "selected";$I1="";$I2="";$I3="";}
                      elseif($this->input->get('pay') == "2"){$A1 = "";$I1="selected";$I2="";$I3="";}
                      elseif($this->input->get('pay') == "3"){$A1 = "";$I1="";$I2="selected";$I3="";}
                      elseif($this->input->get('pay') == "0"){$A1 = "";$I1="";$I2="";$I3="selected";}
                      else{$A1 = "";$I1="";$I2="";$I3="";}
                    ?>
          <option value="0" <?php echo $I3; ?> >كل الحالات</option>
          <option value="1" <?php echo $A1; ?> >ماستر كارد</option>
          <option value="2" <?php echo $I1; ?> >فيزا</option>
          <option value="3" <?php echo $I2 ?> >نقدا</option>
          </select>
                              <p class="help-block">    </p>
        </div>
      </div>



             <div class="control-group">
                 <a style="margin-top: 22px;" class="btn btn-success"  href="javascript:document.getElementById('search').submit();">
         <i class="icon-zoom-in icon-white"></i>
          فلتر
         </a>
             </div>
            </form>

            </form>
       <div class="clear"></div>
            <div class="blok1">
          <ul>
             <li>
                <a data-rel="tooltip"  class="well3 span3 top-block" href="">
          <span class="icon32 icon-color icon-envelope-closed2"></span>
          <div>إجمالي المبيعات</div>
          <div><?php
                    // echo $this->data->getSum("cart","total_price",array("order_id"=>$CountSearch)) ;?></div>
        </a>
      </li>
              </ul>
       </div>
      <div class="row-fluid sortable">
        <div class="box span12">
          <div class="box-header well" data-original-title>
            &nbsp;
            <div class="box-icon">
              <a class="btn btn-success" href="<?php echo site_url("administrator/orders/printD")?>?<?php echo $_SERVER['QUERY_STRING']?>"  style="width:110px;" target="_blank">
                    <i class="icon-print icon-white"></i>
                &nbsp;&nbsp;     طباعة التقرير&nbsp;&nbsp;
                  </a>
            </div>
          </div>
          <div class="box-content">
                    <form action="" method="post" id="table_form">
            <table class="table table-striped table-bordered bootstrap-datatable">
              <thead>
                <tr>
                                  <th> <input type="checkbox" name="checkAll" id="checkAll">  </th>
                  <th>رقم الفاتورة</th>
                  <th>اسم العميل</th>
                  <th>موبايل العميل</th>
                  <th>بريد العميل</th>
                  <th>عنوان العميل</th>
                                  <th>تاريخ الطلب</th>
                                  <th>وقت الطلب</th>
                                  <th>اجمالي الفاتورة</th>
                                  <th>طريقة الدفع</th>
                                  <th>حاله الطلب</th>
                                  <th>GPS</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                          <?php  $No = 0 ;
                                 if ( $data ) foreach($data AS $data_item){
                                 $No++ ; ?>
              <tr>
                                <td><input type="checkbox" name="check[]" id="checkbox<?php echo $No ;?>" class="checkbox" value="<?php echo $data_item['id'] ;?>"/></td>
                <td><?php echo $data_item['id'] ;?></td>
                                <td class="center"><?php echo $data_item['name'] ;?></td>
                                <td class="center"><?php echo $data_item['mobile'] ;?></td>
                                <td class="center"><?php echo $data_item['email'] ;?></td>
                                <td class="center"><?php echo $data_item['address'] ;?></td>
                <td class="center"><?php echo $data_item['odate']?></td>
                <td class="center"><?php
                                 $d = new DateTime($data_item['otime']);
                                $data_item['otime']  =  str_replace(":AM"," صباحا",$d->format('g:i:A'));
                                $data_item['otime']  =  str_replace(":PM"," مساءا",$data_item['otime']);
                                echo $data_item['otime']?></td>
                                <td class="center"><?php echo $this->data->getSum("cart","total_price",array("order_id"=>$data_item['id']));?></td>
                                <td class="center"><?php echo getPay($data_item['pay']);?></td>
                                <td class="center"><?php echo getImportance($data_item['status']);?></td>
                                <td class="center"><a href="http://maps.google.com/maps?q=<?php echo $data_item['lat'].",".$data_item['lng'];?>" style="color: #ff0000;" target="_blank"><?php echo $data_item['lat'].",".$data_item['lng'];?></a></td>
                <td class="center">
                                    <a class="btn btn-info" href="<?php echo site_url("administrator/orders/edit/".$data_item['id']);?>">
                                            <i class="icon-edit icon-white"></i>
                                            <?php echo lang("Edit") ;?>
                                    </a>
                                    <a class="btn btn-info" target="_blank" href="<?php echo site_url("bill/".$data_item['id']);?>">
                    <i class="icon-print icon-white"></i>
                    تفاصيل الفاتورة
                  </a>
                                    <a onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger" href="<?php echo site_url("administrator/orders/delete/".$data_item['id']);?>">
                    <i class="icon-trash icon-white"></i>
                    <?php echo lang("Delete") ;?>
                  </a>
                </td>
              </tr>
                                 <?php } ?>
              </tbody>
            </table>
                      </form>
                      <?php echo $links;?>
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
</style>