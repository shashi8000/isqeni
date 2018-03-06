<?php
 $count = count($data);
?>
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
<div id="content" class="span10">
			<!-- content starts -->
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                    <li>
                        <?php echo lang('Companies'); ?>
					</li>
				</ul>
			</div>
			<!--
            <div class="blok1">
          <ul>
			<li>
                <a data-rel="tooltip" title="<?php echo $this->data->countTable("contact",array("read"=>"0"));?> <?php echo lang("NewMessages") ;?>." class="well1 span3 top-block" href="<?php echo site_url("administrator/home");?>">
					<span class="icon32 icon-color icon-envelope-closed1"></span>
					<div><?php echo lang("NumMessages") ;?></div>
					<div><?php echo $this->data->countTable("contact");?></div>
					<span class="notification red"><?php echo $this->data->countTable("contact",array("read"=>"0"));?></span>
				</a>
			</li>
              </ul>
       </div>
		-->
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						&nbsp;
						<div class="box-icon">
                           <!--<a class="btn btn-danger btn-small" href="javascript:document.getElementById('table_form').submit();" onClick="return confirm('<?php echo lang("WantDelete") ;?> ')" style="width:90px;"><i class="fa fa-trash"></i>							<?php echo lang("DeleteChecked") ;?>
									</a>-->
						</div>
					</div>

		<div class="box-content">
			<form action="<?php echo site_url("administrator/cats/fetchDataFromTable/") ?>" method="post" id="table_form">
            <div class="col-md-6" style="text-align: right;"><button type="submit" class="btn btn-primary"><?php echo lang("Export_Report");?></button></div>
              <input type="hidden" name="cat_id" value="<?php echo (isset($_REQUEST['cat_id']))?$_REQUEST['cat_id']:'0'; ?>">
              
            </form>

                    <form action="<?php echo site_url("administrator/orders/generateinvoice/") ?>" method="post" id="table_form">

						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <!--<th> <input type="checkbox" name="checkAll" id="checkAll">  </th>-->
								  <th><?php echo lang("No");?></th>
								  <th><?php echo lang("CompanyLogo");?></th>
								  <?php if($this->config->config['language'] =='arabic'):?>
								  <th><?php echo lang("CompanyName_ar");?></th>
								  <?php else : ?>
								  <th><?php echo lang("CompanyName_en");?></th>
								  <?php endif; ?>
								  <th>Select Month</th>
								  <th>&nbsp;</th>
							  </tr>
						  </thead>
						  <tbody>
                          <?php
                         // var_dump($data);
                          $No = 0 ;
                          foreach($data AS $data_item){
	                            $No++ ;
                           ?>
							<tr>
								<td><?php echo $No ;?></td>
                                <td class="center">
                                <li id="image-<?php echo $data_item['id'] ;?>" class="thumbnail">
								<a style="background:url(<?php echo $data_item['photo'] ;?>)" title="<?php echo $data_item['name'] ;?>" href="<?php echo $data_item['photo'] ;?>"><img class="grayscale" src="<?php echo $data_item['photo'] ;?>" width="50px" alt="<?php echo $data_item['name'] ;?>"></a>
							    </li>
                                </td>

								<?php if($this->config->config['language'] =='arabic'):?>
                                <td class="center"><?php echo $data_item['name'] ;?></td>
								<?php else : ?>
                                <td class="center"><?php echo $data_item['name_en'] ;?></td>
								<?php endif; ?>

								<td class="center">
							
<label for="startDate">Month And Year:</label>
    <input name="startDate" id="startDate" class="date-picker vendor_<?php echo $data_item['id'] ;?>" />


									
									<a class="btn btn-info" onclick="submitGenerate(<?php echo $data_item['id'];?>);" href="javascript:void(0);">
										<i class="fa fa-pencil-square-o"></i>
										<?php echo lang("InviceGenerate") ;?>
									</a>
									
								</td>
								

									<td class="center">
								   	
								
								</td>
							</tr>
                            <?php } ?>
						  </tbody>
					  </table>
					  <input type="hidden" name="vendor_id" value="" id="vendor_id_comp"/>
					  <input type="hidden" name="month_id" value="" id="month" />
					  <input type="hidden" name="year_id" value="" id="year" />
					  <input type="hidden" name="year_month" value="" id="monthyear" />
 
                      </form>
					</div>
				</div><!--/span-->
			</div><!--/row-->
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
<script type="text/javascript">
var months = [
    'January', 'February', 'March', 'April', 'May',
    'June', 'July', 'August', 'September',
    'October', 'November', 'December'
    ];

function monthNumToName(monthnum) {
    return months[monthnum - 1] || '';
}
function monthNameToNum(monthname) {
    var month = months.indexOf(monthname);
    if(month<10){
    return '0'+(month + 1);
    }else{
    return month + 1;	
    }
}


function submitGenerate(id){
	if($('.vendor_'+id).val()!=''){

	dateVal = $('.vendor_'+id).val().split(' ');
	
	$('#vendor_id_comp').val(id);//=id;
	$('#month').val(monthNameToNum(dateVal[0]));//$('#vendor_'+id).val();
	$('#year').val(dateVal[1]);
	$('#monthyear').val($('.vendor_'+id).val());
	$('form#table_form').submit();
	
	}else{
		alert("Please select month");
	}
}


$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
});

</script>
<style type="text/css">
.ui-datepicker-calendar {
    display: none;
    }

</style>