<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>delivery/insert" method="post">
<div class="span-9 ">Work Order</div>
<div class="span-15 last"><select name="workorder" onchange="get_delivery_itmes(this.value)" id="workorder" class="required wide"><option value="">Select</option><?php foreach($data['workorders'] as $workorder){ ?><option value="<?php echo $workorder->id ; ?>"><?php echo $workorder->id ; ?> : <?php echo $workorder->title ; ?> [<?php echo date('d-m-Y',strtotime($workorder->delivery_date)) ; ?>]</option><?php } ?></select></div>
<div class="span-9 ">Client</div>
<div class="span-15 last"><input type="text" disabled="disabled" name="client" id="client" >
 Address : <input type="text" name="client_address" id="client_address"  class="required wide" >
</div>

<div class="span-9 ">Delivery Date </div>
<div class="span-15 last"><input type="text" disabled="disabled" name="delivery" id="delivery" ></div>
<div class="span-9 ">Delivered Date </div>
<div class="span-15 last"><input type="text" name="delivery_date" id="delivery_date" class="date-pick required wide"></div>

<div class="span-9 ">Delivered To </div>
<div class="span-15 last"><input type="text" name="delivery_to" id="delivery_to" class=" required wide" ></div>


<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
				<td>Item</td><td>Qty</td><td>Description</td><td>S.W.L</td><td>P.L</td><td>Unit Cost</td><td>Total</td>
			</tr>
			<tr >
                <td><input type="text" name="num_0" id="num_0" value='1' ></td>
                <td><input type="text" name="quantity_0" id="quantity_0" class="required" ></td>
                <td><textarea name="details_0" id="details_0" class="required"></textarea></td>
                <td><input type="text" name="swl_0" id="swl_0" class="required"></td>
                <td><input type="text" name="pl_0" id="pl_0" class=""></td>
                <td><input type="text" name="unit_cost_0" id="unit_cost_0" class="required" ></td>
                <td><input type="text" name="total_0" id="total_0" class="required"></td>
                
                <input type="hidden" name="packageunits_0" id="packageunits_0" value="1">
                
			</tr>                  
		</table>
</div>

<div class="span-24 last" style="text-align:center"><input type="submit" value="Add"></div>

</form>
</div>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
