
<div class="span-16 last result" style="text-align:right;direction:rtl;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?>expenses/insert" method="post">
<div class="span-11"><input type="text" name="add_date" id="add_date" class="date-pick required"></div>
<div class="span-5 last">التاريخ</div>
<div class="span-11">
    <select name="type" id="type" class="required" onchange="gettype(this);">
        <option value="0">إيرادات</option>
        <option value="1">عميل</option>
        <option value="2">مورد</option>
    </select>
</div>
<div class="span-5 last">الجهة</div>
<div class="span-11">
    <select name="payfrom" id="payfrom" class="required" onchange="getbill(this);">
        <option value="0">إيرادات</option>
    </select>
</div>
<div class="span-5 last">الإسم</div>
<div class="span-11"><input type="text" name="add_value" id="add_value" class=" required"></div>
<div class="span-5 last">القيمة</div>
<div class="span-11">
    <select name="payment_type" id="payment_type" class="required">
        <option value="نقدي">نقدي</option>
        <option value="صك">صك</option>
    </select>
</div>
<div class="span-5 last">طريقة الدفع</div>

<div class="span-11">
    <select name="bill_no" id="bill_no" class="required">
        <option value="0">غير محدد</option>
    </select>
</div>
<div class="span-5 last">فاتورة </div>

<div class="span-11"><textarea name="details" id="details"></textarea></div>
<div class="span-5 last"> مقابل</div>

<div class="span-16 last" style="text-align:center"><input type="submit" value="إضافة"></div>
</form>
</div>

