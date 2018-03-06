<style>
.thumbnail img, .thumbnail > a{display: inline-block;}
</style>

<div id="content" class="span10">
<?php 
$data=$driverm[0]; 

//print_r($data);
//exit;

?>
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
                        <legend> <?php echo lang('Driver_off'); ?> <?php

                             $this->db->select('*');
                            $this->db->from('cats');
                            $this->db->where('id',$data['vendor_id']);
                            $query = $this->db->get();
        
      $valCat = $query->result_array();

      if($this->config->config['language'] =='english'){
       echo @$valCat[0]['name_en']; 
      }else{
        echo @$valCat[0]['name']; 
      }
      
                         ?> </legend>
                        <p class="help-block">	<?php echo isset($message) ? $message : ''; ?>   </p>
						
						
						<div class="control-group">
							  <label class="control-label" for="fileInput"><?php echo lang("Mainimage") ;?></label>
							  <div class="controls">
								<div id="image-<?php echo $data['id'] ;?>" class="thumbnail">
                                <a style="background:url(<?php echo $data['image'] ;?>)" title="<?php echo $data['name_en'] ;?>" href="<?php echo $data['image'] ;?>"><img class="grayscale" src="<?php echo $data['image']; ?>" width="50px" alt="<?php echo $data['name_en'] ;?>"></a>
                            </div>
								
								<!--<input  class="input-file uniform_on" id="fileInput" type="hidden" name="photo_hide" value="<?php echo isset($data['image']) ? $data['image'] : ''; ?>">-- >
                                 <p class="help-block"> <?php // echo form_error('photo')  ;?>  </p>
							  </div>
                              <?php if(isset($data['image'])){?><img class="grayscale" src="<?php echo $data['image'] ;?>" width="120px"><?php } ?>
							</div>-->
							</div>
                        </div>

						

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=  lang('Name_In_English'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="name_en" value="<?php echo isset($data['name_en']) ? $data['name_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php  //echo form_error('Cform[name_en]'); ?>   </p>
                               
                            </div>
                        </div>
                        
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=  lang('Name_In_Arabic'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="name_ar" value="<?php echo isset($data['name_ar']) ? $data['name_ar'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php   //echo  form_error('Cform[name_ar]'); ?>   </p>
                               
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Car_Type_English'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_type_en" value="<?php echo isset($data['car_type_en']) ? $data['car_type_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[car_type_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						
						 <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Car_Type_Arabic'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_type_ar" value="<?php echo isset($data['car_type_ar']) ? $data['car_type_ar'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[car_type_ar]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						
						
						
						 <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Car_Color_English'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_color_en" value="<?php echo isset($data['car_color_en']) ? $data['car_color_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[car_color_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						
						
						
						 <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Car_Color_Arabic'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_color_ar" value="<?php echo isset($data['car_color_ar']) ? $data['car_color_ar'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[car_color_ar]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
						

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Car_Plate_Number'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="car_number" value="<?php echo isset($data['car_number']) ? $data['car_number'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[car_number]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('Driving_licence'); ?></label>
                            <div class="controls">
                                <input required type="text" class="span6 typeahead" name="driver_licence_number" value="<?php echo isset($data['driver_licence_number']) ? $data['driver_licence_number'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[min_charge]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

						<div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('driver_email'); ?></label>
                            <div class="controls">
                                <input type="email" class="span6 typeahead" name="driver_email" value="<?php echo isset($data['driver_email']) ? $data['driver_email'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required pattern="^\S+@\S+\.\S+$" title="example@mail.com">
                                <p class="help-block">	<?php  //echo form_error('Cform[driver_email]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

						<div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?=lang('driver_password'); ?></label>
                            <div class="controls">
                                <input required type="password" class="span6 typeahead" name="password" value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php  //echo form_error('Cform[password]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        
                        
                        <div class="form-actions">
							<!--<button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>-->
							<button type="reset" class="btn" onclick="window.location='<?php echo base_url();?>administrator/driver/view_all.html';"><?php echo lang("Cancel") ;?></button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>