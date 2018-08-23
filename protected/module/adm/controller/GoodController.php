<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class GoodController extends CoreController{
	

    public function index(){
	
    $data['title']="Good";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Good', array('where'=>"id='".$id."'", 'limit'=>1) );
           Doo::db()->delete('GoodDetails', array('where'=>"good='".$id."'", 'limit'=>1) );
        }
      }
      if(isset($_POST['length'])){
        if($_POST["length"] != -1)
        {
            $limit= $_POST['start'].",".$_POST['length'];

        }
      }else{
            $limit= "0,10";
      }
      if(isset($_POST['search']['value'])){
        if($_POST['search']['value']!=''){$where="  good.id = '".$_POST['search']['value']."'  ";}else{$where="  good.id != '0'  ";}
        
      }else{
        $where=" good.id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('good.id');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      
      $lists=Doo::db()->relate('Good','Suppliers',array('select'=>'good.*,suppliers.name','where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {
        $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$list->create_by."' ",'limit'=>1));
        if(isset($user->first_name)){
        $list->by=$user->first_name." ".$user->last_name;
        }else{$list->by='deleted';}
        $good=Doo::db()->find('Good',array('select'=>'id','where'=>" purchase='".$list->id."' ",'limit'=>1));
        if(isset($good->id)){$list->received='Yes';}else{$list->received='No';}
        
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->Suppliers->name,
          "<div class='text-center'>".date('Y/m/d',strtotime($list->received_date))."</div>",
          $list->total_value,
          $list->by,
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."good/details/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-print'></i> Details</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","","");

    }
      $datamodel = Doo::loadModel('Good', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->relate('Good','Suppliers',array('where'=>$where,'select'=>'good.id')));

      echo(json_encode($info));
    exit;

    }   
        
