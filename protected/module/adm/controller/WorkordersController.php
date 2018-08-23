<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class WorkordersController extends CoreController{
	
    public function index(){

          
    $data['title']="Workorders";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Workorders', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where=" title like '%".$_POST['search']['value']."%'  ||  id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('id','title','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      
      $lists=Doo::db()->find('Workorders',array('where'=>$where,'select'=>'id,title,request_no,client,create_date,quotation',key($order)=>$order[key($order)],'limit'=>$limit));

      if(count($lists)>0){
      foreach ($lists as $list) {

        $hascertificate=Doo::db()->find('Certificates',array('select'=>'id','where'=>" workorder='".$list->id."'"));
          if(isset($hascertificate[0]->id)){
              $list->hascertificate='<img src="'.Doo::conf()->APP_URL.'global/img/certificate.png">';
              }else{$list->hascertificate='';}
          $hasdelivery=Doo::db()->find('Delivery',array('select'=>'id','where'=>" workorder='".$list->id."'"));
          if(isset($hasdelivery[0]->id)){
              $list->hasdelivery='<img src="'.Doo::conf()->APP_URL.'global/img/delivery.png">';
              }else{$list->hasdelivery='';}
          $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$list->client."'",'limit'=>1));
          $list->client_name=(isset($client->name))?$client->name:'deleted';

        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          substr($list->title, 0,10).'...',
          "<div class='ids text-center'>".substr($list->client_name, 0,10).'...'."</div>",
          "<div class='ids text-center'>".$list->request_no."</div>",
          "<div class='text-center'>".date('d-m-Y',strtotime($list->delivery_date))."</div>",
          "<div class='text-center'>".$list->quotation."</div>",
          "<div class='text-center'>".$list->hascertificate."</div>",
          "<div class='text-center'>".$list->hasdelivery."</div>",
          "<div class='text-center'>
          <a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."workorders/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a> 
          <a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."workorders/details/".$list->id."' ><div  class='btn btn-info'><i class='fa fa-print'></i> Details</div></a> 
          <a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."invoices/add/".$list->id."' ><div  class='btn btn-danger'><i class='fa fa-share-square'></i> Convert To Invoice</div></a> 
<a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."certificates/add/".$list->id."' ><div  class='btn btn-danger'><i class='fa fa-share-square'></i> Convert To Certificate</div></a> 
<a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."delivery/add/".$list->id."' ><div  class='btn btn-danger'><i class='fa fa-share-square'></i> Convert To Delivery Note</div></a> 

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
        

    $this->renderc('workorders/index',$data);
    
    }
    
    public function add(){
          $data['title']='Add Quotation';
          $data['clients']=Doo::db()->find('Clients',array('select'=>'id,name'));
            
          
    $this->renderc('workorders/index',$data);
    
    }
    
   
        
   

    public function edit(){
        $data['title']="Edit Workorder";
        $data['clients']=Doo::db()->find('Clients',array('select'=>'id,name'));
        $data['workorder']=Doo::db()->find('Workorders',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
        $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$data['workorder']->client."'",'limit'=>1));
        $data['workorder']->client_name=$client->name;
        $data['workordersdetails']=Doo::db()->find('WorkordersDetails',array('where'=>" workorder='".$data['workorder']->id."'"));
        $this->renderc('workorders/edit',$data);
        
        }
    
     public function update(){
        $quotations = Doo::loadModel('Workorders', true);
        $quotations->id=$this->params[0];
        $quotations->title=$_POST['title'];
        $quotations->client=$_POST['client'];
        $quotations->request_no=$_POST['request_no'];
        $quotations->delivery_date=$_POST['delivery_date'];
        $quotations->net_value=$_POST['net_value'];
        $quotations->tax=$_POST['tax'];
        $quotations->total_value=$_POST['total_value'];
        
        $quotations->edit_date=date('Y-m-d H:m:s');
        $quotations->edit_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->update($quotations);
        
          if(!empty($lastinserted)){
              Doo::db()->delete('WorkordersDetails',array('where'=>" workorder='".$this->params[0]."'"));
              $nuu=0;
                foreach($_POST as $key=>$value){$vv=explode('num_',$key);if(count($vv)>1){$nuu=$nuu+1;}}
                for($x=0;$x<$nuu;$x++){
                     $quotationsdetails = Doo::loadModel('WorkordersDetails', true);
                     $quotationsdetails->workorder=$this->params[0];
                     $quotationsdetails->i_d=$_POST['id_'.$x];
                     $quotationsdetails->quantity=$_POST['quantity_'.$x];
                     $quotationsdetails->details=$_POST['details_'.$x];
                     $quotationsdetails->pl=$_POST['pl_'.$x];
                     $quotationsdetails->swl=$_POST['swl_'.$x];
                     $quotationsdetails->unit_cost=$_POST['unit_cost_'.$x];
                     $quotationsdetails->total=$_POST['total_'.$x];
                     $quotationsdetails->create_date=date('Y-m-d H:m:s');
                     $quotationsdetails->create_by=$_SESSION['username']['id'];
                    $this->db()->insert($quotationsdetails);
                    }
              
              }
              $_SESSION['inner_message']['success'][]='Data updated Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'workorders' );  
        
        }

   public function details(){
        
        $data['title']="Workorders Details";
        $data['quotation']=Doo::db()->find('Workorders',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
        
        $user=Doo::db()->find('Users',array('select'=>'id,first_name,last_name','where'=>" id='".$data['quotation']->create_by."'",'limit'=>1));
        if(isset($user->first_name)){
        $data['quotation']->create_by_name=$user->first_name." ".$user->last_name;  
        }else{
          $data['quotation']->create_by_name=' ';
        }
        
        $client=Doo::db()->find('Clients',array('select'=>'id,name,representative','where'=>" id='".$data['quotation']->client."'",'limit'=>1));
        $data['quotation']->client_name=$client->name;
        $data['quotation']->client_contact=$client->representative;
        $data['quotationsdetails']=Doo::db()->find('WorkordersDetails',array('where'=>" workorder='".$data['quotation']->id."'"));
        $this->renderc('workorders/details',$data);
        
        }
        


    public function delete(){
                Doo::db()->delete('Workorders',array('where'=>" id='".$this->params[0]."'"));
                Doo::db()->delete('WorkordersDetails',array('where'=>" workorder='".$this->params[0]."'"));
                $this->index();
            }
}
?>