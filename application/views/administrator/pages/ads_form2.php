
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                     <li>
					   <a href="<?php echo site_url("administrator/ad2/")?>">  إعلانات الفوتر</a> <span class="divider">/</span>
					</li>
					<li>
						<?php echo lang("Add") ;?>
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
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" style="min-height: 600px; overflow: hidden;">
						  <fieldset>
						 <legend>إعلانات الفوتر</legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>

                         <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">اسم الإعلان</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[name]" value="<?php echo isset($data['name']) ? $data['name'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[name]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
						 </div>

                         <div class="control-group" id="file_div">
							  <label class="control-label" for="fileInput"><?php echo lang("Photo") ;?></label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="photo_to_up">
                                 <p class="help-block">	<?php echo form_error('photo')  ;?>   </p>
							  </div>
						 </div>

                         <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">لينك</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[link]" value="<?php echo isset($data['link']) ? $data['link'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[link]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
						 </div>


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="table" value="ads"/>
                              <input type="hidden" name="Cform[atype]" value="1"/>
                              <input type="hidden" name="path" value="./download/adss/"/>
                              <input type="hidden" name="must_upload" value="<?php echo empty($data['photo']) ? 1 : 0 ; ?>" id="must"/>
                              <input type="hidden" name="types" value="gif|jpg|jpeg|png"/>
                              <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
