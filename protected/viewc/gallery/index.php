<?php  include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/header.php"); ?>
<link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/front/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/front/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/front/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />

        <!-- Featuerd Products -->
        <section class="fproducts">
            <div class="row">
                <div class="two columns push_two line"></div>
                <h5 class="four columns text-center">Gallery</h5>
                <div class="two columns line"></div>
            </div>
            <div class="row">
            <?php $x=0; foreach($data['photos'] as $product){ $x++; 
                if($x==5){ $x=1; ?>
            </div>
            <div class="row">
            <?php } ?>
                <div class="three columns">
                    <a class="fbox" data-fancybox-group="gallery" href="<?php echo Doo::conf()->APP_URL; ?>global/uploads/photos/<?php $photo = explode(',', $product->photo); echo reset($photo); ?>.jpg" title="<?php echo $product->name; ?>">
                    <img src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/photos/300X300_<?php $photo = explode(',', $product->photo); echo reset($photo); ?>.jpg" alt="" />
                    </a>
                    <a  class="text-center"><?php echo $product->name; ?></a>
                </div>
            
            <?php }?>
                
            </div>
        </section>        
        <!-- End Featuerd Products -->
       
        <div style="clear:both;"></div>
        <!-- End partners -->        



<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>

        <script type="text/javascript" src="<?php echo Doo::conf()->APP_URL; ?>global/front/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

        <!-- Add fancyBox -->

        <script type="text/javascript" src="<?php echo Doo::conf()->APP_URL; ?>global/front/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

        <!-- Optionally add helpers - button, thumbnail and/or media -->

        <script type="text/javascript" src="<?php echo Doo::conf()->APP_URL; ?>global/front/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?php echo Doo::conf()->APP_URL; ?>global/front/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>


        <script type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".fbox").fancybox({
            openEffect  : 'elastic',
            closeEffect : 'elastic',
            padding : 0,
            helpers : {
                title : {
                     type : 'float'
                }
            }
        });
});
</script>