$this->renderc('good/index',$data);
        



    
    }

    public function add(){
      $data['title']="Add Receipts Note";
    $data['suppliers']=Doo::db()->find('Suppliers',array('select'=>'name,id'));
    $data['items']=Doo::db()->find('Items',array('select'=>'name,id'));
    $data['stockrooms']=Doo::db()->find('Stockrooms',array('select'=>'name,id'));
    $goods=Doo::db()->find('Good',array('select'=>'purchase'));
    $goo=array();
    
    foreach($goods as $good){$goo[]=$good->purchase;}
    $data['purchases']=Doo::db()->find('Purchases',array('select'=>'id','where'=>" id Not in('".implode("','",$goo)."') "));
    $data['banks']=Doo::db()->find('Banks',array('select'=>'name,id'));
    
    $data['categories']=Doo::db()->find('Categories',array('select'=>'name,id'));
		$this->renderc('good/add',$data);
    }

	    public function insert(){
    
    $nuu=0;
    foreach($_POST as $key=>$value){
        $vv=explode('barcode_',$key);
        if(count($vv)>1){$nuu=$nuu+1;}
        }

      $good = Doo::loadModel('Good', true);
        $purchase=Doo::db()->find('Purchases',array('where'=>" id='".$_POST['purchase']."' ",'limit'=>1));
        $good->purchase=$_POST['purchase'];
        $good->supplier=$purchase->supplier;
        $good->received_date=$_POST['purchase_date'];
        $good->payment_method=$purchase->payment_method;
        $good->total_value=$_POST['total_value'];
        
        $good->create_date=date('Y-m-d H:m:s');
        $good->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($good);
        
        if(isset($_POST['paid_value'])&& $_POST['paid_value']>'0'){
      $payments = Doo::loadModel('Payments', true);
        
        $payments->payment_date=$_POST['purchase_date'];
        $payments->payment_type='pay';
        $payments->payment_for=$purchase->supplier;
        $payments->payment_value=$_POST['paid_value'];
        $payments->payment_id=$lastinserted;
        $payments->payment_method=$purchase->payment_method;
        if($purchase->payment_method=='1'){$payments->bank_id=$_POST['banks'];}
        
        //$payments->bank_no=$_POST['bank_no'];
        $payments->details="purchases";
        
        $payments->create_date=date('Y-m-d H:m:s');
        $payments->create_by=$_SESSION['username']['id'];
        $this->db()->insert($payments);
        }
        
        if(!empty($lastinserted)){
            
             for($x=0;$x<$nuu;$x++){
                 $gooddetails = Doo::loadModel('GoodDetails', true);
                 $gooddetails->item=$_POST['item_name_'.$x];
                 $gooddetails->price=$_POST['price_'.$x];
                 $gooddetails->discount=$_POST['discount_'.$x];
                 $gooddetails->quantity=$_POST['quantity_'.$x];
                 $gooddetails->good=$lastinserted;
                 $gooddetails->create_date=date('Y-m-d H:m:s');
                 $gooddetails->create_by=$_SESSION['username']['id'];
                 $gooddetails->stockroom=$_POST['stockroom_'.$x];
                $this->db()->insert($gooddetails);
                //
                $gooddata=Doo::db()->find('GoodDetails',array('select'=>'id,quantity,price,discount','where'=>" item='".$_POST['item_name_'.$x]."' && price='".$_POST['price_'.$x]."' &&  discount='".$_POST['discount_'.$x]."' ", 'limit'=>1));        
                
                if(!empty($gooddata->id)){
                    $goods = Doo::loadModel('Good', true);
                    $goods->id=$gooddata->id;
                    $goods->quantity=$gooddata->quantity+$_POST['quantity_'.$x];

                    $goods->edit_date=date('Y-m-d H:m:s');
                    $goods->edit_by=$_SESSION['username']['id'];
                    $this->db()->update($goods);
                    }else{
                    $goods = Doo::loadModel('Good', true);
                    
                    $goods->item=$_POST['item_name_'.$x];
                    $goods->price=$_POST['price_'.$x];
                    $goods->discount=$_POST['discount_'.$x];
                    $goods->quantity=$_POST['quantity_'.$x];
                    $goods->good=$lastinserted;
                    $goods->stockroom=$_POST['stockroom_'.$x];
                    $goods->create_date=date('Y-m-d H:m:s');
                    $goods->create_by=$_SESSION['username']['id'];
                    $this->db()->insert($goods);
                        }
                ///
                }
            
        
           
            }
           $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'good' );           
           
		//$this->renderc('users/add',$data);
    }


    

    

    
    public function getnames(){
        $data['item']=Doo::db()->find('Items',array('select'=>'barcode,unit_type,purchase_price,purchase_discount,category,package_units','where'=>"id='".$this->params[0]."'", 'limit'=>1));
        $category=Doo::db()->find('Categories',array('select'=>'name','where'=>"id='".$data['item']->category."'", 'limit'=>1));
        $x=$data['item']->purchase_price-(($data['item']->purchase_price*$data['item']->purchase_discount)/100);
        
        if(!$data['item']){echo '';}else{echo $data['item']->barcode.','.$data['item']->unit_type.','.$data['item']->purchase_price.','.$data['item']->purchase_discount.','.$category->name.','.$x.','.$data['item']->package_units;}
        
        }  
        
    public function getnumber(){
        $data['item']=Doo::db()->find('Items',array('select'=>'id,unit_type,purchase_price,purchase_discount,category,package_units','where'=>"barcode='".$this->params[0]."'", 'limit'=>1));
        if(!$data['item']){echo '';}else{
        $category=Doo::db()->find('Categories',array('select'=>'name','where'=>"id='".$data['item']->category."'", 'limit'=>1));
        $x=$data['item']->purchase_price-(($data['item']->purchase_price*$data['item']->purchase_discount)/100);
        echo $data['item']->id.','.$data['item']->unit_type.','.$data['item']->purchase_price.','.$data['item']->purchase_discount.','.$category->name.','.$x.','.$data['item']->package_units;}
        
        }
    
    public function details(){
         $data['title']='Good Receipts Note';
    $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
    $data['suppliers']=Doo::db()->find('Suppliers',array('select'=>'name,id'));
  
    
    
     $data['goodlist']=Doo::db()->relate('GoodDetails','Good',array('select'=>'good.*,good_details.* ','where'=>" good.id=' ".$this->params[0]." ' "));
     
     $supplier_name=Doo::db()->find('Suppliers',array('select'=>'name','where'=>" id='".$data['goodlist'][0]->Good->supplier."' ",'limit'=>1));
        $data['goodlist'][0]->Good->supplier_name=$supplier_name->name;
        $total=0;
        for($x=0;$x<count($data['goodlist']);$x++){
            
            $item=Doo::db()->find('Items',array('select'=>'barcode,name,unit_type,category','where'=>" id='".$data['goodlist'][$x]->item."' ",'limit'=>1));
            $data['goodlist'][$x]->barcode=$item->barcode;
            $data['goodlist'][$x]->item_name=$item->name;
            $data['goodlist'][$x]->unit_type=$item->unit_type;
            $category=Doo::db()->find('Categories',array('select'=>'name','where'=>" id='".$item->category."' ",'limit'=>1));
            $data['goodlist'][$x]->category=$category->name;
            $tot=$data['goodlist'][$x]->quantity*$data['goodlist'][$x]->price;
            $tot1=($tot*$data['goodlist'][$x]->discount)/100;
            $total=($tot-$tot1)+$total;
            $data['goodlist'][$x]->total=$tot-$tot1;
            }
            //play::pr($data['goodlist']);die();
        $data['goodlist'][0]->Good->total=$total;
        
		$this->renderc('good/details',$data);
      
        }
        
