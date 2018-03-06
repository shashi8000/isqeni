
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                     <li>
					   <a href="<?php echo site_url("administrator/clients/")?>">	العملاء</a> <span class="divider">/</span>
					</li>
					<li>
						<?php echo lang("Add") ;?>
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
            <li>
                <a data-rel="tooltip" title="<?php echo $this->onlineusers->total_users();?> زائر حاليا" class="well3 span3 top-block" href="<?php echo site_url("administrator/home");?>">
					<span class="icon32 icon-color icon-envelope-closed2"></span>
					<div>عدد زوار الموقع</div>
					<div><?php echo $this->data->countTable("views",array("dep"=>"site"));?></div>
					<span class="notification red"><?php echo $this->onlineusers->total_users();?></span>
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
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						  <fieldset>
						 <legend>العملاء</legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>
							<div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">الاسم الاول</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="LCform[name]" value="<?php echo isset($data['name']) ? $data['name'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('LCform[name]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">اسم العائلة</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="LCform[lname]" value="<?php echo isset($data['lname']) ? $data['lname'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('LCform[lname]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>


                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">البريد الاليكتروني</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[email]" value="<?php echo isset($data['email']) ? $data['email'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[email]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>


                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">رقم الهاتف</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[mobile]" value="<?php echo isset($data['mobile']) ? $data['mobile'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[mobile]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group">
								<label class="control-label" for="selectError">نوع العميل</label>
								<div class="controls">
								  <select id="selectError5" name="Cform[ctype]" data-rel="chosen">
                                    <?php
                                      if($data['ctype'] == "Silver"){$A1 = "selected";$I1="";$I1="";}
                                      elseif($data['ctype'] == "Golden"){$A1 = "";$I1="selected";$I1="";}
                                      elseif($data['ctype'] == "Diamond"){$A1 = "";$I1="";$I1="selected";}
                                      else{$A1 = "";$I1="";$I2="";}
                                    ?>
									<option value="Silver" <?php echo $A1;?> ><?php echo lang("Silver") ;?></option>
									<option value="Golden" <?php echo $I1;?> ><?php echo lang("Golden") ;?></option>
									<option value="Diamond" <?php echo $I2;?> ><?php echo lang("Diamond") ;?></option>
								  </select>
								</div>
							  </div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn" onclick="window.location='<?php echo base_url();?>administrator/clients.html';"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="table" value="clients"/>
                              <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
