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
 <?php 



 ?>
<div id="content" class="span10">
			<!-- content starts -->

			<div>
				<ul class="breadcrumb">
					<li>
						<?php echo lang("Driver") ;?> <span class="divider">/</span>
					</li>
                    <li>
					   <?php echo lang("Driver_List") ;?>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<!--<div class="box-header well" data-original-title>
						&nbsp;
						<div class="box-icon">-->
							<!--<a class="btn btn-danger" href="javascript:document.getElementById('table_form').submit();" onClick="return confirm('<?php echo lang("WantDelete") ;?> ')" style="width:90px;">
										<i class="icon-trash icon-white"></i>
										<?php echo lang("DeleteChecked") ;?>
									</a>-->
						<!--</div>
					</div>
					-->
					<div class="box-header well" data-original-title>
						&nbsp;
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">

					 <form class="form-inline" action="" method="post">
                            
							
							<?php  
//echo $cats['id'];
							
							if(!isset($cats['id'])){	 //echo 123;exit();?>
							<select name="vendor">
							<option value=''><?php echo lang("Please_select_vendor");?></option>


							<?php foreach($cats as $val){ ?>
							
							<option <?php if(isset($_REQUEST['vendor']) && $_REQUEST['vendor']==$val['id']){ echo 'selected';} ?> value="<?php echo $val['id']; ?>">
							<?php if($this->config->config['language'] =='english'){
								echo $val['name_en'];
							}else{
								echo $val['name'];
							}
							?>
							</option>
								
							<?php } ?> </select>
								<?php }else{ //echo 124;exit(); ?><select name="vendor">
								<option value=''><?php echo lang("Please_select_vendor");?></option>
								<option <?php if(isset($_REQUEST['vendor']) && $_REQUEST['vendor']==$cats['id']){ echo 'selected';} ?> value="<?php echo $cats['id']; ?>">
							<?php if($this->config->config['language'] =='english'){
								echo $cats['name_en'];
							}else{
								echo $cats['name'];
							}
							?>
							</option>
							</select>
								<?php }

							?>
							<input class="form-control" type="text"  name="searchbyname" value="<?php if(isset($_REQUEST['searchbyname']) && $_REQUEST['searchbyname']!=''){ echo $_REQUEST['searchbyname'];} ?>" placeholder="Search...">
                            <input class="btn btn-default" type="submit" name="filter" value="<?php echo lang("GO");?>">
                        </form>
<!--
<form action="" method="post" id="table_form">
                        <select name="driverType" onchange="this.form.submit()">
							<option value=''>Please select type of driver</option>
							<option value='1' <?php echo (isset($_REQUEST["driverType"]) && $_REQUEST["driverType"]=='1')?"selected":""?>>Active Drivers</option>
							<option value='2' <?php echo (isset($_REQUEST["driverType"]) && $_REQUEST["driverType"]=='2')?"selected":""?>>Blocked Driver</option>
							
						</select>
						<input type="hidden" name="vendor" value="<?php echo (isset($_REQUEST['vendor']))?$_REQUEST['vendor']:''?>">
					</form>
