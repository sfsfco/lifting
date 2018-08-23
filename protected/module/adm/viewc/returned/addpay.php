
<div class="span-16 last result" style="text-align:right;direction:rtl;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?>payments/insertpay" method="post">
<div class="span-11"><input type="text" name="payment_date" id="payment_date" class="date-pick required wide"></div>
<div class="span-5 last">التاريخ </div>
<div class="span-11"><select name="payment_type" id="payment_type1"><option value="income">مبيعات</option><option value="other">إيرادات</option></select></div>
<div class="span-5 last">نوع الإيراد </div>
<div class="span-11"><select name="payment_for" id="payment_for1"><?php foreach($data['clients'] as $client){ ?><option value="<?php echo $client->id; ?>"><?php echo $client->name; ?></option><?php }?></select></div>
<div class="span-5 last">صرف لحساب</div>
<div class="span-11"><input type="text" name="payment_value" id="payment_value" class="required" ></div>
<div class="span-5 last">القيمة</div>
<div class="span-11"><select name="payment_id" id="payment_id1"><option value="0">أخرى</option><?php foreach($data['sales'] as $sales){ ?><option value="<?php echo $sales->id; ?>">فاتورة  : <?php echo $sales->id; ?></option><?php }?></select></div>
<div class="span-5 last">رقم الفاتورة</div>
<div class="span-11">
    <input type="radio" id="payment_method0" name="payment_method" value="0" checked="checked">(نقدا - جزئي - أجل)
    <input type="radio" id="payment_method1" name="payment_method" value="1"> صك
    <select id="banks" name="banks" disabled="disabled"><?php foreach($data['otherbanks'] as $bank){ ?><option value="<?php echo $bank->id; ?>"><?php echo $bank->name; ?></option><?php }?></select>
</div>
<div class="span-5 last">طريق الدفع</div>

<div class="span-11"><input type="text" name="bank_no" id="bank_no" disabled="disabled" ></div>
<div class="span-5 last">رقم الحساب </div>

<div class="span-11"><textarea name="details" id="details" class="required"></textarea></div>
<div class="span-5 last">تفاصيل</div>

<div class="span-16 last" style="text-align:center"><input type="submit" value="إضافة"></div>
</form>
</div>

