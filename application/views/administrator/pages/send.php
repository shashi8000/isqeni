<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                     <li>
					   <a href="<?php echo site_url("administrator/mail_list/")?>">	<?php echo lang("MailList") ;?></a> <span class="divider">/</span>
					</li>
					<li>
						<?php echo lang("SendMailList") ;?>
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
						 <legend><?php echo lang("SendMailList") ;?> </legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>

                         <div class="control-group">
								<label class="control-label" for="selectError"><?php echo lang("Users") ;?> </label>
								<div class="controls">
								  <select id="selectError" name="Cform[userid]" data-rel="chosen" <?php if($this->uri->segment(4)){echo 'disabled="disabled"';}?> >
									<option></option>
									<option value="0"><?php echo lang("AllUsers") ;?> </option>
                                    <?php foreach($users AS $user) {

                                     if($data['userid'] == $user['id']){ $sel="selected";}
                                     else {$sel="";}
                                    ?>
									<option value="<?php echo $user['id']?>" <?php echo $sel; ?> ><?php echo $user['name'] ;?></option>
									<?php } ?>
								  </select>
                                  <p class="help-block">	<?php echo form_error('Cform[userid]')  ;?>   </p>
								</div>
							  </div>
                        <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("Subject") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[title]" value="<?php echo isset($data['title']) ? $data['title'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[title]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                        <div class="control-group">
							  <label class="control-label" for="textarea2"><?php echo lang("Message") ;?></label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="Cform[message]"><?php echo isset($data['message']) ? $data['message'] : '';?></textarea>
                                <p class="help-block">	<?php echo form_error('Cform[message]')  ;?>   </p>
                              </div>
							</div>


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
