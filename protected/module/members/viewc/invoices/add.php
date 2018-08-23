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

                        <form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>invoices/insert"  novalidate>

                            <?php play::display_message(); ?>
                           
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="name" id="name" class="select2_group form-control">
                                        <option value="select"></option>
                                        <option value="supply">Supply</option>
                                        <option value="services">Services</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="delivery_note">Workorder<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="delivery_note" onchange="get_delivery(this.value)" id="delivery_note" class="select2_group form-control">
                                        <option value="">Select</option>
                                        <?php foreach($data['workorders'] as $workorder){ ?>
                                            <option value="<?php echo $workorder->id ; ?>">
                                                <?php echo $workorder->id ; ?>[<?php echo $workorder->delivery_date ; ?>]
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="delivery_date">Invoice Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control has-feedback-left datepicker" name="delivery_date" id="delivery_date" aria-describedby="inputSuccess2Status4" value="">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="taxed">Taxed<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>
                                      <input type='radio' name='taxed' value='0'> taxed  
                                    </label>
                                    <label>
                                      <input type='radio' name='taxed' value='1' checked='checked'> none taxed  
                                    </label>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank">Bank<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="bank" id="bank" class="select2_group form-control">
                                        <option value="">Select</option>
                                        <?php foreach($data['bank'] as $bank){ ?>
                                        <option value="<?php echo $bank->id ; ?>">
                                            <?php echo $bank->name ; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="name">Item <span class="required">*</span>
                                </label>
                                <div class="options-table col-md-11 col-sm-11 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Item</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Qty</div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">Description</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Unit Cost</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Total</div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="net_value">Net Value <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" name="net_value" id="net_value" value="0" type="number" >
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax">Tax <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="tax" class="form-control col-md-7 col-xs-12"  onkeyup="updatebill_invoice(this);" onchange="updatebill_invoice(this);"  name="tax" required="required" type="number" value="0">
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
     function replaceall(str,v,w){
               str=str.replace('_'+v,'_'+w);
               if(str.indexOf('_'+v)=='-1'){return str;}else{
                  return replaceall(str,v,w);
                   }
                
               
               }

   
function get_delivery(v){
     $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>invoices/getitems/'+v, 
      cache: false,
      success: function(html){
              $(".options-table").html(html);
              get_totales();
        }
    });    
    
        }    

function updatebill_invoice(v){
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
   get_totales();
    
    }

function get_totales(){
    var sum=0;
        $(".totales").each(function() {
            sum += Number($(this).val());
        });
        $("#net_value").val(sum);
        update_totales();
    }
function update_totales(){
        net=$('#net_value').val();
        tax=$('#tax').val();
        total=(net*tax)/100;
        
        total=$('#total_value').val( parseFloat(net) + parseFloat(total) );
        
    }
    
    function closetr(v){
        if($('.fa-minus-circle').length!='1'){
            if(confirm("Remove This Item (s) ? ")==true){
                $(v).parent().parent().remove();        
            }    
        }
        
    
    get_totales();
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