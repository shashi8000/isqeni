
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                     <li>
						<?php echo lang("Messages") ;?> <span class="divider">/</span>
					</li>
					<li>
						<?php echo lang("Read") ;?>
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
						<form class="form-horizontal" action="" method="post">
						  <fieldset>
						 <legend><?php echo lang("Messages") ;?></legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>

                            <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang("Name") ;?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo isset($data['cname'])? $data['cname'] : '';?>" readonly>
								</div>
							  </div>

                              <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang("Mobile") ;?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo isset($data['cphone'])? $data['cphone'] : '';?>" readonly>
								</div>
							  </div>

                              <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang("Email") ;?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo isset($data['cemail'])? $data['cemail'] : '';?>" readonly>
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang("Message") ;?></label>
								<div class="controls">
								  <textarea class="autogrow" readonly><?php echo isset($data['cmessage'])? $data['cmessage'] : '';?></textarea>
								</div>
							  </div>
                               <div class="form-actions">
							  <a href="<?php echo site_url("administrator/home");?>" class="btn btn-large btn-primary"><?php echo lang("BackMessages") ;?></a>

							</div>
						  </fieldset>
						</form>
                        <?php
                        $this->data->read($data['id'],$table);
                        ?>

					</div>
				</div><!--/span-->

			</div><!--/row-->