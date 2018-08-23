<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>stockallocations/insert" method="post">
<div class="span-9 ">Work Order</div>
<div class="span-15 last">
    <select name="workorder" onchange="get_stock_itmes(this.value)" id="workorder" class="required wide">
        <option value="">Select</option>
        <?php foreach($data['workorders'] as $workorder){ ?>
        <option value="<?php echo $workorder->id ; ?>">
            <?php echo $workorder->id ; ?> : <?php echo $workorder->title ; ?> [<?php echo date('d-m-Y',strtotime($workorder->delivery_date)) ; ?>]</option>
            <?php } ?>
    </select>
</div>
<div class="span-9 ">Client</div>
<div class="span-15 last"><input type="text" disabled="disabled" name="client" id="client" >
</div>
<div class="span-9 ">Date </div>
<div class="span-15 last"><input type="text" disabled="disabled" name="delivery" id="delivery" ></div>
<div class="span-9 ">Total Value</div>
<div class="span-15 last"><input type="text" disabled="disabled" name="total_value" id="total_value" >
</div>


<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
				<td>Item</td><td>Qty</td><td>Description</td><td>Unit Cost</td><td>Total</td>
			</tr>
			<tr class="first">
                <td>
                    <select name="item_0" id="item_0" onchange="get_items(this)">
                        <option value="">Select</option>
                        <?php foreach($data['items'] as $item){ ?>
                        <option value="<?php echo $item->id; ?>"><?php echo $item->name." : ".$item->price." LE : ".date('d-m-Y',strtotime($item->create_date)); ?></option>
                        <?php }?>
                    </select>
                </td>
                <td><input type="text" name="quantity_0" id="quantity_0" class="required" onchange="total(this);" value="0" ></td>
                <td><textarea name="details_0" id="details_0" class="required"></textarea></td>
                <td><input type="text" name="unit_cost_0" id="unit_cost_0" class="required" ></td>
                <td><input type="text" name="total_0" id="total_0" class="required" value="0"></td>
                
                
                
			</tr>                  
		</table>
</div>
<div class="span-24 last" ><input type="button" value="Add Item" class="col-add"><input type="button" value="Remove Item" class="col-remove"></div>
<div class="span-9 ">Percentage Profit</div>
<div class="span-15 last"><input type="text"  name="percentage_profit" id="percentage_profit" >
</div>
<div class="span-9 ">Cost Value</div>
<div class="span-15 last"><input type="text"  name="cost_value" id="cost_value" >
</div>

<div class="span-24 last" style="text-align:center"><input type="submit" value="Add"></div>

</form>
</div>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
