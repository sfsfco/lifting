<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>quotations/insert" method="post">
<div class="span-9 ">Title</div>
<div class="span-15 last"><input type="text" name="title" id="title" class="required"></div>
<div class="span-9 ">Client</div>
<div class="span-15 last"><select name="client" id="client" class="required"><option value="">Select</option><?php foreach($data['clients'] as $client){ ?><option value="<?php echo $client->id ; ?>"><?php echo $client->name ; ?></option><?php } ?></select></div>
<div class="span-9 ">Request No</div>
<div class="span-15 last"><input type="text" name="request_no" id="request_no" class="required"></div>
<div class="span-9 ">Date </div>
<div class="span-15 last"><input type="text" name="quotation_date" id="quotation_date" class="date-pick required wide"></div>

<div class="span-9 ">Delivery Date </div>
<div class="span-15 last"><input type="text" name="delivery_date" id="delivery_date" class="date-pick required wide"></div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
				<td>Item</td><td>Qty</td><td>Description</td><td>S.W.L</td><td>Unit Cost</td><td>Total</td><td>Currency</td>
			</tr>
			<tr class="first">
                <td><input type="text" name="num_0" id="num_0" value='1' ></td>
                <td><input type="text" name="quantity_0" id="quantity_0" class="required" onkeyup="updatebill(this);" onchange="updatebill(this);"></td>
                <td><textarea name="details_0" id="details_0" class="required"></textarea></td>
                <td><input type="text" name="swl_0" id="swl_0" class="required"></td>
                <td><input type="text" name="unit_cost_0" id="unit_cost_0" class="required" onkeyup="updatebill(this);" onchange="updatebill(this);" ></td>
                <td><input type="text" name="total_0" id="total_0" class="required"></td>
                <td>
                    <select name="currency_0" id="currency_0" class="required">
                        <option value="1">EGP</option>
                        <option value="2">USD</option>
                    </select>
                </td>
                
                <input type="hidden" name="packageunits_0" id="packageunits_0" value="1">
                
			</tr>                  
		</table>
</div>
<div class="span-24 last" ><input type="button" value="Add Item" class="purchases-add"><input type="button" value="Remove Item" class="purchases-remove"></div>
<div class="span-24 last" >Net Value <input type="text" name="net_value" id="net_value"  value="0"></div>
<div class="span-24 last" >Tax <input type="text" name="tax" id="tax"  value="0" onkeyup="updatebill(this);" onchange="updatebill(this);"> &nbsp; Total Value <input type="text"  name="total_value" id="total_value"  value="0"></div>
<div class="span-24 last" style="text-align:center"><input type="submit" value="Add"></div>

</form>
</div>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>