-->


                        <form action="<?php echo site_url("administrator/driver/fetchDataFromTable/") ?>" method="post" id="table_form">
                          <div class="col-md-6" style="text-align: right;"><button type="submit" class="btn btn-primary"><?php echo lang("Export_Report");?></button></div>
             
              
                        </form>
				
					
                    <form action="" method="post" id="table_form">
                    	
						<table class="table table-striped table-bordered <?php if(count($driver_list) > 0){ echo 'bootstrap-datatable';} ?>">
						  <thead>
							  <tr>
                                  <!--<th> <input type="checkbox" name="checkAll" id="checkAll">  </th>-->
								 <th><?php  echo lang("Sr_No") ;?></th>
                                  <th><?php echo lang("Photo") ;?></th>

								  <?php if($this->config->config['language'] =='english'):?>
								  <th><?php echo lang("Name_In_English") ;?></th>
								  <?php else : ?>
								  <th><?php echo lang("Name_In_Arabic") ;?></th>
								  <?php endif; ?>

								  <?php if($this->config->config['language'] =='english'):?>
								  <th><?php echo lang("Car_Type_English") ;?></th>
								  <?php else : ?>
								  <th><?php echo lang("Car_Type_Arabic") ;?></th>
								  <?php endif; ?>

								  <?php if($this->config->config['language'] =='english'):?>
								  <th><?php echo lang("Color_english") ;?></th>
								  <?php else : ?>
								  <th><?php echo lang("Color_Arabic") ;?></th>
								  <?php endif; ?>

								  <th><?php echo lang("Car_Number") ;?></th>
								  <th><?php echo lang("License_Number") ;?></th>
								  <th><?php echo lang("Mobile") ;?></th>
								  <th><?php echo lang("Status") ;?></th>
								  <th><?php echo lang("Action") ;?></th>
								 
							  </tr>
                              
						  </thead>
						  <tbody>
                          <tr>
                          <?php
                          //var_dump($data);
                          $No = 0 ;
						  //echo '<pre>';
						  //print_r($driver_list);
                          foreach($driver_list AS $data_item){
                            $No++ ;
                            if (!file_exists('download/driver/'.$data_item['image'].'')) {
                                    @mkdir('download/driver/'.$data_item['image'].'', 0777, true);
                                }
                              // $count = count(scandir("download/driver/".$data_item['image'])) - 2 ;
                           ?>
                                <!--<td><input type="checkbox" name="check[]" id="checkbox<?php echo $No ;?>" class="checkbox" value="<?php echo $data_item['id'] ;?>"/></td>-->
								<td><?php echo $No ;?></td>
                                <td class="center">
                                <li id="image-<?php echo $data_item['id'] ;?>" class="thumbnail">
								<a style="background:url(<?php echo $data_item['image'] ;?>)" title="<?php echo $data_item['name_en'] ;?>" href="<?php echo $data_item['image'] ;?>"><img class="grayscale" src="<?php echo $data_item['image']; ?>" width="50px" alt="<?php echo $data_item['name_en'] ;?>"></a>
							    </li>
                                </td>

                                <?php if($this->config->config['language'] =='english'):?>
								<td class="center"><?php echo $data_item['name_en'] ;?></td>
								<?php else : ?>
								<td class="center"><?php echo $data_item['name_ar'] ;?></td>
								<?php endif; ?>

                                <?php if($this->config->config['language'] =='english'):?>
								<td class="center"><?php echo $data_item['car_type_en'] ;?></td>
								<?php else : ?>
								<td class="center"><?php echo $data_item['car_type_ar'] ;?></td>
								<?php endif; ?>

								<?php if($this->config->config['language'] =='english'):?>
                                <td class="center"><?php echo $data_item['car_color_en'] ;?></td>
								<?php else : ?>
								<td class="center"><?php echo $data_item['car_color_ar'] ;?></td>
								<?php endif; ?>
				
                                <td class="center"><?php echo $data_item['car_number'] ;?></td>
                                <td class="center"><?php echo $data_item['driver_licence_number'] ;?></td>
                                <td class="center"><?php echo $data_item['mobile'] ;?></td>
                                 <td class="center"><?php echo $data_item['status'] ;?></td>
                               <td>
                               		<a class="btn btn-info" href="<?php echo base_url('administrator/driver/edit_driver/'.$data_item['id']);?>" >
										<i class="icon-edit icon-white"></i>
                                        <?php echo lang("Views") ;?>
									</a>
									
									<a onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger " href="<?php echo base_url('administrator/driver/delete_driver/'.$data_item['id']);?>">
										<i class="icon-trash icon-white"></i>
										<?php echo lang("DeleteBlock") ;?>
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