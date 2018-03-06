<?php
$count=10;
 //$count = count($data);
 

 
?>
<link href="<?php echo base_url()?>css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.form.js"></script>
<script type="text/javascript">

function setSubmit(id,max)
{
    var $fileUpload = $("#images"+id);
    if (parseInt($fileUpload.get(0).files.length)> max){
     alert(" لايمكن رفع اكثر من "+ max + " صوره ");
     return;
    }
  $('#multiple_upload_form'+id).ajaxForm({
            target:'#images_preview'+id,
			beforeSubmit:function(e){
				$('.uploading'+id).show();

			},
			success:function(e){
				$('.uploading'+id).hide();
			},
			error:function(e){
			}
    }).submit();
}
<?php
    $index_Page = $this->config->item('index_page');
    if($index_Page == "index.php"){$index_Page = $index_Page."/";}
  ?>           
function removeFile(id , file , i)
{
 $.ajax({
 type: "POST",
 url: "<?php echo base_url().$index_Page ?>home/removeFile/"+id+"/"+file, //here we are calling our user controller and get_cities method with the country_id
 success: function(data) //we're calling the response json array 'cities'
 {
   if(data == 1)
   {
     $('#image_'+id+'_'+i).hide();
   }

 }
});
}
</script>
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
function showActivities2(id)
{
  $('.Activities2_'+id).fadeIn();
  $('.Shadow_'+id).fadeIn();
}

