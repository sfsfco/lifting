<div class="span-24 last printable result" style="text-align:left;direction:ltr;">
<div class="span-24 last">
<img style="margin:10px 20px 20px 0px;width:150px;"  src="<?php  echo $data['rootUrl']; ?>global/uploads/<?php echo $data['prefrances']->logo; ?>" >
</div>

<div class="span-9 ">Client</div>
<div class="span-15 last"><?php echo $data['saleslist'][0]->Sales->client_name; ?></div>
<div class="span-9 ">Sell Date </div>
<div class="span-15 last"><?php echo $data['saleslist'][0]->Sales->sell_date; ?></div>
<div class="span-9 ">Payment Method</div>
<div class="span-15 last"><?php echo $data['saleslist'][0]->Sales->payment_method; ?></div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
                <td>Total</td>
                <td>Item</td>
                <td>Sales Discount</td>
                <td>Sales Price</td>
                <td>Expire</td>
                <td>Category</td>
                <td>Name</td>
                <td>Barcode</td>
				<td>Number</td>
			</tr>
            <?php foreach($data['saleslist'] as $details){?>
            
			<tr class="first">
                <td><?php echo $details->total; ?></td>
                <td><?php echo $details->package; ?></td>
                <td><?php echo $details->sell_discount; ?></td>
                <td><?php echo $details->sell_price; ?></td>
                <td><?php echo $details->expire_date; ?></td>
                <td><?php echo $details->category; ?></td>
                <td>
                    <?php echo $details->item_name; ?>
                </td>
                <td><?php echo $details->barcode; ?></td>
                <td><?php echo $details->id; ?></td>
			</tr>        
            <?php } ?>
		</table>
</div>
<div class="span-24 last" >Total Value <span><?php echo $data['saleslist'][0]->Sales->total; ?></span></div>
</div>
<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit('sales bill')" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="Print" alt="Print" ></a>
</div>


