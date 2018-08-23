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

                        <form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>prefrances"  enctype='multipart/form-data'  novalidate>
                        <?php play::display_message(); ?>
                            
                            <?php foreach ($data['prefrances'] as $pref) {
                              ?>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="<?php echo $pref->k; ?>">
                                <?php if(!in_array($pref->k,array('logo','site_name','keywords','description'))){ ?>
                                <i class="fa-minus-square fa  fa-fw"   ></i> 
                                <?php } ?>
                                <?php echo $pref->k; ?> 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php if($pref->k=='logo'){?>
                                    <img style="max-width: 150px;" src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/prefrances/<?php echo $pref->v;?>"/><br>
                                    <label for="<?php echo $pref->k; ?>" class="custom-file-upload">
                                            <i class="fa fa-cloud-upload"></i> <?php echo $pref->k; ?>
                                    </label>
                                    <input type="file" size="45" id="<?php echo $pref->k; ?>" name="<?php echo $pref->k; ?>" class="input">
                                <?php }else{ ?>
                                    <textarea  name="<?php echo $pref->k; ?>" class="form-control col-md-7 col-xs-12"><?php echo $pref->v; ?></textarea>
                                <?php } ?>
                                
                                </div>
                             </div>
                              <?php
                              }?>
                              <div class="form-group">
                                <label class="control-label control-label col-md-3 col-sm-3 col-xs-12">
                                   <div class="add-field"> <label><i class="fa-plus-square fa  fa-fw"></i> <?php echo "Add New Field"; ?> </label></div>
                                </label>
                              </div>
                              
                              <div class="form-group add-fields">
                                  
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

<script src="<?php echo Doo::conf()->APP_URL ?>global/admin/vendors/validator/validator.js"></script>
<script>
jQuery(document).ready(function() {
    $(document).on('click', '.add-field', function(event) {
        $('.add-fields').append('<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for=""><i class="fa-minus-square fa  fa-fw"   ></i> </label><div class="col-md-6 col-sm-6 col-xs-12"><input type="text" class="form-control tname"><textarea  name="" class="form-control col-md-7 col-xs-12 textform"></textarea></div></div>');
    });
    $(document).on('click', '.fa-minus-square', function(event) {
        if(confirmation('Remove This Items? ')==true){$(this).parent().parent('.form-group').remove();}
        /* Act on the event */
    });
    $(document).on('keyup', '.tname', function(event) {
        $(this).closest('div').find('.textform').attr('name',$(this).val());
        $(this).closest('div').find('.control-label').attr('for',$(this).val());
    });


});

function confirmation(message)
{
  if(confirm(message)==true){return true;}
  return false;
}

</script>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>


