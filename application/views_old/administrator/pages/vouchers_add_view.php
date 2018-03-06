<div id="content" class="span10">
    <!-- content starts -->
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
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend><?php echo lang("vouchers"); ?></legend>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("prod_num_ar"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[prod_num]" value="<?php echo isset($data['prod_num']) ? $data['prod_num'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[prod_num]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("prod_num_en"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[prod_num_en]" value="<?php echo isset($data['prod_num_en']) ? $data['prod_num_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <?= form_hidden('price', '0'); ?>
                                <p class="help-block">	<?php echo form_error('Cform[prod_num_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("name_ar"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[name]" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[name]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("name_en"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[name_en]" value="<?php echo isset($data['name_en']) ? $data['name_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[name_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("min_charge_sar"); ?></label>
                            <div class="controls">
                                <input type="number" class="span6 typeahead" name="Cform[min_charge]" value="<?php echo isset($data['min_charge']) ? $data['min_charge'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[min_charge]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("price_indivi"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[price_ind]" value="<?php echo isset($data['price_ind']) ? $data['price_ind'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[price_ind]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("price_mosq"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[price_mosque]" value="<?php echo isset($data['price_mosque']) ? $data['price_mosque'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[price_mosque]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
    <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("price_corp"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[price_corp]" value="<?php echo isset($data['price_corp']) ? $data['price_corp'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[price_corp]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges"); ?></button>
                            <button type="reset" class="btn"><?php echo lang("Cancel"); ?></button>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
