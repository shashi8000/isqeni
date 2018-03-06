<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<?php echo lang("Home") ;?>
					</li>
					
				</ul>
			</div>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<?php echo lang("ReasonDriver");?> 
						<div class="box-icon">

						</div>
					</div>
					<div class="box-content">

						<form>
				<ul>
		          <li><strong> <?php echo lang("OrderRejectByTeamOne") ;?> <input checked type="radio" value="first" name="reason"></strong></li>
		          <li><strong> <?php echo lang("OrderRejectByTeamTwo") ;?> <input type="radio" value="second" name="reason"></strong></li>
		          <li><strong> <?php echo lang("OrderRejectByTeamThree") ;?> <input type="radio" value="third" name="reason"></strong></li>
		     </ul>
		     <br>
		     <br>
		     <button class="btn btn-primary">Save changes</button>
		     <input type="hidden" value="<?php echo $data; ?>" name="oid"/>
		     	</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->



      