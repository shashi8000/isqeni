
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                     <li>
					   <a href="<?php echo site_url("administrator/companies/")?>">التجار</a> <span class="divider">/</span>
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
						 <legend>التجار</legend>
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
							  <label class="control-label" for="typeahead">رقم الجوال</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[mobile]" value="<?php echo isset($data['mobile']) ? $data['mobile'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[mobile]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group">
								<label class="control-label" for="selectError2">المستخدم</label>
								<div class="controls">
								  <select id="selectError2" name="Cform[client_id]" data-placeholder="المستخدم" data-rel="chosen">
									<option></option>
                                    <?php foreach($clients AS $cat) {

                                     if($data['client_id'] == $cat['id']){ $sel="selected";}
                                     else {$sel="";}
                                    ?>
									<option value="<?php echo $cat['id']?>" <?php echo $sel; ?> ><?php echo $cat['name'] ;?></option>
									<?php } ?>
								  </select>
                                  <p class="help-block">	<?php echo form_error('Cform[client_id]')  ;?>   </p>
								</div>
							</div>

                            <div class="control-group">
								<label class="control-label" for="selectError2">الاقسام</label>
								<div class="controls">
								  <select id="selectError4" name="cats[]" data-placeholder="الاقسام" data-rel="chosen" multiple>
									<option></option>

                                    <?php
                                    $rels = explode(",",$data['cats']) ;
                                    foreach($cats AS $cat) {

                                     if(in_array($cat['id'],$rels)){$sel = "selected";}else{$sel = "";}

                                    ?>
									<option value="<?php echo $cat['id']?>" <?php echo $sel; ?> ><?php echo $cat['name'] ;?></option>
									<?php } ?>
								  </select>
                                  <p class="help-block">	<?php echo form_error('cats')  ;?>   </p>
								</div>
							</div>

                            <div class="control-group">
								<label class="control-label" for="selectError">مميز</label>
								<div class="controls">
								  <select id="selectError5" name="Cform[top]" data-rel="chosen">
                                    <?php
                                      if($data['top'] == "1"){$A1 = "selected";$I1="";}
                                      elseif($data['top'] == "0"){$A1 = "";$I1="selected";}
                                      else{$A1 = "";$I1="";}
                                    ?>
									<option value="0" <?php echo $I1;?> ><?php echo lang("NO") ;?></option>
                                    <option value="1" <?php echo $A1;?> ><?php echo lang("Yes") ;?></option>
								  </select>
								</div>
							  </div>

                            <div class="control-group">
								<label class="control-label" for="selectError">مفعل</label>
								<div class="controls">
								  <select id="selectError8" name="Cform[active]" data-rel="chosen">
                                    <?php
                                      if($data['active'] == "1"){$A1 = "selected";$I1="";}
                                      elseif($data['active'] == "0"){$A1 = "";$I1="selected";}
                                      else{$A1 = "";$I1="";}
                                    ?>
									<option value="0" <?php echo $I1;?> ><?php echo lang("NO") ;?></option>
                                    <option value="1" <?php echo $A1;?> ><?php echo lang("Yes") ;?></option>
								  </select>
								</div>
							  </div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">صورة اللوجو</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="photo_to_up">
                                <?php
                                if(isset($data['photo'])){
                              ?>
                              <img src="<?php echo $data['photo'] ;?>" width="50px">
                              <?php } ?>
                                 <p class="help-block"> &nbsp;  </p>
							  </div>

							</div>
                            <div class="control-group">
							  <label class="control-label" for="fileInput">فيديو</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="file_to_up">
                                 <p class="help-block"> &nbsp;  </p>
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="fileInput">صورة 1</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="photo_to_up1">
                                <?php
                                if(isset($data['photo1'])){
                              ?>
                              <img src="<?php echo $data['photo1'] ;?>" width="50px">
                              <?php } ?>
                                 <p class="help-block"> &nbsp;  </p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="fileInput">صورة 2</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="photo_to_up2">
                                <?php
                                if(isset($data['photo2'])){
                              ?>
                              <img src="<?php echo $data['photo2'] ;?>" width="50px">
                              <?php } ?>
                                 <p class="help-block"> &nbsp;  </p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="fileInput">صورة 3</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="photo_to_up3">
                                <?php
                                if(isset($data['photo3'])){
                              ?>
                              <img src="<?php echo $data['photo3'] ;?>" width="50px">
                              <?php } ?>
                                 <p class="help-block"> &nbsp;  </p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="fileInput">صورة 4</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="photo_to_up4">
                                <?php
                                if(isset($data['photo4'])){
                              ?>
                              <img src="<?php echo $data['photo4'] ;?>" width="50px">
                              <?php } ?>
                                 <p class="help-block"> &nbsp;  </p>
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="textarea2"><?php echo lang("Text") ;?></label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="Cform[text2]"><?php echo isset($data['text2']) ? $data['text2'] : '';?></textarea>
                                <p class="help-block">	<?php echo form_error('Cform[text2]')  ;?>   </p>
                              </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="table" value="companies"/>
                              <input type="hidden" name="path" value="./download/companies/"/>
                              <input type="hidden" name="types" value="gif|jpg|jpeg|png|mp4|3pg"/>
                              <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
