
<div class="span-16 last result" style="text-align:right;direction:rtl;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?>banks/update" method="post">
<div class="span-11"><input type="text" name="name" id="name" class="required" value="<?php echo $data['bank']->name; ?>" ></div>
<div class="span-5 last">الإسم</div>
<div class="span-11"><input type="text" name="number" id="number" class="required" value="<?php echo $data['bank']->number; ?>" ></div>
<div class="span-5 last">رقم الحساب</div>

<div class="span-16 last" style="text-align:center"><input type="submit" value="تعديل"></div>
<input type="hidden" name="old_id" id="old_id" value="<?php echo $data['bank']->id; ?>" >
</form>
</div>

