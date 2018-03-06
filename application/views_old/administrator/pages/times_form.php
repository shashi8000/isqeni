<script type="text/javascript" src="<?php echo base_url()?>js/jquery.timePicker.js"></script>
<link href="<?php echo base_url();?>js/timePicker.css" rel="stylesheet">
 <script type="text/javascript">
  jQuery(function() {
    $("#time1").timePicker({
  startTime: "00.00",  // Using string. Can take string or Date object.
  endTime: new Date(0, 0, 0, 23, 45, 0),  // Using Date object.
  show24Hours: false,
  separator:':',
  step: 15});

      $("#time2").timePicker({
  startTime: "00.00",  // Using string. Can take string or Date object.
  endTime: new Date(0, 0, 0, 23, 45, 0),  // Using Date object.
  show24Hours: false,
  separator:':',
  step: 15});

  });
  </script>
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                     <li>
					   <a href="<?php echo site_url("administrator/times/")?>">ساعات التوصيل</a> <span class="divider">/</span>
					</li>
					<li>
						<?php echo lang("Add") ;?>
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
						 <legend>ساعات التوصيل</legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>
							<div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">من</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[ctime1]" value="<?php echo isset($data['ctime1']) ? $data['ctime1'] : '';?>" id="time1" style="direction: ltr">
							   <p class="help-block">	<?php echo form_error('Cform[ctime1]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                             <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">الي</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[ctime2]" value="<?php echo isset($data['ctime2']) ? $data['ctime2'] : '';?>" id="time2" style="direction: ltr">
							   <p class="help-block">	<?php echo form_error('Cform[ctime2]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="selectError2">الفرع والمنطقة</label>
								<div class="controls">
								  <select id="selectError3" name="Cform[branch_id]" data-placeholder="الفرع والمنطقة" data-rel="chosen">
									<option></option>
                                    <?php foreach($branchs AS $branch) {

                                     if($data['branch_id'] == $branch['id']){ $sel="selected";}
                                     else {$sel="";}
                                    ?>
									<option value="<?php echo $branch['id']?>" <?php echo $sel; ?> ><?php echo $branch['name'] ;?></option>
									<?php } ?>
								  </select>
                                  <p class="help-block">	<?php echo form_error('Cform[branch_id]')  ;?>   </p>
								</div>
							</div>

                            <div class="control-group">
								<label class="control-label" for="selectError">اليوم</label>
								<div class="controls">
								  <select id="selectError5" name="Cform[weeknum]" data-rel="chosen">
                                    <?php
                                      if($data['weeknum'] == "1"){$A1 = "selected";$A2="";$A3 = "";$A4="";$A5 = "";$A6="";$A7 = "";}
                                      elseif($data['weeknum'] == "2"){$A1 = "";$A2="selected";$A3 = "";$A4="";$A5 = "";$A6="";$A7 = "";}
                                      elseif($data['weeknum'] == "3"){$A1 = "";$A2="";$A3 = "selected";$A4="";$A5 = "";$A6="";$A7 = "";}
                                      elseif($data['weeknum'] == "4"){$A1 = "";$A2="";$A3 = "";$A4="selected";$A5 = "";$A6="";$A7 = "";}
                                      elseif($data['weeknum'] == "5"){$A1 = "";$A2="";$A3 = "";$A4="";$A5 = "selected";$A6="";$A7 = "";}
                                      elseif($data['weeknum'] == "6"){$A1 = "";$A2="";$A3 = "";$A4="";$A5 = "";$A6="selected";$A7 = "";}
                                      elseif($data['weeknum'] == "7"){$A1 = "";$A2="";$A3 = "";$A4="";$A5 = "";$A6="";$A7 = "selected";}
                                      else{$A1 = "";$A2="";$A3 = "";$A4="";$A5 = "";$A6="";$A7 = "";}
                                    ?>
									<option value="7" <?php echo $A7;?> >السبت</option>
                                    <option value="1" <?php echo $A1;?> >الأحد</option>
                                    <option value="2" <?php echo $A2;?> >الأثنين</option>
                                    <option value="3" <?php echo $A3;?> >الثلاثاء</option>
                                    <option value="4" <?php echo $A4;?> >الأربعاء</option>
                                    <option value="5" <?php echo $A5;?> >الخميس</option>
                                    <option value="6" <?php echo $A6;?> >الجمعه</option>
								  </select>
								</div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="table" value="times"/>
                              <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
