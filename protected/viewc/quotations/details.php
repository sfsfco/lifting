<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <meta name="keywords" content="<?php echo $data['prefrances']->meta; ?>">
		<title><?php echo $data['prefrances']->site_name; ?></title>
        <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/blueprint/screen.css" type="text/css" media="screen, projection,print">
        <!--<link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/blueprint/print.css" type="text/css" media="print">-->
        <!--[if lt IE 8]><link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->

<style>
.bill-title {
font-family: 'titels7';
font-size: 20px;
font-weight: bold;
text-align: center;
height: 160px;
line-height: 175px;
}
hr{
    width:80%;
    background:#000;
    margin:15px auto;
    }
.table-head td{border:1px solid #C2C2C4;text-align:center;}
#options-table td{text-align:center;}
</style>
<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery.printElement.js"></script>
<script>
$(document).ready(function() 
    { 
        $('.printing').click(function(){
              $(this).printElement();
              });  
   } 
); 
function printit(title){
$('.printable').printElement({pageTitle:title});

    
    }
</script>
</head>
	<body>
       <div class="container " style="margin-top:35px;">
<div class="span-24 last printable result" style="text-align:left;direction:ltr;">
<span class="print_h">
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."module/adm/viewc/print_header.php"); ?>
</span>
<div class="span-24 last" style="text-align:center"><h1 style="font-style:italic;">QUOTATION</h1></div>
<div class="span-6 ">Title</div>
<div class="span-6"><?php echo $data['quotation']->title; ?></div>
<div class="span-6">QUOTATION NO.</div>
<div class="span-6 last"><?php echo $data['quotation']->id; ?></div>
<div class="span-6 ">Client</div>
<div class="span-6 "><?php echo $data['quotation']->client_name; ?></div>
<div class="span-6 ">Contact Person</div>
<div class="span-6 last"><?php echo $data['quotation']->client_contact; ?></div>
<div class="span-6 ">Request No</div>
<div class="span-6 "><?php echo $data['quotation']->request_no; ?></div>
<div class="span-6 ">Date </div>
<div class="span-6 last"><?php echo date('d-m-Y',strtotime($data['quotation']->quotation_date)); ?></div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr class="table-head">
				<td>Item</td><td>Qty</td><td style="width: 350px;">Description</td><td>S.W.L</td><td>Unit Cost</td><td>Total</td><td>Currency</td>
			</tr>
            <?php $x=0; foreach($data['quotationsdetails'] as $quotationsdetails){ ?>
			<tr <?php if($x==0){echo('class="first"');} ?> >
                <td><?php echo $x+1; ?></td>
                <td><?php  echo $quotationsdetails->quantity; ?></td>
                <td style="text-align:left;"><?php  echo nl2br($quotationsdetails->details); ?></td>
                <td><?php  echo $quotationsdetails->swl; ?></td>
                <td><?php  echo $quotationsdetails->unit_cost; ?></td>
                <td><?php  echo $quotationsdetails->total; ?></td>
                <td><?php  echo ($quotationsdetails->currency=='1')?'EGP':'USD'; ?></td>
			</tr>
            <?php $x++;} ?>
            <tr>
                <td colspan="2">Net Value : <span style="color:#bf0000;"><?php echo $data['quotation']->net_value; ?></span></td>
                <td colspan="2">Tax : <span style="color:#bf0000;"><?php echo $data['quotation']->tax; ?></span>% </td>
                <td colspan="2">Total Value : <span style="color:#bf0000;"><?php echo $data['quotation']->total_value; ?></span></td>
            </tr>
		</table>
</div>
<div class="span-24 last">
    Terms and Conditions:<br>

    <img src="<?php echo $data['rootUrl']; ?>global/img/yes.png">  All the above supplied with Specialised Lifting Services Test Certificate.<br>

    <img src="<?php echo $data['rootUrl']; ?>global/img/yes.png">  PRICES QUOTED ARE IN <span style="color:#bf0000;"><?php  echo ($data['quotationsdetails'][0]->currency=='1')?'EGP':'USD'; ?></span>.<br>

    <img src="<?php echo $data['rootUrl']; ?>global/img/yes.png">  10% sales tax will be added with our official invoice.<br>

    <img src="<?php echo $data['rootUrl']; ?>global/img/yes.png">  Delivery Date <?php echo date('d-m-Y',strtotime($data['quotation']->delivery_date)); ?>.<br>

    <img src="<?php echo $data['rootUrl']; ?>global/img/yes.png">  Above quotation is based on using a genuine BASH-P UK Wire Ropes and lifting accessories to complying with European standards to ensure a full traceability of material and suppliers thought the manufacturing process and for the users a long term safety
</div>
<div class="span-24 last" style="text-align:center;font-weight:bold;">QUOTED BY <?php echo $data['quotation']->create_by_name; ?> FOR <?php echo $data['quotation']->client_name; ?></div>
<span class="print_h">
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."module/adm/viewc/print_footer.php"); ?>
</span>
</div>

<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit('Quotation Details')" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="Print" alt="Print" ></a>
</div>
</div>
 </body>
</html>
