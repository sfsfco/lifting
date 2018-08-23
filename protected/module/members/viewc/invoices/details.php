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
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="required">Bill To </label>
                            <div class="col-md-4 col-sm-4 col-xs-2">
                                <?php echo $data['client']->name;?>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="required">Invoice NO.</label>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                                <?php echo $data['invoices']->serial; ?>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="required">Invoice Date</label>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                                <?php echo date('d/m/Y',strtotime($data['invoices']->create_date)); ?>
                            </div>
                        </div>
                    </div>
                    
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <td>Item</td>
                          <td>Description</td>
                          <td>Quantity</td>
                          <td>Unit price</td>
                          <td>Total Price</td>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($data['items'] as $item){ ?>
                        <tr >
                            <td><?php echo $item->id; ?></td>
                            <td><?php echo $item->details; ?></td>
                            <td>
                                <?php echo $item->quantity; ?>
                            </td>
                            <td><?php echo $item->unit_cost; ?></td>
                            <td><?php echo $item->total; ?></td>
                        </tr>
                     <?php } ?>
                      </tbody>
                    </table>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">Total </label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <?php echo play::convert_number_to_words($data['total']); ?> ( <?php echo $data['total']; ?> )
                            </div>
                        </div>
                    </div>
                    <?php  if($data['invoices']->taxed=='1'){ ?>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">VAT %<?php echo $data['invoices']->tax; ?> </label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <?php echo ceil(($data['total']*$data['invoices']->tax)/100); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">TOTAL PLUS VAT </label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <?php echo ceil(($data['total']*$data['invoices']->tax)/100)+$data['total']; ?>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
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