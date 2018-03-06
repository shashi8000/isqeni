<div id="header_small">
        	<!-- Start Social area -->
        	<div class="social">

                <ul>
                <li><a href="#" class="social-google"></a></li>
                <li><a href="#" class="social-facebook"></a></li>
                <li><a href="#" class="social-twitter"></a></li>
                <?php
                          if($this->session->userdata('site_lang')==="english"){
                        ?>
                        <li><a href="#" onclick="document.getElementById('arabic_form').submit();" class="social-linkedin"></a></li>
                         <?php } ?>
                         <?php
                          $setting = $this->setting->get();                          if($this->session->userdata('site_lang')==="arabic"){
                        ?>
                         <li><a href="#" onclick="document.getElementById('english_form').submit();" class="social-forrst"></a></li>
                         <?php } ?>


          <!--      <li><a href="#" class="social-dribbble"></a></li>   -->
                </ul>

            </div>
            <!-- End Socialarea -->

            <!-- Start Logo area 
            <div id="logo">
              <a href="/themes/response/" title="Response">Response</a>
            </div>
            End Logo area -->

        </div>
        <!-- End Social & Logo area -->

</div>