<div id="content" class="span10">
	<!-- content starts -->
	<div>
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
			</li>
             <li>
			   <a href="<?php echo site_url("administrator/orders/")?>">الطلبات</a> <span class="divider">/</span>
			</li>
			<li>
				<?php echo lang("Edit") ;?>
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
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				  <fieldset>
				 <legend>الطلبات</legend>
                 <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>
            <div class="control-group">
						<label class="control-label" for="selectError2">حالة الطلب </label>
						<div class="controls">
						  <select id="selectError4" name="status" data-placeholder="حالة الطلب" data-rel="chosen">
							<?php $status = get_this('orders',['id'=>$id]); ?>
							<option value="0" <?php if( $status['status'] == 0 ) echo"selected='selected'"; ?>>معلق</option>
							<option value="1" <?php if( $status['status'] == 1 ) echo"selected='selected'"; ?>>تم الشحن</option>
							<option value="2" <?php if( $status['status'] == 2 ) echo"selected='selected'"; ?>>تم التوصيل</option>
						  </select>
						</div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
					  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
                      <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                      <input type="hidden" name="Cform[area_id]" value="0"/>
                      <input type="hidden" name="table" value="orders"/>
                      <input type="hidden" name="path" value="./download/products/"/>
                      <input type="hidden" name="types" value="gif|jpg|jpeg|png"/>
                      <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/>
					</div>
				  </fieldset>
				</form>
			</div>
		</div><!--/span-->
	</div><!--/row-->
