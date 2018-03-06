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
                <a href="<?php echo site_url("administrator/home") ?>"><?php echo lang("Home"); ?></a> <span class="divider">/</span>
            </li>
            <li>
                <a href="<?php echo site_url("administrator/products/") ?>"><?php echo lang("Products"); ?></a>
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
                <form class="form-horizontal" action="<?php echo base_url('administrator/vendorpermi/vendor_add'); ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend><?php echo lang("Vendor_permission"); ?></legend>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("Setting_type"); ?></label>
                            <div class="controls">
                                <table>

                                    <?php foreach($vendor_per_type as $each){?>
                                    <tr>
                                        <td>
                                        <?php echo $each['name']; ?></td><td> -- <input type="checkbox" name="Cform[setting_type][]" value="<?php echo $each['name']; ?>~<?php echo $each['id']; ?>" class="required"/></td>
                                    </tr>
                                    <?php }?>
                                    </table>    
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("Vendor_display"); ?></label>
                            <div class="controls">
                                <select name="Cform[vendor]" id="Cform[vendor]" required>
                                    <option value=""><?php echo lang("please_select") ;?>   </option>
                                    <?php foreach($vendors as $vendor){?>
                                        <option value="<?php echo $vendor['id']; ?>"><?php echo $vendor['name_en']; ?>--<?php echo $vendor['name']; ?></option>
                                    <?php }?>
                                </select>
                                <p class="help-block"><?php echo form_error('Cform[type]'); ?></p>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges"); ?></button>
                            <button type="reset" class="btn" onclick="window.location='<?php echo base_url();?>administrator/vendorpermi/add.html';"><?php echo lang("Cancel"); ?></button>

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