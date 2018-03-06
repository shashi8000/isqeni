
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                    <li>
					   <a href="<?php echo site_url("administrator/cats/sub")?>">الاقسام الفرعية</a> <span class="divider">/</span>
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
						 <legend>الاقسام الفرعية</legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>
							<div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">الاسم بالعربي</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[name]" value="<?php echo isset($data['name']) ? $data['name'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[name]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">الاسم بالانجليزي</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[name_en]" value="<?php echo isset($data['name_en']) ? $data['name_en'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[name_en]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group">
								<label class="control-label" for="selectError2">القسم الرئيسي</label>
								<div class="controls">
								  <select id="selectError4" name="Cform[parent]" data-placeholder="القسم الرئيسي" data-rel="chosen">
									<option></option>
                                    <?php foreach($cats AS $cat) {

                                     if($data['parent'] == $cat['id']){ $sel="selected";}
                                     else {$sel="";}
                                    ?>
									<option value="<?php echo $cat['id']?>" <?php echo $sel; ?> ><?php echo $cat['name'] ;?></option>
									<?php } ?>
								  </select>
                                  <p class="help-block">	<?php echo form_error('Cform[parent]')  ;?>   </p>
								</div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="fileInput">صورة </label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="photo_to_up">
                                 <p class="help-block"> &nbsp;  </p>
							  </div>
                              <?php if(isset($data['photo'])){?><img class="grayscale" src="<?php echo $data['photo'] ;?>" width="120px"><?php } ?>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
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
