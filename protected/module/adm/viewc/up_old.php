<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
        <meta name="keywords" content="<?php echo $data['prefrances']->meta; ?>">
    <title><?php echo $data['prefrances']->site_name; ?></title>
        <!-- Framework CSS -->
    <link rel="stylesheet" href="<?php  echo Doo::conf()->APP_URL; ?>global/css/blueprint/screen.css" type="text/css" media="screen, projection,print">
    <!--<link rel="stylesheet" href="<?php  echo Doo::conf()->APP_URL; ?>global/css/blueprint/print.css" type="text/css" media="print">-->
    <!--[if lt IE 8]><link rel="stylesheet" href="<?php  echo Doo::conf()->APP_URL; ?>global/css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php  echo Doo::conf()->APP_URL; ?>global/css/adm/superfish.css" media="screen">
<link rel="stylesheet" href="<?php  echo Doo::conf()->APP_URL; ?>global/css/my.css" type="text/css" media="screen, projection,print">
    <script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/hoverIntent.js"></script>
    <script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/superfish.js"></script>
    <script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/jquery.tablesorter.min.js"></script>
        
    <script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/jquery.validate.min.js"></script>
        
    <script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/jquery.printElement.js"></script>
    <script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/jquery.popupWindow.js"></script>
<!-- Load TinyMCE -->
<script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/tiny_mce/jquery.tinymce.js"></script>
<!-- /TinyMCE -->

    <!--start upload-->
        
        <script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/ajaxupload/ajaxfileupload.js"></script>
    <!--end upload-->
        
        
        <link type="text/css" href="<?php  echo Doo::conf()->APP_URL; ?>global/js/jqueryui/css/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />  
        <script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/jqueryui/js/jquery-ui-1.8.18.custom.min.js"></script>
        

    <script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
  <script type="text/javascript" src="<?php  echo Doo::conf()->APP_URL; ?>global/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php  echo Doo::conf()->APP_URL; ?>global/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    
  

    <script type="text/javascript">
  
    // initialise plugins
    jQuery(function(){
      jQuery('ul.sf-menu').superfish({
                 delay:       700,                               // delay on mouseout 
        animation:   {opacity:'show',height:'show'},    // fade-in and slide-down animation 
        speed:       'fast'
                });
    });
        
        function beready(){
 $('.cert_type').change(function(){
   var cert_type=$(this).val();
  $.ajax({
        url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>certificates/index/'+$(this).val(),
        cache: false,
        success: function(html){
          $(".place").html(html);
          beready();
          }
      });
 });        
$('textarea.tinymce').tinymce({
      // Location of TinyMCE script
      script_url : '<?php  echo Doo::conf()->APP_URL; ?>global/js/tiny_mce/tiny_mce.js',

      // General options
      theme : "advanced",
            skin : "o2k7",
         //   skin_variant : "black",
         skin_variant : "silver",
      plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist,jbimages",

      // Theme options
      theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
      theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
      theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
      theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,|,jbimages",
      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      theme_advanced_resizing : true,

      // Example content CSS (should be your site CSS)
      //content_css : "css/content.css",

      // Drop lists for link/image/media/template dialogs
      template_external_list_url : "lists/template_list.js",
      external_link_list_url : "lists/link_list.js",
      external_image_list_url : "lists/image_list.js",
      media_external_list_url : "lists/media_list.js",

      // Replace values for the template plugin
      template_replace_values : {
        username : "Some User",
        staffid : "991234"
      }
    });    


        $(function() {
    $( "#tabs" ).tabs();
  });
         $('.printing').click(function(){
              $(this).printElement();
              });  

            
        $('#filter-stockroom').change(function(){
             $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>stores/filter/'+$(this).val(),
      cache: false,
      success: function(html){
        $(".place").html(html);
        beready();
        }
    });    
});
            
        $('#payment_for2').change(function(){
            $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>returned/getpaymentid/'+$(this).val()+'/'+ $('#payment_type').val(),
      cache: false,
      success: function(html){
              
              $('#payment_id2').html(html.split('#')[0]);
              if(html.indexOf('Diagnostics')==-1){$('.bill_details').html(html.split('#')[1]);}else{$('.bill_details').html('&nbsp;');}
              if(html.indexOf('Diagnostics')==-1){$('#payment_value_show').val(html.split('#')[2]);}else{$('#payment_value_show').val('0');}
              if(html.indexOf('Diagnostics')==-1){$('#payment_value').val(html.split('#')[2]);}else{$('#payment_value').val('0');}
              
              }
    });    
        });
        
        $('#payment_id2').change(function(){
            $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>returned/getpaymentdetails/'+$(this).val(),
      cache: false,
      success: function(html){
              if(html.indexOf('Diagnostics')==-1){
              $('.bill_details').html(html.split('#')[0]);
              $('#payment_value_show').val(html.split('#')[1]);
              $('#payment_value').val(html.split('#')[1]);
              }else{
                  $('#payment_value_show').html('0');
                    $('#payment_value').val('0');
                  }
              }
    });    
        });
      
        $('#payment_for1').change(function(){
            $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/getpaymentid1/'+$(this).val()+'/'+ $('#payment_type1').val(),
      cache: false,
      success: function(html){$('#payment_id1').html(html);}
    });    
        });
        $('#payment_type1').change(function(){
        $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/paymenttype1/'+$(this).val(),
      cache: false,
      success: function(html){$('#payment_for1').html(html);}
    });    
        });        
        
        $('#payment_for').change(function(){
            $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/getpaymentid/'+$(this).val()+'/'+ $('#payment_type').val(),
      cache: false,
      success: function(html){
              
             $('#payment_id').html(html);
        }
    });    
            });
        $('#payment_type').change(
        function(){
           
        $.ajax({
      url: '<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/paymenttype/'+$(this).val(),
      cache: false,
      success: function(html){
             $('#payment_for').html(html);
             
        }
    });    
        }
        );
            $('#payment_method1').click(function(){$("#banks").removeAttr("disabled");$("#bank_no").removeAttr("disabled");});
            $('#payment_method0').click(function(){$("#banks").attr("disabled", "disabled");$("#bank_no").attr("disabled", "disabled");});
             
            
        $('#paid_value').keyup(function(){
            
           $('#rest_value').val((parseFloat($('#total_value').val())-parseFloat($(this).val())).toFixed(2));
            });

 
        $('windowX').popupWindow();
        $('.windowX').popupWindow({height:100,width:200,top:50,left:50});
        
        $(".tablesorter").tablesorter(); 
        
        $( ".date-pick" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( ".date-pick1" ).datepicker({ dateFormat: 'yy-mm-dd',defaultDate:'+6m ' });
      
           function replaceall(str,v,w){
               str=str.replace('_'+v,'_'+w);
               if(str.indexOf('_'+v)=='-1'){return str;}else{
                  return replaceall(str,v,w);
                   }
                
               
               }
           $(".col-add").click(function(){
               str="<tr>"+$("#options-table tr:last").html()+"</tr>";
              
               id=$("#options-table tr:last input:first").attr('id');
                var newStr = id.split('_')[1];
                
                
                 str=replaceall(str,newStr,parseInt(newStr)+1);
                 
               $("#options-table tr:last").after(str);
               }); 
           $(".col-remove").click(function(){
               if(!$("#options-table tr:last").hasClass("first")){
                   $("#options-table tr:last").remove();
                   update_cost_value();
                    update_profit();
                   }
           
           
           });
        
          $(".purchases-add").click(function(){
               str="<tr>"+$("#options-table tr:last").html()+"</tr>";
              
               id=$("#options-table tr:last input:first").attr('id');
                var newStr = id.split('_')[1];
                
                
                 str=replaceall(str,newStr,parseInt(newStr)+1);
                 
               $("#options-table tr:last").after(str);
               }); 
           $(".purchases-remove").click(function(){
               if(!$("#options-table tr:last").hasClass("first")){$("#options-table tr:last").remove();}
           updatetotal();
           
           });
        
      
        
        
        
        $(".closeme").click(function(){$.fancybox.close();});
        $(".link").fancybox({'hideOnOverlayClick':false,'hideOnContentClick':false,'onComplete':function(){beready()}});
        /******/
       
          $("#form").validate({
    rules: {
      password2: {
        required: true,
        equalTo: "#password"
      }
    },
    
    submitHandler: function(form) {
      
     var $form = $('#form');
     var $inputs = $('#form :input');
    /*  
    var values = {};
    $inputs.each(function() {
        values[this.name] = $(this).val();
    });*/
    $values=$('#form').serialize();
        url = $form.attr( 'action' );
         $.ajax({
      url: url, 
      cache: false,
          type:'post',
          data:$values,
      success: function(html){
              if(html=='0'){$(".result").append("<div class='span-16 last'><div class='error'>Error In Save </div></div>");}else{
                  $.fancybox.close();
                  $(".place").html("<div class='span-24 last done' >Done</div>"+html);
                  beready();
                //$('#myTable tr:first').after(html).fadin(slow);                  
                  }
        
        }
    });    
    return false;
 }
  }
  );
        /*****/
      /*  message-username*/
    $('#username').keyup(function(){
        
         $.ajax({
      url: "<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>users/checkusername/"+$(this).val(), 
      cache: false,
      success: function(html){
        $("#message-username").html(html);
        
        }
    });    
        
        });
    /*  message-username2*/
    $('#username2').keyup(function(){
        if($('#old_username').val()!=$(this).val()){
         $.ajax({
      url: "<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>users/checkusername/"+$(this).val(), 
      cache: false,
      success: function(html){
        $("#message-username").html(html);
        
        }
    });    
        }
        });
        
     /***start check activate***/
      $('.activate').click(function(){
        result='#'+$(this).attr('id');
         $.ajax({
      url: $(this).attr('href'), 
      cache: false,
      success: function(html){
        $(result).html(html);
            
        //beready();
        }
    });    
         return false;
        });
    
     /***end check activate***/
    /***start check delete***/
      $('.delet').click(function(){
        co=confirmation();
        
        if(co==true){
        result='#'+$(this).attr('id');
         $.ajax({
      url: $(this).attr('href'), 
      cache: false,
      success: function(html){
        $(".place").html(html);
                  beready();
            
        
        }
    });   
        }
         return false;
        });
    
     /***end check delete***/
     
     
      $(".fastmenu").click(function(){
           var addressValue = $(this).attr("href");
           $(".place").html('<div style="padding-top:30px;width:100%;text-align:center;background:#FFF"><img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/ajax-13.gif" /></div>');
            setTimeout(function(){
            $.ajax({
      url: addressValue, 
      cache: false,
      success: function(html){
        $(".place").html(html);
        beready();
        }
    });    
                
                },800);
         
         
            return false;
            });
            
            }
