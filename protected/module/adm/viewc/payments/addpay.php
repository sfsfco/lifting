<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-16 last result" style="text-align:right;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>payments/insertpay" method="post">
<div class="span-5 ">date </div>
<div class="span-11 last"><input type="text" name="payment_date" id="payment_date" class="date-pick required wide"></div>
<div class="span-5 ">Income Type </div>
<div class="span-11 last"><select name="payment_type" id="payment_type1"><option value="income">Sales</option><option value="other">Income</option></select></div>
<div class="span-5 ">Payment For</div>
<div class="span-11 last"><select name="payment_for" id="payment_for1"><?php foreach($data['clients'] as $client){ ?><option value="<?php echo $client->id; ?>"><?php echo $client->name; ?></option><?php }?></select></div>
<div class="span-5 ">Value</div>
<div class="span-11 last"><input type="text" name="payment_value" id="payment_value" class="required" ></div>
<div class="span-5 ">Bill No.</div>
<div class="span-11 last"><select name="payment_id" id="payment_id1"><option value="0">Other</option><?php foreach($data['sales'] as $sales){ ?><option value="<?php echo $sales->id; ?>">Bill No .<?php echo $sales->id; ?></option><?php }?></select></div>
<div class="span-5 ">Payment Method</div>
<div class="span-11 last">
    <input type="radio" id="payment_method0" name="payment_method" value="0" checked="checked"> Monetary
    <input type="radio" id="payment_method1" name="payment_method" value="1"> Check
    <select id="banks" name="banks" disabled="disabled"><?php foreach($data['otherbanks'] as $bank){ ?><option value="<?php echo $bank->id; ?>"><?php echo $bank->name; ?></option><?php }?></select>
</div>

<div class="span-5 ">Bank Account </div>
<div class="span-11 last"><input type="text" name="bank_no" id="bank_no" disabled="disabled" ></div>

<div class="span-5 ">Details</div>
<div class="span-11 last"><textarea name="details" id="details" class="required"></textarea></div>


<div class="span-16 last" style="text-align:center"><input type="submit" value="Add"></div>
</form>
</div>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