function removeActivities(id)
{
  $('.Activities_'+id).fadeOut();
  $('.Activities2_'+id).fadeOut();
  $('.Shadow_'+id).fadeOut();
  $('.gallery').empty();
}
</script>
<div id="content" class="span10">
			<!-- content starts -->

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						&nbsp;
						<div class="box-icon">
							<!--<a class="btn btn-danger" href="javascript:document.getElementById('table_form').submit();" onClick="return confirm('<?php echo lang("WantDelete") ;?> ')" style="width:90px;">
										<i class="icon-trash icon-white"></i>
										<?php echo lang("DeleteChecked") ;?>
									</a>-->
						</div>
					</div>
					<div class="box-content">
				
					
                    <form action="" method="post" id="table_form">
						<table class="table table-striped table-bordered bootstrap-datatable">
						  <thead>
							  <tr>
                                  <!--<th> <input type="checkbox" name="checkAll" id="checkAll">  </th>-->
								 <th>Sr. No<?php // echo lang("Photo") ;?></th>
                                 
								  <th><?php echo lang("coupon_title"); ?></th>
								    <th><?php echo lang("coupon_code"); ?></th>
								  <th><?php echo lang("start_date"); ?></th>
								    <th><?php echo lang("end_date"); ?></th>
									
								  <!--<th><?php echo lang("product_id"); ?></th> -->
								  <th><?php echo lang("Coupon_value"); ?></th>
								    <th><?php echo lang("Coupon_type"); ?></th>
									 <th><?php echo lang("status"); ?></th>
								  <!--<th><?php echo lang("percentage"); ?></th>
								  <th><?php echo lang("flat_value"); ?></th>-->
								  <th>Action<?php // echo lang("price") ;?></th>
								 
							  </tr>
                              <tr style="display: none;">
                                  <!--<td> <input type="checkbox" name="checkAll" id="checkAll">  </td>-->
								  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>
                                  <a class="btn btn-btn" href="javascript:showActivities('0');">
										<i class="icon-star"></i>
                                        &nbsp;
									</a>
                                    <div id="Activities" class="Activities_0">
                                       <div style="margin-top:50px;">
                                	<div class="upload_div">
                                    <form method="post" name="multiple_upload_form0" id="multiple_upload_form0" enctype="multipart/form-data" action="<?php echo base_url()?>server/upload.php">
                                    	<input type="hidden" name="image_form_submit" value="0"/>
                                            <label>Choose Image</label>
                                            <input type="file" onchange="setSubmit('0')" name="images0[]" id="images0" multiple />
                                        <div class="uploading0 none">
                                            <label>&nbsp;</label>
                                            <img src="<?php echo base_url()?>images/uploading.gif"/>
                                        </div>

                                    </form>
									
									
									
									
                                    </div>

                                    <div class="gallery" id="images_preview0"></div>
                                </div>
                                    </div>
                                <div id="Shadow"  class="Shadow_0" onclick="removeActivities(0)">
                                        &nbsp;
                                </div>
                                  </td>
							  </tr>
						  </thead>
						  <tbody>
                          <tr>
                          <?php
                          //var_dump($data);
                          $No = 0 ;
                          foreach($coupon AS $data_item){
                            $No++ ;
                            
                              // $count = count(scandir("download/driver/".$data_item['image'])) - 2 ;
                           ?>
                                <!--<td><input type="checkbox" name="check[]" id="checkbox<?php echo $No ;?>" class="checkbox" value="<?php echo $data_item['id'] ;?>"/></td>-->
								<td><?php echo $No ;?></td>
                                <td class="center">
                               <?php echo $data_item['coupon_title'] ;?>
                                </td>
                             
								 <td class="center"><?php echo $data_item['coupon_code'] ;?></td>
                                <td class="center"><?php echo $data_item['start_date'] ;?></td>
								 <td class="center"><?php echo $data_item['end_date'] ;?></td>
                                 <!--<td class="center"><?php echo $data_item['product_id'] ;?></td>-->
									 
                                <td class="center"><?php echo $data_item['value'] ;?></td>
								 <td class="center"><?php echo $data_item['type'] ;?></td>
                                <td class="center">
                                    <?php
                                    if($data_item['status'] =='1'){
                                        echo 'Active';
                                    }else{
                                        echo 'Deactive';
                                    }

                                ?></td>
                                <!--<td class="center"><?php echo $data_item['percentage'] ;?></td>
                                 <td class="center"><?php echo $data_item['flat_value'] ;?></td>-->
                               
                                <td class="center">
								   	<a class="btn btn-info" href="<?php echo base_url('coupon/edit_coupon/'.$data_item['id']);?>" ><!--href="<?php echo site_url("products/add/".$data_item['id']);?>" -->
										<i class="icon-edit icon-white"></i>
                                        <?php echo lang("Edit") ;?>
									</a>
									<a onClick="#" class="btn btn-danger delete_rec" href="<?php echo base_url('coupon/delete_coupon/'.$data_item['id']);?>"><!--onClick="return confirm('<?php echo lang("WantDelete") ;?>')" href="<?php echo site_url("products/delete/".$data_item['id']);?>" -->
										<i class="icon-trash icon-white"></i>
										<?php echo lang("Delete") ;?>
									</a>
                                   
                                    <div id="Activities" class="Activities_<?php echo $data_item['id']?>">
                                       <div>
                                        	<div class="upload_div">
                                            <form  style="direction: rtl" method="post" name="multiple_upload_form<?php echo $data_item['id']?>" id="multiple_upload_form<?php echo $data_item['id']?>" enctype="multipart/form-data" action="<?php echo base_url()?>server/upload.php">
                                            	<input type="hidden" name="image_form_submit" value="<?php echo $data_item['id']?>"/>
                                                    <label><?=lang("Selectphotos")?></label>
                                                    <input type="file" onchange="setSubmit('<?php echo $data_item['id']?>','<?php echo (7-$count)?>')" name="images<?php echo $data_item['id']?>[]" id="images<?php echo $data_item['id']?>" multiple />
                                                <div class="uploading<?php echo $data_item['id']?> none">
                                                    <label>&nbsp;</label>
                                                    <img src="<?php echo base_url()?>images/uploading.gif"/>
                                                </div>
                                            </form>
                                            </div>

                                            <div class="gallery" id="images_preview<?php echo $data_item['id']?>"></div>
                                        </div>
                                    </div>

                                    
                                    <div id="Activities2" class="Activities2_<?php echo $data_item['id']?>">
                                       <div>
                                            <div class="gallery2">
                                             <?php
                                            $images_arr  = scandir("download/products/product".$data_item['id']);
                                             for($i = 2 ; $i < count($images_arr) ; $i++){?>
                                        			<ul class="reorder_ul reorder-photos-list" id="image_<?php echo $data_item['id']?>_<?php echo $i?>">
                                                    	<li id="image_li_<?php echo $i; ?>" class="ui-sortable-handle">
                                                        	<a href="javascript:void(0);" style="float:none;" class="image_link"><img src="<?php echo base_url()."download/products/product".$data_item['id']."/".$images_arr[$i]; ?>" alt=""></a>
                                                            <a style="float:left;" onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger" href="javascript:removeFile('<?php echo $data_item['id']?>','<?php echo $images_arr[$i]?>','<?php echo $i?>')">
                        										<i class="icon-trash icon-white"></i>
                        										<?php echo lang("Delete") ;?>
                        									</a>
                                                       	</li>
                                                  	</ul>
                                        	<?php }  ?>
                                            </div>
                                        </div>
                                    </div>


                                <div id="Shadow"  class="Shadow_<?php echo $data_item['id']?>" onclick="removeActivities(<?php echo $data_item['id']?>)">
                                        &nbsp;
                                </div>
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
				jQuery('.delete_rec').click(function(e){
					
					
					var m=confirm("Are you sure you want to delete");
					if (m==false)
					{
						e.preventDefault();
					}
					
					
				});
				</script>
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