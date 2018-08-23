<?php $x=0;foreach($data['items'] as $item){?>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="col-md-12 col-sm-12 col-xs-12 text-right"><i class="fa fa-minus-circle" aria-hidden="true" onclick="closetr(this);"></i></div>
                                
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Item</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Qty</div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">Description</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Unit Cost</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">Total</div>
                                    </div>
                                    <div class=" <?php if($x==0){echo('first');} ?> options-table-item col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12 item">
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <input name="num_<?php echo $x; ?>" id="num_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12"  required="required" type="text"   value="<?php echo $x+1; ?>">
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <input name="quantity_<?php echo $x; ?>" id="quantity_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12"  type="text" onkeyup="updatebill(this);"   value="<?php  echo $item->quantity; ?>"  onkeyup="updatebill_invoice(this);" onchange="updatebill_invoice(this);">
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <textarea name="details_<?php echo $x; ?>" id="details_<?php echo $x; ?>" class="form-control"><?php  echo $item->details; ?></textarea>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <input id="unit_cost_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12" name="unit_cost_<?php echo $x; ?>" placeholder="" type="text" value="<?php  echo $item->unit_cost; ?>"  onkeyup="updatebill_invoice(this);" onchange="updatebill_invoice(this);" >
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <input id="total_<?php echo $x; ?>" class="totales form-control col-md-7 col-xs-12" name="total_<?php echo $x; ?>" placeholder="" type="text" value="<?php  echo $item->total; ?>">
                                            </div>
                                        </div>
                                        
                                    <input type="hidden" name="id_<?php echo $x;?>" value="<?php echo $item->id; ?>">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="ln_solid"></div>
                                    </div>
                                </div>

<input type="hidden" name="id_<?php echo $x;?>" value="<?php echo $item->id; ?>">
</div>
                                <?php $x++;} ?>

