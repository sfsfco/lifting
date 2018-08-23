<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <meta name="keywords" content="<?php echo $data['prefrances']->meta; ?>">
		<title><?php echo ($data['invoices']->taxed=='1')?"ORIGINAL INVOICE":"ORIGINAL INVOICE"; ?></title>

<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery.printElement.js"></script>

 
</head> 
 <body>
    <div class="container showgrid">






<!--start ak-->
<div class="span-24 last printable result " >
    <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/blueprint/screen.css" type="text/css" media="screen, projection,print">
 <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/blueprint/print.css" type="text/css" media="print">
 <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/print.css" type="text/css" media="screen, print">


    <div class="span-6 prepend-2">
        <img style="height:120px;" src="<?php echo $data['rootUrl']; ?>global/uploads/logo_old.png">
    </div>
    <div class="span-14 append-2 last" style=" font-size: 23px; font-weight: bold;padding: 37px 0px; text-align: center;">
        <?php echo ($data['invoices']->taxed=='1')?"ORIGINAL INVOICE":"ORIGINAL INVOICE"; ?>
    </div>
    <div class="span-24 last"></div>
    
    
    <div class="span-10 prepend-2" style=" padding-top: 10px; ">
        <?php echo $data['prefrances']->contacts; ?><br>EMAIL : operations@sls-egypt.com / finance@sls-egypt.com<br>WEB   : www.sls-egypt.com    
        <div class="span-10 last boxs" style="margin: 10px 0px;height: 84px;">&nbsp;&nbsp;&nbsp;
        Bill To     : <?php echo $data['client']->name;?>
        
        
        </div>
        <div class="span-10 center last boxs">
            <div class="span-10 last head">
                <div class="span-4 ">Quotation NO.</div>
                <div class="span-6  last">Job Title</div>
            </div>            
            <div class="span-10 last"></div>
            <div class="span-4"><?php echo $data['quotation']->id; ?></div>
            <div class="span-6 last"><?php echo $data['quotation']->title; ?></div>
        </div>
    </div>

    <div class="span-10 append-2 last  center">
       <?php  if($data['invoices']->taxed=='1'){ ?><div class="span-10 last">TAX ID : <?php echo $data['prefrances']->tax_id; ?></div><?php } ?> 
        <div class="span-10 last boxs">
        <div class="span-10 last head">SLS Bank Details</div>
        <?php if(isset($data['bank']->name)){ ?>
            <?php echo $data['bank']->name; ?><br>
            BRANCH          : <?php echo $data['bank']->branch; ?><br>
            ACC NAME     : <?php echo $data['bank']->account_name; ?><br>
            ACC.NO.          : <?php echo $data['bank']->number; ?><br>
            SWIFT CODE : <?php echo $data['bank']->swift_code; ?><br>
        <?php }?>
        </div>
        
        
        <div class="span-10 last boxs">
            <div class="span-10 last head">
                <div class="span-3 ">PO No.</div>
                <div class="span-3 ">Invoice NO,</div>
                <div class="span-4  last">Date</div>
            </div>            
            <div class="span-10 last"></div>
            <div class="span-3"><?php echo $data['invoices']->po; ?></div>
            <div class="span-3"><?php echo $data['invoices']->serial; ?></div>
            <div class="span-4 last"><?php echo date('d/m/Y',strtotime($data['invoices']->create_date)); ?></div>
        </div>
        
        <div class="span-10 last boxs">
            <div class="span-10 last head">
                <div class="span-4">Delivary note No,</div>
                <div class="span-6 last">Delivary Date</div>
            </div>
            <div class="span-10 last"></div>
            <div class="span-4"><?php echo $data['invoices']->delivery_note; ?></div>
            <div class="span-6 last"><?php echo date('d/m/Y',strtotime($data['invoices']->delivery_date)); ?></div>
        </div>
        
    </div>
    <div class="span-24 last"></div>
    <div class="span-20 append-2 prepend-2 last">
    <div class="span-20 boxs last">
        <div class="span-20  head ">
            <div class="span-2 center">Item</div>
            <div class="span-6 center">Description</div>
            <div class="span-4 center">Quantity</div>
            <div class="span-4 center">Unit price</div>
            <div class="span-4 center last">Total Price</div>
        </div>        
        <div class="span-20 last"><hr></div>
        <?php foreach($data['items'] as $item){ ?>
        <div class="span-2 center"><?php echo $item->id; ?></div>
        <div class="span-6"><?php echo $item->details; ?></div>
        <div class="span-4 center"><?php echo $item->quantity; ?></div>
        <div class="span-4 center"><?php echo $item->unit_cost; ?></div>
        <div class="span-4 center last"><?php echo $item->total; ?></div>
        <div class="span-20 last"><hr></div>
        <?php }?>
        
        
        
        <div class="span-8 last"><div style="padding-left:5px;"><?php echo play::convert_number_to_words($data['total']); ?></div></div>
        <div class="span-12 last boxs">
            <div class="span-12 last head">
                <div class="span-8 border center">TOTAL</div>
                <div class="span-4 last center"><?php echo $data['total']; ?></div>    
            </div>
            <?php  if($data['invoices']->taxed=='1'){ ?>
            <div class="span-12 last">
                <div class="span-8">VAT %<?php echo $data['invoices']->tax; ?></div>
                <div class="span-4 last center"><?php echo ceil(($data['total']*$data['invoices']->tax)/100); ?></div>    
            </div>
            <div class="span-12 last head">
                <div class="span-8">TOTAL PLUS VAT</div>
                <div class="span-4 last center"><?php echo ceil(($data['total']*$data['invoices']->tax)/100)+$data['total']; ?></div>    
            </div>
            <?php } ?> 
        </div>
            
        <div class="span-20 last"></div>
        
        
    </div>
    </div>

 
</div>
<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit('Quotation Details')" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="Print" alt="Print" ></a>
</div>

</div>


</body>
<script>
function printit(title){
    //alert($('.printable').height());
    var r=confirm("print page header and footer ?");
if (r==true)
  {$('.printable').printElement({
    pageTitle:$('title').html(),
    overrideElementCSS:[{ href:'<?php  echo $data["rootUrl"]; ?>global/css/blueprint/screen.css',media:'print'},
                        { href:'<?php  echo $data["rootUrl"]; ?>global/css/blueprint/print.css',media:'print'},
                        { href:'<?php  echo $data["rootUrl"]; ?>global/css/print.css',media:'print'}
                        ]
    });
}
else
  {$('.print_h').html('');$('.printable').printElement({pageTitle:$('title').html()});}

    
    } 
</script>

</html>