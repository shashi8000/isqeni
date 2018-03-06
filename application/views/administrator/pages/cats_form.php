
<div id="content" class="span10">
			<!-- content starts -->
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                    <li>
					   <a href="<?php echo site_url("administrator/cats/")?>"><?php echo lang("Companies") ;?></a>
					</li>
				</ul>
			</div>
            <!--
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
	   -->
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
						 <legend><?php echo lang("Companies") ;?></legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>
							
							<div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("CompanyName_ar") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[name]" value="<?php echo isset($data['name']) ? $data['name'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required>
							   <p class="help-block">	<?php echo form_error('Cform[name]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

							<div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("CompanyName_en") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[name_en]" value="<?php echo isset($data['name_en']) ? $data['name_en'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required>
							   <p class="help-block">	<?php echo form_error('Cform[name_en]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>


							<div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("Percentage") ;?> %</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[percentage]" value="<?php echo isset($data['percentage']) ? $data['percentage'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required>
							   <p class="help-block">	<?php echo form_error('Cform[percentage]')  ;?>   </p>
							  </div>
							</div>




							<div class="control-group">
                                  <label class="control-label" for="fileInput"><?php echo lang("Email");?></label>
                                  <div class="controls">
                                      <input class="input-file uniform_on" id="fileInput" type="email" name="Cform[email]" value="<?php echo isset($data['email']) ? $data['email'] : '';?>" required>
                                      <p class="help-block"> &nbsp;  </p>
                                  </div>
                              </div>



              <div class="control-group">
							  <label class="control-label" for="fileInput"><?php echo lang("CompanyLogo") ;?></label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="photo_to_up">
                                 <p class="help-block"> &nbsp;  </p>
							  </div>
                            
							</div>
                         
                         <div class="control-group" id="titlegroup">
			<label class="control-label" for="typeahead"><?php echo lang("city") ;?></label>
							  <div class="controls">
                                                              <select name="Cform[city_id]city" class="span6 typeahead">
                                                                      <?php foreach ($cities as $key=>$value):     ?>
                                                                      <option value="<?=$value['id'];  ?>"><?= $value['city_name_en'];  ?></option>
                                                                      
                                                                      <?php endforeach; ?>
                                                              </select>		
						
							  </div>
							</div>
                         
                         
							  <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("Username") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[username]" value="<?php echo isset($data['username']) ? $data['username'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required>
							   <p class="help-block">	<?php echo form_error('Cform[username]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>
							  <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("Password") ;?></label>
							  <div class="controls">
								<input type="password" class="span6 typeahead" name="Cform[password]" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required>
							   <p class="help-block">	<?php echo form_error('Cform[password]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>
                              <?php if(isset($data['photo'])){?><img class="grayscale" src="<?php echo $data['photo'] ;?>" width="120px"><?php } ?> 

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn" onclick="window.location='<?php echo base_url();?>administrator/cats.html';"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="table" value="cats"/>
                              <input type="hidden" name="path" value="./download/cats/"/>
                              <input type="hidden" name="types" value="gif|jpg|jpeg|png"/>
                              <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/>
							</div>
						  </fieldset>
						</form>
					</div>
				</div><!--/span-->
			</div><!--/row-->
