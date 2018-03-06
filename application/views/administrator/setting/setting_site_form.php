
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>

					<li>
						إعدادات الرسائل
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
						 <legend>إعدادات الموقع </legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>


                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">تصنيف الرسائل <br  /> اعتبار ان الرسائل النصية والصور والفيديو مختلفين</label>
							  <div class="controls">
                                <input type="radio" name="Cform[sendsany]" id="radio5" value="1" <?php if($data['sendsany'] == "1") {echo "checked";}?>/> <b><?php echo lang("NO")?></b>
                                <input type="radio" name="Cform[sendsany]" id="radio6" value="0" <?php if($data['sendsany'] == "0") {echo "checked";}?> /> <b><?php echo lang("Yes")?></b>
							   <p class="help-block">    </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>
                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">عدد الحروف فى الرسائل النصية <br /> اتكرها 0 للغير محدودخ</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[txt_msg_len]" value="<?php echo isset($data['txt_msg_len']) ? $data['txt_msg_len'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[txt_msg_len]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">حجم الصور فى الرسائل <br /> اتكرها 0 للغير محدودخ</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[img_size]" value="<?php echo isset($data['img_size']) ? $data['img_size'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[img_size]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">حجم الفيديو فى الرسائل<br /> اتكرها 0 للغير محدودخ</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[video_size]" value="<?php echo isset($data['video_size']) ? $data['video_size'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[video_size]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">حجم مقطع الصوت فى الرسائل <br /> اتكرها 0 للغير محدودخ</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[audio_size]" value="<?php echo isset($data['audio_size']) ? $data['audio_size'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[audio_size]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="Cform[id]" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="Cform[site_lang]" value="<?php echo isset($data['site_lang']) ? $data['site_lang'] : "arabic" ; ?>"/>
                              <input type="hidden" name="Cform[admin_lang]" value="<?php echo isset($data['admin_lang']) ? $data['admin_lang'] : "arabic" ; ?>"/>
                              <input type="hidden" name="path" value="./download/setting/"/>
                              <input type="hidden" name="types" value="gif|jpg|jpeg|png"/>
                              <input type="hidden" name="table" value="setting"/>
                              <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->