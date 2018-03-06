
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
					<li>
						<?php   
						if($data['method']=="about"){echo lang('about');}elseif($data['method']=="conditions"){echo lang('conditions');}
						?>
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
						 <legend><?php if($data['method']=="about"){echo lang('about');}elseif($data['method']=="conditions"){echo lang('conditions');};?>  </legend>
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
                              <input type="hidden" name="table" value="article"/>
                              <input type="hidden" name="Cform[method]" value="<?php echo isset($data['method']) ? $data['method'] : $method ; ?>"/>
                              <input type="hidden" name="path" value="./download/article/"/>
                              <input type="hidden" name="types" value="gif|jpg|jpeg|png"/>
                              <input type="hidden" name="photo_lang" value="1"/>

                              <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
