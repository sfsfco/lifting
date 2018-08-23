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

                        <form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>searches/find"  novalidate>

                            <?php play::display_message(); ?>
                           
                            <div class="item form-group">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="search">Keyword <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="search" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="search" placeholder="" required="required" type="text" value="">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">BETWEEN 
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" class="form-control has-feedback-left datepicker" name="date_from" id="date_from" aria-describedby="inputSuccess2Status4" value="<?php echo date('Y-m-d',strtotime('-5 year'));?>">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" class="form-control has-feedback-left datepicker" name="date_to" id="date_to" aria-describedby="inputSuccess2Status4" value="">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="">Inside <span class="required">*</span>
                                    </label>
                                    <div class="col-md-11 col-sm-11 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="articles" name="articles" value="1"> Articles 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="services" name="services" value="1"> Services 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="photos" name="photos" value="1"> Photos 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="contact" name="contact" value="1"> Contact 
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="inspaction" name="inspaction" value="1"> Inspaction 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="maillist" name="maillist" value="1"> Maillist 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="users" name="users" value="1"> Users 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="groups" name="groups" value="1"> Groups 
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="clients" name="clients" value="1"> Clients 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="suppliers" name="suppliers" value="1"> Suppliers 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="banks" name="banks" value="1"> Our Bank Accounts 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="otherbanks" name="otherbanks" value="1"> Banks 
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="stockrooms" name="stockrooms" value="1"> Stockrooms 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="good" name="good" value="1"> Good 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="expenses" name="expenses" value="1"> Expenses 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="incomes" name="incomes" value="1"> Income Check 
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="categories" name="categories" value="1"> Categories 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="stockrooms" name="stockrooms" value="1"> Stores 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="items" name="items" value="1"> Items 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="stockallocations" name="stockallocations" value="1"> Stockallocations 
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="pays" name="pays" value="1"> Payment Check 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="purchases" name="purchases" value="1"> Purchases 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="workorders" name="workorders" value="1"> Workorders 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="certificates" name="certificates" value="1"> Certificates 
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="delivery" name="delivery" value="1"> Delivery 
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <input type="checkbox" checked='checked' class="flat" id="quotations" name="quotations" value="1"> Quotations 
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">Search</button>
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