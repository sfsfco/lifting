<div class="span-24 last result" style="text-align:right;direction:rtl;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?>sales/insert" method="post">
<div class="span-15"><select name="client" id="client" class="required"><option value="">إختر</option><?php foreach($data['clients'] as $client){ ?><option value="<?php echo $client->id ; ?>"><?php echo $client->name ; ?></option><?php } ?></select></div>
<div class="span-9 last">العميل</div>
<div class="span-15">
<select name="stockroom" id="stockroom" class="required">
    <?php foreach($data['stockrooms'] as $stockroom){?>
    <option value="<?php echo $stockroom->id; ?>"><?php echo $stockroom->name; ?></option>
    <?php }?>
    
</select>
</div>
<div class="span-9 last">المخزن</div>
<div class="span-15"><select name="payment_method" id="payment_method" class="required"><option value="نقدي">نقدي</option><option value="أجل">أجل</option></select></div>
<div class="span-9 last">طريق الدفع</div>
<div class="span-15">
    <input type="radio" id="payment_method0" name="payment_method" value="0" checked="checked">(نقدا - جزئي - أجل)
    <input type="radio" id="payment_method1" name="payment_method" value="1"> صك
    <select id="banks" name="banks" disabled="disabled"><?php foreach($data['banks'] as $bank){ ?><option value="<?php echo $bank->id; ?>"><?php echo $bank->name; ?></option><?php }?></select>
    <input type="text" name="bank_no" id="bank_no" disabled="disabled" >
</div>
<div class="span-9 last">طريق الدفع</div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table1">					
			<tr>
				<td>#</td>
				<td>باركود</td>
				<td>الإسم</td>
				<td>التصنيف</td>
                <td>الصلاحية</td>
                <td>سعر البيع</td>
                <td>خصم البيع</td>
				<td>العبوة</td>
				<td>الوحدة</td>
				<td>نوع الوحدة</td>
				<td>إجمالي</td>
			</tr>
			<tr class="first">
				<td>
                    <div class='sales-add'>+</div><div class='sales-remove'>-</div>
                </td>
                <td><input type="text" name="barcode_0" id="barcode_0" class="required wide" onchange="getnumber1(this);" onkeyup="getnumber1(this);"></td>
                <td>
                    <select name="item_name_0" id="item_name_0" class="required" onchange="getname1(this);">
                        <option value="">إختر</option>
                        <?php foreach($data['stores'] as $store){ ?><option value="<?php echo $store->item; ?>"><?php echo $store->name; ?></option><?php } ?>
                    </select>
                </td>
                <td><input type="text" name="category_0" id="category_0" class="required"></td>
                <td><input type="text" name="expire_date_0" id="expire_date_0" class="date-pick required"></td>
                <td><input type="text" name="sell_price_0" id="sell_price_0" value="0" class="required" onchange="updateval1(this);" onkeyup="updateval1(this);"></td>
                <td><input type="text" name="sell_discount_0" id="sell_discount_0" value="0" class="required" onchange="updateval1(this);" onkeyup="updateval1(this);"></td>
                <td><input type="text" name="package_0" id="package_0" class="required" onchange="updateval1(this);" onkeyup="updateval1(this);"></td>
                <td><input type="text" name="unit_0" id="unit_0" class="required" onchange="updateval1(this);" onkeyup="updateval1(this);"></td>
                <td><input type="text" name="unit_type_0" id="unit_type_0" class="required"></td>
                <td><input type="text" name="total_0" id="total_0" class="required"></td>
                <input type="hidden" name="packageunits_0" id="packageunits_0" value="2">
			</tr>                  
		</table>
</div>
<div class="span-24 last" >إجمالي الفاتورة  <input type="text" name="total_value" id="total_value"  value="0"></div>
<div class="span-24 last" >المدفوع<input type="text" name="paid_value" id="paid_value"  value="0"> &nbsp; المتبقي<input type="text" disabled="disabled" name="rest_value" id="rest_value"  value="0"></div>
<div class="span-24 last" style="text-align:center"><input type="submit" value="إضافة"></div>

</form>
</div>

