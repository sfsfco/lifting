<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $data['prefrances']->meta; ?>" />
<meta name="description" content="<?php echo $data['prefrances']->site_name; ?>" />
<title><?php echo $data['prefrances']->site_name; ?></title>
<link href="<?php echo $data['rootUrl']; ?>global/images/favicon.ico" rel="shortcut icon" />
<link href="<?php echo $data['rootUrl']; ?>global/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $data['rootUrl']; ?>global/css/nivo.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo $data['rootUrl']; ?>global/css/superfish1.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo $data['rootUrl']; ?>global/css/skins/tango/skin.css" />
<script type="text/javascript" src="<?php echo $data['rootUrl']; ?>global/js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="<?php echo $data['rootUrl']; ?>global/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="<?php echo $data['rootUrl']; ?>global/js/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo $data['rootUrl']; ?>global/js/superfish.js"></script>
<script type="text/javascript"> 
// initialise plugins
jQuery(function(){
jQuery('ul.sf-menu').superfish();
});
</script>
<script type="text/javascript" src="<?php echo $data['rootUrl']; ?>global/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript">

function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(1);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(1);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
       /* auto: 2,*/
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});

jQuery(document).ready(function() {
$('#username1').click(function(){
    $(this).val('');
    });
$('#password1').click(function(){
    $(this).val('');
    });
});

</script>
</head>
<body>
<div class="bgg">
  <div class="bgbg">
    <div class="all">
      <!-- Header -->
      <div class="header">
        <div class="head-l">
          <!-- Login Form -->
          <?php if(isset($_SESSION['clienty']['id']) && $_SESSION['clienty']['id']!=''){ ?>
          <form method="post" action="<?php echo $data["formUrl"]; ?>clients/signout">
          Hi .. <a style="float:none;display:inline;text-decoration:none;" href="<?php echo $data["rootUrl"]; ?>clients/board"><?php echo $_SESSION['clienty']['name']; ?></a>
          <input type="submit" value="Logout" />
          </form>
          <?php }else{ ?>
          <form method="post" action="<?php echo $data["formUrl"]; ?>clients/signin">
            <input type="text" value="Enter UserName" name="username" id="username1" />
            <input type="password" value="Enter Password" name="password" id="password1" />
            <div class="clr"></div>
            <a href="#">New Client?</a> <a href="#">Forgot Password?</a>
            <input type="submit" value="Login" />
          </form>
          <?php }?>
          <!-- Small Icons -->
          <ul class="sicons">
            <li><a href="<?php echo $data['rootUrl']; ?>index.html">Home</a></li>
            <li>|</li>
            <li><a href="<?php echo $data['rootUrl']; ?>site-map.html" class="site">Site Map</a></li>
            <li>|</li>
            <li><a href="<?php echo $data['rootUrl']; ?>contact-us.html" class="contact">Contact Us</a></li>
          </ul>
          <div class="clr"></div>
          <!-- Nivo Slider -->
          <div id="slider" class="nivoSlider">
            <img src="<?php echo $data['rootUrl']; ?>global/images/gallery/1.jpg" alt="" />
            <img src="<?php echo $data['rootUrl']; ?>global/images/gallery/2.jpg" alt="" />
          </div>
          <!-- Navigation Bar -->
          <ul class="nav sf-menu">
            <li><a href="<?php echo $data['rootUrl']; ?>index.html">Home</a></li>
            <li><span>|</span></li>
            <li><a href="<?php echo $data['rootUrl']; ?>about.html">About Us</a></li>
            <li><span>|</span></li>
            <li> <a href="<?php echo $data['rootUrl']; ?>our-services.html">Our Services</a>
              <ul>
                <?php foreach($data['services'] as $services){ ?>
                <li><a href="<?php echo $data['rootUrl']; ?>services/services/<?php echo $services->id; ?>"><?php echo $services->name; ?></a></li>
                <?php } ?>
                </ul>
            </li>
            <li><span>|</span></li>
            <li><a href="<?php echo $data['rootUrl']; ?>gallery.html">Gallery</a></li>
            <li><span>|</span></li>
            <li><a href="<?php echo $data['rootUrl']; ?>contact-us.html">Conatct Us</a></li>
            <li><span>|</span></li>
            <li><a href="<?php echo $data['rootUrl']; ?>catalog.html" style="color:#ff8400;font-weight:bold;"><img style="border:none;" src="<?php echo $data['rootUrl']; ?>global/img/icons/filetype-pdf.png" /> &nbsp; Catalog</a></li>
          </ul>
        </div>
        <div class="head-r"> <a href="<?php echo $data['rootUrl']; ?>index.html" class="logo"></a>
          <!-- Social Network -->
          <ul class="social">
            <li><a href=""></a></li>
            <li><a href="" class="twitter"></a></li>
            <li><a href="" class="google"></a></li>
            <li><a href="" class="linkedin"></a></li>
          </ul>
        </div>
      </div>
      <!-- Layout -->