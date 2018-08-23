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
                    <br>
                    <br>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="required">Supplier </label>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <?php echo $data['purchaseslist'][0]->Purchases->supplier_name; ?>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="required">Purchase Date</label>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <?php echo $data['purchaseslist'][0]->Purchases->purchase_date; ?>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="required">Payment Method</label>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <?php echo ($data['purchaseslist'][0]->Purchases->payment_method=='0')?'Monetary':'Check'; ?>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <td>Number</td>
                          <td>Barcode</td>
                          <td>Name</td>
                          <td>Category</td>
                          <td>Details</td>
                          <td>Date</td>
                          <td>Price</td>
                          <td>Discount</td>
                          <td>Total</td>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($data['purchaseslist'] as $details){?>
                        <tr >
                            <td><?php echo $details->id; ?></td>
                            <td><?php echo $details->barcode; ?></td>
                            <td>
                                <?php echo $details->item_name; ?>
                            </td>
                            <td><?php echo $details->category; ?></td>
                            <td><?php echo nl2br($details->details); ?></td>
                            <td><?php echo date('d-m-Y',strtotime($details->create_date)); ?></td>
                            <td><?php echo $details->price; ?></td>
                            <td><?php echo $details->discount; ?></td>
                            <td><?php echo $details->total; ?></td>
                        </tr>
                     <?php } ?>
                      </tbody>
                    </table>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">Bill Total </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <?php echo $data['purchaseslist'][0]->Purchases->total; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-left">
                            <hr>
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