<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/header.php"); ?>
     <!-- Layout -->
      <div class="layout">
        <div class="lay-l"></div>
        <div class="lay-r">
          <div class="top">
            <h3><?php echo $data['service']->name; ?></h3>
          </div>
         <?php echo str_replace('../global/',$data['rootUrl'].'global/',$data['service']->details); ?>
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>