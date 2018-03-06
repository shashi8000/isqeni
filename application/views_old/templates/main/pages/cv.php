
<div class="address">
<p class="font3"><?php echo lang("jobs")?></p>
</div>
<form action="#msg" method="post" class="level-2-box-l-form" enctype="multipart/form-data">
<div id="level-2">

<div id="level-2-box">
<div id="level-2-box-l">

<span id="msg"><?php echo isset($message) ? $message : '';?>
  <?php echo form_error('Cform[cname]')  ;?>
  <?php echo form_error('Cform[cphone]')  ;?>
  <?php echo form_error('Cform[cemail]')  ;?>
  <?php echo form_error('Cform[cmessage]')  ;?>
  <?php echo form_error('Cform[call_time]')  ;?>
</span>
<ul>
<li>
<div class="level-2-box-l-form-l">
<p> <?php echo lang("CoName")?></p>
<input type="text" class="level-2-box-l-form-box" id="name" name="Cform[cname]"  value="<?php echo isset($data['cname']) ? $data['cname'] : '';?>" placeholder="<?php echo lang("CoName")?>" />
</div>
<div class="level-2-box-l-form-r">
<p><?php echo lang("CoPhone")?></p>
<input type="text" class="level-2-box-l-form-box" id="subject" name="Cform[cphone]" value="<?php echo isset($data['cphone']) ? $data['cphone'] : '';?>" placeholder="<?php echo lang("CoPhone")?>"/>
</div>
</li>
<li>
<div class="level-2-box-l-form-l">
<p><?php echo lang("CoEmail")?></p>
<input type="text" class="level-2-box-l-form-box" id="email" name="Cform[cemail]"  value="<?php echo isset($data['cemail']) ? $data['cemail'] : '';?>" placeholder="<?php echo lang("CoEmail")?>"  />
</div>
<div class="level-2-box-l-form-r">
<p><?php echo lang("CoBestTime")?></p>
<select name="Cform[call_time]" class="level-2-box-l-form-box3">
<option value=""><?php echo lang("SelectTime")?></option>
<option value="09 AM - 12 PM">09 AM - 12 PM</option>
<option value="12 PM - 03 PM">12 PM - 03 PM</option>
<option value="03 PM - 06 PM">03 PM - 06 PM</option>
<option value="06 PM - 09 PM">06 PM - 09 PM</option>
<option value="09 PM - 12 AM">09 PM - 12 AM</option>
  </select>
</div>
</li>
<li>
<div class="level-2-box-l-form-r">
<p><?php echo lang("AttachFile")?></p>
<script>
    function open_dialog(){
        var filebox=document.getElementById("clck");
        var txt_path=document.getElementById("txt_file_path");
        filebox.click();
        txt_path.value=filebox.value;
    }
    </script>
<input type="file" name="photo_to_up"id="clck"style="display:none"/>
<input type="button"onclick="open_dialog();"value="Upload" class="level-2-box-l-form-botton3"/>

</div>
</li>
</ul>

</div>
<p><?php echo lang("CoMessage")?></p>
<textarea class="level-2-box-l-form-box4" name="Cform[cmessage]" id="question-p" rows="5" cols="60"  placeholder="<?php echo lang("CoMessage")?>"><?php echo isset($data['cmessage']) ? $data['cmessage'] : '';?></textarea>
<input name="" type="submit" value="<?php echo lang("Send")?>" class="level-2-box-l-form-botton2"/>
<input type="hidden" name="Cform[cdate]" value="<?php echo date('Y-m-d H:i:s');?>" />
<input type="hidden" name="Cform[jobid]" value="0" />
<input type="hidden" name="id" value="0"/>
<input type="hidden" name="table" value="jobs"/>
<input type="hidden" name="path" value="./download/jobs/"/>
<input type="hidden" name="types" value="doc|docx|pdf"/>
</div>
</div>
</form>
