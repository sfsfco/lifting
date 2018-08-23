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

                        <form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>workorders/update/<?php echo $data['workorder']->id; ?>"  novalidate>

                            <?php play::display_message(); ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" name="title" id="title" value="<?php echo $data['workorder']->title; ?>" type="text" >
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="client">Client <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="client" id="client" class="select2_group form-control" >
                                    <option value="">Select</option>
                                    <?php foreach($data['clients'] as $client){ ?>
                                        <option value="<?php echo $client->id; ?>" <?php echo($data['workorder']->client==$client->id)?"selected='selected'":""; ?>><?php echo $client->name; ?></option>
                                    <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="request_no">Workorder No<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" name="request_no" id="workorder_no" disabled="disabled" value="<?php echo $data['workorder']->workorder_no; ?>" type="text" >
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="request_no">Request No<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" name="request_no" id="request_no" value="<?php echo $data['workorder']->request_no; ?>" type="text" >
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="delivery_date">Delivery Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control has-feedback-left datepicker" name="delivery_date" id="delivery_date" aria-describedby="inputSuccess2Status4" value="<?php echo date('Y-m-d',strtotime($data['workorder']->delivery_date)); ?>">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item <span class="required">*</span>
                                </label>
                                <div class="options-table col-md-9 col-sm-9 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Item</div>
                                        <div class="col-md-1 col-sm-1 col-xs-12 text-center">ID</div>
                                        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Qty</div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 text-center">Description</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">S.W.L</div>
                                        <div class="col-md-1 col-sm-2 col-xs-12 text-center">P.L</div>
                                        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Unit Cost</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Total</div>
                                    </div>
                                    <?php $x=0; foreach($data['workordersdetails'] as $workordersdetails){ ?>
                                    <div class=" <?php if($x==0){echo('first');} ?> options-table-item col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-1 col-sm-1 col-xs-12">
                                            <input name="num_<?php echo $x; ?>" id="num_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12"  required="required" type="text"   value="<?php echo $x+1; ?>">
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-12">
                                            <input name="id_<?php echo $x; ?>" id="id_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12"   type="text"   value="<?php  echo $workordersdetails->i_d; ?>">
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-12">
                                            <input name="quantity_<?php echo $x; ?>" id="quantity_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12"  type="text" onkeyup="updatebill(this);" onchange="updatebill(this);"   value="<?php  echo $workordersdetails->quantity; ?>">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <textarea name="details_<?php echo $x; ?>" id="details_<?php echo $x; ?>" class="form-control"><?php  echo $workordersdetails->details; ?></textarea>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <input id="swl_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12" name="swl_<?php echo $x; ?>" placeholder="" type="text" value="<?php  echo $workordersdetails->swl; ?>">
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-12">
                                            <input id="pl_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12" name="pl_<?php echo $x; ?>" placeholder="" type="text" value="<?php  echo $workordersdetails->pl; ?>">
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-12">
                                            <input id="unit_cost_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12"  name="unit_cost_<?php echo $x; ?>" onkeyup="updatebill(this);" onchange="updatebill(this);"  placeholder="" type="text" value="<?php  echo $workordersdetails->unit_cost; ?>">
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <input id="total_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12" name="total_<?php echo $x; ?>" placeholder="" type="text" value="<?php  echo $workordersdetails->total; ?>">
                                        </div>
                                    </div>
                                    <?php $x++;} ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="button" class="col-add btn btn-dark"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</button>
                                    <button type="button" class="col-remove btn btn-dark"><i class="fa fa-minus-circle" aria-hidden="true"></i> Remove</button>
                                    
                                </div>
                            </div>
                             <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="net_value">Net Value <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" name="net_value" id="net_value" value="<?php echo $data['workorder']->net_value; ?>" type="number" >
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax">Tax <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="tax" class="form-control col-md-7 col-xs-12"  onkeyup="updatebill(this);" onchange="updatebill(this);"  name="tax" required="required" type="number" value="<?php echo $data['workorder']->tax; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_value">Total Value <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="total_value" class="form-control col-md-7 col-xs-12"  name="total_value" required="required" type="number" value="<?php echo $data['workorder']->total_value; ?>">
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

   
    

function updatebill(v){
    if(v==null){alert('hi');}
     id=v.id;
     x=id.split('_');
     
    newid=id.split('_')[x.length-1];
    
    tot=(parseFloat($("#quantity_"+newid).val()))*parseFloat($("#unit_cost_"+newid).val());
    if(!isNaN(tot)){$("#total_"+newid).val(tot);}else{$("#total_"+newid).val('0');}
    
    //ak
     
     id=$(".options-table-item:last input:first ").attr('id');
     
    var newStr = id.split('_')[1];
    
    var vv=0;
    for(x=0;x<=newStr;x++){
       vv=vv+parseFloat($("#total_"+x).val());
        }
    $("#net_value").val(vv.toFixed(2));
    total=vv+(vv*parseFloat($("#tax").val())/100);
     if(!isNaN(total)){$("#total_value").val(total.toFixed(2));}else{$("#total_value").val('0');}
    //ak
   
    
    }


     
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