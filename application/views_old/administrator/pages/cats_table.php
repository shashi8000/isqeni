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
                           <a class="btn btn-danger btn-small" href="javascript:document.getElementById('table_form').submit();" onClick="return confirm('<?php echo lang("WantDelete") ;?> ')" style="width:90px;"><i class="fa fa-trash"></i>							<?php echo lang("DeleteChecked") ;?>
									</a>
						</div>
					</div>
					<div class="box-content">
                    <form action="" method="post" id="table_form">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th> <input type="checkbox" name="checkAll" id="checkAll">  </th>
								  <th><?php echo lang("No");?></th>
								  <th><?php echo lang("CompanyLogo");?></th>
								  <th><?php echo lang("CompanyName_ar");?></th>
								  <th><?php echo lang("CompanyName_en");?></th>
								  <!--<th><?php echo lang("Rate");?></th>-->
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
								<td><input type="checkbox" name="check[]" id="checkbox<?php echo $No ;?>" class="checkbox" value="<?php echo $data_item['id'] ;?>"/></td>
								<td><?php echo $No ;?></td>
                                <td class="center">
                                <li id="image-<?php echo $data_item['id'] ;?>" class="thumbnail">
								<a style="background:url(<?php echo $data_item['photo'] ;?>)" title="<?php echo $data_item['name'] ;?>" href="<?php echo $data_item['photo'] ;?>"><img class="grayscale" src="<?php echo $data_item['photo'] ;?>" width="50px" alt="<?php echo $data_item['name'] ;?>"></a>
							    </li>
                                </td>
                                <td class="center"><?php echo $data_item['name'] ;?></td>
                                <td class="center"><?php echo $data_item['name_en'] ;?></td>
								<!--<td class="center">
								<?php if ( $data_item['special'] == 0 ) echo lang('Rate_ord'); else echo lang('Rate_fav');?>
								</td>-->
								<td class="center">
								   	<a class="btn btn-info" href="<?php echo site_url("administrator/cats/add/".$data_item['id']."");?>">
										<i class="fa fa-pencil-square-o"></i>
										<?php echo lang("Edit") ;?>
									</a>
									<a onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger" href="<?php echo site_url("administrator/cats/delete/".$data_item['id']."");?>">
										<i class="fa fa-trash"></i>
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
