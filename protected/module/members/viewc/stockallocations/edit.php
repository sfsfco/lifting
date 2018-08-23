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

                        <form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>stockallocations/update/<?php echo $data['stock']->id; ?>"  novalidate>

                            <?php play::display_message(); ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Work Order <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="workorder" onchange="get_stock_itmes(this.value)" id="workorder" onchange="get_items(this)" class="select2_group form-control" >
                                    <?php foreach($data['workorders'] as $workorder){ ?>
                                        <option value="<?php echo $workorder->id ; ?>" <?php echo($workorder->id==$data['stock']->workorder)?'selected="selected"':' '; ?> ><?php echo $workorder->id ; ?> : <?php echo $workorder->title ; ?> [<?php echo date('d-m-Y',strtotime($workorder->delivery_date)) ; ?>]</option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="client">Client <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="client" class="form-control col-md-7 col-xs-12" disabled="disabled" name="client" type="text" value="<?php echo $data['stock']->client; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="delivery">Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="delivery" class="form-control col-md-7 col-xs-12" name="delivery" required="required" type="text" disabled="disabled" value="<?php echo date('d-m-Y',strtotime($data['workorder']->delivery_date)); ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_value">Total Value <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" disabled="disabled" name="total_value" id="total_value" value="<?php echo $data['workorder']->total_value; ?>" type="text" >
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item <span class="required">*</span>
                                </label>
                                <div class="options-table col-md-6 col-sm-6 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-3 col-xs-12 text-center">Item</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Qty</div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 text-center">Description</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Unit Cost</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Total</div>
                                    </div>
                                <?php $x=0; foreach($data['stockdetails'] as $stockdetails){ ?>
                                    <div class="first options-table-item col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select  name="item_<?php echo $x; ?>" id="item_<?php echo $x; ?>" onchange="get_items(this)" class="select2_group form-control" >
                                                <option value="">Select</option>
                                                <?php foreach($data['items'] as $item){ ?>
                                                <option value="<?php echo $item->id; ?>" <?php echo($item->id==$stockdetails->stock_code)?"selected='selected'":' '; ?>><?php echo $item->name." : ".$item->price." LE : ".date('d-m-Y',strtotime($item->create_date)); ?></option>
                                                
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <input name="quantity_<?php echo $x; ?>" id="quantity_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" placeholder="quantity" required="required" type="text"  onchange="total(this);" value="<?php echo $stockdetails->quantity; ?>">
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <textarea name="details_<?php echo $x; ?>" id="details_<?php echo $x; ?>" class="form-control"><?php echo $stockdetails->details; ?></textarea>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <input id="unit_cost_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="unit_cost_<?php echo $x; ?>" placeholder="" required="required" type="text" value="<?php echo $stockdetails->unit_cost; ?>">
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <input id="total_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="total_<?php echo $x; ?>" placeholder="" required="required" type="text" value="<?php echo $stockdetails->quantity*$stockdetails->unit_cost; ?>">
                                        </div>
                                        <input type="hidden" name="packageunits_<?php echo $x; ?>" id="packageunits_<?php echo $x; ?>" value="1">
                                    </div>
                                <?php } ?>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="percentage_profit">Percentage Profit <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="percentage_profit" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="percentage_profit" placeholder="" required="required" type="text" value="<?php echo $data['stock']->percentage_profit; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost_value">Cost Value <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="cost_value" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="cost_value" placeholder="" required="required" type="text" value="<?php echo $data['stock']->cost_value; ?>">
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
     function replaceall(str,v,w){
               str=str.replace('_'+v,'_'+w);
               if(str.indexOf('_'+v)=='-1'){return str;}else{
                  return replaceall(str,v,w);
                   }
                
               
               }
    function get_stock_itmes(v){
     $.ajax({
          url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>stockallocations/getitems/'+v, 
          cache: false,
          success: function(html){
              $('#total_value').val(html.split('#')[0]);
              var client = html.split('#')[1];
              $('#client').val(client);
              var representative = html.split('#')[2];
              $('#delivery_to').val(representative);
              var address = html.split('#')[3];
              $('#client_address').val(address);
              var delivery = html.split('#')[4];
              $('#delivery').val(delivery);
             
            }
        });    
    
    }
    function update_cost_value(){
        id=$(".options-table-item:last input:first").attr('id');

    var newStr = id.split('_')[1];
    var vv=0;
    for(x=0;x<=newStr;x++){
       vv=vv+parseFloat($("#total_"+x).val());
        }
        profit=(vv*100)/$('#total_value').val();
        profit=100-profit;
    $("#percentage_profit").val(profit.toFixed(0)+'%');
    }
    function update_profit(){
        id=$(".options-table-item:last input:first").attr('id');
    var newStr = id.split('_')[1];
    var vv=0;
    for(x=0;x<=newStr;x++){
       vv=vv+parseFloat($("#total_"+x).val());
        }
    $("#cost_value").val(vv.toFixed(2));
    }
    function total(v){
     $('#total_'+$(v).attr('id').split('_')[1]).val($('#quantity_'+$(v).attr('id').split('_')[1]).val()*$('#unit_cost_'+$(v).attr('id').split('_')[1]).val());
     update_cost_value();
     update_profit();
    }
    function get_items(v){
         $.ajax({
          url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>stockallocations/get_items/'+v.value, 
          cache: false,
          success: function(html){
              $('#details_'+$(v).attr('id').split('_')[1]).val(html.split('#')[0]);
              $('#unit_cost_'+$(v).attr('id').split('_')[1]).val(html.split('#')[1]);
              $('#total_value_'+$(v).attr('id').split('_')[1]).val(html.split('#')[1]);
            }
        });    
  update_cost_value();
  
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
                   update_cost_value();
                    update_profit();
                }
                   }); 
           
</script>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>