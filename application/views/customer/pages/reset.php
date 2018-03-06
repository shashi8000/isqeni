
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>isqeni</title>

    <!-- Facebook sharing information tags -->
    <meta property="og:title" content="*|MC:SUBJECT|*" />
    


    <style type="text/css">
/****** RESETTING DEFAULTS, IT IS BEST TO OVERWRITE THESE STYLES INLINE ********/


        /* Forces Hotmail to display emails at full width. */

.ExternalClass {
	width: 100%;
}
/* Forces Hotmail to display normal line spacing. */
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
	line-height: 100%;
}
/* Prevents WebKit and Windows Mobile platforms from changing default font sizes. Resets body padding. */
body {
	-webkit-text-size-adjust: 100%;
	-ms-text-size-adjust: 100%;
	text-size-adjust: 100%;
	margin: 0;
	padding: 0;
}
/* Reset padding around tables */
table {
	border-spacing: 0;
	border-collapse: collapse;
}
/* Resolves the Outlook 2007, 2010, and Gmail padding issue. */
table td {
	border-collapse: collapse;
}
/* Clean, responsive images. */
img {
	-ms-interpolation-mode: bicubic;
	display: block;
	outline: none;
	text-decoration: none;
}
a img {
	border: none;
}
/* This sets a clean slate for all clients EXCEPT Gmail.
           From there it forces you to do all of your spacing inline during the development process.
           Be sure to stick to margins because paragraph padding is not supported by Outlook 2007/2010.
           Remember: Hotmail does not support "margin" nor the "margin-top" properties.
           Stick to "margin-bottom", "margin-left", "margin-right" in order to control spacing.
           It also wise to set the inline top-margin to "0" for consistancy in Gmail for every inline instance
           of a paragraph tag. */
p {
	margin: 0;
	padding: 0;
	margin-bottom: 0;
}
/* This CSS will overwrite Hotmails default CSS and make your headings appear consistant with Gmail.
           From there, you can override with inline CSS if needed. */
h1, h2, h3, h4, h5, h6 {
	color: #016fc8;
	line-height: 100%;
}

a {
	color: #114eb1;
	text-decoration: none;
}
/* There is no way to set these inline so you have the option of adding pseudo class definitions here.
           They won't work for Gmail or older Lotus Notes but it's a nice addition for all other clients. */
a:link {
	color: #114eb1;
	text-decoration: none;
}
a:visited {
	color: #183082;
	text-decoration: none;
}
a:focus {
	color: #0066ff !important;
}
a:hover {
	color: #0066ff !important;
}
/* A nice and clean way to target phone numbers you want clickable and avoid a mobile phone from
           linking other numbers that look like, but are not phone numbers. Use these two blocks of code to
           "unstyle" any numbers that may be linked. The second block gives you a class ".mobile_link" to apply
           with a span tag to the numbers you would like linked and styled.
           More info: https://www.campaignmonitor.com/blog/email-marketing/2011/10/using-phone-numbers-in-html-email/ */
a[href^="tel"], a[href^="sms"] {
	text-decoration: none;
	color: #333333;
	pointer-events: none;
	cursor: default;
}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
	text-decoration: default;
	color: #6e5c4f !important;
	pointer-events: auto;
	cursor: default;
}
.btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

        /****** MEDIA QUERIES ********/

        /* Target mobile devices. */
        /* @media only screen and (max-device-width: 639px) { */
        @media only screen and (max-width: 639px) {
/* Hide elements at smaller screen sizes (!important needed to override inline CSS). */
.hide {
	display: none !important;
}
/* Adjust table widths at smaller screen sizes. */
.table {
	width: 320px !important;
}
.innertable {
	width: 280px !important;
}
/* Resize hero image at smaller screen sizes. */
.heroimage {
	width: 280px !important;
	height: 100px !important;
}
/* Resize page shadow at smaller screen sizes. */
.shadow {
	width: 280px !important;
	height: 4px !important;
}
/* Collapse cells at smaller screen sizes. */
.collapse-cell {
	width: 320px !important;
}
/* Range social icons left at smaller screen sizes. */
.social-media img {
	float: left !important;
	margin: 0 1em 0 0 !important;
}
}


        /*** END EDITABLE STYLES ***/ 
</style>
    </head>

    <body style="width:100% !important; color:#333333; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif; font-size:13px; line-height:1.4;" text="#333333">



<!-- You may adjust each of the values above for your template as needed.

We've included the style attribute for Gmail because it does not support embedded CSS and it will convert this body tag to
a div. Since it gets converted to a div, the other body attributes like bgcolor are ignored.

