<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>workorders/update" method="post" >
<div class="span-9 ">Title</div>
<div class="span-15 last"><input type="text" name="title" id="title" class="required" value="<?php echo $data['workorder']->title; ?>"></div>
<div class="span-9 ">Client</div>
<div class="span-15 last"><select name="client" id="client" class="required"><option value="<?php echo $data['workorder']->client; ?>"><?php echo $data['workorder']->client_name; ?></option><?php foreach($data['clients'] as $client){ ?><option value="<?php echo $client->id ; ?>"><?php echo $client->name ; ?></option><?php } ?></select></div>
<div class="span-9 ">Workorder No</div>
<div class="span-15 last"><input type="text" name="workorder_no" id="workorder_no" class="required" disabled="disabled" value="<?php echo $data['workorder']->id; ?>"></div>
<div class="span-9 ">Request No</div>
<div class="span-15 last"><input type="text" name="request_no" id="request_no" class="required" value="<?php echo $data['workorder']->request_no; ?>"></div>
<div class="span-9 ">Delivery Date </div>
<div class="span-15 last"><input type="text" name="delivery_date" id="delivery_date" class="date-pick required wide" value="<?php echo date('d-m-Y',strtotime($data['workorder']->delivery_date)); ?>"></div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
				<td>Item</td><td>ID</td><td>Qty</td><td>Description</td><td>S.W.L</td><td>P.L</td><td>Unit Cost</td><td>Total</td>
			</tr>
            <?php $x=0; foreach($data['workordersdetails'] as $workordersdetails){ ?>
			<tr <?php if($x==0){echo('class="first"');} ?> >
                <td><input type="text" name="num_<?php echo $x; ?>" id="num_<?php echo $x; ?>" value='<?php echo $x+1; ?>' ></td>
                <td><input type="text" name="id_<?php echo $x; ?>" id="id_<?php echo $x; ?>" value='<?php  echo $workordersdetails->i_d; ?>'  class="wide"></td>
                <td><input type="text" name="quantity_<?php echo $x; ?>" id="quantity_<?php echo $x; ?>" class="required" value="<?php  echo $workordersdetails->quantity; ?>" onkeyup="updatebill(this);" onchange="updatebill(this);"></td>
                <td><textarea name="details_<?php echo $x; ?>" id="details_<?php echo $x; ?>" class="required"><?php  echo $workordersdetails->details; ?></textarea></td>
                <td><input type="text" name="swl_<?php echo $x; ?>" id="swl_<?php echo $x; ?>" value="<?php  echo $workordersdetails->swl; ?>" class="required"></td>
                <td><input type="text" name="pl_<?php echo $x; ?>" id="pl_<?php echo $x; ?>" value="<?php  echo $workordersdetails->pl; ?>" class="required"></td>
                <td><input type="text" name="unit_cost_<?php echo $x; ?>" id="unit_cost_<?php echo $x; ?>" value="<?php  echo $workordersdetails->unit_cost; ?>" class="required" onkeyup="updatebill(this);" onchange="updatebill(this);" ></td>
                <td><input type="text" name="total_<?php echo $x; ?>" id="total_<?php echo $x; ?>" value="<?php  echo $workordersdetails->total; ?>" class="required"></td>
			</tr>
            <?php $x++;} ?>
		</table>
</div>
<div class="span-24 last" ><input type="button" value="Add Item" class="purchases-add"><input type="button" value="Remove Item" class="purchases-remove"></div>
<div class="span-24 last" >Net Value <input type="text" name="net_value" id="net_value"   value="<?php echo $data['workorder']->net_value; ?>"></div>
<div class="span-24 last" >Tax <input type="text" name="tax" id="tax"   value="<?php echo $data['workorder']->tax; ?>" onkeyup="updatebill(this);" onchange="updatebill(this);"> &nbsp; Total Value <input type="text"  name="total_value" id="total_value"  value="<?php echo $data['workorder']->total_value; ?>"></div>
<div class="span-24 last" style="text-align:center"><input type="submit" value="Edit"></div>
<input type="hidden" name="old_id" id="old_id" value="<?php echo $data['workorder']->id; ?>">
</form>
</div>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