$(document).ready(function() 
    { 
        beready();
        //get_totales();
        
        //$(".link").fancybox({'onComplete':function(){beready()}});
        /*
        $(".sf-menu li a").click(function(){
            
            
            $(".sf-menu li a ").removeClass('active');
            $(".sf-menu li  ").removeClass('active');
            $(this).addClass('active');
            if($(this).parent().parent().parent().is('li')){
            $(this).parent().parent().parent().addClass('active');
            }
           var addressValue = $(this).attr("href");
           $(".place").html('<div style="padding-top:30px;width:100%;text-align:center;background:#FFF"><img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/ajax-13.gif" /></div>');
            setTimeout(function(){
            $.ajax({
      url: addressValue, 
      cache: false,
      success: function(html){
        $(".place").html(html);
        beready();
        }
    });    
                
                },800);
         
         
            return false;
            });
            */
      

///search
 $(".search-button").click(function(){
            $values=$('#form-search').serialize();
           $(".place").html('<div style="padding-top:30px;width:100%;text-align:center;background:#FFF"><img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/ajax-13.gif" /></div>');
            setTimeout(function(){
            $.ajax({
      url:'<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>searches/find/', 
      cache: false,
          type:'post',
          data:$values,
      success: function(html){
        $(".place").html(html);
        beready();
        }
    });    
                
                },800);
         
         
            return false;
            });
            
    } 
); 


    </script>
        <script type="text/javascript">
