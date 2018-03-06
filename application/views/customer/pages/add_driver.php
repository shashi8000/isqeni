
<div id="content" class="span10">
<div>
        <ul class="breadcrumb">
            <li>
                 <?php echo lang("Home"); ?><span class="divider">/</span>
            </li>
			<li>
                 <?php echo lang("Driver"); ?> <span class="divider">/</span>
            </li>
            <li>
                <?php echo lang("Add_Drivers"); ?> 
            </li>
        </ul>
    </div>
    <!-- content starts -->
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <?php echo lang("Add_Drivers"); ?> 
                <div class="box-icon">
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?= base_url('driver/add_driver');  ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend> <?php echo lang("add_driver"); ?> </legend>
                        <p class="help-block">	<?php echo isset($message) ? $message : ''; ?>   </p>
						
						
						<div class="control-group">
							  <label class="control-label" for="fileInput"><?php echo lang("Mainimage") ;?></label>
							  <div class="controls">
								<input required class="input-file uniform_on" id="fileInput" type="file" name="photo">
                                 <p class="help-block"> <?php echo form_error('photo')  ;?>  </p>
							  </div>
                              <?php if(isset($data['photo'])){?><img class="grayscale" src="<?php echo $data['photo'] ;?>" width="120px"><?php } ?>
							</div>

						

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=  lang('Name_In_English'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="name_en" value="<?php echo isset($data['name_en']) ? $data['name_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[name_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=  lang('Name_In_Arabic'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="name_ar" value="<?php echo isset($data['name_ar']) ? $data['name_ar'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[name_ar]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Car_Type_English'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_type_en" value="<?php echo isset($data['car_type_en']) ? $data['car_type_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[car_type_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						
						 <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Car_Type_Arabic'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_type_ar" value="<?php echo isset($data['car_type_ar']) ? $data['car_type_ar'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[car_type_ar]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						
						
						
						 <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Car_Color_English'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_color_en" value="<?php echo isset($data['car_color_en']) ? $data['car_color_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[car_color_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						
						
						
						 <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Car_Color_Arabic'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_color_ar" value="<?php echo isset($data['car_color_ar']) ? $data['car_color_ar'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[car_color_ar]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Car_Plate_Number'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_number" value="<?php echo isset($data['car_number']) ? $data['car_number'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[car_number]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Driving_licence'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="driver_licence_number" value="<?php echo isset($data['driver_licence_number']) ? $data['driver_licence_number'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[driver_licence_number]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>



<div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Mobile'); ?></label>
                            <div class="controls">
                                <input type="number" class="span6 typeahead" name="mobile" value="<?php echo isset($data['mobile']) ? $data['mobile'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required>
                               <!-- <p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>



						<div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('driver_email'); ?></label>
                            <div class="controls">
                                <input type="email" class="span6 typeahead" name="driver_email" value="<?php echo isset($data['driver_email']) ? $data['driver_email'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required pattern="^\S+@\S+\.\S+$" title="example@mail.com">
                                <p class="help-block">	<?php  echo form_error('Cform[driver_email]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

						<div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('driver_password'); ?></label>
                            <div class="controls">
                                <input required type="password" class="span6 typeahead" name="password" value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php  echo form_error('Cform[password]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        
                        
                        <div class="form-actions">
			<button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
			<button type="reset" class="btn" onclick="window.location='<?php echo base_url();?>driver/view_all.html';"><?php echo lang("Cancel") ;?></button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>