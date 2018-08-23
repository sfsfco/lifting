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

                        <form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>purchases/insert"  novalidate>

                            <?php play::display_message(); ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="supplier">Supplier <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="supplier" id="supplier" class="select2_group form-control" >
                                    <option value="">Select</option>
                                    <?php foreach($data['suppliers'] as $supplier){ ?>
                                        <option value="<?php echo $supplier->id ; ?>"><?php echo $supplier->name ; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stockroom">Store <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="stockroom" id="stockroom" class="select2_group form-control" >
                                    <option value="">Select</option>
                                    <?php foreach($data['stockrooms'] as $stockroom){?>
                                        <option value="<?php echo $stockroom->id; ?>"><?php echo $stockroom->name; ?></option>
                                    <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="purchase_date">Purchase Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control has-feedback-left datepicker" name="purchase_date" id="purchase_date" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_method">Payment Method <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio">
                                    <label>
                                        <input type="radio" id="payment_method0" name="payment_method" value="0" checked="checked"> Monetary
                                    </label>
                                    </div>
                                    <div class="radio">
                                    <label>
                                        <input type="radio" id="payment_method1" name="payment_method" value="1"> Check
                                    </label>
                                    <label>
                                        <select id="banks" name="banks" disabled="disabled" class="select2_group form-control">
                                            <?php foreach($data['banks'] as $bank){ ?>
                                                <option value="<?php echo $bank->id; ?>"><?php echo $bank->name; ?></option>
                                            <?php }?>
                                        </select>
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="name">Item <span class="required">*</span>
                                </label>
                                <div class="options-table col-md-11 col-sm-11 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Code</div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 text-center">Name</div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">Details</div>
                                        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Quantity</div>
                                        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Unit Cost</div>
                                        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Discount</div>
                                        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Total</div>
                                    </div>
                                    <div class="first options-table-item col-md-12 col-sm-12 col-xs-12">
                                        
                                        <div class="col-md-1 col-sm-1 col-xs-12">
                                            <input type="text" name="barcode_0" id="barcode_0" class="form-control col-md-7 col-xs-12" onchange="getnumber(this);" onkeyup="getnumber(this);">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="item_name_0" id="item_name_0" class="select2_group form-control" onchange="getname(this);">
                                                <option value="">Select</option>
                                                <?php foreach($data['items'] as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option><?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <textarea name="details_0" id="details_0" class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-12">
                                            <input type="text" name="quantity_0" id="quantity_0" value="0" class="form-control col-md-7 col-xs-12" onchange="updateval(this);" onkeyup="updateval(this);">
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-12">
                                            <input type="text" name="price_0" id="price_0" value="0" class="form-control col-md-7 col-xs-12" onchange="updateval(this);" onkeyup="updateval(this);">
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-12">
                                            <input type="text" name="discount_0" id="discount_0" value="0" class="form-control col-md-7 col-xs-12" onchange="updateval(this);" onkeyup="updateval(this);">
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-12">
                                            <input type="text" name="total_0" id="total_0" value="0" class="form-control col-md-7 col-xs-12">
                                        </div>

                                        
                                        <input type="hidden" name="packageunits_0" id="packageunits_0" value="1">
                                    </div>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_value">Total Value <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="total_value" class="form-control col-md-7 col-xs-12"  name="total_value" required="required" type="number" value="0">
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
$('#payment_method1').click(function(){$("#banks").removeAttr("disabled");$("#bank_no").removeAttr("disabled");});
$('#payment_method0').click(function(){$("#banks").attr("disabled", "disabled");$("#bank_no").attr("disabled", "disabled");});

function getnumber(v){
    id=v.id;
    
    newid=id.split('_')[1];
    
     $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>purchases/getnumber/'+v.value, 
      cache: false,
      success: function(html){
        //$(".place").html(html);
            //$("#barcode_"+newid).val(html.split(',')[0]);
            $("#unit_type_"+newid).val(html.split(',')[1]);
            $("#package_"+newid).val('1');
            $("#unit_"+newid).val('0');
            $("#purchase_price_"+newid).val(html.split(',')[2]);
            $("#purchase_discount_"+newid).val(html.split(',')[3]);
            $("#category_"+newid).val(html.split(',')[4]);
            
            valuee=html.split(',')[0];
            jQuery("select#item_name_"+newid+" option[selected]").removeAttr("selected");
            jQuery("select#item_name_"+newid+" option[value='"+valuee+"'] ").attr("selected", "selected");
            $("#total_"+newid).val(html.split(',')[5]);
            $("#packageunits_"+newid).val(html.split(',')[6]);
        //jQuery("select#category_0 option[selected]").removeAttr("selected");
            
             updatetotal();
            
            
        }
    });    
    
    }

    function getname(v){
    id=v.id;
    newid=id.split('_')[2];
    
     $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>purchases/getnames/'+v.value, 
      cache: false,
      success: function(html){
        //$(".place").html(html);
            $("#barcode_"+newid).val(html.split(',')[0]);
            $("#unit_type_"+newid).val(html.split(',')[1]);
            $("#package_"+newid).val('1');
            $("#unit_"+newid).val('0');
            $("#purchase_price_"+newid).val(html.split(',')[2]);
            $("#purchase_discount_"+newid).val(html.split(',')[3]);
            $("#category_"+newid).val(html.split(',')[4]);
            $("#total_"+newid).val(html.split(',')[5]);
            $("#packageunits_"+newid).val(html.split(',')[6]);
           
             updatetotal();
             
        }
    });    
    
    }
 function updatetotal(){
      id=$(".options-table-item:last input:first ").attr('id');
    var newStr = id.split('_')[1];
    var vv=0;
    for(x=0;x<=newStr;x++){
       vv=vv+parseFloat($("#total_"+x).val());
        }
    $("#total_value").val(vv.toFixed(2));
     }

function updateval(v){
     id=v.id;
     x=id.split('_');
     
    newid=id.split('_')[x.length-1];
    
    tot=parseFloat($("#quantity_"+newid).val())*parseFloat($("#price_"+newid).val());
    
    tot1=(tot*parseFloat($("#discount_"+newid).val())/100);
    
    if(!isNaN(tot-tot1)){$("#total_"+newid).val(tot-tot1);}else{$("#total_"+newid).val('0');}
    
    updatetotal();
   
    
    }
   
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