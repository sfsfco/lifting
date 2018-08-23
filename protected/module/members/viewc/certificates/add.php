<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
    <link href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

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

                        <form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>certificates/insert"  novalidate>

                            <?php play::display_message(); ?>
                           
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="client">Client <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="client" id="client" class="select2_group form-control" onchange="getaddress(this.value);" >
                                    <option value="">Select</option>
                                    <?php foreach($data['clients'] as $client){ ?>
                                        <option value="<?php echo $client->id; ?>"><?php echo $client->name; ?></option>
                                    <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" name="client_address" id="client_address" value="" type="text" >
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="workorder">Workorder<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="workorder" onchange="getitmes(this.value)" id="workorder" class="select2_group form-control">
                                        <option value="">Select</option>
                                        <?php foreach($data['workorders'] as $workorder){ ?>
                                            <option value="<?php echo $workorder->id; ?>" >
                                                <?php echo $workorder->id ; ?> : <?php echo $workorder->title ; ?> [<?php echo date('d-m-Y',strtotime($workorder->delivery_date)) ; ?>]
                                            </option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_date">Test Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control has-feedback-left datepicker" name="test_date" id="test_date" aria-describedby="inputSuccess2Status4" value="">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_by">Tested By<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="test_by" id="test_by" class="select2_group form-control">
                                        <option value="">Select</option>
                                        <?php foreach($data['users'] as $user){ ?>
                                            <option value="<?php echo $user->id; ?>">
                                                <?php echo $user->first_name." ".$user->last_name; ?>
                                            </option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="certificat_type">Certificate Type<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="certificat_type" onchange="certificateform(this.value);" id="certificat_type" class="select2_group form-control">
                                        <option value="">Select</option>
                                        <option value="work_certificate">Work Certificate</option>
                                        <option value="test_certificate">Test Certificate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="certificate_form">Certificate Form<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="certificate_form" id="certificate_form" class="select2_group form-control">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="next_examination">Date of Next Examination <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control has-feedback-left datepicker" name="next_examination" id="next_examination" aria-describedby="inputSuccess2Status4" value="">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="magnet_type">Magnet Type<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="magnet_type" id="magnet_type" class="select2_group form-control">
                                        <option value="">Select</option>
                                        <option value="fixed_magnet">Fixed Magnet</option>
                                        <option value="electro_magnet">Electro Magnet</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="according_to">According To<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="according_to" id="according_to" value="" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                             <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="split_items">Split Items
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="checkbox" name="split_items" id="split_items"   >
                                    
                                </div>
                            </div>
                            
                            
                            <div class="item form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="name">Item <span class="required">*</span>
                                </label>
                                <div class="options-table col-md-11 col-sm-11 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Identifcation No</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Item</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Qty</div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 text-center">Description</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">S.W.L</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">P.L</div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="button" class="col-add btn btn-dark"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</button>
                                    <button type="button" class="col-remove btn btn-dark"><i class="fa fa-minus-circle" aria-hidden="true"></i> Remove</button>
                                    
                                </div>
                            </div>
                            -->
                             
                            
                             
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
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/validator/validator.js"></script>


<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/google-code-prettify/src/prettify.js"></script>

<script type="text/javascript">
     function replaceall(str,v,w){
               str=str.replace('_'+v,'_'+w);
               if(str.indexOf('_'+v)=='-1'){return str;}else{
                  return replaceall(str,v,w);
                   }
                
               
               }

   
    
function certificateform(v){
    var cert=v.name;
    
    if(v.value=='work_certificate'){
        html="<option value=''>Select</option>";
        html=html+"<option value='report of thorough examination'>report of thorough examination</option>";
        html=html+"<option value='ec declaraion'>EC declaraion</option>";
        html=html+"<option value='test certificate'>test certificate</option>";
        $('#certificate_form').html(html);
        }else{
        html="<option value=''>Select</option>";
        html=html+"<option value='test certificate'>test certificate</option>";
        html=html+"<option value='test and mpi certificate'>test and mpi certificate</option>";
        html=html+"<option value='test and dpi certificate'>test and dpi certificate</option>";
        html=html+"<option value='visual certificate'>visual certificate</option>";
        html=html+"<option value='visual and mpi certificate'>visual and mpi certificate</option>";
        html=html+"<option value='visual and dpi certificate'>visual and dpi certificate</option>";
        html=html+"<option value='ec declaration'>ec declaration</option>";
        html=html+"<option value='report of thorough examination'>report of thorough examination</option>";
        html=html+"<option value='ndt reports'>ndt reports</option>";
        html=html+"<option value='dnv ec declaration'>dnv ec declaration</option>";
        $('#certificate_form').html(html);
            }
    }

function getaddress(v){
     $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>certificates/getaddress/'+v, 
      cache: false,
      success: function(html){
            
             $('#client_address').val(html);
        }
    });    
    
    }

function getitmes(v){
     $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>certificates/getitems/'+v+'/add', 
      cache: false,
      success: function(html){
             $(".options-table").html(html);
             
        }
    });    
    
    }
