<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class DeliveryController extends MembersController{
	
    public function index(){
  $data['title']='Delivery Note';
  if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Delivery', array('where'=>"id='".$id."'", 'limit'=>1) );
           Doo::db()->delete('DeliveryDetails',array('where'=>" delivery='".$id."'"));
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
      $where=" id != '0' ";
      if(isset($_POST['search']['value'])){
        if($_POST['search']['value']!=''){
        $where=" workorder = '%".$_POST['search']['value']."%'  ||  id = '".$_POST['search']['value']."'  ";  
        } 
      }
      if(isset($_POST['order'])){
        
        $ordering=array('id','title','client','delivery_to','delivery_date','workorder');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      
      $lists=Doo::db()->find('Delivery',array('where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));
      
      if(count($lists)>0){
      foreach ($lists as $list) {

         $workorder=Doo::db()->find('Workorders',array('select'=>'id,client,title','where'=>" id='".$list->workorder."'",'limit'=>1));
          if(isset($workorder->client)){
          $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$workorder->client."'",'limit'=>1));
          }
          $list->title=(isset($workorder->title))?$workorder->title:'deleted';
          $list->client_name=(isset($client->name))?$client->name:'deleted';

        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          substr($list->title, 0,10).'...',
          "<div class='ids text-center'>".substr($list->client_name, 0,10).'...'."</div>",
          "<div class='text-center'>".$list->delivery_to."</div>",
          "<div class='text-center'>".date('d-m-Y',strtotime($list->delivery_date))."</div>",
          "<div class='text-center'>".$list->workorder."</div>",
          "<div class='text-center'>
          <!--<a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."delivery/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a>-->
          <a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."delivery/details/".$list->id."' ><div  class='btn btn-info'><i class='fa fa-print'></i> Details</div></a> 
          </div>"
          );
      }
    }else{
         $info['data'][]=array("","","","","","","","","");

    }
      $datamodel = Doo::loadModel('Workorders', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Workorders',array('where'=>$where,'select'=>'id')));

      echo(json_encode($info));
    exit;

    }   
    
          
          
          
    $this->renderc('delivery/index',$data);
    
    }
    
   
        
   

    public function add(){ 
    $data['title']='Add Delivery Note';
    $data['rootUrl']=Doo::conf()->APP_URL;
    $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $deliverys=Doo::db()->find('Delivery',array('select'=>'workorder'));
    if(isset($deliverys[0]->workorder)){
    foreach($deliverys as $delivery){$deliver[]=$delivery->workorder;}
    }else{$deliver[]='';}
    //mysql_query("SELECT id, url, songname, bandname FROM radio WHERE id NOT IN ('".implode(',', $played)."') ORDER BY RAND()");
    $data['workorders']=Doo::db()->find('Workorders',array('select'=>'id,title,delivery_date','where'=>"id not in ('".implode(',',$deliver)."') "));
    
    $this->renderc('delivery/add',$data);
    }

    public function getitems(){
        $data['items']=Doo::db()->find('WorkordersDetails',array('where'=>" workorder='".$this->params[0]."'"));
        $data['item_id']=$this->params[0];
        $this->renderc('delivery/items',$data);
        }

     public function insert(){
          
        $delivery = Doo::loadModel('Delivery', true);
        $delivery->workorder=$_POST['workorder'];
        
        $delivery->delivery_address=$_POST['client_address'];
        $delivery->delivery_date=$_POST['delivery_date'];
        $delivery->delivery_to=$_POST['delivery_to'];
        
        $delivery->create_date=date('Y-m-d H:m:s');
        $delivery->create_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->insert($delivery);
        
          if(!empty($lastinserted)){
              $nuu=0;
                foreach($_POST as $key=>$value){$vv=explode('num_',$key);if(count($vv)>1){$nuu=$nuu+1;}}
                
                for($x=0;$x<20;$x++){
                    if(isset($_POST['id_'.$x])){
                     $deliverydetails = Doo::loadModel('DeliveryDetails', true);
                     $deliverydetails->delivery=$lastinserted;
                     $deliverydetails->workorder=$_POST['workorder'];
                     $deliverydetails->workorder_item=$_POST['id_'.$x];
                     $deliverydetails->i_d=$x;
                     $deliverydetails->quantity=$_POST['quantity_'.$x];
                     $deliverydetails->details=$_POST['details_'.$x];
                     $deliverydetails->swl=$_POST['swl_'.$x];
                     $deliverydetails->pl=$_POST['pl_'.$x];
                     $deliverydetails->create_date=date('Y-m-d H:m:s');
                     $deliverydetails->create_by=$_SESSION['member_username']['id'];
                    $this->db()->insert($deliverydetails);}
                      }
              
             }
        
          $_SESSION['inner_message']['success'][]='Data updated Successfully';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'delivery' );  
        }
        
        public function edit(){
        $data['title']='Edit Delivery Note';
        $data['rootUrl']=Doo::conf()->APP_URL;
        $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['clients']=Doo::db()->find('Clients',array('select'=>'id,name'));
        $data['workorder']=Doo::db()->find('Workorders',array('where'=>" id='".$this->params[0]."'",'limit'=>1));

        $a7a=Doo::db()->find('Delivery',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
        $data['id']=$this->params[0];
        $data['workorder']=Doo::db()->find('Workorders',array('where'=>" id='".$a7a->workorder."'",'limit'=>1));
        //play::pr($data['workorder']);die();
        $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$data['workorder']->client."'",'limit'=>1));
        $data['workorder']->client_name=$client->name;
        $data['workordersdetails']=Doo::db()->find('WorkordersDetails',array('where'=>" workorder='".$data['workorder']->id."'"));
        $this->renderc('delivery/edit',$data);
        
        }
    
     public function update(){
          $data['rootUrl']=Doo::conf()->APP_URL;
          $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
          
        $quotations = Doo::loadModel('Workorders', true);
        $quotations->id=$_POST['old_id'];
        $quotations->title=$_POST['title'];
        $quotations->client=$_POST['client'];
        $quotations->request_no=$_POST['request_no'];
        $quotations->delivery_date=$_POST['delivery_date'];
        $quotations->net_value=$_POST['net_value'];
        $quotations->tax=$_POST['tax'];
        $quotations->total_value=$_POST['total_value'];
        
        $quotations->edit_date=date('Y-m-d H:m:s');
        $quotations->edit_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->update($quotations);
        
          if(!empty($lastinserted)){
              Doo::db()->delete('WorkordersDetails',array('where'=>" workorder='".$_POST['old_id']."'"));
              $nuu=0;
                foreach($_POST as $key=>$value){$vv=explode('num_',$key);if(count($vv)>1){$nuu=$nuu+1;}}
                for($x=0;$x<$nuu;$x++){
                     $quotationsdetails = Doo::loadModel('WorkordersDetails', true);
                     $quotationsdetails->workorder=$_POST['old_id'];
                     $quotationsdetails->i_d=$_POST['id_'.$x];
                     $quotationsdetails->quantity=$_POST['quantity_'.$x];
                     $quotationsdetails->details=$_POST['details_'.$x];
                     $quotationsdetails->pl=$_POST['pl_'.$x];
                     $quotationsdetails->swl=$_POST['swl_'.$x];
                     $quotationsdetails->unit_cost=$_POST['unit_cost_'.$x];
                     $quotationsdetails->total=$_POST['total_'.$x];
                     $quotationsdetails->create_date=date('Y-m-d H:m:s');
                     $quotationsdetails->create_by=$_SESSION['member_username']['id'];
                    $this->db()->insert($quotationsdetails);
                    }
              
              }
        $this->index();
        }

   public function details(){
        $data['title']='DELIVERY NOTE';
        $data['rootUrl']=Doo::conf()->APP_URL;
        $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['delivery']=Doo::db()->find('Delivery',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
        $data['workorder']=Doo::db()->find('Workorders',array('where'=>" id='".$data['delivery']->workorder."'",'limit'=>1));
        if(isset($data['workorder']->title)){
          $data['delivery']->title=$data['workorder']->title;
          $data['delivery']->request_no=$data['workorder']->request_no;
          $client=Doo::db()->find('Clients',array('select'=>'name','where'=>" id='".$data['workorder']->client."'",'limit'=>1));
          $data['delivery']->client_name=$client->name;  
        }else{
          $data['delivery']->title='Deleted';
          $data['delivery']->request_no='Deleted';
          $data['delivery']->client_name='Deleted';
        }
        
        $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['delivery']->create_by."'",'limit'=>1));
        if(isset($user->first_name)){
        $data['delivery']->create_by_name=$user->first_name.' '.$user->last_name;  
        }else{
          $data['delivery']->create_by_name='Deleted';  
        }
        
        
        $data['deliverydetails']=Doo::db()->find('DeliveryDetails',array('where'=>" delivery='".$this->params[0]."'"));
        
        
        $this->renderc('delivery/details',$data);
        
        }
        


    public function delete(){
                Doo::db()->delete('Delivery',array('where'=>" id='".$this->params[0]."'"));
                Doo::db()->delete('DeliveryDetails',array('where'=>" delivery='".$this->params[0]."'"));
                $this->index();
            }
}
?>