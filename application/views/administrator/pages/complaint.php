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
						<?php echo lang("Complaints")?>
					</li>
				</ul>
			</div>
            <div class="clear"></div>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-content">
                    <form action="" method="post" id="table_form">
						<table class="table table-striped table-bordered bootstrap-datatable">
						  <thead>
							  <tr>
								  <th>#</th>
								  <th><?php echo lang("ClientName") ;?></th>
								  <th><?php echo lang("Mobile") ;?></th>
								  <th><?php echo lang("Company") ;?></th>
                                  <th><?php echo lang("Complaint") ;?></th>
                                  <th><?php echo lang("Time") ;?></th>
								  <th>&nbsp;</th>
							  </tr>
						  </thead>
						  <tbody>
                          <?php  $No = 0 ;
                                 foreach($data AS $data_item){
                                 $No++ ; ?>
							<tr>
								<td><?php echo $data_item['id'] ;?></td>
                                <td class="center"><?php echo $data_item['user_name'] ;?></td>
                                <td class="center"><?php echo $data_item['phone'] ;?></td>
                                <?php $company = get_this('cats',['id'=>$data_item['company_id']]);?>
                                <td class="center"><?php if (@$company['name']) echo @$company['name']; else echo""; ?></td>
                                <td class="center"><?php echo $data_item['complaint'] ;?></td>
								<td class="center"><?php echo $data_item['created_date']?></td>							
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