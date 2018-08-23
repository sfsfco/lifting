<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>stockallocations/update" method="post">
<div class="span-9 ">Work Order</div>
<div class="span-15 last">
    <select name="workorder" onchange="get_stock_itmes(this.value)" id="workorder" class="required wide">

        <option value="">Select            </option>
        <?php foreach($data['workorders'] as $workorder){ ?>
        <option value="<?php echo $workorder->id ; ?>" <?php echo($workorder->id==$data['stock']->workorder)?'selected="selected"':' '; ?>><?php echo $workorder->id ; ?> : <?php echo $workorder->title ; ?> [<?php echo date('d-m-Y',strtotime($workorder->delivery_date)) ; ?>]</option><?php } ?>
        </select>
</div>
<div class="span-9 ">Client</div>
<div class="span-15 last"><input type="text" disabled="disabled" name="client" id="client" value="<?php echo $data['stock']->client; ?>" >
</div>
<div class="span-9 ">Date </div>
<div class="span-15 last">
    <input type="text" disabled="disabled" name="delivery" id="delivery" value="<?php echo date('d-m-Y',strtotime($data['workorder']->delivery_date)); ?>"  >
</div>
<div class="span-9 ">Total Value</div>
<div class="span-15 last"><input type="text" disabled="disabled" name="total_value" id="total_value" value="<?php echo $data['workorder']->total_value; ?>" >
</div>


<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
				<td>Item</td><td>Qty</td><td>Description</td><td>Unit Cost</td><td>Total</td>
			</tr>
            <?php $x=0; foreach($data['stockdetails'] as $stockdetails){ ?>
			<tr class="first">
                <td>
                    <select name="item_<?php echo $x; ?>" id="item_<?php echo $x; ?>" onchange="get_items(this)">
                        <option value="">Select</option>
                        <?php foreach($data['items'] as $item){ ?>
                        <option value="<?php echo $item->id; ?>" <?php echo($item->id==$stockdetails->stock_code)?"selected='selected'":' '; ?>><?php echo $item->name." : ".$item->price." LE : ".date('d-m-Y',strtotime($item->create_date)); ?></option>
                        
                        <?php }?>
                    </select>
                </td>
                <td><input type="text" name="quantity_<?php echo $x; ?>" id="quantity_<?php echo $x; ?>" class="required" onchange="total(this);" value="<?php echo $stockdetails->quantity; ?>" ></td>
                <td><textarea name="details_<?php echo $x; ?>" id="details_<?php echo $x; ?>" class="required"><?php echo $stockdetails->details; ?></textarea></td>
                <td><input type="text" name="unit_cost_<?php echo $x; ?>" id="unit_cost_<?php echo $x; ?>" value="<?php echo $stockdetails->unit_cost; ?>" class="required" ></td>
                <td><input type="text" name="total_<?php echo $x; ?>" id="total_<?php echo $x; ?>" class="required" value="<?php echo $stockdetails->quantity*$stockdetails->unit_cost; ?>"></td>
                
                <input type="hidden" name="packageunits_<?php echo $x; ?>" id="packageunits_<?php echo $x; ?>" value="1">
                
			</tr>                  
            <?php $x++;} ?>
		</table>
</div>
<div class="span-24 last" ><input type="button" value="Add Item" class="col-add"><input type="button" value="Remove Item" class="col-remove"></div>
<div class="span-9 ">Percentage Profit</div>
<div class="span-15 last"><input type="text"  name="percentage_profit" id="percentage_profit" value="<?php echo $data['stock']->percentage_profit; ?>" >
</div>
<div class="span-9 ">Cost Value</div>
<div class="span-15 last"><input type="text"  name="cost_value" id="cost_value" value="<?php echo $data['stock']->cost_value; ?>" >
</div>
<input type="hidden"  name="old_id" id="old_id" value="<?php echo $data['stock']->id; ?>" >
<div class="span-24 last" style="text-align:center"><input type="submit" value="Edit"></div>

</form>
</div>

