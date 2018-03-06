<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
            <li>
                <?php echo lang("coupon_sel"); ?> <span class="divider">/</span>
            </li>
            <li>
                <?php echo lang("Add_Coupon"); ?>
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
            <?= validation_errors(); ?>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('administrator/coupon/addadmin_voucher'); ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend><?php echo lang("Coupon"); ?></legend>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("coupon_title"); ?></label>
                            <div class="controls">


                                
                                <input type="text" class="span6 typeahead" name="Cform[coupon_title]" value="<?php echo isset($data['coupon_title']) ? $data['coupon_title'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required>
                                <p class="help-block">	<?php echo form_error('Cform[coupon_title]'); ?>   </p>

                            </div>
                        </div>

						<!--
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("coupon_code"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[coupon_code]" value="<?php echo isset($data['coupon_code']) ? $data['coupon_code'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[coupon_code]'); ?></p>
                            </div>
                        </div>
						-->


                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("start_date"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead datepicker" name="Cform[start_date]" value="<?php echo isset($data['start_date']) ? $data['start_date'] : ''; ?>"  data-provide="typeahead" data-items="4" data-source='[]' required>
                                <p class="help-block">	<?php echo form_error('Cform[start_date]'); ?>   </p>

                            </div>
                        </div>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("end_date"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead datepicker" name="Cform[end_date]" value="<?php echo isset($data['end_date']) ? $data['end_date'] : ''; ?>"   data-provide="typeahead" data-items="4" data-source='[]' required>
                                <p class="help-block">	<?php echo form_error('Cform[end_date]'); ?>   </p>
                            </div>
                        </div>

						<!--
						<div class="control-group">
							<label class="control-label" for="selectError2"><?php echo lang("Company") ;?></label>
							<div class="controls">
							  <select id="selectError4" name="Cform[cat_id]" data-placeholder="<?php echo lang("Company") ;?>" data-rel="chosen" onChange="getState(this.value);">
							   <option></option>
								<?php  foreach($cats AS $cats_item) {
								 if($data['cat_id'] == $cats_item['id']){ $sel="selected";}
								 else {$sel="";}
								?>
								<option value="<?php echo $cats_item['id']?>" <?php echo $sel; ?> ><?php echo $cats_item['name'] ;?> - <?php echo $cats_item['name_en'] ;?></option>
								<?php } ?>
							  </select>
							  <p class="help-block"><?php echo form_error('Cform[cat_id]')  ;?>   </p>
							</div>
						</div>
						-->


                        
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("status"); ?></label>
                            <div class="controls">
                                <select name="Cform[status]" id="Cform[status]" required>
                                    <option value="0"><?php echo lang("please_select") ;?>   </option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                                <p class="help-block"><?php echo form_error('Cform[status]'); ?>   </p>

                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("Coupon_type"); ?></label>
                            <div class="controls">
                                <select name="Cform[type]" id="Cform[type]" required>
                                    <option value="0"><?php echo lang("please_select") ;?>   </option>
                                    <option value="fixed">Fixed</option>
                                    <option value="percentage">Percentage</option>
                                </select>
                                <p class="help-block"><?php echo form_error('Cform[type]'); ?></p>
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("Coupon_value"); ?></label>
                            <div class="controls">
                                <input type="number" class="span6 typeahead" name="Cform[value]" value="<?php echo isset($data['value']) ? $data['value'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required>
                                <p class="help-block"><?php echo form_error('Cform[value]'); ?>   </p>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges"); ?></button>
                            <button type="reset" class="btn" onclick="window.location='<?php echo base_url();?>administrator/coupon.html';"><?php echo lang("Cancel"); ?></button>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

<script>
    $('#reschedule-txt').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });
</script>