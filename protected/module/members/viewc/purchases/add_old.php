<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>purchases/insert" method="post">
<div class="span-9 ">Supplier</div>
<div class="span-15 last"><select name="supplier" id="supplier" class="required"><option value="">Select</option><?php foreach($data['suppliers'] as $supplier){ ?><option value="<?php echo $supplier->id ; ?>"><?php echo $supplier->name ; ?></option><?php } ?></select></div>
<div class="span-9 ">Store</div>
<div class="span-15 last">
<select name="stockroom" id="stockroom" class="required">
    <?php foreach($data['stockrooms'] as $stockroom){?>
    <option value="<?php echo $stockroom->id; ?>"><?php echo $stockroom->name; ?></option>
    <?php }?>
    
</select>
</div>
<div class="span-9 last">Date </div>
<div class="span-15"><input type="text" name="purchase_date" id="purchase_date" class="date-pick required wide"></div>
<div class="span-9 last">Payment Method</div>
<div class="span-15">
    <input type="radio" id="payment_method0" name="payment_method" value="0" checked="checked"> Monetary
    <input type="radio" id="payment_method1" name="payment_method" value="1"> Check
    <select id="banks" name="banks" disabled="disabled"><?php foreach($data['banks'] as $bank){ ?><option value="<?php echo $bank->id; ?>"><?php echo $bank->name; ?></option><?php }?></select>
</div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
                <td>#</td>
                <td>Code</td>
                <td>Name</td>
                <td>Details</td>
                <td>َQuantity</td>
                <td>Unit Cost </td>
                <td>Discount</td>
                <td>Total</td>
			</tr>
			<tr class="first">
				<td></td>
                <input type="hidden" name="packageunits_0" id="packageunits_0" value="1">
                <td><input type="text" name="barcode_0" id="barcode_0" class="required wide" onchange="getnumber(this);" onkeyup="getnumber(this);"></td>
                <td>
                    <select name="item_name_0" id="item_name_0" class="required" onchange="getname(this);">
                        <option value="">Select</option>
                        <?php foreach($data['items'] as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option><?php } ?>
                    </select>
                </td>
                <td>
                    <textarea name="details_0" id="details_0" style="height:30px;"></textarea>
                </td>
                <td><input type="text" name="quantity_0" id="quantity_0" value="0" class="required" onchange="updateval(this);" onkeyup="updateval(this);"></td>
                <td><input type="text" name="price_0" id="price_0" value="0" class="required" onchange="updateval(this);" onkeyup="updateval(this);"></td>
                <td><input type="text" name="discount_0" id="discount_0" value="0" class="required" onchange="updateval(this);" onkeyup="updateval(this);"></td>
                <td><input type="text" name="total_0" id="total_0" value="0" class="required"></td>   
			</tr>    
		</table>
</div>
<div class="span-24 last" ><input type="button" value="Add Item" class="purchases-add"><input type="button" value="Remove Item" class="purchases-remove"></div>
<div class="span-24 last" >Total <input type="text" name="total_value" id="total_value"  value="0"></div>
<!--<div class="span-24 last" >Payed <input type="text" name="paid_value" id="paid_value"  value="0"> &nbsp; Rest <input type="text" disabled="disabled" name="rest_value" id="rest_value"  value="0"></div>-->
<div class="span-24 last" style="text-align:center"><input type="submit" value="Add"></div>

</form>
</div>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
