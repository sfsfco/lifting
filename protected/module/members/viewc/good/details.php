<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<style type="text/css">
    @media print
{    
    .no-print, .no-print *,.nav_menu,.nav_menu *,footer , footer *
    {
        display: none !important;
    }
}
</style>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $data['title']; ?> <small><?php echo play::prefrances('site_name'); ?></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <img src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/prefrances/<?php echo play::prefrances('print_logo') ?>"/>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Code</th>
                          <th>Name</th>
                          <th>Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($data['goodlist'] as $details){?>
                        <tr>
                          <th scope="row"><?php echo $details->id; ?></th>
                          <td><?php echo $details->barcode; ?></td>
                          <td><?php echo $details->item_name; ?></td>
                          <td><?php echo $details->quantity; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div class="form-group">
                        <div class="col-md-12 text-left">
                            <?php echo nl2br(play::prefrances('contacts')); ?>
                        </div>
                    </div>
                    <div class="form-group no-print">
                        <div class="col-md-12 text-right">
                            <a href="#" id="btn"><div class="btn btn-warning"><i class="fa fa-print"></i> Print</div></a>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
<script type="text/javascript">
$("#btn").click(function () {
    $(".x_panel").show();
    window.print();
    return false;
});    
</script>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>