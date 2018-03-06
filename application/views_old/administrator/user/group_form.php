
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
					<li>
					   <a href="<?php echo site_url("administrator/group/")?>"><?php echo lang("Permissions") ;?></a>
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
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" style="min-height: 500px;">
						  <fieldset>
						 <legend><?php echo lang("Permissions") ;?></legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>
							<div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("GroupName") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[name]" value="<?php echo isset($data['name']) ? $data['name'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[name]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group">
    								<label class="control-label" for="selectError1"><?php echo lang("Permissions") ;?></label>
								<div class="controls">
								  <select id="selectError1" data-placeholder="" name="permission[]" multiple data-rel="chosen">
									<?php
                                    $rels = explode(",",$data['permission']) ;
                                    if(in_array(1,$rels)){$sel1 = "selected";}else{$sel1 = "";}
                                    if(in_array(2,$rels)){$sel2 = "selected";}else{$sel2 = "";}
                                    if(in_array(3,$rels)){$sel3 = "selected";}else{$sel3 = "";}
                                    if(in_array(4,$rels)){$sel4 = "selected";}else{$sel4 = "";}
                                    if(in_array(5,$rels)){$sel5 = "selected";}else{$sel5 = "";}
                                    if(in_array(6,$rels)){$sel6 = "selected";}else{$sel6 = "";}
                                    if(in_array(7,$rels)){$sel7 = "selected";}else{$sel7 = "";}
                                    if(in_array(8,$rels)){$sel8 = "selected";}else{$sel8 = "";}
                                    if(in_array(9,$rels)){$sel9 = "selected";}else{$sel9 = "";}
                                  ?>
									<option value="1" <?php echo $sel1 ; ?> ><?php echo lang("FullPermissions") ;?></option>
								   	<option value="2" <?php echo $sel2 ; ?> ><?php echo lang("Settings") ;?></option>
									<option value="3" <?php echo $sel3 ; ?> ><?php echo lang("Menu") ;?></option>
									<option value="4" <?php echo $sel4 ; ?> ><?php echo lang("Sections") ;?></option>
									<option value="5" <?php echo $sel5 ; ?> ><?php echo lang("Products") ;?></option>
									<option value="6" <?php echo $sel6 ; ?> ><?php echo lang("Customers") ;?></option>
									<option value="7" <?php echo $sel7 ; ?> ><?php echo lang("Orders") ;?></option>
									<option value="8" <?php echo $sel8 ; ?> ><?php echo lang("Users") ;?></option>
									<option value="9" <?php echo $sel9 ; ?> ><?php echo lang("Backup") ;?></option>
								  </select>
                                  <p class="help-block">	<?php echo form_error('permission')  ;?>   </p>
								</div>
							  </div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : 0 ; ?>"/>
                              <input type="hidden" name="table" value="users_group"/>
                              <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
