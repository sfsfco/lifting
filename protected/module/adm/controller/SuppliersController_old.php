<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class SuppliersController extends CoreController{
	

    public function index(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;

    //pager
    $paging=$this->paging;
	$data['pages']=ceil(count(Doo::db()->find('Suppliers',array('select'=>'id')))/$paging);
		if(!isset($_GET['page'])){
            $data['supplierslist']=Doo::db()->find('Suppliers',array('limit'=>'0,'.$paging));
			$data['selectedpage']='1';
		}else{
            $data['supplierslist']=Doo::db()->find('Suppliers',array('limit'=>($_GET['page']-1)*$paging.','.$paging));
			$data['selectedpage']=$_GET['page'];
		}	
        //
        for($x=0;$x<count($data['supplierslist']);$x++){
            $purchases=$this->db()->find('Purchases',array('select'=>'total_value','where'=>" supplier='".$data['supplierslist'][$x]->id."' "));
            $purchase_sum=0;
            foreach($purchases as $purchase){$purchase_sum=$purchase_sum+$purchase->total_value;}
            
            $takes=$this->db()->find('Payments',array('select'=>'payment_value','where'=>"  payment_for='".$data['supplierslist'][$x]->id."'  && payment_type!='income' "));
            $take_sum=0;
            foreach($takes as $take){$take_sum=$take_sum+$take->payment_value;}
            
            
            $data['supplierslist'][$x]->debit_credit_value=$take_sum-$purchase_sum;
            if(($take_sum-$purchase_sum)>=0){$data['supplierslist'][$x]->debit_credit='Debtor';}else{$data['supplierslist'][$x]->debit_credit='Creditor';}
            }
    
    //pager
		$this->renderc('suppliers/index',$data);
    }

    public function add(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
		$this->renderc('suppliers/add',$data);
    }

	    public function insert(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      $suppliers = Doo::loadModel('Suppliers', true);
      $uu=Doo::db()->find('Suppliers', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
//$data['carfield']=Doo::db()->relate('cars','productphotos',array('where'=>"cars.id='".$this->params[0]."'"));      
      if(!empty($uu)){
          
         // play::pr($uu);
          //play::pr($uu[0]->username);
          echo('0');
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
        $suppliers->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($suppliers);
        
        if(!empty($lastinserted)){$this->index();}
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
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   // $data['user']=Doo::db()->find('Users', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
   
    $data['supplier']=Doo::db()->find('Suppliers',array('where'=>"suppliers.id='".$this->params[0]."'", 'limit'=>1));
    
        
		$this->renderc('suppliers/edit',$data);
    }
    
    public function update(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      
      $uu=Doo::db()->find('Suppliers', array('select'=>'name',
        'where'=>"name='".$_POST['name']."' && id !='".$_POST['old_id']."'" , 'limit'=>1) );   
      if(!empty($uu)){
          echo('0');
        }else{
        $suppliers = Doo::loadModel('Suppliers', true);
        
        $suppliers->id=$_POST['old_id'];
        
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
        $suppliers->edit_by=$_SESSION['username']['id'];
        
       $lastinserted=$this->db()->update($suppliers);
       
        if(!empty($lastinserted)){$this->index();}
          }
      
      
        
		//$this->renderc('users/add',$data);
    } 
}
?>