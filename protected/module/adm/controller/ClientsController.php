<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ClientsController extends CoreController{
	

     public function index(){
    $data['title']="Clients";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Clients', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where=" name like '%".$_POST['search']['value']."%'  || phone like '%".$_POST['search']['value']."%'  || mobile like '%".$_POST['search']['value']."%'  ||  id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('id','name','phone','mobile','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }

      $lists=Doo::db()->find('Clients',array('where'=>$where,'select'=>'id,active,name,phone,mobile,create_date',key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {
        $sales=$this->db()->find('Sales',array('select'=>'total_value','where'=>" client='".$list->id."' "));
            $sales_sum=0;
            foreach($sales as $sale){$sales_sum=$sales_sum+$sale->total_value;}
            
            $takes=$this->db()->find('Payments',array('select'=>'payment_value','where'=>"  payment_for='".$list->id."' && payment_type='income' "));
            $take_sum=0;
            foreach($takes as $take){$take_sum=$take_sum+$take->payment_value;}
            
            $takes2=$this->db()->find('Payments',array('select'=>'payment_value','where'=>"  payment_for='".$list->id."' && payment_type='returned' "));
            $take_sum2=0;
            foreach($takes2 as $take2){$take_sum2=$take_sum2+$take2->payment_value;}
            
            
            $debit_credit_value=$sales_sum-$take_sum-$take_sum2;
            if(($sales_sum-$take_sum-$take_sum2)>=0){$debit_credit='Debtor';}else{$debit_credit='Creditor';}
        $star = ($list->active=='0')?'fa-star-o':'fa-star goldn';
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->name,
          "<div class='ids text-center'>".$list->phone."</div>",
          "<div class='ids text-center'>".$list->mobile."</div>",
          "<div class='text-center activate' icon-val='".$list->id."'><i class='fa ".$star."' aria-hidden='true'></i></div>",
          "<div class='ids text-center'>".$debit_credit."</div>",
          "<div class='ids text-center'>".$debit_credit_value."</div>",
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."clients/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","");

    }
      $datamodel = Doo::loadModel('Clients', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Clients',array('where'=>$where,'select'=>'id')));

      echo(json_encode($info));
    exit;

    }   
        
$this->renderc('clients/index',$data);
        
    }  

public function activate(){
    $photo = Doo::db()->find('Clients',array('select'=>'id,active','where'=>" id='".$this->params[0]."' ",'limit'=>1));
    if($photo->active=='0'){
      echo '1';
      $photo->active = '1';
    }else{
      echo '0';
      $photo->active = '0';
    }
    $this->db()->update($photo);
   }
    public function add(){
	$data['title']='Add Clients';
		$this->renderc('clients/add',$data);
    }

	    public function insert(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      $clients = Doo::loadModel('Clients', true);
      $uu=Doo::db()->find('Clients', array('select'=>'name','where'=>"name='".$_POST['name']."'  || username='".$_POST['username']."'  " , 'limit'=>1) );
      if(!empty($uu)){
          $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'clients/add/');
        }else{
        $clients->name=$_POST['name'];
        $clients->representative=$_POST['representative'];
        $clients->phone=$_POST['phone'];
        $clients->fax=$_POST['fax'];
        $clients->mobile=$_POST['mobile'];
        $clients->city=$_POST['city'];
        $clients->country=$_POST['country'];
        $clients->address=$_POST['address'];
        $clients->postal_code=$_POST['postal_code'];
        $clients->mail=$_POST['mail'];
        $clients->details=$_POST['details'];
        
        $clients->username=$_POST['username'];
        $clients->password=md5($_POST['password']);
        
        
        $clients->create_date=date('Y-m-d H:m:s');
        $clients->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($clients);
        
        if(!empty($lastinserted)){
             $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'clients' );           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    }

   public function delete(){
        $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $res =Doo::db()->delete('Clients', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
        $this->index();
            
        
		//$this->renderc('users/add',$data);
    }
    
  public function edit(){
    $data['title']='Edit Clients';
    $data['client']=Doo::db()->find('Clients',array('where'=>"clients.id='".$this->params[0]."'", 'limit'=>1));
    
        
		$this->renderc('clients/edit',$data);
    }
    
    public function update(){
    
      $uu=Doo::db()->find('Clients', array('select'=>'name',
        'where'=>"name='".$_POST['name']."' && id !='".$this->params[0]."'" , 'limit'=>1) );   
      if(!empty($uu)){
          $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'clients/edit/'.$this->params[0]);
        }else{
        $clients = Doo::loadModel('Clients', true);
        
        $clients->id=$this->params[0];
        
      $clients->name=$_POST['name'];
        $clients->representative=$_POST['representative'];
        $clients->phone=$_POST['phone'];
        $clients->fax=$_POST['fax'];
        $clients->mobile=$_POST['mobile'];
        $clients->city=$_POST['city'];
        $clients->country=$_POST['country'];
        $clients->address=$_POST['address'];
        $clients->postal_code=$_POST['postal_code'];
        $clients->mail=$_POST['mail'];
        $clients->details=$_POST['details'];
        $clients->username=$_POST['username'];
        if($_POST['password']!=''){
        $clients->password=md5($_POST['password']);
        }
        $clients->edit_date=date('Y-m-d H:m:s');
        $clients->edit_by=$_SESSION['username']['id'];
        
       $lastinserted=$this->db()->update($clients);
       
        if(!empty($lastinserted)){
           
         $_SESSION['inner_message']['success'][]='Data Updated Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'clients' ); 
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    } 
}
?>