function confirmation()
{
var r=confirm("delete ?");
if (r==true)
  {return true;}
else
  {return false;}
  
}

function getname(v){
    id=v.id;
    newid=id.split('_')[2];
    
     $.ajax({
      url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>purchases/getnames/'+v.value, 
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
            /*
            valuee=html.split(',')[4];
            jQuery("select#category_"+newid+" option[selected]").removeAttr("selected");
            jQuery("select#category_"+newid+" option[value='"+valuee+"'] ").attr("selected", "selected");
            */
        //jQuery("select#category_0 option[selected]").removeAttr("selected");

             updatetotal();
             
        }
    });    
    
    }
function getnumber(v){
    id=v.id;
    
    newid=id.split('_')[1];
    
     $.ajax({
      url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>purchases/getnumber/'+v.value, 
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
function getname1(v){
    id=v.id;
    newid=id.split('_')[2];
     $.ajax({
      url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>sales/getnames/'+v.value+'/'+$('#stockroom').val(), 
      cache: false,
      success: function(html){
              if(html.indexOf('Diagnostics')==-1){
            $("#barcode_"+newid).val(html.split(',')[0]);
            $("#unit_type_"+newid).val(html.split(',')[1]);
            $("#package_"+newid).val('1');
            $("#unit_"+newid).val('0');
            $("#sell_price_"+newid).val(html.split(',')[2]);
            $("#sell_discount_"+newid).val(html.split(',')[3]);
            $("#category_"+newid).val(html.split(',')[4]);
            $("#total_"+newid).val(html.split(',')[5]);
            $("#expire_date_"+newid).val(html.split(',')[6]);
            $("#packageunits_"+newid).val(html.split(',')[7]);
           
             updatetotal1();
             }
        }
    });    
    
    }
function getnumber1(v){
    id=v.id;
    
    newid=id.split('_')[1];
    
     $.ajax({
      url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>sales/getnumber/'+v.value+'/'+$('#stockroom').val(), 
      cache: false,
      success: function(html){
            if(html.indexOf('Diagnostics')==-1){
        //$(".place").html(html);
            //$("#barcode_"+newid).val(html.split(',')[0]);
            $("#unit_type_"+newid).val(html.split(',')[1]);
            $("#package_"+newid).val('1');
            $("#unit_"+newid).val('0');
            $("#sell_price_"+newid).val(html.split(',')[2]);
            $("#sell_discount_"+newid).val(html.split(',')[3]);
            $("#category_"+newid).val(html.split(',')[4]);
            $("#expire_date_"+newid).val(html.split(',')[6]);
            
            valuee=html.split(',')[0];
            jQuery("select#item_name_"+newid+" option[selected]").removeAttr("selected");
            jQuery("select#item_name_"+newid+" option[value='"+valuee+"'] ").attr("selected", "selected");
            $("#total_"+newid).val(html.split(',')[5]);
        //jQuery("select#category_0 option[selected]").removeAttr("selected");
            
            $("#packageunits_"+newid).val(html.split(',')[7]);
             updatetotal1();
            }
            
        }
    });    
    
    }

function updatebill(v){
    if(v==null){alert('hi');}
     id=v.id;
     x=id.split('_');
     
    newid=id.split('_')[x.length-1];
    
    tot=(parseFloat($("#quantity_"+newid).val()))*parseFloat($("#unit_cost_"+newid).val());
    if(!isNaN(tot)){$("#total_"+newid).val(tot);}else{$("#total_"+newid).val('0');}
    
    //ak
     id=$("#options-table tr:last input:first").attr('id');
     
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
function updatebill_invoice(v){
    if(v==null){alert('hi');}
     id=v.id;
     x=id.split('_');
     
    newid=id.split('_')[x.length-1];
    
    tot=(parseFloat($("#quantity_"+newid).val()))*parseFloat($("#unit_cost_"+newid).val());
    if(!isNaN(tot)){$("#total_"+newid).val(tot);}else{$("#total_"+newid).val('0');}
    
    //ak
     id=$("#options-table tr:last input:first").attr('id');
     
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
function updateval(v){
     id=v.id;
     x=id.split('_');
     
    newid=id.split('_')[x.length-1];
    
    tot=parseFloat($("#quantity_"+newid).val())*parseFloat($("#price_"+newid).val());
    
    tot1=(tot*parseFloat($("#discount_"+newid).val())/100);
    
    if(!isNaN(tot-tot1)){$("#total_"+newid).val(tot-tot1);}else{$("#total_"+newid).val('0');}
    
    updatetotal();
   
    
    }
function updateval1(v){
     id=v.id;
     x=id.split('_');
     
    newid=id.split('_')[x.length-1];
    
    tot=parseFloat($("#quantity_"+newid).val())*parseFloat($("#price_"+newid).val());
    tot1=(tot*parseFloat($("#discount_"+newid).val())/100);
    if(!isNaN(tot-tot1)){$("#total_"+newid).val(tot-tot1);}else{$("#total_"+newid).val('0');}
    updatetotal1();
   
    
    }
 function updatetotal(){
      id=$("#options-table tr:last input:first").attr('id');
    var newStr = id.split('_')[1];
    var vv=0;
    for(x=0;x<=newStr;x++){
       vv=vv+parseFloat($("#total_"+x).val());
        }
    $("#total_value").val(vv.toFixed(2));
     }
     
 function updatetotal1(){
      id=$("#options-table1 tr:last input:first").attr('id');
    var newStr = id.split('_')[1];
    var vv=0;
    for(x=0;x<=newStr;x++){
       vv=vv+parseFloat($("#total_"+x).val());
        }
    $("#total_value").val(vv.toFixed(2));
     }
     
function printit(title){
    var r=confirm("print page header and footer ?");
if (r==true)
  {$('.printable').printElement({pageTitle:title});}
else
  {$('.print_h').html('');$('.printable').printElement({pageTitle:title});}

    
    }


</script>
<script type="text/javascript">
  function uploadimg(place,name,id,type)
  {
    $("#loading")
    .ajaxStart(function(){
      $(this).show();
    })
    .ajaxComplete(function(){
      $(this).hide();
    });
    $.ajaxFileUpload
    (
      {
        
                
                url:'<?php  echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>'+type+'/uploadimg/'+name,
        secureuri:false,
        fileElementId:id,
        dataType: 'json',
        data:{name:'logan', id:'id' ,folder:'photo'},
        success: function (data, status)
        {
          if(typeof(data.error) != 'undefined')
          {
            if(data.error != '')
            {
              alert(data.error);
            }else
            {
              alert('Upload done');
              $('.'+place).html("<img src='<?php  echo Doo::conf()->APP_URL; ?>global/uploads/"+type+"/"+data.msg+"' style='width:100px;'>");
                            
                            $('#hidden_'+name).val(data.msg);
                                
                            
            }
          }
        },
        error: function (data, status, e)
        {
          alert(e);
                    
        }
      }
    )
    
    return false;

  }
  </script>   

<script type="text/javascript">
  function ajaxFileUpload(v,type)
  {
    $("#loading")
    .ajaxStart(function(){
      $(this).show();
    })
    .ajaxComplete(function(){
      $(this).hide();
    });

    $.ajaxFileUpload
    (
      {
        
                
                url:'<?php  echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>'+type+'/upload',
        secureuri:false,
        fileElementId:v,
        dataType: 'json',
        data:{name:'logan', id:'id' ,folder:'photo'},
        success: function (data, status)
        {
          if(typeof(data.error) != 'undefined')
          {
            if(data.error != '')
            {
              alert(data.error);
            }else
            {
              alert('تم التحميل');
                            if(type=='photos'){
              $('.loadedimages').html("<img src='<?php  echo Doo::conf()->APP_URL; ?>global/uploads/"+type+"/"+data.msg+"' style='width:100px;'>");
                            $('#photo').val(data.msg);
                            $('#preflogo').val(data.msg);

                                }else{
              $('.loadedimages').html($('.loadedimages').html()+"<img src='<?php  echo Doo::conf()->APP_URL; ?>global/uploads/"+type+"/"+data.msg+"' style='width:100px;'>");
                            $('#photos').val($('#photos').val()+','+data.msg);
                            $('#preflogo').val(data.msg);
                                
                                }
            }
          }
        },
        error: function (data, status, e)
        {
          alert(e);
                    
        }
      }
    )
    
    return false;

  }
  </script> 
<script>
function certificateform(v){
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
function get_stock_itmes(v){
     $.ajax({
      url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>stockallocations/getitems/'+v, 
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
function get_delivery(v){
     $.ajax({
      url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>invoices/getitems/'+v, 
      cache: false,
      success: function(html){
              $('#options-table').html(html);
              get_totales();
        }
    });    
    
        }
function get_totales(){
    var sum=0;
        $(".totales").each(function() {
            sum += Number($(this).val());
        });
        $("#net_value").val(sum);
        update_totales();
    }
function get_delivery_itmes(v){
     $.ajax({
      url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>delivery/getitems/'+v, 
      cache: false,
      success: function(html){
              $('#options-table').html(html.split('#')[0]);
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
function getitmes(v){
     $.ajax({
      url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>certificates/getitems/'+v, 
      cache: false,
      success: function(html){
             $('#options-table').html(html);
             beready();
        }
    });    
    
    }
function getpurchase(v){
     $.ajax({
      url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>good/getpurchase/'+v, 
      cache: false,
      success: function(html){
             $('#options-table').html(html.split('#')[0]);
             $('#total_value').val(html.split('#')[1]);
        }
    });    
    
    }
function getaddress(v){
     $.ajax({
      url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>certificates/getaddress/'+v, 
      cache: false,
      success: function(html){
            
             $('#client_address').val(html);
        }
    });    
    
    }

function closetr(v){
    $(v).parent().parent().next().remove();
    $(v).parent().parent().remove();
    get_totales();
    }
    
function get_items(v){
         $.ajax({
      url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>stockallocations/get_items/'+v.value, 
      cache: false,
      success: function(html){
              $('#details_'+$(v).attr('id').split('_')[1]).val(html.split('#')[0]);
              $('#unit_cost_'+$(v).attr('id').split('_')[1]).val(html.split('#')[1]);
              $('#total_value_'+$(v).attr('id').split('_')[1]).val(html.split('#')[1]);
        }
    });    
  update_cost_value();
  
  }
function total(v){
     $('#total_'+$(v).attr('id').split('_')[1]).val($('#quantity_'+$(v).attr('id').split('_')[1]).val()*$('#unit_cost_'+$(v).attr('id').split('_')[1]).val());
     update_cost_value();
     update_profit();
    }

function update_totales(){
        net=$('#net_value').val();
        tax=$('#tax').val();
        total=(net*tax)/100;
        
        total=$('#total_value').val( parseFloat(net) + parseFloat(total) );
        
    }
function update_profit(){
        id=$("#options-table tr:last input:first").attr('id');
    var newStr = id.split('_')[1];
    var vv=0;
    for(x=0;x<=newStr;x++){
       vv=vv+parseFloat($("#total_"+x).val());
        }
    $("#cost_value").val(vv.toFixed(2));
    }
function update_cost_value(){
        id=$("#options-table tr:last input:first").attr('id');
    var newStr = id.split('_')[1];
    var vv=0;
    for(x=0;x<=newStr;x++){
       vv=vv+parseFloat($("#total_"+x).val());
        }
        profit=(vv*100)/$('#total_value').val();
        profit=100-profit;
    $("#percentage_profit").val(profit.toFixed(0)+'%');
    }
</script>
  </head>
  <body>
       <div class="container ">
       
     <div class="span-16 ">
        <div style="float:left;text-align:center;">
            <a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>"><img class="site-logo"  src="<?php  echo Doo::conf()->APP_URL; ?>global/uploads/<?php echo play::prefrances('logo'); ?>" ></a>
            <h4><?php echo $data['prefrances']->site_name; ?> </h4>
        </div>
      </div>
      <div class="span-8 last">
      <br>
        <div class="bordersoft search" >
            <form name="search" id="form-search" action="" method="post">
                <input type="text" class="search-field" name="search" value="Search Word" >
                <input type="submit" class="search-button" name="send" value="Search" >
                <input type="hidden" name="searchtype" value="fastsearch">
            </form>
        </div>
      </div>
      <div class="span-24 last" style="direction:ltr">
            Welcome 
        <strong><?php echo $_SESSION['username']['first_name']; ?></strong>
        &nbsp;&nbsp;|&nbsp;&nbsp;<a  href="<?php echo Doo::conf()->APP_URL ?>" target="_blank"><strong><img src="<?php echo Doo::conf()->APP_URL; ?>global/img/eye.png"> Preview</strong></a>
        &nbsp;&nbsp;|&nbsp;&nbsp;<a  href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>users/edit/<?php echo  $_SESSION['username']['id']; ?>" class="link">My Account </a>
        &nbsp;&nbsp;|&nbsp;&nbsp;<a  href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>users/editpass/<?php echo $_SESSION['username']['id']; ?>" class="link">Change Password</a>
        &nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php  echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>login/logout"><span style="color:red">Logout</span></a> 
        <img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/out.png">
      </div>
      <div class="span-24 last">
        <div class="borderhard" style="margin-top:30px;text-align:center;">
                <ul class="sf-menu">
                        <li class="last"><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>searches">Search<img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/search.png"></a></li>
            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>prefrances" >Prefrances<img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/prefrance.png"></a></li>
                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>reports">Reports<img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/report.png"></a></li>
                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>quotations">Quotations <img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/daily.png"></a></li>
                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>workorders">Work Orders <img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/daily.png"></a>
                        <ul>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>workorders">Work Orders <img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/daily.png"></a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>certificates">Certificates <img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/daily.png"></a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>delivery">Delivery Note <img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/daily.png"></a></li>
                            
                        </ul>
                        </li>
                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>purchases">Purchases<img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/daily.png"></a></li>
                        <!--
                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>returned">Refund<img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/daily.png"></a></li>
                        -->
                        <li>Accounts<img  src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/daily.png">
                            <ul>
                                <!--<li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>expenses">Expenses</a></li>-->
                                <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>banks">Our Bank Accounts</a></li>
                                <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>invoices">Invoices</a></li>
                                <!--<li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/income">Income Check</a></li>
                                <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/pay">Payment Check</a></li>-->
                            </ul>
                        </li>
                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>stockrooms">Stores<img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/item.png"></a>
                        <ul>
                                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>stockrooms">Stores</a></li>
                                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>items">Items</a></li>
                                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>stores">Stores Stock</a></li>
                                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>stockallocations">Stock Allocation</a></li>
                                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>good">Goods Receipts Note</a></li>
                                    </ul>
                        </li>
                        
                       
                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>users">Settings<img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/tool.png"></a>
                        <ul>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>users" >Users</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>groups" >Groups</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>clients">Clients</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>suppliers">Suppliers</a></li>
                            <!--<li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>towns">Towns</a></li>-->
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>otherbanks">Banks</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>categories">Categories</a></li>
                        </ul>
                        </li>
                        <li class="first"><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>articles">CMS<img src="<?php  echo Doo::conf()->APP_URL; ?>global/img/icons/edit.png"></a>
                        <ul>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>articles">Articles</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>services">Services</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>photos">Photos</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>contact">Messages</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>inspaction">Inspections Request</a></li>
                            <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>maillist">maillist</a></li>
                        </ul>
                        </li>
                    </ul>
        </div>
      </div>
      <div class="span-24 last ">
        <div class="borderhard place" style="margin-top:30px;text-align:center;">