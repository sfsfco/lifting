<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <meta name="keywords" content="<?php echo $data['prefrances']->meta; ?>">
		<title><?php echo $data['prefrances']->site_name; ?></title>
		    <!-- Framework CSS -->
    <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/blueprint/screen.css" type="text/css" media="screen, projection,print">
    <!--<link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/blueprint/print.css" type="text/css" media="print">-->
    <!--[if lt IE 8]><link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php  echo $data['rootUrl']; ?>global/css/superfish.css" media="screen">
<link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/my.css" type="text/css" media="screen, projection,print">
		<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/hoverIntent.js"></script>
		<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/superfish.js"></script>
		<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery.tablesorter.min.js"></script>
        
		<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery.validate.min.js"></script>
        
		<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery.printElement.js"></script>
		<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery.popupWindow.js"></script>
<!-- Load TinyMCE -->
<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/tiny_mce/jquery.tinymce.js"></script>
<!-- /TinyMCE -->

		<!--start upload-->
        
        <script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/ajaxupload/ajaxfileupload.js"></script>
		<!--end upload-->
        
        
        <link type="text/css" href="<?php  echo $data['rootUrl']; ?>global/js/jqueryui/css/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
        <script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jqueryui/js/jquery-ui-1.8.18.custom.min.js"></script>
        

		<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php  echo $data['rootUrl']; ?>global/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    
	

		<script type="text/javascript">
        /*
jQuery.extend(jQuery.validator.messages, {
    required: "حقل مطلوب",
    remote: "Please fix this field.",
    email: "Please enter a valid email address.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Please enter at least {0} characters."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});
*/
		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish({
                 delay:       700,                               // delay on mouseout 
        animation:   {opacity:'show',height:'show'},    // fade-in and slide-down animation 
        speed:       'fast'
                });
		});
        
        function beready(){
            /*
          $('.printing').click(function(){
               setTimeout(function(){
                $(this).printElement();
                },800);
              
              });  
        */
$('textarea.tinymce').tinymce({
			// Location of TinyMCE script
			script_url : '<?php  echo $data['rootUrl']; ?>global/js/tiny_mce/tiny_mce.js',

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
		  url: '<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>stores/filter/'+$(this).val(),
		  cache: false,
		  success: function(html){
		  	$(".place").html(html);
		  	beready();
		  	}
		});    
});
            
        $('#payment_for2').change(function(){
            $.ajax({
		  url: '<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>returned/getpaymentid/'+$(this).val()+'/'+ $('#payment_type').val(),
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
		  url: '<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>returned/getpaymentdetails/'+$(this).val(),
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
		  url: '<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>payments/getpaymentid1/'+$(this).val()+'/'+ $('#payment_type1').val(),
		  cache: false,
		  success: function(html){$('#payment_id1').html(html);}
		});    
        });
        $('#payment_type1').change(function(){
        $.ajax({
		  url: '<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>payments/paymenttype1/'+$(this).val(),
		  cache: false,
		  success: function(html){$('#payment_for1').html(html);}
		});    
        });        
        
        $('#payment_for').change(function(){
            $.ajax({
		  url: '<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>payments/getpaymentid/'+$(this).val()+'/'+ $('#payment_type').val(),
		  cache: false,
		  success: function(html){
              
             $('#payment_id').html(html);
		  	}
		});    
            });
        $('#payment_type').change(
        function(){
           
        $.ajax({
		  url: '<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>payments/paymenttype/'+$(this).val(),
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
        
       $(".sales-add").click(function(){
           vv1=$("#options-table1 #item_name_0").html();

           id=$("#options-table1 tr:last input:first").attr('id');
          var newStr = id.split('_')[1];
           newStr=parseInt(newStr)+1;
           
           var appendTxt ='<tr><td></td><td><input type="text" name="barcode_'+newStr+'" id="barcode_'+newStr+'" class="required wide" onchange="getnumber1(this);" onkeyup="getnumber1(this);"></td><td><select name="item_name_'+newStr+'" id="item_name_'+newStr+'" class="required" onchange="getname1(this);">'+vv1+'</select></td><td><input type="text" name="category_'+newStr+'" id="category_'+newStr+'" class="required"></td><td><input type="text" name="expire_date_'+newStr+'" id="expire_date_'+newStr+'" class="date-pick required"></td><td><input type="text" name="sell_price_'+newStr+'" id="sell_price_'+newStr+'" class="required" value="0" onchange="updateval1(this);" onkeyup="updateval1(this);"></td><td><input type="text" value="0" name="sell_discount_'+newStr+'" id="sell_discount_'+newStr+'" class="required" onchange="updateval1(this);" onkeyup="updateval1(this);"></td><td><input type="text" name="package_'+newStr+'" id="package_'+newStr+'" class="required" onchange="updateval1(this);" onkeyup="updateval1(this);"></td><td><input type="text" name="unit_'+newStr+'" id="unit_'+newStr+'" class="required" onchange="updateval1(this);" onkeyup="updateval1(this);"></td><td><input type="text" name="unit_type_'+newStr+'" id="unit_type_'+newStr+'" class="required"></td><td><input type="text" name="total_'+newStr+'" id="total_'+newStr+'" class="required"  ></td></tr><input type="hidden" name="packageunits_'+newStr+'" id="packageunits_'+newStr+'" value="1">';
           $("#options-table1 tr:last").after(appendTxt);
           $( ".date-pick" ).datepicker({ dateFormat: 'yy-mm-dd' });
           }); 
           $(".sales-remove").click(function(){
               if(!$("#options-table1 tr:last").hasClass("first")){$("#options-table1 tr:last").remove();}
           updatetotal();
           
           });
        
        
        
        $(".closeme").click(function(){$.fancybox.close();});
        $(".link").fancybox({'onComplete':function(){beready()}});
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
                  $(".place").html(html);
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
		  url: "<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>users/checkusername/"+$(this).val(), 
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
		  url: "<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>users/checkusername/"+$(this).val(), 
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
           $(".place").html('<div style="padding-top:30px;width:100%;text-align:center;background:#FFF"><img src="<?php  echo $data['rootUrl']; ?>global/img/ajax-13.gif" /></div>');
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
        
        //$(".link").fancybox({'onComplete':function(){beready()}});
        $(".sf-menu li a").click(function(){
            
            
            $(".sf-menu li a ").removeClass('active');
            $(".sf-menu li  ").removeClass('active');
            $(this).addClass('active');
            if($(this).parent().parent().parent().is('li')){
            $(this).parent().parent().parent().addClass('active');
            }
           var addressValue = $(this).attr("href");
           $(".place").html('<div style="padding-top:30px;width:100%;text-align:center;background:#FFF"><img src="<?php  echo $data['rootUrl']; ?>global/img/ajax-13.gif" /></div>');
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
            
      

///search
 $(".search-button").click(function(){
            $values=$('#form-search').serialize();
           $(".place").html('<div style="padding-top:30px;width:100%;text-align:center;background:#FFF"><img src="<?php  echo $data['rootUrl']; ?>global/img/ajax-13.gif" /></div>');
            setTimeout(function(){
            $.ajax({
		  url:'<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>searches/find/', 
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
		  url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>purchases/getnames/'+v.value, 
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
		  url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>purchases/getnumber/'+v.value, 
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
		  url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>sales/getnames/'+v.value+'/'+$('#stockroom').val(), 
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
		  url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>sales/getnumber/'+v.value+'/'+$('#stockroom').val(), 
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
function updateval(v){
     id=v.id;
     x=id.split('_');
     
    newid=id.split('_')[x.length-1];
    
    tot=(parseFloat($("#package_"+newid).val()))*parseFloat($("#purchase_price_"+newid).val());
    tot1=(tot*parseFloat($("#purchase_discount_"+newid).val())/100);
    if(!isNaN(tot-tot1)){$("#total_"+newid).val(tot-tot1);}else{$("#total_"+newid).val('0');}
    
    updatetotal();
   
    
    }
function updateval1(v){
     id=v.id;
     x=id.split('_');
     
    newid=id.split('_')[x.length-1];
    
    tot=(parseFloat($("#package_"+newid).val())+(parseFloat($("#unit_"+newid).val())/parseFloat($("#packageunits_"+newid).val())))*parseFloat($("#sell_price_"+newid).val());
    tot1=(tot*parseFloat($("#sell_discount_"+newid).val())/100);
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
				
                
                url:'<?php  echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>'+type+'/upload',
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
							$('.loadedimages').html("<img src='<?php  echo $data['rootUrl']; ?>global/uploads/"+type+"/"+data.msg+"' style='width:100px;'>");
                            $('#photo').val(data.msg);
                            $('#preflogo').val(data.msg);

                                }else{
							$('.loadedimages').html($('.loadedimages').html()+"<img src='<?php  echo $data['rootUrl']; ?>global/uploads/"+type+"/"+data.msg+"' style='width:100px;'>");
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
function get_stock_itmes(v){
     $.ajax({
		  url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>stockallocations/getitems/'+v, 
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
function get_delivery_itmes(v){
     $.ajax({
		  url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>delivery/getitems/'+v, 
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
		  url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>certificates/getitems/'+v, 
		  cache: false,
		  success: function(html){
             $('#options-table').html(html);
		  	}
		});    
    
    }
function getaddress(v){
     $.ajax({
		  url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>certificates/getaddress/'+v, 
		  cache: false,
		  success: function(html){
            
             $('#client_address').val(html);
		  	}
		});    
    
    }

function closetr(v){
    $(v).parent().parent().next().remove();
    $(v).parent().parent().remove();
    }
    
function get_items(v){
         $.ajax({
		  url: '<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>stockallocations/get_items/'+v.value, 
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
            <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>"><img class="site-logo"  src="<?php  echo $data['rootUrl']; ?>global/uploads/<?php echo $data['prefrances']->logo; ?>" ></a>
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
        <strong><?php echo $_SESSION['member_username']['first_name']; ?></strong>
        &nbsp;&nbsp;|&nbsp;&nbsp;<a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>users/edit/<?php echo  $_SESSION['member_username']['id']; ?>" class="link">My Account </a>
        &nbsp;&nbsp;|&nbsp;&nbsp;<a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>users/editpass/<?php echo $_SESSION['member_username']['id']; ?>" class="link">Change Password</a>
        &nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>main/logout"><span style="color:red">Logout</span></a> 
        <img src="<?php  echo $data['rootUrl']; ?>global/img/icons/out.png">
      </div>
      <div class="span-24 last">
        <div class="borderhard" style="margin-top:30px;text-align:center;">
            		<ul class="sf-menu">
                        <li class="last"><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>searches">Search<img src="<?php  echo $data['rootUrl']; ?>global/img/icons/search.png"></a></li>
						<li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>prefrances" >Prefrances<img src="<?php  echo $data['rootUrl']; ?>global/img/icons/prefrance.png"></a></li>
                        <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>reports">Reports<img src="<?php  echo $data['rootUrl']; ?>global/img/icons/report.png"></a></li>
                        <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>quotations">Quotations <img src="<?php  echo $data['rootUrl']; ?>global/img/icons/daily.png"></a></li>
                        <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>workorders">Work Orders <img src="<?php  echo $data['rootUrl']; ?>global/img/icons/daily.png"></a>
                        <ul>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>workorders">Work Orders <img src="<?php  echo $data['rootUrl']; ?>global/img/icons/daily.png"></a></li>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>certificates">Certificates <img src="<?php  echo $data['rootUrl']; ?>global/img/icons/daily.png"></a></li>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>delivery">Delivery Note <img src="<?php  echo $data['rootUrl']; ?>global/img/icons/daily.png"></a></li>
                            
                        </ul>
                        </li>
                        <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>purchases">Purchases<img src="<?php  echo $data['rootUrl']; ?>global/img/icons/daily.png"></a></li>
                        <!--
                        <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>returned">Refund<img src="<?php  echo $data['rootUrl']; ?>global/img/icons/daily.png"></a></li>
                        -->
                        <li>Accounts<img  src="<?php  echo $data['rootUrl']; ?>global/img/icons/daily.png">
                            <ul>
                                <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>expenses">Expenses</a></li>
                                <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>banks">Our Bank Accounts</a></li>
                                <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>payments/income">Income Check</a></li>
                                <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>payments/pay">Payment Check</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>stockrooms">Stores<img src="<?php  echo $data['rootUrl']; ?>global/img/icons/item.png"></a>
                        <ul>
                                        <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>stockrooms">Stores</a></li>
                                        <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>items">Items</a></li>
                                        <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>stores">Stores Stock</a></li>
                                        <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>stockallocations">Stock Allocation Sheets</a></li>
                                    </ul>
                        </li>
                        
                       
                        <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>users">Settings<img src="<?php  echo $data['rootUrl']; ?>global/img/icons/tool.png"></a>
                        <ul>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>users" >Users</a></li>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>groups" >Groups</a></li>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>clients">Clients</a></li>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>suppliers">Suppliers</a></li>
                            <!--<li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>towns">Towns</a></li>-->
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>otherbanks">Banks</a></li>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>categories">Categories</a></li>
                        </ul>
                        </li>
                        <li class="first"><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>articles">CMS<img src="<?php  echo $data['rootUrl']; ?>global/img/icons/edit.png"></a>
                        <ul>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>articles">Articles</a></li>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>photos">Photos</a></li>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>contact">Messages</a></li>
                            <li><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>maillist">maillist</a></li>
                        </ul>
                        </li>
                    </ul>
        </div>
      </div>
      <div class="span-24 last ">
        <div class="borderhard place" style="margin-top:30px;text-align:center;">
        	<div class="span-24 last">
            <div class="span-5 divbox">
            	<a class="fastmenu" href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>prefrances" >
            		<img width="64" src="<?php  echo $data['rootUrl']; ?>global/img/preferences.png">
            		<div>Prefrances</div>
            	</a>
                
            </div>
            <div class="span-5 divbox">
            	<a class="fastmenu" href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>sales">
            		<img width="64" src="<?php  echo $data['rootUrl']; ?>global/img/sales.png">
            		<div>Sales</div>
            	</a>
            </div>
            <div class="span-5 divbox">
            	<a class="fastmenu" href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>reports">
            		<img width="64" src="<?php  echo $data['rootUrl']; ?>global/img/reports.png">
            		<div>Reports</div>
            	</a>
            </div>
            <div class="span-5 divbox">
            	<a class="fastmenu" href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>stores">
            		<img width="64" src="<?php  echo $data['rootUrl']; ?>global/img/store.png">
            		<div>Stores</div>
            	</a>
            </div>
            <div class="span-4 last divbox">
            	<a class="fastmenu" href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>users" >
            		<img width="64" src="<?php  echo $data['rootUrl']; ?>global/img/employee.png">
            		<div>Users</div>
            	</a>
            	</div>
            
            
           	</div>
        </div>
      </div>
    </div>
    </body>
</html>
