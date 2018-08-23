<div class="span-24 last printable result" style="text-align:left;direction:ltr;">
<span class="print_h">
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/print_header.php"); ?>
</span>
<div class="span-24 last" style="text-align:center"><h1 style="font-style:italic;">Work Order</h1></div>
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
				<td>Item</td><td>Qty</td><td>Description</td><td>S.W.L</td><td>P.L</td><td>Unit Cost</td><td>Total</td>
			</tr>
            <?php $x=0; foreach($data['quotationsdetails'] as $quotationsdetails){ ?>
			<tr <?php if($x==0){echo('class="first table-head"');}else{echo('class="table-head"');} ?> >
                <td><?php echo $x+1; ?></td>
                <td><?php  echo $quotationsdetails->quantity; ?></td>
                <td style="text-align:left;"><?php  echo nl2br($quotationsdetails->details); ?></td>
                <td><?php  echo $quotationsdetails->swl; ?></td>
                <td><?php  echo $quotationsdetails->pl; ?></td>
                <td><?php  echo $quotationsdetails->unit_cost; ?></td>
                <td><?php  echo $quotationsdetails->total; ?></td>
			</tr>
            <?php $x++;} ?>
            <tr>
                <td colspan="2">Net Value : <span style="color:#bf0000;"><?php echo $data['quotation']->net_value; ?></span></td>
                <td colspan="2">Tax : <span style="color:#bf0000;"><?php echo $data['quotation']->tax; ?></span>% </td>
                <td colspan="3">Total Value : <span style="color:#bf0000;"><?php echo $data['quotation']->total_value; ?></span></td>
            </tr>
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

<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit('Quotation Details')" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="Print" alt="Print" ></a>
</div>
