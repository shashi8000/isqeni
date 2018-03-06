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
           device:  device
        };
       $.ajax({
       type: "POST",
       url: "<?php echo base_url().$index_Page?>home/sendNotiToDevice2", //here we are calling our user controller and get_cities method with the country_id
       data: dataObject ,
       success: function(cities) //we're calling the response json array 'cities'
       {
        $('#sent_'+client_id).fadeIn();
        $('#msg_'+client_id).val('');
       }
      });
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
					   التجار
					</li>
				</ul>
			</div>
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
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						&nbsp;
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
                    <form action="" method="post" id="table_form">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                  <th> <input type="checkbox" name="checkAll" id="checkAll">  </th>
								  <th> <?php echo lang("No") ;?>  </th>
                                  <th><?php echo lang("Photo") ;?> </th>
								  <th>الاسم </th>
								  <th>الموبايل </th>
								  <th>المستخدم </th>
								  <th>تاريخ الموافقة </th>
								  <th>القسم </th>


								  <th>&nbsp;</th>
							  </tr>
						  </thead>
						  <tbody>
                          <?php
                          //var_dump($data);
                          $No = 0 ;
                          foreach($data AS $data_item){
                            $No++ ;

                           ?>
							<tr>
                                <td><input type="checkbox" name="check[]" id="checkbox<?php echo $No ;?>" class="checkbox" value="<?php echo $data_item['id'] ;?>"/></td>
								<td><?php echo $No ;?></td>
                                <td class="center">
                                <li id="image-<?php echo $data_item['id'] ;?>" class="thumbnail">
								<a style="background:url(<?php echo $data_item['photo'] ;?>)" title="<?php echo $data_item['name'] ;?>" href="<?php echo $data_item['photo'] ;?>"><img class="grayscale" src="<?php echo $data_item['photo'] ;?>" width="50px" alt="<?php echo $data_item['name'] ;?>"></a>
							    </li>
                                </td>
                                <td class="center"><?php echo $data_item['name'] ;?></td>
                                <td class="center"><?php echo $data_item['mobile'] ;?></td>
                                <td class="center"><?php $dd = $this->data->get("clients",FALSE,array("id"=>$data_item['client_id'])) ; echo isset($dd['name'])?$dd['name'] : "لا يوجد" ;?></td>
                                <td class="center"><?php echo $data_item['rdate'] ;?></td>
                                <td class="center"><?php echo $this->data->getCats($data_item['cats']) ;?></td>
								<td class="center">
								   	<a class="btn btn-info" href="<?php echo site_url("administrator/companies/add/".$data_item['id']);?>">
										<i class="icon-edit icon-white"></i>
                                        <?php echo lang("Edit") ;?>
									</a>
                                    <a class="btn btn" href="<?php echo site_url("administrator/products/client/".$data_item['client_id']."");?>">
										<i class="icon-edit icon-white"></i>
										المنتجات
									</a>
                                    <a onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger" href="<?php echo site_url("administrator/companies/delete/".$data_item['id']."");?>">
										<i class="icon-trash icon-white"></i>
										<?php echo lang("Delete") ;?>
									</a>
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