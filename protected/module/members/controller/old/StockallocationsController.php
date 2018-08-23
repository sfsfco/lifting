<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class StockallocationsController extends MembersController{
	
    
        public function index(){
    $data['title']="Stockallocations";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Stockallocations', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where="   id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('id','title','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      
      $lists=Doo::db()->find('Stockallocations',array('select'=>'*',key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {
         $workorder=Doo::db()->find('Workorders',array('select'=>'id,total_value,title','where'=>" id='".$list->workorder."'",'limit'=>1));
         if(isset($workorder->title)){
          $workorder_title=$workorder->title;
          $order_value=$workorder->total_value;
          }else{
          $workorder_title='deleted';
          $order_value='deleted';
              }

        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $workorder_title,
          $list->workorder,
          $order_value,
          $list->cost_value,
          $list->percentage_profit,
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."stockallocations/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","");

    }
      $datamodel = Doo::loadModel('Stockallocations', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Stockallocations',array('where'=>$where,'select'=>'id')));

      echo(json_encode($info));
    exit;

    }   
        
$this->renderc('stockallocations/index',$data);
        
    }  

   
        
   

    public function add(){ 
    $data['rootUrl']=Doo::conf()->APP_URL;
    $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $deliverys=Doo::db()->find('Stockallocations',array('select'=>'workorder'));
    if(isset($deliverys[0]->workorder)){
    foreach($deliverys as $delivery){$deliver[]=$delivery->workorder;}
    
    $data['workorders']=Doo::db()->find('Workorders',array('select'=>'id,title,delivery_date','where'=>"id not in ('".implode(',',$deliver)."') "));
    }else{
        $data['workorders']=Doo::db()->find('Workorders',array('select'=>'id,title,delivery_date'));
        }
    $data['items']=Doo::db()->find('Stores',array('asc'=>'item'));
    
    for($x=0;$x<count($data['items']);$x++){
    $name=Doo::db()->find('Items',array('select'=>'name','where'=>" id='".$data['items'][$x]->item." ' ",'limit'=>1));    
    (isset($name->name))?$data['items'][$x]->name=$name->name:$data['items'][$x]->name='Deleted';
    
        }
    
    $this->renderc('stockallocations/add',$data);
    }

    public function getitems(){
        $data['workorder']=Doo::db()->find('Workorders',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
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
        echo $data['workorder']->total_value.'#'.$data['client']->name.'#'.$data['client']->representative.'#'.$data['client']->address.'#'.$data['workorder']->delivery_date;
        }

     public function insert(){
          $data['rootUrl']=Doo::conf()->APP_URL;
          $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
          
          
        $stock = Doo::loadModel('Stockallocations', true);
        
        $stock->workorder=$_POST['workorder'];
                                                                     
        $stock->percentage_profit=$_POST['percentage_profit'];
        $stock->cost_value=$_POST['cost_value'];
        $stock->create_date=date('Y-m-d H:m:s');
        $stock->create_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->insert($stock);
        
          if(!empty($lastinserted)){
              $nuu=0;
                foreach($_POST as $key=>$value){$vv=explode('num_',$key);if(count($vv)>1){$nuu=$nuu+1;}}
                
                for($x=0;$x<20;$x++){
                    if(isset($_POST['item_'.$x])){
                     $stockallocationsdetails = Doo::loadModel('StockallocationsDetails', true);
                     $stockallocationsdetails->stock=$lastinserted;
                     $stockallocationsdetails->stock_code=$_POST['item_'.$x];
                     $stockallocationsdetails->quantity=$_POST['quantity_'.$x];
                     $stockallocationsdetails->details=$_POST['details_'.$x];
                     
                     $stockallocationsdetails->unit_cost=$_POST['unit_cost_'.$x];
                     $stockallocationsdetails->total_value=$_POST['total_'.$x];
                     $stockallocationsdetails->create_date=date('Y-m-d H:m:s');
                     $stockallocationsdetails->create_by=$_SESSION['member_username']['id'];
                    $this->db()->insert($stockallocationsdetails);
                    //$item=Doo::loadModel('Stores',true);
                    $storitem=Doo::db()->find('Stores',array('select'=>'id,quantity','where'=>" id='".$_POST['item_'.$x]."' ",'limit'=>1));
                    $storitem->quantity =$storitem->quantity-$_POST['quantity_'.$x];
                    
                    Doo::db()->update($storitem);
                    
                    }
                    }
              
              }
        $this->index();
        }
        
        public function edit(){
        $data['title']="Edit Stockallocations";
        $data['rootUrl']=Doo::conf()->APP_URL;
        $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
                $data['workorders']=Doo::db()->find('Workorders',array('select'=>'id,title,delivery_date'));
                

            
            
             $data['items']=Doo::db()->find('Stores',array('asc'=>'item'));
    
    for($x=0;$x<count($data['items']);$x++){
    $name=Doo::db()->find('Items',array('select'=>'name','where'=>" id='".$data['items'][$x]->item." ' ",'limit'=>1));    
    (isset($name->name))?$data['items'][$x]->name=$name->name:$data['items'][$x]->name='Deleted';
    
        }
        
            $data['stock']=Doo::db()->find('Stockallocations',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
            $data['stockdetails']=Doo::db()->find('StockallocationsDetails',array('where'=>" stock='".$this->params[0]."'"));
            
            $data['workorder']=Doo::db()->find('Workorders',array('where'=>" id='".$data['stock']->workorder."'",'limit'=>1));
            
            $client=Doo::db()->find('Clients',array('select'=>'name','where'=>" id='".$data['workorder']->client."'",'limit'=>1));
            $data['stock']->client=$client->name;
            
            


        $this->renderc('stockallocations/edit',$data);
        
        }
    
       public function update(){
          
        $stock = Doo::loadModel('Stockallocations', true);
        
        $stock->workorder=$_POST['workorder'];                  
        $stock->id=$this->params[0];
        $stock->percentage_profit=$_POST['percentage_profit'];
        $stock->cost_value=$_POST['cost_value'];
        $stock->edit_date=date('Y-m-d H:m:s');
        $stock->edit_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->update($stock);
        
          if(!empty($lastinserted)){
              $nuu=0;
                foreach($_POST as $key=>$value){$vv=explode('num_',$key);if(count($vv)>1){$nuu=$nuu+1;}}
                
                $item=Doo::db()->find('StockallocationsDetails',array('select'=>'id,stock_code,quantity','where'=>" stock='".$this->params[0]."'",'limit'=>1));
                Doo::db()->delete('StockallocationsDetails',array('where'=>" stock='".$this->params[0]."'"));
                $storitem=Doo::db()->find('Stores',array('select'=>'id,quantity','where'=>" id='".$item->stock_code."' ",'limit'=>1));
                $storitem->quantity =$storitem->quantity+$item->quantity;                    
                    Doo::db()->update($storitem);                
                    
                for($x=0;$x<20;$x++){
                    if(isset($_POST['item_'.$x])){
                     $stockallocationsdetails = Doo::loadModel('StockallocationsDetails', true);
                     $stockallocationsdetails->stock=$this->params[0];
                     $stockallocationsdetails->stock_code=$_POST['item_'.$x];
                     $stockallocationsdetails->quantity=$_POST['quantity_'.$x];
                     $stockallocationsdetails->details=$_POST['details_'.$x];
                     
                     $stockallocationsdetails->unit_cost=$_POST['unit_cost_'.$x];
                     $stockallocationsdetails->total_value=$_POST['total_'.$x];
                     $stockallocationsdetails->create_date=date('Y-m-d H:m:s');
                     $stockallocationsdetails->create_by=$_SESSION['member_username']['id'];
                    $this->db()->insert($stockallocationsdetails);
                    //$item=Doo::loadModel('Stores',true);
                    $storitem=Doo::db()->find('Stores',array('select'=>'id,quantity','where'=>" id='".$_POST['item_'.$x]."' ",'limit'=>1));
                    $storitem->quantity =$storitem->quantity-$_POST['quantity_'.$x];
                    
                    Doo::db()->update($storitem);
                    
                    }
                    }
              
              }
        $this->index();
        }

   public function details(){
        $data['rootUrl']=Doo::conf()->APP_URL;
        $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['delivery']=Doo::db()->find('Delivery',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
        $data['workorder']=Doo::db()->find('Workorders',array('where'=>" id='".$data['delivery']->workorder."'",'limit'=>1));
        $data['delivery']->title=$data['workorder']->title;
        $data['delivery']->request_no=$data['workorder']->request_no;
        $client=Doo::db()->find('Clients',array('select'=>'name','where'=>" id='".$data['workorder']->client."'",'limit'=>1));
        $data['delivery']->client_name=$client->name;
        $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['delivery']->create_by."'",'limit'=>1));
        $data['delivery']->create_by_name=$user->first_name.' '.$user->last_name;
        
        $data['deliverydetails']=Doo::db()->find('DeliveryDetails',array('where'=>" delivery='".$this->params[0]."'"));
        
        
        $this->renderc('delivery/details',$data);
        
        }
        
    public function get_items(){
        $item=Doo::db()->find('Stores',array('select'=>'item,price','where'=>" id='".$this->params[0]."'",'limit'=>1));
        $details=Doo::db()->find('Items',array('select'=>'details','where'=>" id='".$item->item."'",'limit'=>1));
        echo $details->details.'#'.$item->price;
        }

    public function delete(){
                Doo::db()->delete('Stockallocations',array('where'=>" id='".$this->params[0]."'"));
                $item=Doo::db()->find('StockallocationsDetails',array('select'=>'id,stock_code,quantity','where'=>" stock='".$this->params[0]."'",'limit'=>1));
                Doo::db()->delete('StockallocationsDetails',array('where'=>" stock='".$this->params[0]."'"));
                
                $storitem=Doo::db()->find('Stores',array('select'=>'id,quantity','where'=>" id='".$item->stock_code."' ",'limit'=>1));
                $storitem->quantity =$storitem->quantity+$item->quantity;
                    
                    Doo::db()->update($storitem);

                $this->index();
            }
}
?>