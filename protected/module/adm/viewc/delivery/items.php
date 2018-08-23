    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Item</div>
        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Qty</div>
        <div class="col-md-3 col-sm-6 col-xs-12 text-center">Description</div>
        <div class="col-md-2 col-sm-1 col-xs-12 text-center">S.W.L</div>
        <div class="col-md-2 col-sm-1 col-xs-12 text-center">P.L</div>
        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Unit Cost</div>
        <div class="col-md-2 col-sm-1 col-xs-12 text-center">Total</div>
    </div>
    <?php
    $x=0;
    foreach($data['items'] as $item){
        $x++;
        ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-1 col-sm-1 col-xs-12 text-center">
            <input type="text" name="num_<?php echo $x; ?>" id="num_<?php echo $x; ?>" value='<?php echo $x; ?>' class="form-control col-md-7 col-xs-12" required="required" >
        </div>
        <div class="col-md-1 col-sm-1 col-xs-12 text-center">
            <input type="text" name="quantity_<?php echo $x; ?>" id="quantity_<?php echo $x; ?>" value="<?php echo $item->quantity; ?>" class="form-control col-md-7 col-xs-12" required="required"  onkeyup="updatebill(this);" onchange="updatebill(this);" >
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 text-center">
            <textarea name="details_<?php echo $x; ?>" id="details_<?php echo $x; ?>"><?php echo $item->details; ?> </textarea>
        </div>
        <div class="col-md-2 col-sm-1 col-xs-12 text-center">
            <input type="text" name="swl_<?php echo $x; ?>" id="swl_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $item->swl; ?>" >
        </div>
        <div class="col-md-2 col-sm-1 col-xs-12 text-center">
            <input type="text" name="pl_<?php echo $x; ?>" id="pl_<?php echo $x; ?>" value="<?php echo $item->pl; ?>" class="form-control col-md-7 col-xs-12" >
        </div>
        <div class="col-md-1 col-sm-1 col-xs-12 text-center">
            <input type="text" name="unit_cost_<?php echo $x; ?>" id="unit_cost_<?php echo $x; ?>" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $item->unit_cost; ?>"  onkeyup="updatebill(this);" onchange="updatebill(this);" >
        </div>
        <div class="col-md-2 col-sm-1 col-xs-12 text-center">
            <input type="text" name="total_<?php echo $x; ?>" id="total_<?php echo $x; ?>"  value="<?php echo $item->total; ?>" class="form-control col-md-7 col-xs-12"  required="required">
        </div>
        <input type="hidden" name="id_<?php echo $x;?>" value="<?php echo $item->id; ?>">
    </div>
        
        <?php
        
        }
        $data['workorder']=Doo::db()->find('Workorders',array('where'=>" id='".$data['item_id']."'",'limit'=>1));
        if(isset($data['workorder']->client)){
            $data['client']=Doo::db()->find('Clients',array('select'=>'id,name,representative,address','where'=>" id='".$data['workorder']->client."'",'limit'=>1));
                    if(!isset($data['client']->name)){
                        $data['client']->name='Deleted';
                        }
                    if(!isset($data['client']->representative)){
                        $data['client']->representative='Deleted';
                        }
                    if(!isset($data['client']->address)){
                        $data['client']->address='Deleted';
                        }
        }else{
            $data['client']->name='Deleted';
            $data['client']->representative='Deleted';
            $data['client']->address='Deleted';
            $data['workorder']->delivery_date='0000-00-00';
        }
        
        echo '#'.$data['client']->name.'#'.$data['client']->representative.'#'.$data['client']->address.'#'.$data['workorder']->delivery_date;
    ?>