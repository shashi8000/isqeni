<script>
function register()
{
  if(document.getElementById('radio8').checked)
  {
    document.getElementById('def_status').style.display="block";
    document.getElementById('radio5').removeAttribute("disabled");
    document.getElementById('radio6').removeAttribute("disabled");
    document.getElementById('radio9').removeAttribute("disabled");

    document.getElementById('max_len').style.display="block";
    document.getElementById('max_len_input').removeAttribute("disabled");

    document.getElementById('min_len').style.display="block";
    document.getElementById('min_len_input').removeAttribute("disabled");

    document.getElementById('capatcha_regs').style.display="block";
    document.getElementById('radio3').removeAttribute("disabled");
    document.getElementById('radio4').removeAttribute("disabled");

    document.getElementById('cap_reg_len').style.display="block";
    document.getElementById('cap_reg_len_input').removeAttribute("disabled");

    document.getElementById('filter_names').style.display="block";
    document.getElementById('filter_names_input').removeAttribute("disabled");

    document.getElementById('reg_cond').style.display="block";
    document.getElementById('reg_cond_input').removeAttribute("disabled");


    if(document.getElementById('radio4').checked)
    {
      document.getElementById('cap_reg_len').style.display="block";
      document.getElementById('cap_reg_len_input').removeAttribute("disabled");
    }
    else if(document.getElementById('radio3').checked)
    {
      document.getElementById('cap_reg_len').style.display="none";
      document.getElementById('cap_reg_len_input').setAttribute("disabled","disabled");
    }

  }
  else if(document.getElementById('radio7').checked)
  {
    document.getElementById('def_status').style.display="none";
    document.getElementById('radio5').setAttribute("disabled","disabled");
    document.getElementById('radio6').setAttribute("disabled","disabled");
    document.getElementById('radio9').setAttribute("disabled","disabled");

    document.getElementById('max_len').style.display="none";
    document.getElementById('max_len_input').setAttribute("disabled","disabled");

    document.getElementById('min_len').style.display="none";
    document.getElementById('min_len_input').setAttribute("disabled","disabled");

    document.getElementById('capatcha_regs').style.display="none";
    document.getElementById('radio3').setAttribute("disabled","disabled");
    document.getElementById('radio3').setAttribute("disabled","disabled");

    document.getElementById('cap_reg_len').style.display="none";
    document.getElementById('cap_reg_len_input').setAttribute("disabled","disabled");

    document.getElementById('filter_names').style.display="none";
    document.getElementById('filter_names_input').setAttribute("disabled","disabled");

    document.getElementById('reg_cond').style.display="none";
    document.getElementById('reg_cond_input').setAttribute("disabled","disabled");
  }
}
$(document).ready(function(){
    register();
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
						إعدادات التسجيل
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
							  <label class="control-label" for="typeahead">السماح بالتسجيل</label>
							  <div class="controls">
                                <input type="radio" name="Cform[register]" id="radio7" onclick="register()" value="0" <?php if($data['register'] == "0") {echo "checked";}?>/> <b><?php echo lang("NO")?></b>
                                <input type="radio" name="Cform[register]" id="radio8" onclick="register()" value="1" <?php if($data['register'] == "1") {echo "checked";}?> /> <b><?php echo lang("Yes")?></b>
							   <p class="help-block">    </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>


                            <div class="control-group" id="def_status">
							  <label class="control-label" for="typeahead">الحالة الافتراضية للاعضاء</label>
							  <div class="controls">
                                <input type="radio" name="Cform[def_reg_status]" id="radio5" value="0" <?php if(isset($data['def_reg_status']) && $data['def_reg_status'] == "0") {echo "checked";}?>/> <b>تفعيل عن طريق الايميل</b>
                                <input type="radio" name="Cform[def_reg_status]" id="radio6" value="2" <?php if(isset($data['def_reg_status']) && $data['def_reg_status'] == "2") {echo "checked";}?> /> <b>تفعيل عن طريق الإدارة</b>
                                <input type="radio" name="Cform[def_reg_status]" id="radio9" value="1" <?php if(isset($data['def_reg_status']) && $data['def_reg_status'] == "1") {echo "checked";}?> /> <b>مفعل تلقائي</b>
							   <p class="help-block">    </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                             <div class="control-group" id="max_len">
							  <label class="control-label" for="typeahead">اكبر عدد لحروف العضو</label>
							  <div class="controls">
								<input type="text" id="max_len_input" class="span6 typeahead" name="Cform[user_max_len]" value="<?php echo isset($data['user_max_len']) ? $data['user_max_len'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[user_max_len]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                             <div class="control-group" id="min_len">
							  <label class="control-label" for="typeahead">اصغر عدد لحروف العضو</label>
							  <div class="controls">
								<input type="text" id="min_len_input" class="span6 typeahead" name="Cform[user_min_len]" value="<?php echo isset($data['user_min_len']) ? $data['user_min_len'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[user_min_len]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="capatcha_regs">
							  <label class="control-label" for="typeahead">تفعيل CAPATCHA</label>
							  <div class="controls">
                                <input type="radio" name="Cform[reg_cap]" id="radio3" onclick="register()" value="0" <?php if(isset($data['reg_cap']) && $data['reg_cap'] == "0") {echo "checked";}?>/> <b><?php echo lang("NO")?></b>
                                <input type="radio" name="Cform[reg_cap]" id="radio4" onclick="register()" value="1" <?php if(isset($data['reg_cap']) && $data['reg_cap'] == "1") {echo "checked";}?> /> <b><?php echo lang("Yes")?></b>
							   <p class="help-block">    </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="cap_reg_len">
							  <label class="control-label" for="typeahead">عدد حروف CAPATCHA</label>
							  <div class="controls">
								<input type="text" id="cap_reg_len_input" class="span6 typeahead" name="Cform[reg_cap_num]" value="<?php echo isset($data['reg_cap_num']) ? $data['reg_cap_num'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[reg_cap_num]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="filter_names">
							  <label class="control-label" for="textarea2">اسماء ممنوعة من التسجيل <br /> افضل بينهم ب ,</label>
							  <div class="controls">
								<textarea class="" id="filter_names_input" rows="7" cols="30" name="Cform[filter_names]"><?php echo isset($data['filter_names']) ? $data['filter_names'] : '';?></textarea>
                                <p class="help-block">	<?php echo form_error('Cform[filter_names]')  ;?>   </p>
                              </div>
							</div>

                            <div class="control-group" id="reg_cond">
							  <label class="control-label" for="textarea2">شروط التسجيل</label>
							  <div class="controls">
								<textarea class="cleditor" id="reg_cond_input" rows="3" name="Cform[reg_condition]"><?php echo isset($data['reg_condition']) ? $data['reg_condition'] : '';?></textarea>
                                <p class="help-block">	<?php echo form_error('Cform[reg_condition]')  ;?>   </p>
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