We included body attributes (alink, link, bgcolor and text) for Lotus Notes 6.5 and 7, as these clients do not offer much
support for embedded nor inline CSS.

The "min-height" attribute is set for Gmail and AOL since they will be converting this body tag to a div and we want our
background color to reach the bottom of the page.

The yahoo attribute is added if you are using media queries for mobile devices (see media queries above) --> 

<!-- PAGE WRAPPER -->
<div id="body_style"> 
      
      <!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
      <table cellpadding="0" cellspacing="0" border="0" align="center" style="width:100% !important; margin:0; padding:0;">
    <tr bgcolor="#f0f0f0">
          <td><!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
        
        <table width="600" height="" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
              
              <tr>
            <td><!-- set a value for bgcolor -->
                  
                  <table bgcolor="#fff" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr> 
                      <!-- header left: logo and link to homepage -->
                      <td width="100%"><!-- set an image for header left - must be 320px width (height can be variable) --> 
                    <a href="#" target="_blank"><img src="<?php echo base_url();?>img/img-forget/logo.png" width="640" height="134" border="0" alt="Logo" /></a></td>
                      <!-- /header left --> 
                      <!-- header right: hidden in mobile version -->
                      
                      <!-- /header right --> 
                    </tr>
              </table></td>
          </tr>
              <!-- /HEADER --> 
              
              <!-- CONTENT --> 
              <!-- set a value for bgcolor -->
              <tr bgcolor="#ffffff">
            <td ><!-- hero article -->
                  
                  <table style="margin-bottom:1em;" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="innertable">
                <tr> 
                      <!-- hero article textarea -->
                      <td><table width="100%" cellspacing="0" border="0">
                          <tr>
                          <td><!-- hero article heading text -->
                              <?php if(isset($message)){ echo '<span style="color:red;">'.$message.'</span>'; } ?>
                              <h1 style="color:#016fc8; font-size:26px; line-height:1.2; font-weight:normal; margin-top:0; margin-bottom:0.5em;">Please change your password.</h1>
            


                              <!-- /hero article heading text --> 
                              <!-- hero article paragraph text -->
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                              <table width="100%">
                                <tr><td>Enter the password</td><td><input type="password" name="password" id="password"></td></tr>
                                <tr><td>Re Enter the password</td><td><input type="password" name="cpassword" id="cpassword"></ins></td></tr>

                                 <tr><td>

                                 <input type="hidden" name="verify_post" value="1">   
                                  <input type="hidden" name="verifiedkey" value="<?php echo $data; ?>">   

                                  <input  type="submit" name="" value="Reset Password"></td><td></td></tr>
                              </table>
                            </form>
                              
                              <!-- /hero article paragraph text --></td>
                        </tr>
                        </table></td>
                      <!-- /hero article textarea --> 
                    </tr>
                <!-- hero article main image: must be 560px x 186px -->
                
                <!-- /hero article main image -->
                
              </table>
                  
                  
                  
                  
                  <!-- /secondary article (long story) --></td>
          </tr>
              <!-- /CONTENT --> 
              
              <!-- FOOTER -->
              <tr>
            <td><table bgcolor="#cccccc" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td>
                    <table align="right" width="280" cellpadding="10" cellspacing="0" border="0" class="collapse-cell social-media">
                      <tr>
                        <td><a href="#" target="_blank"><img style="margin-left:1em;" align="right" src="<?php echo base_url();?>img/img-forget/facebook.gif" width="32" height="32" border="0" alt="Facebook" /></a> <a href="#" target="_blank"><img style="margin-left:1em;" align="right" src="<?php echo base_url();?>img/img-forget/googleplus.gif" width="32" height="32" border="0" alt="Google+" /></a> <a href="#" target="_blank"><img style="margin-left:1em;" align="right" src="<?php echo base_url();?>img/img-forget/linkedin.gif" width="32" height="32" border="0" alt="LinkedIn" /></a> <a href="#" target="_blank"><img style="margin-left:1em;" align="right" src="<?php echo base_url();?>img/img-forget/twitter.gif" width="32" height="32" border="0" alt="Twitter" /></a> <a href="#" target="_blank"><img style="margin-left:1em;" align="right" src="<?php echo base_url();?>img/img-forget/youtube.gif" width="32" height="32" border="0" alt="YouTube" /></a></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
              <!-- /FOOTER --> 
              
              <!-- SUBFOOTER -->
              <tr>
            
          </tr>
              <!-- /SUBFOOTER -->
              
            </table></td>
        </tr>
  </table>
      <!-- End of wrapper table --> 
      
    </div>
<!-- /PAGE WRAPPER -->

</body>
</html>
