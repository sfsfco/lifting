<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/header.php"); ?>
<!-- Contact Form & Map -->
        <section class="partners ceo in">
            <div class="partners-inner ceo"></div>    
            <div class="row">
                <div class="six columns">
                    <h1 class="row"><span>How to</span>Reach us</h1>
                    <form class="row" method="post" name="contact" action="<?php echo Doo::conf()->APP_URL; ?>contact/send/">
                        <ul>
                            <li class="field">
                                <input class="normal text input" id="email" name="email" placeholder="Email" type="text">
                                <input class="normal text input" id="subject" name="subject" placeholder="Subject" type="text">
                            </li>
                            <li class="field"><textarea class="input textarea" id="message" name="message"  placeholder="Message" rows="3"></textarea></li>
                            <li><div class="medium default btn pull_right"><input value="Send" type="submit"></div></li>
                        </ul>
                    </form>
                </div>
                <div class="six columns">
                    <div id="map"></div>
                    <script>
                        function initMap() {
                          var uluru = {lat: -25.363, lng: 131.044};
                          var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 4,
                            center: uluru
                          });
                          var marker = new google.maps.Marker({
                            position: uluru,
                            map: map
                          });
                        }
                    </script>
                    <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCct3c985VfqAm49Z5fc7chG6jp5o8kvvk&callback=initMap">
                    </script>
                </div>
            </div>
        </section>
        <div style="clear:both;"></div>
  
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