public function delete(){
    Doo::db()->delete('Good', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
    Doo::db()->delete('GoodDetails', array('where'=>" good='".$this->params[0]."'") );
    $this->index();
    }

   public function getpurchase(){ 
    $items=Doo::db()->find('PurchasesDetails',array('where'=>" purchase='".$this->params[0]."'"));
    $itms=Doo::db()->find('Items',array('select'=>'name,id'));
    $x=0;
    ?>

    
    <?php
    $tt='0';
    foreach($items as $item){
       
        $tot=$item->quantity*$item->price;
            $tot1=($tot*$item->discount)/100;
            $total=($tot-$tot1);
            $item->total=$tot-$tot1;
            $tt=$tt+$item->total;
        ?>
        
          <div class="<?php echo($x==0)?'first':''; ?> options-table-item col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-2 col-sm-3 col-xs-12">
                <input name="barcode_<?php echo $x; ?>" id="barcode_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12"  placeholder="quantity" required="required" type="text"  onchange="getnumber(this);" onkeyup="getnumber(this);" value="<?php echo $item->item; ?>" >
              </div>
              <div class="col-md-2 col-sm-3 col-xs-12">
                  <select  name="item_name_<?php echo $x; ?>" id="item_name_<?php echo $x; ?>" onchange="getname(this);" class="select2_group form-control" >
                      <option value="">Select</option>
                        <?php foreach($itms as $itm){ ?><option <?php echo($item->item==$itm->id)?"selected='selected'":""; ?> value="<?php echo $itm->id; ?>"><?php echo $itm->name; ?></option><?php } ?>
                  </select>
              </div>
              <div class="col-md-2 col-sm-2 col-xs-12">
                  <input name="quantity_<?php echo $x; ?>" id="quantity_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12"  placeholder="quantity" required="required" type="text"  onchange="updateval(this);" value="<?php echo $item->quantity; ?>">
              </div>
              <div class="col-md-2 col-sm-3 col-xs-12">
                <input type="text" name="price_<?php echo $x; ?>" id="price_<?php echo $x; ?>"  value="<?php echo $item->price; ?>" class="form-control col-md-7 col-xs-12" onchange="updateval(this);" onkeyup="updateval(this);"  >
              </div>
              <div class="col-md-2 col-sm-2 col-xs-12">
                  <input type="text" name="discount_<?php echo $x; ?>" id="discount_<?php echo $x; ?>"  value="<?php echo $item->discount; ?>" class="form-control col-md-7 col-xs-12" onchange="updateval(this);" onkeyup="updateval(this);"  >
              </div>
              <div class="col-md-2 col-sm-2 col-xs-12">
                  <input type="text" name="total_<?php echo $x; ?>" id="total_<?php echo $x; ?>"  value="<?php echo $item->total;  ?>" class="form-control col-md-7 col-xs-12" required="required">
              </div>
          </div>
          <input type="hidden" name="packageunits_<?php echo $x; ?>" id="packageunits_<?php echo $x; ?>" value="1">
          <input type="hidden" name="stockroom_<?php echo $x; ?>" id="stockroom_<?php echo $x; ?>" value="<?php echo $item->stockroom; ?>">
        <?php
         $x++;
        }echo("#".$tt);
    }
}
?>