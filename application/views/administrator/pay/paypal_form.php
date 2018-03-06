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
					  <?php echo lang("Paypal")?>
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
						 <legend><?php echo lang("Paypal")?>  </legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>
                         <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("UserName") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[username]" value="<?php echo isset($data['username']) ? $data['username'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[username]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
						 </div>
                         <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("Password") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[password]" value="<?php echo isset($data['password']) ? $data['password'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[password]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("Signature")?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[signature]" value="<?php echo isset($data['signature']) ? $data['signature'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[signature]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="Cform[id]" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="table" value="paypal"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->