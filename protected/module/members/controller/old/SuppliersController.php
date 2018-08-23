<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class SuppliersController extends MembersController{
    

    public function index(){
    $data['title']="Suppliers";
   if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Suppliers', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where=" name like '%".$_POST['search']['value']."%'  || phone1 like '%".$_POST['search']['value']."%'  || mobile like '%".$_POST['search']['value']."%'  ||  id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('id','name','phone1','mobile','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }

      $lists=Doo::db()->find('Suppliers',array('where'=>$where,'select'=>'id,name,phone1,mobile,create_date',key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {

        $purchases=$this->db()->find('Purchases',array('select'=>'total_value','where'=>" supplier='".$list->id."' "));
            $purchase_sum=0;
            foreach($purchases as $purchase){$purchase_sum=$purchase_sum+$purchase->total_value;}
            
            $takes=$this->db()->find('Payments',array('select'=>'payment_value','where'=>"  payment_for='".$list->id."'  && payment_type!='income' "));
            $take_sum=0;
            foreach($takes as $take){$take_sum=$take_sum+$take->payment_value;}
            
            
            $debit_credit_value=$take_sum-$purchase_sum;
            if(($take_sum-$purchase_sum)>=0){$debit_credit='Debtor';}else{$debit_credit='Creditor';}

        
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->name,
          "<div class='ids text-center'>".$list->phone1."</div>",
          "<div class='ids text-center'>".$list->mobile."</div>",
          "<div class='ids text-center'>".$debit_credit."</div>",
          "<div class='ids text-center'>".$debit_credit_value."</div>",
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."suppliers/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","");

    }
      $datamodel = Doo::loadModel('Suppliers', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Suppliers',array('where'=>$where,'select'=>'id')));

      echo(json_encode($info));
    exit;

    }  
        
    
    //pager
        $this->renderc('suppliers/index',$data);
    }

    public function add(){
       $data['title']='Add Suppliers';
        $this->renderc('suppliers/add',$data);
    }

        public function insert(){
      $suppliers = Doo::loadModel('Suppliers', true);
      $uu=Doo::db()->find('Suppliers', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
      if(!empty($uu)){
          $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'suppliers/add/');
        }else{
        $suppliers->name=$_POST['name'];
        $suppliers->address=$_POST['address'];
        $suppliers->phone1=$_POST['phone1'];
        $suppliers->phone2=$_POST['phone2'];
        $suppliers->fax=$_POST['fax'];
        $suppliers->mobile=$_POST['mobile'];
        $suppliers->city=$_POST['city'];
        $suppliers->country=$_POST['country'];
        $suppliers->postal_code=$_POST['postal_code'];
        $suppliers->site=$_POST['site'];
        $suppliers->mail=$_POST['mail'];
        $suppliers->details=$_POST['details'];
        $suppliers->create_date=date('Y-m-d H:m:s');
        $suppliers->create_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->insert($suppliers);
        
        if(!empty($lastinserted)){
            $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'suppliers' );           
        }
          }
      
      
        
        //$this->renderc('users/add',$data);
    }

   public function delete(){
        $data['rootUrl']=Doo::conf()->APP_URL;
    $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $res =Doo::db()->delete('Suppliers', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
       
       $this->index();
        
        //$this->renderc('users/add',$data);
    }
    
  public function edit(){
   $data['title']='Edit Supplier';
    $data['supplier']=Doo::db()->find('Suppliers',array('where'=>"suppliers.id='".$this->params[0]."'", 'limit'=>1));
    
        
        $this->renderc('suppliers/edit',$data);
    }
    
    public function update(){
    
      $uu=Doo::db()->find('Suppliers', array('select'=>'name',
        'where'=>"name='".$_POST['name']."' && id !='".$this->params[0]."'" , 'limit'=>1) );   
      if(!empty($uu)){
          $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'suppliers/edit/'.$this->params[0]);
        }else{
        $suppliers = Doo::loadModel('Suppliers', true);
        
        $suppliers->id=$this->params[0];
        
        $suppliers->name=$_POST['name'];
        $suppliers->address=$_POST['address'];
        $suppliers->phone1=$_POST['phone1'];
        $suppliers->phone2=$_POST['phone2'];
        $suppliers->fax=$_POST['fax'];
        $suppliers->mobile=$_POST['mobile'];
        $suppliers->city=$_POST['city'];
        $suppliers->country=$_POST['country'];
        $suppliers->postal_code=$_POST['postal_code'];
        $suppliers->site=$_POST['site'];
        $suppliers->mail=$_POST['mail'];
        $suppliers->details=$_POST['details'];
        
        $suppliers->edit_date=date('Y-m-d H:m:s');
        $suppliers->edit_by=$_SESSION['member_username']['id'];
        
       $lastinserted=$this->db()->update($suppliers);
       
        if(!empty($lastinserted)){

             $_SESSION['inner_message']['success'][]='Data Updated Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'suppliers' ); 
           
        }
          }
      
      
        
        //$this->renderc('users/add',$data);
    } 
}
?>