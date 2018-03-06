<script>
function colosesite()
{
  if(document.getElementById('radio4').checked)
  {

    document.getElementById('closemsg').style.display="block";
  }
  else if(document.getElementById('radio3').checked)
  {
    document.getElementById('closemsg').style.display="none";
  }
}
$(document).ready(function(){
    colosesite();


  });
</script>
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>

					<li>
					   إعدادات التذاكر
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
						 <legend>إعدادات عامة </legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>


                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">تفعيل الرد التلقائي</label>
							  <div class="controls">
                                <input type="radio" name="Cform[auto_res]" id="radio3" onclick="colosesite()" value="0" <?php if($data['auto_res'] == "0") {echo "checked";}?>/> <b><?php echo lang("NO")?></b>
                                <input type="radio" name="Cform[auto_res]" id="radio4" onclick="colosesite()" value="1" <?php if($data['auto_res'] == "1") {echo "checked";}?> /> <b><?php echo lang("Yes")?></b>
							   <p class="help-block">    </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="closemsg">
							  <label class="control-label" for="textarea2">الرد التلقائي</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="LCform[auto_res_msg]"><?php echo isset($data['auto_res_msg']) ? $data['auto_res_msg'] : '';?></textarea>
                                <p class="help-block">	<?php echo form_error('LCform[auto_res_msg]')  ;?>   </p>
                              </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="Cform[id]" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="Cform[site_lang]" value="<?php echo isset($data['site_lang']) ? $data['site_lang'] : "2" ; ?>"/>
                              <input type="hidden" name="Cform[admin_lang]" value="<?php echo isset($data['admin_lang']) ? $data['admin_lang'] : "2" ; ?>"/>
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