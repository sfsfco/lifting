        <!-- Footer -->
        <footer>
            <!-- Footer Top -->
            <div class="ft-top">
                <div class="row">
                    <div class="image four columns push_four">
                        <img src="<?php echo Doo::conf()->APP_URL; ?>global/front/images/elzekky.png"  alt="<?php echo play::prefrances('description'); ?>" title="<?php echo play::prefrances('description'); ?>" />
                        <!--<img src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/prefrances/<?php echo play::prefrances('logo') ?>"  alt="<?php echo play::prefrances('description'); ?>" title="<?php echo play::prefrances('description'); ?>" />-->
                    </div>
                </div>
                <div class="row">
                    <div class="four columns">
                        <h4>El-Zekky Mission</h4>
                        <p><?php echo play::prefrances('mission'); ?></p>
                    </div>
                    <div class="four columns">
                        <h4>Main Links</h4>
                        <ul class="mlinks">
                            <li><a href="<?php echo Doo::conf()->APP_URL; ?>">- Home Page</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL; ?>about_us">- About Us</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL ?>products">- Our Products</a></li>                             
                            <li><a href="<?php echo Doo::conf()->APP_URL; ?>our-services">- Services List</a></li>                             
                            <li><a href="<?php echo Doo::conf()->APP_URL; ?>gallery">- Our Gallery</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL ?>contact">- Contact Us</a></li>                            
                        </ul>
                        <ul class="social">                                                        
                            <li class="twitter"><a  target="_blank" href="<?php echo play::prefrances('twitter'); ?>">Twitter</a></li>
                            <li><a target="_blank" href="<?php echo play::prefrances('facebook'); ?>">Facebook</a></li>
                            <li><span>Follow Us /</span></li>
                        </ul>
                    </div>
                    <div class="four columns">
                        <h4>Contact Us</h4>
                        <?php echo play::prefrances('contact_us'); ?>
                    </div>
                </div>
            </div>
            <!-- End Footer Top -->
            <!-- Footer Bottom -->
            <div class="row ft-bottom">
                <div class="four columns push_four">
                    <ul>
                        <li><a href="<?php echo Doo::conf()->APP_URL; ?>">Home</a></li>
                        <li><span>|</span></li>
                        <li><a href="<?php echo Doo::conf()->APP_URL; ?>terms">Terms &AMP; Conditions</a></li>
                        <li><span>|</span></li>
                        <li><a href="<?php echo Doo::conf()->APP_URL; ?>privacy-policy">Privacy Policy</a></li>
                        <li><span>|</span></li>
                        <li><a href="<?php echo Doo::conf()->APP_URL; ?>site-map">Site Map</a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <p class="text-center">&COPY; Copyright 2017 for EL-ZEKKY</p>
                </div>
                <!--<a href="" target="_BLANK" class="one columns push_three">Keen Deer</a>-->
            </div>
            <!-- End Footer Bottom -->
        </footer>
        <!-- End Footer -->
        <!-- Grab Google CDN's jQuery, fall back to local if offline -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo Doo::conf()->APP_URL; ?>global/front/js/libs/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/front/js/libs/gumby.min.js"></script>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/front/js/plugins.js"></script>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/front/js/main.js"></script>
    </body>
</html>