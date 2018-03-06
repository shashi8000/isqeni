<?php
 $count = count($data);
?>
<?php
    $index_Page = $this->config->item('index_page');
    if($index_Page == "index.php"){$index_Page = $index_Page."/";}
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
<script>
function showActivities(id)
{
      $('.Activities_'+id).fadeIn();
  $('.Shadow_'+id).fadeIn();
}
function removeActivities(id)
{
      $('.Activities_'+id).fadeOut();
  $('.Shadow_'+id).fadeOut();
}
function sendNoti(client_id,device)
    {
        var dataObject = {
        msg: $('#msg_'+client_id).val(),
        client_id: client_id,
        //device:  device
        };
       $.ajax({
       type: "POST",
       url: "<?php echo base_url().$index_Page?>administrator/clients/addNotify", // home/sendNotiToDevice3
       data: dataObject ,
       success: function(data) //we're calling the response json array 'cities'
       {
        $('#sent_'+client_id).fadeIn();
        $('#msg_'+client_id).val('');
        console.log('Success');
       }
      });
    }
</script>
<div id="content" class="span10">
			<!-- content starts -->
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
					<li>
						<?php echo lang("Customers") ;?>
					</li>
				</ul>
			</div>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						&nbsp;
						<div class="box-icon">
						   <a class="btn btn-danger btn-small" href="javascript:document.getElementById('table_form').submit();" onClick="return confirm('<?php echo lang("WantDelete") ;?> ')" style="width:90px;">
										<i class="fa fa-trash"></i>
										<?php echo lang("DeleteChecked") ;?>
									</a>
						</div>
                        <!--
                        <div class="box-icon">
                            <a class="btn btn-danger btn-small" href="javascript:document.getElementById('table_form').submit();" onClick="return confirm('<?php echo lang("WantDelete") ;?> ')" style="width:90px;">
                                <i class="fa fa-trash"></i>
                                <?php echo lang("DeleteChecked") ;?>
                            </a>
                        </div>
                        -->


					</div>
					<div class="box-content">

                        <form action="" method="post" id="test">
                            <select onchange="this.form.submit();" name="couponcodeSelId" id="couponcodeSelIds">
                                <option value=""><?php echo 'Please select user type' ;?></option>
                                <option value="1" <?php if(isset($_REQUEST['couponcodeSelId']) && $_REQUEST['couponcodeSelId']=='1'){ echo 'selected';}else{ echo 'selected';}?>>Individual</option>
                                <option value="2" <?php if(isset($_REQUEST['couponcodeSelId']) && $_REQUEST['couponcodeSelId']=='2'){ echo 'selected';}?>>Corporate</option>
                                <option value="3" <?php if(isset($_REQUEST['couponcodeSelId']) && $_REQUEST['couponcodeSelId']=='3'){ echo 'selected';}?>>Mosque</option>
                            </select>
                        </form>

						<form action="" method="post" id="table_form">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                  <th><input type="checkbox" name="checkAll" id="checkAll">  </th>
								  <th><?php echo lang("No");?></th>
								  <th><?php echo lang("ClientNum") ;?></th>
								  <th><?php echo lang("Name") ;?></th>
								  <th><?php echo lang("Mobile") ;?></th>
								  <th><?php echo lang("Email") ;?></th>
								  <th><?php echo lang("RegiserDate") ;?></th>
								  <th><?php echo lang("Status") ;?></th>
								  <th>&nbsp;</th>
							  </tr>
						  </thead>
						  <tbody>
                          <?php
                          $No = 0 ;
                          foreach($data AS $data_item){
                                $No++ ;
                           ?>
							<tr>
                                <td><input type="checkbox" name="check[]" id="checkbox<?php echo $No ;?>" class="checkbox" value="<?php echo $data_item['id'] ;?>"/></td>
								<td><?php echo $No ;?></td>
								<td class="center"><?php echo $data_item['id'] ;?></td>
								<td class="center"><?php echo $data_item['name'] ;?></td>
								<td class="center"><?php echo $data_item['mobile'] ;?></td>
								<td class="center"><?php echo $data_item['email'] ;?></td>
								<td class="center"><?php echo $data_item['rdate'] ;?></td>
                                <td class="center"><a href="<?php echo site_url("administrator/clients/status/clients/".$data_item['id']."/".$data_item['active'])?>"><?php echo getStatus($data_item['active']) ;?></a></td>
                                <td class="center">
									<a class="btn btn-success" href="javascript:showActivities('<?php echo $data_item['id']?>');">
										<i class="fa fa-paper-plane"></i>
										<?php echo lang("SendNotify") ;?>
									</a>
                                <div id="Activities" class="Activities_<?php echo $data_item['id']?>">
                                     <p id="sent_<?php echo $data_item['id']?>" style="color: #278B13; text-align: center; font-weight: bold;display: none;"> <?php echo lang("NotificationSent") ;?> <?php echo $data_item['name'] ;?></p>
                                     <textarea id="msg_<?php echo $data_item['id']?>" cols="30" rows="10"></textarea>
                                     <button class="btn btn-success" type="button" onclick="javascript:sendNoti('<?php echo $data_item['id']?>','<?php echo $data_item['device_token']?>')"><?php echo lang("Send") ;?></button>
                                </div>
                                    <?php
                                      if($data_item['utype'] == "company"){
                                        ?>
                                    <a class="btn btn" href="<?php echo site_url("administrator/products/client/".$data_item['id']."");?>">
										<i class="fa fa-paper-plane"></i>
										المنتجات
									</a>
                                    <?php } ?>
                                    <a class="btn btn-info" href="<?php echo site_url("administrator/clients/add/".$data_item['id']."");?>">
										<i class="fa fa-pencil-square-o"></i>
										<?php echo lang("Edit") ;?>
									</a>
									<a onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger" href="<?php echo site_url("administrator/clients/delete/".$data_item['id']."");?>">
										<i class="fa fa-trash"></i>
										<?php echo lang("Delete") ;?>
									</a>
                                    <?php if($data_item['verified']==1){?>
                                    <a  class="btn btn-success" href="<?php echo site_url("administrator/clients/notAprove/".$data_item['id']."");?>">
                                        Verified
                                    </a>
                                    <?php }else{ ?>

                                        <a class="btn btn-danger" href="<?php echo site_url("administrator/clients/aprove/".$data_item['id']."");?>">
                                            Not Verified
                                        </a>
                                    <?php }


                                    ?>


                                    <div id="Shadow"  class="Shadow_<?php echo $data_item['id']?>" onclick="removeActivities(<?php echo $data_item['id']?>)">
                                        &nbsp;
                                </div>
								</td>
							</tr>
                              <?php } ?>
						  </tbody>
					  </table>
                      </form>
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
#Activities {
        background: #fff none repeat scroll 0 0;
    border: 5px solid #e26148;
    border-radius: 15px;
    display: none;
    left: 25%;
    min-height: 200px;
    max-height: 500px;
    overflow: auto;
    font-family: ge,tahoma;
    padding: 20px;
    position: fixed;
    top: 10%;
    width: 30%;
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