<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>

					<li>
					   <?php echo lang("SendNotify") ;?>
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
						 <legend><?php echo lang("SendNotify") ;?></legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>

                              <div class="control-group">
							  <label class="control-label" for="textarea2"><?php echo lang("Message") ;?></label>
							  <div class="controls">
								<textarea class="" id="textarea2" rows="3" name="Cform[msg]"><?php echo isset($data['msg']) ? $data['msg'] : '';?></textarea>
                                <p class="help-block">	<?php echo form_error('Cform[msg]')  ;?>   </p>
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