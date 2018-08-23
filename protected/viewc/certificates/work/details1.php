<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery.printElement.js"></script>

 <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/blueprint/screen.css" type="text/css" media="screen, projection,print">
 <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/my.css" type="text/css" media="screen, projection,print">
 <body>
       <div class="container ">
<div class="span-24 last printable result" style="text-align:left;direction:ltr;">
<span class="print_h">
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/print_header.php"); ?>
</span>
<div class="span-24 last" style="text-align:center">
    <h2>REPORT OF THOROUGH EXAMINATION</h2>
    <h2>AND / OR TEST OF LIFTING APPLIANCE OR ACCESSORY</h2>
    <h3>STATUTORY INSTRUMENTS 1998 No. 2307</h3>
    <h4>The Lifting Operations and Lifting Equipment Regulations 1998</h4>
    <h3>STATUTORY INSTRUMENTS 1992 No. 3073</h3>
    <h4>The Supply of Machinery (Safety) Regulations 1992</h4>
    <h3>STATUTORY INSTRUMENTS 1998 No. 2306</h3>
    <h4>The Provision and Use of Work Regulations 1998</h4>

</div>
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
<div class="span-6 ">Create Date </div>
<div class="span-6 last"><?php echo date('d-m-Y',strtotime($data['quotation']->create_date)); ?></div>

<div class="span-6 ">WorkOrder No</div>
<div class="span-6 "><span style="color:#bf0000;"><?php echo $data['quotation']->id; ?></span></div>
<div class="span-6 ">Delivery Date </div>
<div class="span-6 last"><span style="color:#bf0000;"><?php echo date('d-m-Y',strtotime($data['quotation']->delivery_date)); ?></span></div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr class="table-head">
				<td>IDENTIFICATION NO</td><td>Qty</td><td>DESCRIPTION OF EQUIPMENT</td><td>S.W.L</td><td>P.L</td>
			</tr>
            <?php $x=0; foreach($data['quotationsdetails'] as $quotationsdetails){ ?>
			<tr <?php if($x==0){echo('class="first table-head"');}else{echo('class="table-head"');} ?> >
                <td><?php  echo $quotationsdetails->id_no; ?></td>
                <td><?php  echo $quotationsdetails->quantity; ?></td>
                <td style="text-align:left;"><?php  echo nl2br($quotationsdetails->details); ?></td>
                <td><?php  echo $quotationsdetails->swl; ?></td>
                <td><?php  echo $quotationsdetails->pl; ?></td>
                
			</tr>
            <?php $x++;} ?>
            
		</table>
</div>
<div class="span-6">Raised By :</div> 
<div class="span-6"><?php echo $data['quotation']->create_by_name; ?></div> 
<div class="span-6">Reviewed By :</div> 
<div class="span-6 last"></div> 

<span class="print_h">
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/print_footer.php"); ?>
</span>
</div>
   </div>
    </body>
<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit('Quotation Details')" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="Print" alt="Print" ></a>
</div>
<script>
function printit(title){
    var r=confirm("print page header and footer ?");
if (r==true)
  {$('.printable').printElement({pageTitle:title});}
else
  {$('.print_h').html('');$('.printable').printElement({pageTitle:title});}

    
    } 
</script>