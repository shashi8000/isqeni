
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
						رفع ملف اكسيل
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
						 <legend>الايملات</legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>
                            <div class="control-group">
							  <label class="control-label" for="fileInput">الملف <br />xls فقط</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="file_to_up">
                                 <p class="help-block">	<?php echo form_error('file')  ;?>   </p>
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">رفع</button>
                              <input type="hidden" name="id" value="0"/>
                              <input type="hidden" name="path" value="./download/"/>
                              <input type="hidden" name="types" value="xls"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
