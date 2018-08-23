<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/header.php"); ?>
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
        <section class="fproducts fproductsin">
            <div class="row">
                <div class="two columns push_two line"></div>
                <h5 class="four columns text-center"><?php echo $data['product']->name; ?></h5>
                <div class="two columns line"></div>
            </div>
            <div class="row">
                <div class="six columns">
                    <div class="fotorama" data-nav="thumbs">
                        <?php $photos = explode(',', $data['product']->photo);
                            foreach ($photos as $photo) {
                        ?>
                        <a href="<?php echo Doo::conf()->APP_URL; ?>global/uploads/products/<?php echo $photo; ?>.jpg">
                            <img src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/products/<?php echo $photo; ?>.jpg" alt="" />
                        </a>
                        <?php 
                            }
                         ?>
                        
                   </div>
                </div>
                <div class="six columns">
                    <?php echo $data['product']->details; ?>
                </div>
            </div>
        </section>

<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>