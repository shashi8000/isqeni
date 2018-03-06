	<!-- topbar starts -->
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<!-- theme selector starts -->
					<!-- theme selector ends -->
					<!-- theme selector ends -->

					<!-- user dropdown starts -->
	              <!--
		                <div class="btn-group pull-right theme-container"  style="margin-right:40px;">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-tint1"></i><span class="hidden-phone"><?php echo lang("Egateway")?></span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
	                       <li><a href="<?php echo site_url("administrator/pay/paypal")?>"><?php echo lang("Paypal")?></a></li>
							<li class="divider"></li>
	                       <li><a href="<?php echo site_url("administrator/pay/cashu")?>"><?php echo lang("CashU")?></a></li>
							<li class="divider"></li>
	                       <li><a href="<?php echo site_url("administrator/pay/onecard")?>"><?php echo lang("Onecard")?></a></li>
							<li class="divider"></li>
	                        <li><a href="<?php echo site_url("administrator/pay/checkout")?>"><?php echo lang("2CheckOut")?></a></li>
							<li class="divider"></li>
	                       <li><a href="<?php //echo site_url("administrator/pay/payza")?>#"><?php echo lang("Payza")?></a></li>
							<li class="divider"></li>
	                       <li><a href="<?php //echo site_url("administrator/pay/moneybookers")?>#"><?php echo lang("Moneybookers")?></a></li>
							<li class="divider"></li>
	                       <li><a href="<?php //echo site_url("administrator/pay/payoneer")?>#"><?php echo lang("Payoneer")?></a></li>
							<li class="divider"></li>
	                       <li><a href="<?php //echo site_url("administrator/pay/perfectmoney")?>#"><?php echo lang("Perfectmoney")?></a></li>
							<li class="divider"></li>
	                       <li><a href="<?php //echo site_url("administrator/pay/wmtransfer")?>#"><?php echo lang("Wmtransfer")?></a></li>
							<li class="divider"></li>
	                       <li><a href="<?php //echo site_url("administrator/pay/blockchain")?>#"><?php echo lang("Blockchain")?></a></li>
							<li class="divider"></li>
	                       <li><a href="<?php //echo site_url("administrator/pay/neteller")?>#"><?php echo lang("Neteller")?></a></li>
							<li class="divider"></li>
	                       <li><a href="<?php //echo site_url("administrator/pay/egopay")?>#"><?php echo lang("Egopay")?></a></li>
							<li class="divider"></li>
	                       <li><a href="<?php //echo site_url("administrator/pay/okpay")?>#"><?php echo lang("Okpay")?></a></li>
						</ul>
					</div> -->
					<div class="btn-group pull-left" >
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user"></i><span class="hidden-phone"> <?php echo $name = $this->session->userdata('name'); ?></span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li class="divider"></li>
							<li><a href="<?php echo site_url("administrator/login/logout"); ?>"><?php echo lang("LogOut");?></a></li>
						</ul>
					</div>
					  <div class="btn-group pull-right" >
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-language"></i><span class="hidden-phone"> <?php echo lang("ChangeLang");?></span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
	                    <?php
	                      if($this->setting->getLang($this->session->userdata('admin_lang')) == "arabic"){$ara = "selected";$eng = "";}
	                      else if($this->setting->getLang($this->session->userdata('admin_lang')) == "english"){$ara = "";$eng = "selected";}
	                    ?>
							<li <?php echo $ara;?> ><a href="#" onclick="document.getElementById('arabic_form').submit();">العربية</a></li>
							<li class="divider"></li>
							<li <?php echo $eng;?> ><a href="#" onclick="document.getElementById('english_form').submit();">English</a></li>
						</ul>
					</div>  
					<!-- user dropdown ends -->
					<div class="top-nav nav-collapse">
						<ul class="nav">
							<li><a href="<?php echo site_url("administrator/login/logout"); ?>" ><?php echo lang("LogOut");?></a></li>
	                        <li><a href="<?php echo base_url(); ?>" target="_blank" ><?php echo lang("WebSite");?></a></li>
						 <!--	<li>
								<form class="navbar-search pull-left">
									<input placeholder="Search" class="search-query span2" name="query" type="text">
								</form>
							</li>  -->
						</ul>
					</div>
	                <div class="top-nav nav-collapse">
						<ul class="nav">
							<li><a href="<?php echo base_url(); ?>" target="_blank" ><?php echo lang($this->setting->getLang($this->session->userdata('admin_lang'))); ?></a></li>
							<li>
							   &nbsp;
							</li>
						</ul>
					</div>
	                <!--/.nav-collapse -->
				</div>
			</div>
		</div>
	    <form action="" method="post" id="arabic_form">
	    <input type="hidden" name="lang_submit" value="2">
	    </form>
	    <form action="" method="post" id="english_form">
	    <input type="hidden" name="lang_submit" value="1">
	    </form>
		<!-- topbar ends -->