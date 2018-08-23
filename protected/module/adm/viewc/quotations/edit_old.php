<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>quotations/update" method="post" >
<div class="span-9 ">Title</div>
<div class="span-15 last"><input type="text" name="title" id="title" class="required" value="<?php echo $data['quotation']->title; ?>"></div>
<div class="span-9 ">Client</div>
<div class="span-15 last"><select name="client" id="client" class="required"><option value="<?php echo $data['quotation']->client; ?>"><?php echo $data['quotation']->client_name; ?></option><?php foreach($data['clients'] as $client){ ?><option value="<?php echo $client->id ; ?>"><?php echo $client->name ; ?></option><?php } ?></select></div>
<div class="span-9 ">Request No</div>
<div class="span-15 last"><input type="text" name="request_no" id="request_no" class="required" value="<?php echo $data['quotation']->request_no; ?>"></div>
<div class="span-9 ">Date </div>
<div class="span-15 last"><input type="text" name="quotation_date" id="quotation_date" class="date-pick required wide" value="<?php echo date('d-m-Y',strtotime($data['quotation']->quotation_date)); ?>"></div>

<div class="span-9 ">Delivery Date </div>
<div class="span-15 last"><input type="text" name="delivery_date" id="delivery_date" class="date-pick required wide" value="<?php echo date('d-m-Y',strtotime($data['quotation']->delivery_date)); ?>"></div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
				<td>Item</td><td>Qty</td><td>Description</td><td>S.W.L</td><td>Unit Cost</td><td>Total</td><td>Currency</td>
			</tr>
            <?php $x=0; foreach($data['quotationsdetails'] as $quotationsdetails){ ?>
			<tr <?php if($x==0){echo('class="first"');} ?> >
                <td><input type="text" name="num_<?php echo $x; ?>" id="num_<?php echo $x; ?>" value='<?php echo $x+1; ?>' ></td>
                <td><input type="text" name="quantity_<?php echo $x; ?>" id="quantity_<?php echo $x; ?>" class="required" value="<?php  echo $quotationsdetails->quantity; ?>" onkeyup="updatebill(this);" onchange="updatebill(this);"></td>
                <td><textarea name="details_<?php echo $x; ?>" id="details_<?php echo $x; ?>" class="required"><?php  echo $quotationsdetails->details; ?></textarea></td>
                <td><input type="text" name="swl_<?php echo $x; ?>" id="swl_<?php echo $x; ?>" value="<?php  echo $quotationsdetails->swl; ?>" class="required"></td>
                <td><input type="text" name="unit_cost_<?php echo $x; ?>" id="unit_cost_<?php echo $x; ?>" value="<?php  echo $quotationsdetails->unit_cost; ?>" class="required" onkeyup="updatebill(this);" onchange="updatebill(this);" ></td>
                <td><input type="text" name="total_<?php echo $x; ?>" id="total_<?php echo $x; ?>" value="<?php  echo $quotationsdetails->total; ?>" class="required"></td>
            <td>
                    <select name="currency_<?php echo $x; ?>" id="currency_<?php echo $x; ?>" class="required">
                        <option value="1" >EGP</option>
                        <option value="2" <?php echo($quotationsdetails->currency=='2')?"selected='selected'":""; ?>>USD</option>
                    </select>
                </td>
                </tr>
            <?php $x++;} ?>
		</table>
</div>
<div class="span-24 last" ><input type="button" value="Add Item" class="purchases-add"><input type="button" value="Remove Item" class="purchases-remove"></div>
<div class="span-24 last" >Net Value <input type="text" name="net_value" id="net_value"   value="<?php echo $data['quotation']->net_value; ?>"></div>
<div class="span-24 last" >Tax <input type="text" name="tax" id="tax"   value="<?php echo $data['quotation']->tax; ?>" onkeyup="updatebill(this);" onchange="updatebill(this);"> &nbsp; Total Value <input type="text"  name="total_value" id="total_value"  value="<?php echo $data['quotation']->total_value; ?>"></div>
<div class="span-24 last" style="text-align:center"><input type="submit" value="Edit"></div>
<input type="hidden" name="old_id" id="old_id" value="<?php echo $data['quotation']->id; ?>">
</form>
</div>

