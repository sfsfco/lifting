<div class="span-24 last printable result" style="text-align:left;direction:ltr;">
<span class="print_h">
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/print_header.php"); ?>
</span>

<div class="span-24 last" style="text-align:center"><h1 style="font-style:italic;">DELIVERY NOTE</h1></div>
<div class="span-6 ">Title</div>
<div class="span-6"><?php echo $data['delivery']->title; ?></div>
<div class="span-6">Delivery NO.</div>
<div class="span-6 last"><?php echo $data['delivery']->id; ?></div>
<div class="span-6 ">Client</div>
<div class="span-6 "><?php echo $data['delivery']->client_name; ?></div>
<div class="span-6 ">Contact Person</div>
<div class="span-6 last"><?php echo $data['delivery']->delivery_to; ?></div>
<div class="span-6 ">Request No</div>
<div class="span-6 "><?php echo $data['delivery']->request_no; ?></div>
<div class="span-6 ">Create Date </div>
<div class="span-6 last"><?php echo date('d-m-Y',strtotime($data['delivery']->create_date)); ?></div>

<div class="span-6 ">WorkOrder No</div>
<div class="span-6 "><span style="color:#bf0000;"><?php echo $data['delivery']->id; ?></span></div>
<div class="span-6 ">Delivered Date </div>
<div class="span-6 last"><span style="color:#bf0000;"><?php echo date('d-m-Y',strtotime($data['delivery']->delivery_date)); ?></span></div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr class="table-head">
				<td>Item</td><td>Qty</td><td>Description</td><td>S.W.L</td><td>P.L</td>
			</tr>
            <?php $x=0; foreach( $data['deliverydetails'] as $deliverydetails){ ?>
			<tr <?php if($x==0){echo('class="first table-head"');}else{echo('class="table-head"');} ?> >
                <td><?php echo $x+1; ?></td>
                <td><?php  echo $deliverydetails->quantity; ?></td>
                <td style="text-align:left;"><?php  echo nl2br($deliverydetails->details); ?></td>
                <td><?php  echo $deliverydetails->swl; ?></td>
                <td><?php  echo $deliverydetails->pl; ?></td>
              
			</tr>
            <?php $x++;} ?>
            
		</table>
</div>
<div class="span-6">Delivered By :</div> 
<div class="span-6"><?php echo $data['delivery']->create_by_name; ?></div> 
<div class="span-6">Reviewed By :</div> 
<div class="span-6 last"></div> 

<span class="print_h">
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/print_footer.php"); ?>
</span>
</div>

<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit('Delivery Details')" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="Print" alt="Print" ></a>
</div>
