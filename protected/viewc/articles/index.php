<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/header.php"); ?>
      <section class="fproducts fproductsin">
            <div class="row">
                <div class="two columns push_two line"></div>
                <h5 class="four columns text-center"><?php echo $data['article']->name; ?></h5>
                <div class="two columns line"></div>
            </div>
            <?php if($data['article']->photo !=''){ ?>
            <div class="row text-center">
                <img src='<?php echo Doo::conf()->APP_URL; ?>global/uploads/articles/<?php echo $data['article']->photo; ?>.jpg' />
            </div>
            <?php }?>
            <div class="row">
                <?php echo $data['article']->details; ?>
            </div>
        </section>
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>