
<div class="span-24 last result" style="text-align:right;direction:rtl;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?>returned/insert" method="post">
<div class="span-19"><input type="text" name="payment_date" id="payment_date" class="date-pick required wide"></div>
<div class="span-5 last">التاريخ </div>
<div class="span-19"><select name="payment_for" id="payment_for2"><?php foreach($data['clients'] as $client){ ?><option value="<?php echo $client->id; ?>"><?php echo $client->name; ?></option><?php }?></select></div>
<div class="span-5 last">صرف لحساب</div>
<div class="span-19"><input type="text" name="payment_value_show" id="payment_value_show" value="<?php echo $data['saleslist'][0]->Sales->total; ?>" disabled="disabled" ></div>
<div class="span-5 last">القيمة</div>
<div class="span-19"><select name="payment_id" id="payment_id2"><?php foreach($data['sales'] as $sales){ ?><option value="<?php echo $sales->id; ?>">فاتورة  : <?php echo $sales->id; ?></option><?php }?></select></div>
<div class="span-5 last">رقم الفاتورة</div>
<div class="span-19">
    <div class="bill_details">
          <table id="options-table">					
			<tr>
				<td>الرقم</td>
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
            <?php foreach($data['saleslist'] as $details){?>
            
			<tr class="first">
                <td><?php echo $details->id; ?></td>
                <td><?php echo $details->barcode; ?></td>
                <td>
                    <?php echo $details->item_name; ?>
                </td>
                <td><?php echo $details->category; ?></td>
                <td><?php echo $details->expire_date; ?></td>
                <td><?php echo $details->sell_price; ?></td>
                <td><?php echo $details->sell_discount; ?></td>
                <td><?php echo $details->package; ?></td>
                <td><?php echo $details->unit; ?></td>
                <td><?php echo $details->unit_type; ?></td>
                <td><?php echo $details->total; ?></td>
                
			</tr>        
            <?php } ?>
		</table>
    </div>
</div>
<div class="span-5 last">الفاتورة</div>
<div class="span-19">
    <input type="radio" id="payment_method0" name="payment_method" value="0" checked="checked">(ترجيع نقدي )
    <input type="radio" id="payment_method1" name="payment_method" value="1"> صك
    <select id="banks" name="banks" disabled="disabled"><?php foreach($data['banks'] as $bank){ ?><option value="<?php echo $bank->id; ?>"><?php echo $bank->name; ?></option><?php }?></select>
</div>
<div class="span-5 last">طريق الدفع</div>

<div class="span-19"><input type="text" name="bank_no" id="bank_no" disabled="disabled" ></div>
<div class="span-5 last">رقم الحساب </div>

<div class="span-19"><textarea name="details" id="details" class="required"></textarea></div>
<div class="span-5 last">تفاصيل</div>
<input type="hidden" name="payment_type" id="payment_type" value="returned">
<input type="hidden" name="payment_value" id="payment_value" value="<?php echo $data['saleslist'][0]->Sales->total; ?>">
<div class="span-24 last" style="text-align:center"><input type="submit" value="إضافة"></div>
</form>
</div>

