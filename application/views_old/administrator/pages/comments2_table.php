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
						تعليقات فى انتظار الموافقة
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
							<a class="btn btn-danger" href="javascript:document.getElementById('table_form').submit();" onClick="return confirm('<?php echo lang("WantDelete") ;?> ')" style="width:120px;">
										<i class="icon-trash icon-white"></i>
										<?php echo lang("DeleteChecked") ;?>
									</a>
						</div>
					</div>
					<div class="box-content">
                    <form action="" method="post" id="table_form">
						<table class="table table-striped table-bordered bootstrap-datatable">
						  <thead>
							  <tr>
                                  <th> <input type="checkbox" name="checkAll" id="checkAll">  </th>
								  <th> <?php echo lang("No") ;?>  </th>
                                  <th>المنتج</th>
                                  <th>قسم المنتج</th>
                                  <th><?php echo lang("Client")?></th>
								  <th>التاريخ</th>
								  <th>التعليق</th>
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
                                <td class="center"><?php $dd = $this->data->get("products",FALSE,array("id"=>$data_item['prod_id'])) ; echo isset($dd['name'])?$dd['name'] :  lang("NoData") ;?></td>
                                <td class="center"><?php $dd = $this->data->get("cats",FALSE,array("id"=>isset($dd['cat_id'])?$dd['cat_id']:0)) ; echo isset($dd['name'])?$dd['name'] :  lang("NoData") ;?></td>
                                <td class="center"><?php $dd = $this->data->get("clients",FALSE,array("id"=>$data_item['client_id'])) ; echo isset($dd['name'])?$dd['name'] :  lang("NoData") ;?></td>
								<td class="center"><?php echo $data_item['cdate']?></td>
								<td class="center"><?php echo $data_item['comment']?> </td>
								<td class="center">
									<a onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger" href="<?php echo site_url("administrator/comments/delete2/".$data_item['id']);?>">
										<i class="icon-trash icon-white"></i>
										<?php echo lang("Delete") ;?>
									</a>
                                    <?php
                                      if($data_item['status'] == 0){
                                    ?>
                                       <a class="btn btn-success" href="<?php echo site_url("administrator/comments/status2/0/".$data_item['id']);?>">
										<i class="icon-edit icon-white"></i>
										تفعيل التعليق
									</a>
                                    <?php } ?>

                                    <?php
                                      if($data_item['status'] == 1){
                                    ?>
                                       <a class="btn btn-info" href="<?php echo site_url("administrator/comments/status/1/".$data_item['id']."/".$data_item['prod_id']);?>">
										<i class="icon-edit icon-white"></i>
										إلغاء تفعيل
									</a>
                                    <?php } ?>
								</td>
							</tr>
                            <?php } ?>
						  </tbody>
					  </table>
                      <?php echo $links;?>
                      </form>
					</div>
				</div><!--/span-->

			</div><!--/row-->





					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->