
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("home")?>"><?php echo lang("Home") ;?> </a> <span class="divider">/</span>
					</li>

                     <li>
					   <a href="<?php echo site_url("administrator/users")?>">الإدارة </a><span class="divider">/</span>
					</li>

					<li>
						<?php echo lang("Add") ;?>
					</li>
				</ul>
			</div>
             <div class="sortable row-fluid">
                <a data-rel="tooltip" title="<?php echo $this->data->countTable("contact",array("read"=>"0"));?> <?php echo lang("NewMessages") ;?>." class="well span3 top-block" href="<?php echo site_url("administrator/home");?>">
					<span class="icon32 icon-color icon-envelope-closed"></span>
					<div><?php echo lang("NumMessages") ;?></div>
					<div><?php echo $this->data->countTable("contact");?></div>
					<span class="notification red"><?php echo $this->data->countTable("contact",array("read"=>"0"));?></span>
				</a>
			</div>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						&nbsp;
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="" method="post">
						  <fieldset>
						 <legend>الإدارة</legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>
							<div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("Name") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[name]" value="<?php echo isset($data['name']) ? $data['name'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[name]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("UserName") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[username]" value="<?php echo isset($data['username']) ? $data['username'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[username]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("Password") ;?></label>
							  <div class="controls">

								<input type="password" class="span6 typeahead" name="Cform[password]" value="" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[password]')  ;?>   </p>


							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("ConfPassword") ;?></label>
							  <div class="controls">

								<input type="password" class="span6 typeahead" name="password" value="" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('password')  ;?>   </p>


							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("Email") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[email]" value="<?php echo isset($data['email']) ? $data['email'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[email]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                             <div class="control-group">
								<label class="control-label" for="selectError2"><?php echo lang("Group") ;?></label>
								<div class="controls">
								  <select id="selectError2" name="Cform[group_id]" data-placeholder="<?php echo lang("Group") ;?>" data-rel="chosen">
									<option></option>
                                    <?php foreach($groups AS $group) {

                                     if($data['group_id'] == $group['id']){ $sel="selected";}
                                     else {$sel="";}
                                    ?>
									<option value="<?php echo $group['id']?>" <?php echo $sel; ?> ><?php echo $group['name'] ;?></option>
									<?php } ?>
								  </select>
                                  <p class="help-block">	<?php echo form_error('Cform[group_id]')  ;?>   </p>
								</div>
							  </div>

                              <div class="control-group">
								<label class="control-label" for="selectError"><?php echo lang("Status") ;?></label>
								<div class="controls">
								  <select id="selectError5" name="Cform[status]" data-rel="chosen">
                                    <?php
                                      if($data['status'] == "1"){$A1 = "selected";$I1="";}
                                      elseif($data['status'] == "0"){$A1 = "";$I1="selected";}
                                      else{$A1 = "";$I1="";}
                                    ?>
									<option value="1" <?php echo $A1;?> ><?php echo lang("Active") ;?></option>
									<option value="0" <?php echo $I1;?> ><?php echo lang("NonActive") ;?></option>
								  </select>
								</div>
							  </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="Cform[register_date]" value="<?php echo isset($data['register_date'])?$data['register_date'] :date("Y-m-d H:i:s") ; ?>"/>
                              <input type="hidden" name="table" value="users"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
