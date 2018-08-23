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

                        <form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>groups/update/<?php echo $data['group']->id; ?>"  novalidate>

                            <?php play::display_message(); ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="name" placeholder="" required="required" type="text" value="<?php echo $data['group']->name; ?>">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Activation</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <div class="">
                                    <label>
                                      <input type="checkbox" name="active" class="js-switch" <?php echo($data['group']->active=='1')?'checked':'';?> />
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12"><div class="text-center">Title</div></label>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 text-center"><div class="text-center">View</div></label>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 text-center"><div class="text-center">Add</div></label>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 text-center"><div class="text-center">Edit</div></label>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 text-center"><div class="text-center">Delete</div></label>
                              </div>
                              <?php foreach($data['modules'] as $module=>$value){ ?>
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12"><div class="text-center"><?php echo ucfirst($module); ?></div></label>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 text-center"><div class="text-center">
                                    <input type="checkbox" class="flat" value="1" <?php echo($data[$module.'_view']=='1')?'checked="checked"':'&nbsp;'; ?>   name="<?php echo $module.'_view'?>"></div>
                                </label>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 text-center"><div class="text-center">
                                    <input type="checkbox" class="flat" value="1" <?php echo($data[$module.'_add']=='1')?'checked="checked"':'&nbsp;'; ?>   name="<?php echo $module.'_add'?>"></div>
                                </label>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 text-center"><div class="text-center">
                                    <input type="checkbox" class="flat" value="1" <?php echo($data[$module.'_update']=='1')?'checked="checked"':'&nbsp;'; ?>   name="<?php echo $module.'_update'?>"></div>
                                </label>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 text-center"><div class="text-center">
                                    <input type="checkbox" class="flat" value="1" <?php echo($data[$module.'_delete']=='1')?'checked="checked"':'&nbsp;'; ?>   name="<?php echo $module.'_delete'?>"></div>
                                </label>
                              </div>
                              
                              <?php } ?>
                              
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
        $('#details').val($('#editor-one').html());
    
    });
</script>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>