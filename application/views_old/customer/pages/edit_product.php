<?php $data=$product[0]; ?>
<div id="content" class="span10">
			<!-- content starts -->


			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						&nbsp;
						<div class="box-icon">

						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo base_url('products/edit_product_confirm/'.$data['id']); ?>" method="post" enctype="multipart/form-data">
						  <fieldset>
						 	<legend><?php echo lang("Products") ;?><?php if($this->session->flashdata('msg')){echo '<span style="color:red;font-size:12px;padding-left: 12px;">'.$this->session->flashdata('msg').'</span>'; }?></legend>
                     		<p class="help-block">	<?php // echo isset($message) ?$message : ''  ;?>   </p>
							
					<div class="control-group" id="titlegroup">
					  <label class="control-label" for="typeahead"><?php echo lang("prod_num_ar") ;?></label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" name="Cform[prod_num]" value="<?php echo isset($data['prod_num']) ? $data['prod_num'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
					   <p class="help-block">	<?php // echo form_error('Cform[prod_num]')  ;?>   </p>
					  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
					  </div>
					</div>
					<div class="control-group" id="titlegroup">
					  <label class="control-label" for="typeahead"><?php echo lang("prod_num_en") ;?></label>
					  <div class="controls">
						<input type="text" class="span6 typeahead" name="Cform[prod_num_en]" value="<?php echo isset($data['prod_num_en']) ? $data['prod_num_en'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
					   <p class="help-block">	<?php // echo form_error('Cform[prod_num_en]')  ;?>   </p>
					  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
					  </div>
					</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("name_ar") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[name]" value="<?php echo isset($data['name']) ? $data['name'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php // echo form_error('Cform[name]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("name_en") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[name_en]" value="<?php echo isset($data['name_en']) ? $data['name_en'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php // echo form_error('Cform[name_en]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

					<div class="control-group" id="titlegroup">
					  <label class="control-label" for="typeahead"><?php echo lang("min_charge_sar") ;?></label>
					  <div class="controls">
						<input type="number" class="span6 typeahead" name="Cform[min_charge]" value="<?php echo isset($data['min_charge']) ? $data['min_charge'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
					   <p class="help-block">	<?php // echo form_error('Cform[min_charge]')  ;?>   </p>
					  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
					  </div>
					</div>
                            <!--
                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead"><?php echo lang("price") ;?></label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[price]" value="<?php echo isset($data['price']) ? $data['price'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php // echo form_error('Cform[price]')  ;?>   </p>

							  </div>
							</div>
                            -->


                              <div class="control-group" id="titlegroup">
                                  <label class="control-label" for="typeahead"><?php echo lang("price_ind") ;?></label>
                                  <div class="controls">
                                      <input type="text" class="span6 typeahead" name="Cform[price_ind]" value="<?php echo isset($data['price_ind']) ? $data['price_ind'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required>
                                      <p class="help-block"></p>
                                  </div>
                              </div>

                              <div class="control-group" id="titlegroup">
                                  <label class="control-label" for="typeahead"><?php echo lang("price_mosque") ;?></label>
                                  <div class="controls">
                                      <input type="text" class="span6 typeahead" name="Cform[price_mosque]" value="<?php echo isset($data['price_mosque']) ? $data['price_mosque'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required>
                                      <p class="help-block">  </p>
                                  </div>
                              </div>

                              <div class="control-group" id="titlegroup">
                                  <label class="control-label" for="typeahead"><?php echo lang("price_corp") ;?></label>
                                  <div class="controls">
                                      <input type="text" class="span6 typeahead" name="Cform[price_corp]" value="<?php echo isset($data['price_corp']) ? $data['price_corp'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]' required>
                                      <p class="help-block"> </p>
                                  </div>
                              </div>




						  	<input id="selectError4" name="Cform[cat_id]" value="<?=$this->session->userdata('logged_in_customer')['id'];?>" type="hidden">								
							<div class="control-group">
							  <label class="control-label" for="fileInput"><?php echo lang("Mainimage") ;?></label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="photo_to_up">
                                 <p class="help-block"> <?php // echo form_error('photo')  ;?>  </p>
							  </div>
                              <?php if(isset($data['photo'])){?><img class="grayscale" src="<?php echo $data['photo'] ;?>" width="120px"><?php } ?>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="textarea2"><?php echo lang("Descrption_ar") ;?></label>
                                <div class="controls"><textarea  class="cleditor" id="textarea2" rows="3" name="Cform[text2]"><?php echo isset($data['text2']) ? $data['text2'] : '';?></textarea></div>
                                <p class="help-block">	    </p>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="textarea2"><?php echo lang("Descrption_en") ;?></label>
                                <div class="controls"><textarea class="cleditor" id="textarea2" rows="3" name="Cform[text2_en]"><?php echo isset($data['text2_en']) ? $data['text2_en'] : '';?></textarea></div>
                                <p class="help-block">	<?php // echo form_error('Cform[text2_en]')  ;?>   </p>
							</div>

                              <?php $selval=$this->data->couponid_display($data['id']); ?>
                          <div class="control-group">
                              <label class="control-label" for="textarea2"><?php echo lang("coupon_sel") ;?></label>
                              <select name="couponcodeSelId" id="couponcodeSelIds">
                                  <option value=""><?php echo lang("please_select") ;?>   </option>
                                  <?php foreach($coupon as $each){?>
                                      <option value="<?php echo $each['id']; ?>" <?php if(!empty($selval[0]['coupon_id'])== $each['id'] ) echo 'selected';?>><?php echo $each['coupon_code']; ?></option>';
                                  <?php }?>
                              </select>
                          </div>

                              <div class="input_fields_wrap">

                                <?php

                                foreach($productchemicalcomposition as $key=>$productcomposition){?>

                                    <div class="col-md-12 text-center"><button class="text-danger"><a href="<?php echo base_url('products/deleteProductComposition/'. $productcomposition['id'].'/'.$data['id']); ?>"> Delete</a></button></div>
                                  <div class="control-group" id="titlegroup">
                                      <label class="control-label" for="typeahead"><?php echo lang("chemical_name") ;?></label>
                                      <div class="controls">
                                          <input type="text" class="span6 typeahead" name="x[<?php echo $key;?>][chemical_name]" id="chemical_name" value="<?php echo $productcomposition['chemical_name']; ?>">
                                      </div>
                                  </div>

                                  <div class="control-group" id="titlegroup">
                                      <label class="control-label" for="typeahead"><?php echo lang("chemical_value") ;?></label>
                                      <div class="controls">
                                          <input type="text" class="span6 typeahead" name="x[<?php echo $key;?>][chemical_value]" id="chemical_value" value="<?php echo $productcomposition['chemical_value']; ?>">
                                      </div>
                                  </div>

                                  <div class="control-group" id="titlegroup">
                                      <label class="control-label" for="typeahead"><?php echo lang("chemical_name_en") ;?></label>
                                      <div class="controls">
                                          <input type="text" class="span6 typeahead" name="x[<?php echo $key;?>][chemical_name_en]" id="chemical_name_en" value="<?php echo $productcomposition['chemical_name_en']; ?>">
                                      </div>
                                  </div>

                                  <div class="control-group" id="titlegroup">
                                      <label class="control-label" for="typeahead"><?php echo lang("chemical_value_en") ;?></label>
                                      <div class="controls">
                                          <input type="text" class="span6 typeahead" name="x[<?php echo $key;?>][chemical_value_en]" id="chemical_value_en" value="<?php echo $productcomposition['chemical_value_en']; ?>">
                                      </div>
                                  </div>

                                 <?php  } ?>
                                  <input type="hidden"  name="productid" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>">
                              </div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn" onclick="window.location='<?php echo base_url();?>products.html';"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                             <!-- <input type="hidden" name="Cform[area_id]" value="0"/>
                              <input type="hidden" name="table" value="products"/>
                              <input type="hidden" name="path" value="./download/products/"/>
                              <input type="hidden" name="types" value="gif|jpg|jpeg|png"/>
                              <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/> -->
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
