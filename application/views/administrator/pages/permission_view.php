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
                <?php echo lang("Vendor_display"); ?>
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
                <fieldset>
                    <legend><?php echo lang("Vendor_permission"); ?></legend>
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <thead>
                            <tr>
                                <th><?php echo lang("Sr_No"); ?></th>
                                <th><?php echo lang("Vendor_Name"); ?></th>
                                <th><?php echo lang("Permissions"); ?></th>
                            </tr>

                            </thead>

                            <?php
                            $No = 0 ;
                            foreach($vendorgrops as $vendorgrop){
                                $No++;
                                ?>
                            <tr>
                                <td><?php echo $No;?></td>
                                <td><?php echo $vendorgrop['name_en'];?></td>
                                <td><table>
                                        <tr>
                                        <?php
                                        $permissioncheck=$this->data->vendor_permission_check($vendorgrop['id']);
                                        foreach($permissioncheck as $permischeck){
                                        ?>

                                            <td> <?php echo $permischeck['name_en']; ?> -- <input type="checkbox" name="Cform[setting_type][]" value="<?php echo $permischeck['name_en']; ?>" checked class="required"/></td>

                                        <?php } ?>
                                        </tr>
                                    </table></td>
                            </tr>
                            <?php } ?>
                        </table>
                </fieldset>
            </div>
        </div>
    </div>