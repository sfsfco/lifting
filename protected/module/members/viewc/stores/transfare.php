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
                        <h2><?php echo($data['item']); ?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>stores/dotransfare/<?php echo $data['storeslist']->id; ?>"  novalidate>

                            <?php play::display_message(); ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">Quantity <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="quantity" class="form-control col-md-7 col-xs-12" data-validate-length-range="" name="quantity" placeholder="" required="required" type="number" value="<?php echo $data['storeslist']->quantity; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stockroom">Transfare To <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select class="select2_group form-control" id="stockroom" name="stockroom">
                                        <option value="">Select</option>
                                        <?php foreach($data['stockrooms'] as $stockrooms){ ?><option <?php echo($data['storeslist']->stockroom==$stockrooms->id)?"selected='selected'":" ";?> value="<?php echo $stockrooms->id; ?>"><?php echo $stockrooms->name; ?></option>
                                        	<?php } ?>
                                      </select>
                                    </div>
                              </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                            <input type="hidden" name="unit" id="unit" value="0">
							<input type="hidden" name="old_stock" id="old_stock" value="<?php echo $data['storeslist']->stockroom; ?>">
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
