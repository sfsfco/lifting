<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?php echo $data['title']; ?></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?php echo $data['title']; ?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>items/insert"  novalidate>

                            <?php play::display_message(); ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="name" placeholder="" required="required" type="text" value="">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="barcode">Barcode <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="barcode" class="form-control col-md-7 col-xs-12" data-validate-length-range="" name="barcode" placeholder="" required="required" type="number" value="">
                                </div>
                            </div>
                            <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Category <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select class="select2_group form-control" id="category" name="category">
                                        <option value="">Select</option>
                                        <?php foreach ($data['categories'] as $category){ ?>
                                         <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                         <?php } ?>

                                      </select>
                                    </div>
                              </div>
                             <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="select2_group form-control" id="country" name="country">
                                    <option value="">Select</option>
                                      <option value="Saudi Arabia">Saudi Arabia</option>
                                      <option value="Egypt">Egypt</option>
                                      <option value="United Arab Emirates">United Arab Emirates</option>
                                      <option value="Kuwait">Kuwait</option>
                                      <option value="Qatar">Qatar</option>
                                      <option value="Jordan">Jordan</option>
                                      <option value="Oman">Oman</option>
                                      <option value="Syria">Syria</option>
                                      <option value="Yemen">Yemen</option>
                                      <option value="Libya">Libya</option>
                                      <option value="Bahrain">Bahrain</option>
                                      <option value="Sudan">Sudan</option>
                                      <option value="Iraq">Iraq</option>
                                      <option value="Algeria">Algeria</option>
                                      <option value="Lebanon">Lebanon</option>
                                      <option value="Morocco">Morocco</option>
                                      <option value="Palestine">Palestine</option>
                                      <option value="Tunisia">Tunisia</option>
                                      <option value="Mauritania">Mauritania</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="order_limit">Order Limit 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="order_limit" class="form-control col-md-7 col-xs-12" data-validate-length-range="1,1000000" name="order_limit" placeholder="" type="number" value="">
                                    </div>
                                </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="details">Details 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <textarea id="details" name="details" class="form-control col-md-7 col-xs-12"></textarea>
                                </div>
                             </div>
                             
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/validator/validator.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/google-code-prettify/src/prettify.js"></script>
<script type="text/javascript">
    $('#send').click(function(event) {
        
    
    });
</script>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>