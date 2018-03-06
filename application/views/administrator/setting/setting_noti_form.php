<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<?php echo lang("Settings") ;?> <span class="divider">/</span>
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
						<form class="form-horizontal" onclick="return checkFrm();" action="" method="post" enctype="multipart/form-data">
						  <fieldset>
						 <legend><?php echo lang("SendNotify") ;?></legend>
                         <p class="help-block">	<?php echo isset($data) ?$data : ''  ;?>   </p>

                              
                         	<div class="control-group">
							  <label class="control-label" for="textarea2"><?php echo lang("user_type") ;?></label>
							  <div class="controls">
								<select  name="couponcodeSelId" required  id="couponcodeSelIds" onchange="chooseType(this.value)">
                                <option value=""><?php echo lang("Please_select_user_type") ;?></option>
                                <option value="1">Individual</option>
                                <option value="2">Corporate</option>
                                <option value="3">Mosque</option>
                               </select>

                               
                              </div>

<br>
                              <div class="control-group" id="showcorp" style="display:none;">
							  <label class="control-label" for="textarea2"><?php echo lang("Corporate_Type") ;?></label>
							  <div class="controls">
<?php echo lang("Company");?>:<input type="radio"  name="corporate_type" value="company"><?php echo lang("Hotel");?>:<input  type="radio" name="corporate_type" value="hotel"><?php echo lang("Compound");?>:<input  type="radio" name="corporate_type" value="compound">
                               
                              </div>





							</div>	

                              <div class="control-group">
							  <label class="control-label" for="textarea2"><?php echo lang("Message") ;?></label>
							  <div class="controls">
								<textarea required id="textarea2" rows="3" name="Cform[msg]"></textarea>
                                <p class="help-block"> </p>
                              </div>
							</div>
							

							




							<div class="form-actions">
							  <button type="submit"  class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->

<style>
.box-header .box-icon .btn, .control-group .btn {
    padding: 12px 22px!important;
    font-size: 15px!important;
    width: auto!important;
    height: auto!important;
    line-height: normal;
}
</style>
			<script type="text/javascript">
				function chooseType(val){
					
					if(val==2){

							$('#showcorp').show();

					}else{
							$('#showcorp').hide();
					}

				}



			</script>