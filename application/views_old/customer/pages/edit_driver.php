<div id="content" class="span10">
<?php 
$data=$driverm[0]; ?>
    <!-- content starts -->
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                &nbsp;
                <div class="box-icon">
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?= base_url('driver/edit_driver_confirm/'.$data['id']);  ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend> <?php echo lang("add_driver"); ?> </legend>
                        <p class="help-block">	<?php echo isset($message) ? $message : ''; ?>   </p>
						
						
						<div class="control-group">
							  <label class="control-label" for="fileInput"><?php echo lang("Mainimage") ;?></label>
							  <div class="controls">
								<input  class="input-file uniform_on" id="fileInput" type="file" name="photo" value="<?php echo isset($data['image']) ? $data['image'] : ''; ?>">
								
								<!--<input  class="input-file uniform_on" id="fileInput" type="hidden" name="photo_hide" value="<?php echo isset($data['image']) ? $data['image'] : ''; ?>">-- >
                                 <p class="help-block"> <?php // echo form_error('photo')  ;?>  </p>
							  </div>
                              <?php if(isset($data['image'])){?><img class="grayscale" src="<?php echo $data['image'] ;?>" width="120px"><?php } ?>
							</div>

						

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=  lang('Name'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="name_en" value="<?php echo isset($data['name_en']) ? $data['name_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[name_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=  lang('Name'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="name_ar" value="<?php echo isset($data['name_ar']) ? $data['name_ar'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php  // echo  form_error('Cform[name_ar]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead">Car Type English</label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_type_en" value="<?php echo isset($data['car_type_en']) ? $data['car_type_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[car_type_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						
						 <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead">Car Type Arabic</label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_type_ar" value="<?php echo isset($data['car_type_ar']) ? $data['car_type_ar'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[car_type_ar]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						
						
						
						 <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead">Car Color English</label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_color_en" value="<?php echo isset($data['car_color_en']) ? $data['car_color_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[car_color_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						
						
						
						 <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead">Car Type Arabic</label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_color_ar" value="<?php echo isset($data['car_color_ar']) ? $data['car_color_ar'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[car_color_ar]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead">Car Plate Number</label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_number" value="<?php echo isset($data['car_number']) ? $data['car_number'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[car_number]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead">Driving licence</label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="driver_licence_number" value="<?php echo isset($data['driver_licence_number']) ? $data['driver_licence_number'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[min_charge]'); ?>   </p>
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