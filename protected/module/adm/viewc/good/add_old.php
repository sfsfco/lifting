<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>good/insert" method="post">
<div class="span-9 last">Purchase Order</div>
<div class="span-15">
<select id="purchase" name="purchase"  onchange="getpurchase(this.value)"><option value="">Select</option><?php foreach($data['purchases'] as $purchase){ ?><option value="<?php echo $purchase->id; ?>"><?php echo $purchase->id; ?></option><?php }?></select>
</div>
<div class="span-9 last">Date </div>
<div class="span-15"><input type="text" name="purchase_date" id="purchase_date" class="date-pick required wide"></div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
                <td>#</td>
                <td>Code</td>
                <td>Name</td>
                <td>َQuantity</td>
                <td>Unit Cost </td>
                <td>Discount</td>
                <td>Total</td>
			</tr>
			
		</table>
</div>
<div class="span-24 last" ><input type="button" value="Add Item" class="purchases-add"><input type="button" value="Remove Item" class="purchases-remove"></div>
<div class="span-24 last" >Total <input type="text" name="total_value" id="total_value"  value="0"></div>
<div class="span-24 last" >Payed <input type="text" name="paid_value" id="paid_value"  value="0"> &nbsp; Rest <input type="text" disabled="disabled" name="rest_value" id="rest_value"  value="0"></div>
<div class="span-24 last" style="text-align:center"><input type="submit" value="Add"></div>

</form>
</div>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>