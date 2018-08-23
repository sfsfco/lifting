
<div class="span-16 last printable result" style="text-align:left;direction:rtl;">
<div class="span-16 last">
<img  style="margin:10px 20px 20px 0px;width:150px;" src="<?php  echo $data['rootUrl']; ?>global/uploads/<?php echo $data['prefrances']->logo; ?>" >
</div>
<div class="span-5 ">Date </div>
<div class="span-11 last"><?php echo $data['details']->payment_date; ?></div>
<div class="span-5 ">Payment Type</div>
<div class="span-11 last">
    <?php 
    if($data['details']->payment_type=='income'){
        echo('Income');
        }else{
            echo('Payment');
            }
    
    ?>
</div>
<div class="span-5 ">Payment For</div>
<div class="span-11 last"><?php echo $data['details']->pay_for; ?></div>
<div class="span-5 ">Value</div>
<div class="span-11 last"><?php echo $data['details']->payment_value; ?></div>
<div class="span-5 ">Bill No.</div>
<div class="span-11 last"><?php echo($data['details']->payment_id=='0')?'Other':'Bill No  '.$data['details']->payment_id;?></div>
<div class="span-5 ">Payment Method</div>
<div class="span-11 last">
    <?php echo($data['details']->payment_method=='0')?'Monetary':'Check'; ?>
</div>

<?php if($data['details']->payment_method=='1'){ ?>
<div class="span-5 ">Bank</div>
<div class="span-11 last">
    <?php echo($data['details']->bank); ?>
</div>

<?php if(isset($data['details']->bank_no)){ ?>
<div class="span-5 ">Account Number </div>
<div class="span-11 last"><?php echo($data['details']->bank_no); ?></div>

<?php } ?>
<?php } ?>
<div class="span-5 ">Details</div>
<div class="span-11 last"><?php echo($data['details']->details); ?></div>




</div>
<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit('payments bill')" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="Print" alt="Print" ></a>
</div>


