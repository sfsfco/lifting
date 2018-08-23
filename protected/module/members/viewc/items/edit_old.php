<div class="span-16 last result" style="">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>items/update" method="post">
<div class="span-5 ">Item</div>
<div class="span-11 last"><input type="text" name="name" id="name" value="<?php echo $data['item']->_items__name; ?>" class="required"></div>
<div class="span-5 ">Barcode</div>
<div class="span-11 last"><input type="text" name="barcode" id="barcode" value="<?php echo $data['item']->barcode; ?>"></div>
<!--
<div class="span-5 ">Purchase Price</div>
<div class="span-11 last"><input type="text" name="purchase_price" id="purchase_price" class="required" value="<?php echo $data['item']->purchase_price; ?>"></div>
<div class="span-5 ">Purchase Discount</div>
<div class="span-11 last"><input type="text" name="purchase_discount" id="purchase_discount"  value="<?php echo $data['item']->purchase_discount; ?>"> % </div>
-->
<div class="span-5 ">Category </div>
<div class="span-11 last">
    <select name="category" id="category" class="required">
       <option value="">Select</option>
       <option value="<?php echo $data['item']->category; ?>" selected="selected"><?php echo $data['item']->_categories__name; ?></option>
       
       <?php foreach ($data['categories'] as $category){ ?>
       <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
       <?php } ?>
    </select>
</div>

<div class="span-5 ">Country</div>
<div class="span-11 last">
    <select  name="country" id="country" class="required">
        <option value="<?php echo $data['item']->country; ?>"><?php echo $data['item']->country; ?></option>
        <?php echo play::countries(); ?>
    </select>
</div>

<div class="span-5 ">Order Limit</div>
<div class="span-11 last"><input type="text" name="order_limit" id="order_limit" class="required" value="<?php echo $data['item']->order_limit; ?>"></div>


<div class="span-5 ">Details</div>
<div class="span-11 last"><textarea name="details" id="details" style="width:140px;height:80px;" class="required"><?php echo $data['item']->details; ?></textarea></div>

<div class="span-16 last" style="text-align:center"><input type="submit" value="Edit"></div>
<input type="hidden" name="unit_type" id="unit_type" value="علبة">
<input type="hidden" name="package_units" id="package_units" value="1">
<input type="hidden" name="old_id" id="old_id" value="<?php echo $data['item']->_items__id; ?>" >
</form>
</div>
