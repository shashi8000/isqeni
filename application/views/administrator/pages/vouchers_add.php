<style>
.box-content {
    padding: 10px;
    overflow-x: visible !important;
    overflow-y: visible !important; 
}
</style>
<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
            <li>
                <?php echo lang("coupon_sel"); ?> <span class="divider">/</span>
            </li>
            <li>
                <?php echo lang("vouchers"); ?> 
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
                <form class="form-horizontal" action="<?php echo base_url('administrator/coupon/add_voucher'); ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        
						
						<legend><?php echo lang("vouchers"); ?></legend>
                         

						<div class="control-group">
							<label class="control-label" for="selectError2"><?php echo lang("Company") ;?></label>
							<div class="controls">
							  <select id="selectError4" name="Cform[cat_id]" data-placeholder="<?php echo lang("Company") ;?>" data-rel="chosen">
							   <option></option>
								<?php  foreach($cats AS $cats_item) {
								 if($data['cat_id'] == $cats_item['id']){ $sel="selected";}
								 else {$sel="";}
								?>
								<option value="<?php echo $cats_item['id']?>" <?php echo $sel; ?> ><?php echo $cats_item['name'] ;?> - <?php echo $cats_item['name_en'] ;?></option>
								<?php } ?>
							  </select>
							  <p class="help-block">	<?php echo form_error('Cform[cat_id]')  ;?>   </p>
							</div>
						</div>

						 


						<div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("coupon_code"); ?></label>
                            <div class="controls">
                                <select name="Cform[coupon]" id="selectError3" required onChange="getCoupons();">
                                    <option value="0"><?php echo lang("please_select") ;?>   </option>
                                    <?php foreach($vouchers as $each){?>
                                        <option value="<?php echo $each['id']; ?>"><?php echo $each['coupon_code']; ?></option>';
                                    <?php }?>
                                </select>
                                <p class="help-block"><?php echo form_error('Cform[type]'); ?></p>
                            </div>
                        </div>

                        <div class="control-group" id="couponcodeSelIds">
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

    <script>
        function getCoupons() {
            var companyid = document.getElementById('selectError4');
            console.log(companyid.value);
            var couponid = document.getElementById('selectError3');
            var company_id = companyid.value;
            var coupon_id = couponid.value;
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('administrator/coupon/couponcode'); ?>?com="+companyid.value+"&cop="+couponid.value,

                success: function(data){
                    $("#couponcodeSelIds").html(data);
                }
            });
        }
    </script>

