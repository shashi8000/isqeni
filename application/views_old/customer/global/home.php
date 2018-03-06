<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                    <li>
						<?php echo lang("Messages") ;?>
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
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th> <?php echo lang("No") ;?> </th>
								  <th><?php echo lang("Name") ;?> </th>
								  <th><?php echo lang("Mobile") ;?></th>
								  <th><?php echo lang("Email") ;?></th>
								  <th>تاريخ الرسالة</th>
								  <th><?php echo lang("Readed") ;?></th>
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
								<td><?php echo $No ;?></td>
								<td class="center"><?php echo $data_item['cname'] ;?></td>
								<td class="center"><?php echo $data_item['cphone'] ;?></td>
								<td class="center"><?php echo $data_item['cemail'] ;?></td>
								<td class="center"><?php echo $data_item['cdate'] ;?></td>
								<td class="center"><?php echo getRead($data_item['read']) ;?></td>
								<td class="center">
									<a class="btn btn-success" href="<?php echo site_url("administrator/home/read/".$data_item['id']."");?>">
										<i class="icon-zoom-in icon-white"></i>
										<?php echo lang("Read") ;?>
									</a>
									<a class="btn btn-danger" href="<?php echo site_url("administrator/home/deleteM/".$data_item['id']."");?>">
										<i class="icon-trash icon-white"></i>
										<?php echo lang("Delete") ;?>
									</a>
								</td>
							</tr>
                            <?php } ?>
						  </tbody>
					  </table>
					</div>
				</div><!--/span-->

			</div>

					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
