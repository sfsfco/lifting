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
                  <h2><?php echo str_replace('_', ' ', $data['title']); ?> <small><?php echo play::prefrances('site_name'); ?></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/prefrances/<?php echo play::prefrances('print_logo') ?>"/>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <h2><?php echo str_replace('_', ' ', strtoupper($data['title'])); ?></h2>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <h4 class="cert-desc"><?php echo play::prefrances('certificate_intro'); ?></h4>
                    </div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">CERTIFICATION NO </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <?php echo $data['cert']->id; ?>
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">TESTER/EXAMINER: ENG. </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <?php echo $data['quotation']->create_by_name;?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">AdelQUALIFICATION </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                ASNT LEVEL TWO
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">DATE OF TEST/EXAMINATION </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <?php echo date('d-m-Y',strtotime($data['cert']->test_date));  ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">TYPE OF CERTIFICATE </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                LOAD TEST/ MPI
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="required">TESTED ACCORDING TO </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <?php echo $data['cert']->according_to; ?>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped  table-bordered">
                      <thead>
                        <tr>
                           <td>IDENTIFICATION NO</td>
                            <td>QTY</td>
                            <td>DESCRIPTION OF EQUIPMENT</td>
                            <td>SWL</td>
                            <td>PROOF LOAD</td>
                            <td>DATE OF NEXT EXAMINATION</td>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $x=0; foreach($data['quotationsdetails'] as $quotationsdetails){ ?>
                        <tr>
                            <td><?php  echo $quotationsdetails->idno; ?></td>
                            <td><?php  echo $quotationsdetails->quantity; ?></td>
                            <td style="text-align:left;"><?php  echo nl2br($quotationsdetails->details); ?></td>
                            <td><?php  echo $quotationsdetails->swl; ?></td>
                            <td><?php echo $quotationsdetails->pl; ?></td>
                            <td><?php echo $data['cert']->next_examination; ?></td>
                        </tr>
                        <?php $x++;} ?>
                        
                      </tbody>
                    </table>
                    <table class="table table-striped table-bordered text-center">
                      <thead>
                        <tr>
                           <td>PARTICULARS OF DEFECTS FOUND WHICH ARE, OR COULD, BECOME A DANGER TO PERSONS OR ‘NONE’</td>
                            <td>PARTICULARS OF ANY REPAIR, ALTERATION TO REMEDY DEFECT OR ‘NONE’</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>NONE</td>
                            <td>NONE</td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-striped table-bordered text-center">
                      <thead>
                        <tr>
                           <td>NAME AND ADDRESS OF EQUIPMENT OWNER</td>
                            <td>ADDRESS OF PREMISES WHERE TEST/EXAMINATION WAS HELD</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td><?php echo $data['quotation']->client_name; ?></td>
                            <td><?php echo play::prefrances('site_name').' '.play::prefrances('description'); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="form-group">
                        <div class="col-md-12 text-left">
                            <?php echo nl2br(play::prefrances('certificate_terms')); ?>
                            <hr>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 text-left">
                            <?php echo nl2br(play::prefrances('contacts')); ?>
                        </div>
                        <div class="col-md-6 text-right">
                            AUTHORISED SIGNATURE .............<?php if(isset($_SESSION['member_username']['sign'])){ ?><img src="<?php  echo Doo::conf()->APP_URL; ?>global/uploads/users/<?php echo $_SESSION['member_username']['sign']; ?>" style="width:100px;"><?php } ?>............................
                            <br><br><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-left">
                                <br>
                                DATE: <?php echo date('d/m/Y',strtotime($data['cert']->test_date)); ?>
                                <br>
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