function certificateformall(v){
    var cert=v.name;
    
    if(v.value=='work_certificate'){
        html="<option value=''>Select</option>";
        html=html+"<option value='report of thorough examination'>report of thorough examination</option>";
        html=html+"<option value='ec declaraion'>EC declaraion</option>";
        html=html+"<option value='test certificate'>test certificate</option>";
        $('#certificate_form_'+cert.split('_')[2]).html(html);
        }else{
        html="<option value=''>Select</option>";
        html=html+"<option value='test certificate'>test certificate</option>";
        html=html+"<option value='test and mpi certificate'>test and mpi certificate</option>";
        html=html+"<option value='test and dpi certificate'>test and dpi certificate</option>";
        html=html+"<option value='visual certificate'>visual certificate</option>";
        html=html+"<option value='visual and mpi certificate'>visual and mpi certificate</option>";
        html=html+"<option value='visual and dpi certificate'>visual and dpi certificate</option>";
        html=html+"<option value='ec declaration'>ec declaration</option>";
        html=html+"<option value='report of thorough examination'>report of thorough examination</option>";
        html=html+"<option value='ndt reports'>ndt reports</option>";
        html=html+"<option value='dnv ec declaration'>dnv ec declaration</option>";
        $('#certificate_form_'+cert.split('_')[2]).html(html);
            }
    }


function certificateform(v){
    var cert=v.name;
    
    if(v.value=='work_certificate'){
        html="<option value=''>Select</option>";
        html=html+"<option value='report of thorough examination'>report of thorough examination</option>";
        html=html+"<option value='ec declaraion'>EC declaraion</option>";
        html=html+"<option value='test certificate'>test certificate</option>";
        $('#certificate_form').html(html);
        }else{
        html="<option value=''>Select</option>";
        html=html+"<option value='test certificate'>test certificate</option>";
        html=html+"<option value='test and mpi certificate'>test and mpi certificate</option>";
        html=html+"<option value='test and dpi certificate'>test and dpi certificate</option>";
        html=html+"<option value='visual certificate'>visual certificate</option>";
        html=html+"<option value='visual and mpi certificate'>visual and mpi certificate</option>";
        html=html+"<option value='visual and dpi certificate'>visual and dpi certificate</option>";
        html=html+"<option value='ec declaration'>ec declaration</option>";
        html=html+"<option value='report of thorough examination'>report of thorough examination</option>";
        html=html+"<option value='ndt reports'>ndt reports</option>";
        html=html+"<option value='dnv ec declaration'>dnv ec declaration</option>";
        $('#certificate_form').html(html);
            }
    }
    
    function closetr(v){
        
        if($('.fa-minus-circle').length!='1'){
            if(confirm("Remove This Item (s) ? ")==true){
                $(v).parent().parent().remove();        
            }    
        }
        
    
    //get_totales();
    }
    /*
function get_totales(){
    var sum=0;
        $(".totales").each(function() {
            sum += Number($(this).val());
        });
        $("#net_value").val(sum);
        update_totales();
    }*/
    $(".col-add").click(function(){
               str='<div class="options-table-item col-md-12 col-sm-12 col-xs-12">'+$(".options-table-item:last").html()+'</div>';
               
               id=$(".options-table-item:last input:first ").attr('id');
               
                var newStr = id.split('_')[1];
                
                
                 str=replaceall(str,newStr,parseInt(newStr)+1);
                 
               $(".options-table-item:last").after(str);
               }); 
           $(".col-remove").click(function(){
               if(!$(".options-table-item:last").hasClass("first")){
                   $(".options-table-item:last").remove();
                   
                }
                   }); 
           
</script>


<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>