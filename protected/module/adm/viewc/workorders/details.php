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
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">Title </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <?php echo $data['quotation']->title; ?>
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">QUOTATION NO. </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <?php echo $data['quotation']->quotation; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">Client </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <?php echo $data['quotation']->client_name; ?>
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">Contact Person </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <?php echo $data['quotation']->client_contact; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">Request No </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <?php echo $data['quotation']->request_no; ?>
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">Date </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <?php echo date('d-m-Y',strtotime($data['quotation']->create_date)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="required">WorkOrder No </label>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <?php echo $data['quotation']->id; ?>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="required">Delivery Date </label>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <?php echo date('d-m-Y',strtotime($data['quotation']->delivery_date)); ?>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="required">Purchase Order No. </label>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <?php echo $data['quotation']->po_no; ?>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <td>Item</td>
                          <td>Qty</td>
                          <td style="width: 350px;">Description</td>
                          <td>S.W.L</td>
                          <td>P.L</td>
                          <td>TESTED/INSPECTED BY</td>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $x=0; foreach($data['quotationsdetails'] as $quotationsdetails){ ?>
                        <tr <?php if($x==0){echo('class="first"');} ?> >
                            <td><?php echo $x+1; ?></td>
                            <td><?php  echo $quotationsdetails->quantity; ?></td>
                            <td style="text-align:left;"><?php  echo nl2br($quotationsdetails->details); ?></td>
                            <td><?php  echo $quotationsdetails->swl; ?></td>
                            <td><?php  echo $quotationsdetails->pl; ?></td>
                            <td></td>
                        </tr>
                     <?php $x++;} ?>
                         <tr>
                            <td colspan="3">Raised By : <span style="color:#bf0000;"><?php echo $data['quotation']->create_by_name; ?></span></td>
                            <td colspan="3">Reviewed By :<span style="color:#bf0000;"></span> </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="form-group">
                        <div class="col-md-12 text-left">
                            <?php echo nl2br(play::prefrances('quotation_terms')); ?>
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