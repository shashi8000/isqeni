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
						<?php echo lang("ManagePerm") ;?> <span class="divider">/</span>
					</li>
					<li>
						<?php echo lang("Permissions") ;?>
					</li>
				</ul>
			</div>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						&nbsp;
						<div class="box-icon">
						   <!--<a class="btn btn-danger btn-small" href="javascript:document.getElementById('table_form').submit();" onClick="return confirm('<?php echo lang("WantDelete") ;?> ')" style="width:90px;">
										<i class="fa fa-trash"></i>
										<?php echo lang("DeleteChecked") ;?>
									</a>-->
						</div>
					</div>
					<div class="box-content">
						<form action="" method="post" id="table_form">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                 <!-- <th> <input type="checkbox" name="checkAll" id="checkAll">  </th>-->
								  <th> # </th>
								  <th><?php echo lang("GroupName") ;?></th>
								  <th><?php echo lang("Permissions") ;?></th>
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
                                <!--<td><input type="checkbox" name="check[]" id="checkbox<?php echo $No ;?>" class="checkbox" value="<?php echo $data_item['id'] ;?>"/></td>-->
								<td><?php echo $No ;?></td>
								<td class="center"><?php echo $data_item['name'] ;?></td>
								<td class="center"><?php echo getPermi($data_item['permission']) ;?></td>
                                <td class="center">
									<a class="btn btn-info" href="<?php echo site_url("administrator/group/add/".$data_item['id']."");?>">
										<i class="icon-edit icon-white"></i>
										<?php echo lang("Edit") ;?>
									</a>
									<a onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger" href="<?php echo site_url("administrator/group/delete/".$data_item['id']."");?>">
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
				</div><!--/fluid-row--></a>
			</div>
		</div>