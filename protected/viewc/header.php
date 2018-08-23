<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!-- Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/b/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo play::prefrances('site_name'); ?> <?php echo $data['title']; ?> </title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="humans.txt">
    <link rel="shortcut icon" href="<?php echo Doo::conf()->APP_URL; ?>global/images/zekky.ico" type="image/x-icon" />
    <!-- Facebook Metadata /-->
    <meta property="fb:page_id" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content=""/>
    <meta property="og:title" content=""/>
    <!-- Google+ Metadata /-->
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/front/css/gumby.css">
    <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/front/css/style.css">
    <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/front/css/custom.css">
    <script src="<?php echo Doo::conf()->APP_URL; ?>global/front/js/libs/modernizr-2.6.2.min.js"></script>
</head>
    <body>
        <div class="modal" id="modal1">
            <div class="content">
                <a class="close switch active" gumby-trigger="|#modal1"><i class="icon-cancel"></i></a>
                <div class="row">
                    <div class="ten columns centered text-center">
                        <h2>This is a modal.</h2>
                        <p>Gumby modals are easy to make using Toggles &amp; Switches. The <span class="label default">.modal</span> class already has the required styles which you can open and close using Toggles &amp; Switches.</p>
                    </div>
                </div>
            </div>
	</div>
        <header class="<?php echo ($data['resource']=='MainController' && $data['action']=='index')?'ind':'ind indd'; ?>">
            <!-- Logo -->
            <!-- End Logo -->
            <!-- Navigation -->
            <div class="navbar" id="nav1">
                <div class="row">
                    <a class="toggle" gumby-trigger="#nav1 > .row > ul" href="#"><i class="icon-menu"></i></a>
                    <h1 class="four columns logo">
                        <a href="<?php echo Doo::conf()->APP_URL; ?>">
                        <!--<img src="<?php echo Doo::conf()->APP_URL; ?>global/front/images/logo.png" alt="">-->
                        <img src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/prefrances/<?php echo play::prefrances('logo') ?>"/>
                        </a>
                    </h1>
                    <ul class="six columns push_six">
                        <li><a href="<?php echo Doo::conf()->APP_URL; ?>">Home Page</a></li>
                        <li><span>/</span></li>
                        <li><a href="<?php echo Doo::conf()->APP_URL; ?>about_us">About Us</a></li>
                        <li><span>/</span></li>
                        <li><a href="<?php echo Doo::conf()->APP_URL ?>products">Our Products</a>
                            <div class="dropdown">
                                <ul>
                                    <li><a href="">nested</a></li>
                                    <li><a href="">nested</a></li>
                                    <li><a href="">nested</a></li>
                                    <li><a href="">nested</a></li>
                                    <li><a href="">nested</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><span>/</span></li>
                        <li><a href="<?php echo Doo::conf()->APP_URL; ?>our-services">Services List</a>
                            <div class="dropdown">
                                <ul>
                                    <li><a href="">nested</a></li>
                                    <li><a href="">nested</a></li>
                                    <li><a href="">nested</a></li>
                                    <li><a href="">nested</a></li>
                                    <li><a href="">nested</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><span>/</span></li>
                        <li><a href="<?php echo Doo::conf()->APP_URL ?>contact">Contact Us</a></li>
                    </ul>    
                </div>
            </div>    
            <!-- End Navigation -->
            <!-- Video -->
            <video autoplay loop>
                <source src="<?php echo Doo::conf()->APP_URL; ?>global/front/video/2.mp4" type="video/mp4">  
                Video is not supported by your browser
            </video>        
            <!-- End Video -->                    
        </header>
        <!-- Second Navigation -->
        <div class="snav">
            <div class="snav-inner"></div> 
            <div class="row">
                <ul class="social two columns">                                                        
                    <li><span>Follow Us /</span></li>
                    <li><a target="_blank" href="<?php echo play::prefrances('facebook'); ?>">Facebook</a></li>
                    <li class="twitter"><a target="_blank" href="<?php echo play::prefrances('twitter'); ?>">Twitter</a></li>
                </ul>
                <p class="lang two columns push_five text-right">Language : <a href="">العربية</a></p>
                <h4 class="carea three columns text-center"><a href="<?php echo Doo::conf()->APP_URL; ?>members" gumby-trigger="">Client Area</a></h4>
            </div>
        </div>
        <!-- End Second Navigation -->