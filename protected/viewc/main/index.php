<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/header.php"); ?>
        <!-- Featuerd Products -->
        <section class="fproducts">
            <div class="row">
                <div class="two columns push_two line"></div>
                <h5 class="four columns text-center">Featuerd Products</h5>
                <div class="two columns line"></div>
            </div>
            <div class="row">
            <?php $x=0; foreach($data['products'] as $product){ $x++;
                if($x==5){?>
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
        <!-- CEO speech -->
        <section class="partners ceo">
            <div class="partners-inner ceo"><img src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/articles/<?php echo $data['welcome']->photo; ?>.jpg" /></div>
            <div class="row">
                <div class="six columns"></div>
                <div class="five columns push_one"> 
                    <h1><span><span>C.E.O Speech</span></span><?php echo $data['welcome']->name; ?></h1>
                    <?php echo $data['welcome']->details; ?>
                </div>
            </div>           
        </section>
        <!-- End CEO speech -->
        <!-- Mailing List -->
        <section class="mailing-list">
            <div class="row">
                <h3 class="six columns">newsletter subscribe
                    <span> / Don't miss the latest!</span>
                </h3>
                <form action="<?php echo Doo::conf()->APP_URL; ?>maillist/add" method="post" class="six columns">
                    <ul>
                        <li class="append field">
                            <input class="xwide email input" placeholder="Enter Your Mail" name="email" type="email">
                            <div class="medium primary btn"><button type="submit">Subscribe</button></div>
                        </li>
                    </ul>
                </form>
            </div>
        </section>
        <!-- End Mailing List -->
        <!-- partners -->
        <section class="partners">
            <div class="partners-inner"></div>    
            <div class="row">
                <div class="six columns">
                    <div class="row">
                        <div class="six columns gray"><a href="#" class="text-center"><img src="<?php echo Doo::conf()->APP_URL; ?>global/front/images/1.png" alt="" /></a></div>
                        <div class="six columns gray gray1"><a href="#" class="text-center"><img src="<?php echo Doo::conf()->APP_URL; ?>global/front/images/2.png" alt="" /></a></div>
                    </div>
                    <div class="row">
                        <div class="six columns gray gray2"><a href="#" class="text-center"><img src="<?php echo Doo::conf()->APP_URL; ?>global/front/images/3.png" alt="" /></a></div>
                        <div class="six columns gray gray3"><a href="#" class="text-center"><img src="<?php echo Doo::conf()->APP_URL; ?>global/front/images/4.png" alt="" /></a></div>
                    </div>
                </div>
                <div class="five columns push_one">
                    <h1><span>El-Zekky</span>Success Partners</h1>
                    <p>Lorem release of Letraset sheets containing Lorem Ipsum passages 
                        and more recently with desktop publishing software like Aldus Ipsum.</p>
                </div>
            </div>
        </section>
        <div style="clear:both;"></div>
        <!-- End partners -->        
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>