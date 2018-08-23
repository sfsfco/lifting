<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>invoices/insert" method="post">
<div class="span-9 ">Title</div>
<div class="span-15 last"><select name="name" id="name" class="required"><option value="select"></option><option value="supply">Supply</option><option value="services">Services</option></select></div>
<div class="span-9 ">Workorder</div>
<div class="span-15 last"><select name="delivery_note" id="delivery_note" class="required" onchange='get_delivery(this.value)'><option value="">Select</option><?php foreach($data['workorders'] as $workorder){ ?><option value="<?php echo $workorder->id ; ?>"><?php echo $workorder->id ; ?>[<?php echo $workorder->delivery_date ; ?>]</option><?php } ?></select></div>
<div class="span-9 ">Invoice Date</div>
<div class="span-15 last"><input type="text" name="delivery_date" id="delivery_date" class="date-pick required wide"></div>
<div class="span-9 ">Taxed</div>
<div class="span-15 last">
    <input type='radio' name='taxed' value='0'> taxed  
    <input type='radio' name='taxed' value='1' checked='checked'> none taxed  
</div>

<div class="span-9 ">bank</div>
<div class="span-15 last"><select name="bank" id="bank" class="required"><option value="">Select</option><?php foreach($data['bank'] as $bank){ ?><option value="<?php echo $bank->id ; ?>"><?php echo $bank->name ; ?></option><?php } ?></select></div>


<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
				<td>Item</td><td>Qty</td><td>Description</td><td>Unit Cost</td><td>Total</td>
			</tr>
			<tr >
            

                <td><input type="text" name="num_0" id="num_0" value='1' ></td>
                <td><input type="text" name="quantity_0" id="quantity_0" class="required" onkeyup="updatebill_invoice(this);" onchange="updatebill_invoice(this);"></td>
                <td><textarea name="details_0" id="details_0" class="required"></textarea></td>
                <td><input type="text" name="swl_0" id="swl_0" class="required"></td>
                <td><input type="text" name="unit_cost_0" id="unit_cost_0" class="required" onkeyup="updatebill_invoice(this);" onchange="updatebill_invoice(this);" ></td>
                <td><input type="text" name="total_0" id="total_0" class="required"></td>
                
                <input type="hidden" name="packageunits_0" id="packageunits_0" value="1">
                
                
			</tr>                  
		</table>
</div>

<div class="span-24 last" >Net Value <input type="text" name="net_value" id="net_value"  value="0"></div>
<div class="span-24 last" >Tax <input type="text" name="tax" id="tax"  value="0" onkeyup="updatebill_invoice(this);" onchange="updatebill_invoice(this);"> &nbsp; Total Value <input type="text"  name="total_value" id="total_value"  value="0"></div>


<div class="span-24 last" style="text-align:center"><input type="submit" value="Add"></div>

</form>
</div>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>