<div class="span-16 last result" style="text-align:right;direction:rtl;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?>items/update" method="post">
<div class="span-11"><input type="text" name="name" id="name" value="<?php echo $data['item']->_items__name; ?>" class="required"></div>
<div class="span-5 last">إسم الصنف</div>
<div class="span-11"><input type="text" name="barcode" id="barcode" value="<?php echo $data['item']->barcode; ?>"></div>
<div class="span-5 last">الباركود </div>
<div class="span-11"><input type="text" name="purchase_price" id="purchase_price" class="required" value="<?php echo $data['item']->purchase_price; ?>"></div>
<div class="span-5 last">سعر الشراء</div>
<div class="span-11 "><input type="text" name="purchase_discount" id="purchase_discount"  value="<?php echo $data['item']->purchase_discount; ?>"> % </div>
<div class="span-5 last">خصم الشراء</div>
<div class="span-11 ">
    <select name="unit_type" id="unit_type" class="required">
        <option value="<?php echo $data['item']->unit_type; ?>"><?php echo $data['item']->unit_type; ?></option>
        <option value="أقراص">أقراص</option>
        <option value="كبسول">كبسول</option>
        <option value="شراب">شراب</option>
        <option value="أمبول">أمبول</option>
        <option value="أقماع">أقماع</option>
        <option value="أكياس">أكياس</option>
        <option value="علبة">علبة</option>
    </select>
</div>
<div class="span-5 last">نوع الوحدة</div>
<div class="span-11 "><input type="text" name="package_units" id="package_units" class="required" value="<?php echo $data['item']->package_units; ?>"></div>
<div class="span-5 last">عدد الوحدات للعبوة</div>
<div class="span-11 ">
    <select name="category" id="category" class="required">
       <option value="">إختر</option>
       <option value="<?php echo $data['item']->category; ?>" selected="selected"><?php echo $data['item']->_categories__name; ?></option>
       
       <?php foreach ($data['categories'] as $category){ ?>
       <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
       <?php } ?>
    </select>
</div>
<div class="span-5 last">التصنيف </div>

<div class="span-11 ">
    <select  name="country" id="country" class="required">
    <option value="">إختر</option>
    <option value="<?php echo $data['item']->country; ?>" selected="selected"><?php echo $data['item']->country; ?></option>
    <option value="السعودية">السعودية</option>
    <option value="مصر">مصر</option>
    <option value="الإمارات">الإمارات</option>
    <option value="الكويت">الكويت</option>
    <option value="قطر">قطر</option>
    <option value="الأردن">الأردن</option>
    <option value="عمان">عمان</option>
    <option value="سوريا">سوريا</option>
    <option value="اليمن">اليمن</option>
    <option value="ليبيا">ليبيا</option>
    <option value="البحرين">البحرين</option>
    <option value="السودان">السودان</option>
    <option value="العراق">العراق</option>
    <option value="الجزائر">الجزائر</option>
    <option value="لبنان">لبنان</option>
    <option value="المغرب">المغرب</option>
    <option value="فلسطين">فلسطين</option>
    <option value="تونس">تونس</option>
    <option value="موريتانيا">موريتانيا</option>
    <option value="ماليزيا">ماليزيا</option>
    <option value="الصين">الصين</option>
    <option value="تايلاند">تايلاند</option>
    <option value="كوريا">كوريا</option>
    <option value="الهند">الهند</option>
    <option value="أمريكا">أمريكا</option>
    <option value="الإتحاد الأوروبي">الإتحاد الأوروبي</option>
    </select>
</div>
<div class="span-5 last">بلد المنشأ</div>

<div class="span-11 "><input type="text" name="order_limit" id="order_limit" class="required" value="<?php echo $data['item']->order_limit; ?>"></div>
<div class="span-5 last">حد الطلب</div>


<div class="span-11 "><textarea name="details" id="details" style="width:140px;height:80px;" class="required"><?php echo $data['item']->details; ?></textarea></div>
<div class="span-5 last">ملاحظات</div>
<div class="span-16 last" style="text-align:center"><input type="submit" value="تعديل"></div>
<input type="hidden" name="old_id" id="old_id" value="<?php echo $data['item']->_items__id; ?>" >
</form>
</div>
