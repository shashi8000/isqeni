
<div id="content" class="span10">
			<!-- content starts -->
<div>
        <ul class="breadcrumb">
          <li>
            <a href="<?php echo site_url("dashboard")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
          </li>
                    <li>
            <?php echo lang("Driver") ;?>
          </li>
        </ul>
      </div>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<?php echo lang("List_Drivers") ;?>
						<div class="box-icon">
							<!--<a class="btn btn-danger" href="javascript:document.getElementById('table_form').submit();" onClick="return confirm('<?php echo lang("WantDelete") ;?> ')" style="width:90px;">
										<i class="icon-trash icon-white"></i>
										<?php echo lang("DeleteChecked") ;?>
									</a>-->
						</div>
					</div>
					<div class="box-content">
									<!--
					 <form class="form-inline" action="" method="post">
                            <input class="form-control" type="text" name="searchbyname" value="" placeholder="Search...">
                            <input class="btn btn-default" type="submit" name="filter" value="Go">
                        </form>
				-->
					
                    <form action="" method="post" id="table_form">
						<table class="table table-striped table-bordered <?php if(count($driver_list) > 0){ echo 'bootstrap-datatable datatable';} ?>">
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
                          foreach($driver_list AS $data_item){
                            $No++ ;
                            if (!@file_exists('download/driver/'.$data_item['image'].'')) {
                                    @mkdir('download/driver/'.$data_item['image'].'', 0777, true);
                                }

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
                               
                                <td class="center">
								   	<a class="btn btn-info" href="<?php echo base_url('driver/edit_driver/'.$data_item['id']);?>" >
										<i class="icon-edit icon-white"></i>
                                        <?php echo lang("View") ;?>View
									</a>
									
									<a onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger del_rec" href="<?php echo base_url('driver/delete_driver/'.$data_item['id']);?>">
										<i class="icon-trash icon-white"></i>
										<?php echo lang("Delete") ;?>
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
				