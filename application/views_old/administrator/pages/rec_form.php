
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                     <li>
					   <a href="<?php echo site_url("administrator/news/")?>">	الأخبار</a> <span class="divider">/</span>
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
						 <legend>الأخبار</legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>
							<div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("Title") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[title]" value="<?php echo isset($data['title']) ? $data['title'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[title]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                              <div class="control-group">
							  <label class="control-label" for="fileInput"><?php echo lang("Photo") ;?></label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="photo_to_up">
                                 <p class="help-block"> &nbsp;  </p>
							  </div>
							</div>

                              <div class="control-group">
							  <label class="control-label" for="textarea2"><?php echo lang("Desc") ;?></label>
							  <div class="controls">
								<textarea class="autogrow"  rows="3" name="Cform[desc]"><?php echo isset($data['desc']) ? $data['desc'] : '';?></textarea>
                                <p class="help-block">	<?php echo form_error('Cform[desc]')  ;?>   </p>
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
                              <input type="hidden" name="table" value="news"/>
                              <input type="hidden" name="path" value="./download/news/"/>
                              <input type="hidden" name="isthumb" value="true"/>
                              <input type="hidden" name="twidth" value="200"/>
                              <input type="hidden" name="theight" value="200"/>
                              <input type="hidden" name="types" value="gif|jpg|jpeg|png"/>
                              <input type="hidden" name="Cform[ardate]" value="<?php echo isset($data['ardate']) ? $data['ardate'] : date('Y-m-d') ; ?>"/>
                              <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
