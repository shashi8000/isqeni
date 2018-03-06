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
						الحجوزات
					</li>
				</ul>
			</div>
            <div class="clear"></div>
            <form action="" method="get" id="search">
            <div class="control-group">
                <label class="control-label" for="selectError2">العيادة</label>
                <div class="controls">
                  <select id="selectError1" name="clinic_id" data-placeholder="العيادة" data-rel="chosen">
                	<option></option>
                    <?php foreach($clinics AS $cat) {

                     if($cat['id'] == $this->input->get("clinic_id")){ $sel="selected";}
                     else {$sel="";}
                    ?>
                	<option value="<?php echo $cat['id']?>" <?php echo $sel; ?> ><?php echo $cat['name'] ;?></option>
                	<?php } ?>
                  </select>
                </div>
			</div>

            <div class="control-group">
                <label class="control-label" for="selectError2">المستخدم</label>
                <div class="controls">
                  <select id="selectError2" name="client_id" data-placeholder="المستخدم" data-rel="chosen">
                	<option></option>
                    <?php foreach($clients AS $cat) {

                     if($cat['id'] == $this->input->get("client_id")){ $sel="selected";}
                     else {$sel="";}
                    ?>
                	<option value="<?php echo $cat['id']?>" <?php echo $sel; ?> ><?php echo $cat['name'] ;?></option>
                	<?php } ?>
                  </select>
                </div>
			</div>

            <div class="control-group">
                <label class="control-label" for="selectError2">التخصص</label>
                <div class="controls">
                  <select id="selectError3" name="cat_id" data-placeholder="التخصص" data-rel="chosen">
                	<option></option>
                    <?php foreach($cats AS $cat) {

                     if($cat['id'] == $this->input->get("cat_id")){ $sel="selected";}
                     else {$sel="";}
                    ?>
                	<option value="<?php echo $cat['id']?>" <?php echo $sel; ?> ><?php echo $cat['name'] ;?></option>
                	<?php } ?>
                  </select>
                </div>
			</div>

            <div class="control-group">
                <label class="control-label" for="selectError2">الدكتور</label>
                <div class="controls">
                  <select id="selectError4" name="doctor_id" data-placeholder="الدكتور" data-rel="chosen">
                	<option></option>
                    <?php foreach($doctors AS $cat) {

                     if($cat['id'] == $this->input->get("doctor_id")){ $sel="selected";}
                     else {$sel="";}
                    ?>
                	<option value="<?php echo $cat['id']?>" <?php echo $sel; ?> ><?php echo $cat['name'] ;?></option>
                	<?php } ?>
                  </select>
                </div>
			</div>

             <div class="control-group">
                 <a style="margin-top: 22px;" class="btn btn-success"  href="javascript:document.getElementById('search').submit();">
				 <i class="icon-zoom-in icon-white"></i>
					فلتر
				 </a>
             </div>
            </form> 
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						&nbsp;
						<div class="box-icon">
							<a class="btn btn-danger" href="javascript:document.getElementById('table_form').submit();" onClick="return confirm('<?php echo lang("WantDelete") ;?> ')" style="width:90px;">
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
								  <th>المستخدم</th>
								  <th>العيادة</th>
								  <th>الدكتور</th>
								  <th>التخصص</th>
								  <th>تاريخ الحجز</th>
								  <th>ترتيب الحجز</th>

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
                                <td class="center"><?php $dd = $this->data->get("clients",FALSE,array("id"=>$data_item['client_id'])) ; echo isset($dd['name'])?$dd['name']: "لا يوجد" ;?></td>
                                <td class="center"><?php $dd = $this->data->get("clinic",FALSE,array("id"=>$data_item['clinic_id'])) ; echo isset($dd['name'])?$dd['name']: "لا يوجد" ;?></td>
                                <td class="center"><?php $dd = $this->data->get("doctors",FALSE,array("id"=>$data_item['doctor_id'])) ; echo isset($dd['name'])?$dd['name']: "لا يوجد" ;?></td>
                                <td class="center"><?php $dd = $this->data->get("cats",FALSE,array("id"=>$data_item['cat_id'])) ; echo isset($dd['name'])?$dd['name']: "لا يوجد" ;?></td>
								<td class="center"><?php echo $data_item['rdate']?></td>
								<td class="center"><?php echo $data_item['order']?></td>
								<td class="center">
									<a onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger" href="<?php echo site_url("administrator/rec/delete/".$data_item['id']);?>">
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