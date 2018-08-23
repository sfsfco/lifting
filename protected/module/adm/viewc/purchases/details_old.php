<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-24 last printable result" style="text-align:left;direction:ltr;">
<div class="span-24 last">
<img  style="margin:10px 20px 20px 0px;width:150px;" src="<?php  echo $data['rootUrl']; ?>global/uploads/<?php echo $data['prefrances']->logo; ?>" >
</div>
<div class="span-9 ">Supplier</div>
<div class="span-15 last"><?php echo $data['purchaseslist'][0]->Purchases->supplier_name; ?></div>
<div class="span-9 ">Purchase Date </div>
<div class="span-15 last"><?php echo $data['purchaseslist'][0]->Purchases->purchase_date; ?></div>
<div class="span-9 ">Payment Method</div>
<div class="span-15 last"><?php echo $data['purchaseslist'][0]->Purchases->payment_method; ?></div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
				<td>Number</td>
				<td>Barcode</td>
				<td>Name</td>
				<td>Category</td>
				<td>Details</td>
                <td>Date</td>
                <td>Price</td>
                <td>Discount</td>
				<td>Total</td>
			</tr>
            <?php foreach($data['purchaseslist'] as $details){?>
            
			<tr class="first">
                <td><?php echo $details->id; ?></td>
                <td><?php echo $details->barcode; ?></td>
                <td>
                    <?php echo $details->item_name; ?>
                </td>
                <td><?php echo $details->category; ?></td>
                <td><?php echo nl2br($details->details); ?></td>
                <td><?php echo date('d-m-Y',strtotime($details->create_date)); ?></td>
                <td><?php echo $details->price; ?></td>
                <td><?php echo $details->discount; ?></td>
                <td><?php echo $details->total; ?></td>
                
			</tr>        
            <?php } ?>
		</table>
</div>
<div class="span-24 last" >Bill Total <span> <?php echo $data['purchaseslist'][0]->Purchases->total; ?></span></div>
    <div class="span-24 last">
        <hr>
        <?php echo(nl2br($data['prefrances']->contacts)); ?>
    </div>
</div>
<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit('purchase bill')" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="Print" alt="Print" ></a>
</div>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
