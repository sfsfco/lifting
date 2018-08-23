<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?>quotations/convertnow" method="post">
<div class="span-9 ">Quotation No.</div>
<div class="span-15 last"><input type="text" name="quotation" id="quotation"  class="required" value="<?php echo $data['old_id']; ?>"></div>
<div class="span-9 ">Enter Delivery Date</div>
<div class="span-15 last"><input type="text" name="delivery_date" id="delivery_date"  class="date-pick required wide"></div>
<div class="span-9 ">Enter Delivery Address</div>
<div class="span-15 last"><input type="text" name="delivery_address" id="delivery_address" class="required" value="<?php echo $data['address'];  ?>"></div>
<input type="hidden" name="quotation" id="quotation" value="<?php echo $data['old_id']; ?>">
<div class="span-24 last" style="text-align:center"><input type="submit" value="Convert"></div>

</form>
</div>

