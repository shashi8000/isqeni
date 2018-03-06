
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<?php echo lang("Home") ;?> <span class="divider">/</span>
					</li>
					<li>
						<?php echo lang("AboutApp");?>
					</li>
				</ul>
			</div>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<?php echo lang("Edit");?>  <?php echo lang("AboutApp");?>
						<div class="box-icon">

						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						  <div class="control-group">
					  <label class="control-label" for="textarea2"><?php echo lang("Title");?></label>
					  <div class="controls">
						<input class="input-file uniform_on" required id="fileInput" type="text" name="title" value="<?php echo $data[0]->title; ?>">
                      </div>
					</div>

					<div class="control-group">
					  <label class="control-label" for="textarea2"><?php echo lang("AboutApp");?></label>
					  <div class="controls">
						<textarea class="cleditor"  id="textarea2" required rows="3" name="text2"><?php echo isset($data[0]->text2) ? $data[0]->text2 : '';?></textarea>
                        <p class="help-block"> </p>
                      </div>
					</div>

					  <div class="form-actions">
					  	<input type="hidden" name="post_id" value="<?php echo $data[0]->id; ?>">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn" onclick="window.location='<?php echo site_url("administrator/about");?>';"><?php echo lang("Cancel");?></button>
							</div>		
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
