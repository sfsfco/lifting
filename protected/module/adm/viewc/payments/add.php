<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-16 last result" style="text-align:right;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>payments/insert" method="post">
<div class="span-5 ">Date</div>
<div class="span-11 last"><input type="text" name="payment_date" id="payment_date" class="date-pick required wide"></div>
<div class="span-5 ">Payment Type</div>
<div class="span-11 last"><select name="payment_type" id="payment_type"><option value="pay">Supplier</option><option value="expense">Expenses</option></select></div>
<div class="span-5 ">Paymnet For</div>
<div class="span-11 last"><select name="payment_for" id="payment_for"><?php foreach($data['suppliers'] as $supplier){ ?><option value="<?php echo $supplier->id; ?>"><?php echo $supplier->name; ?></option><?php }?></select></div>
<div class="span-5 ">value</div>
<div class="span-11 last"><input type="text" name="payment_value" id="payment_value" class="required" ></div>
<div class="span-5 ">Bill No.</div>
<div class="span-11 last"><select name="payment_id" id="payment_id"><option value="0">Other</option><?php foreach($data['payments'] as $payments){ ?><option value="<?php echo $payments->id; ?>">Bill No. <?php echo $payments->id; ?></option><?php }?></select></div>
<div class="span-5 ">Payment Method</div>
<div class="span-11 last">
    <input type="radio" id="payment_method0" name="payment_method" value="0" checked="checked"> Monetary
    <input type="radio" id="payment_method1" name="payment_method" value="1"> Check
    <select id="banks" name="banks" disabled="disabled"><?php foreach($data['otherbanks'] as $bank){ ?><option value="<?php echo $bank->id; ?>"><?php echo $bank->name; ?></option><?php }?></select>
</div>
<div class="span-5 ">Details</div>
<div class="span-11 last"><textarea name="details" id="details" class="required"></textarea></div>


<div class="span-16 last" style="text-align:center"><input type="submit" value="Add"></div>
</form>
</div>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>

