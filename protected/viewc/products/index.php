<?php  include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/header.php"); ?>
        <!-- Featuerd Products -->
        <section class="fproducts">
            <div class="row">
                <div class="two columns push_two line"></div>
                <h5 class="four columns text-center">All Products</h5>
                <div class="two columns line"></div>
            </div>
            <div class="row">
            <?php $x=0; foreach($data['products'] as $product){ $x++; 
                if($x==5){ $x=1; ?>
            </div>
            <div class="row">
            <?php } ?>
                <div class="three columns">
                    <a href="<?php echo Doo::conf()->APP_URL ?>products/show/<?php echo $product->id; ?>"><img src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/products/300X300_<?php $photo = explode(',', $product->photo); echo end($photo); ?>.jpg" alt="" /></a>
                    <a href="<?php echo Doo::conf()->APP_URL ?>products/show/<?php echo $product->id; ?>" class="text-center"><?php echo $product->name; ?></a>
                </div>
            
            <?php }?>
                
            </div>
        </section>        
        <!-- End Featuerd Products -->
       
        <div style="clear:both;"></div>
        <!-- End partners -->        
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>