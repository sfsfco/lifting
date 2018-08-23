<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ReportsController extends CoreController{
	

    public function index(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['title']='Reports';
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
    
   
    
		$this->renderc('reports/index',$data);
    }

    public function report1(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
    
   $data['storeslist']=Doo::db()->relate('Stores','Items',array('select'=>'stores.*,items.name'));
    
		$this->renderc('reports/report1',$data);
    }
   public function report2(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['saleslist']=Doo::db()->relate('Sales','Clients',array('select'=>'sales.*,clients.name'));
    for($x=0;$x<count($data['saleslist']);$x++){
        $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['saleslist'][$x]->create_by."' ",'limit'=>1));
        $data['saleslist'][$x]->by=$user->first_name." ".$user->last_name;
        }

    
		$this->renderc('reports/report2',$data);
    }

    public function report3(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
    
   $data['storeslist']=Doo::db()->relate('Stores','Items',array('select'=>'stores.*,items.*'));
   foreach($data['storeslist'] as $store){
       $arr[]=$store->item;
       }
       $arr1=implode('","',$arr);
   
   $data['itemslist']=Doo::db()->find('Items',array('where'=>'id not IN("'.$arr1.'") ')); 
   
		$this->renderc('reports/report3',$data);
    }

   public function report4(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
    
   $data['supplierslist']=Doo::db()->find('Suppliers');
   
  for($x=0;$x<count($data['supplierslist']);$x++){
        $data['supplierslist'][$x]->total=0;
        $supplier=Doo::db()->find('Purchases',array('select'=>'total_value','where'=>" supplier='".$data['supplierslist'][$x]->id."' "));
        foreach($supplier as $sp){$data['supplierslist'][$x]->total=$sp->total_value+$data['supplierslist'][$x]->total;}
        
        }

    
		$this->renderc('reports/report4',$data);
    }
   public function report5(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
    $data['clientslist']=Doo::db()->find('Clients');
    for($x=0;$x<count($data['clientslist']);$x++){
            $sales=$this->db()->find('Sales',array('select'=>'total_value','where'=>" client='".$data['clientslist'][$x]->id."' "));
            $sales_sum=0;
            foreach($sales as $sale){$sales_sum=$sales_sum+$sale->total_value;}
            
            $takes=$this->db()->find('Payments',array('select'=>'payment_value','where'=>"  payment_for='".$data['clientslist'][$x]->id."' && payment_type='income' "));
            $take_sum=0;
            foreach($takes as $take){$take_sum=$take_sum+$take->payment_value;}
            
            $takes2=$this->db()->find('Payments',array('select'=>'payment_value','where'=>"  payment_for='".$data['clientslist'][$x]->id."' && payment_type='returned' "));
            $take_sum2=0;
            foreach($takes2 as $take2){$take_sum2=$take_sum2+$take2->payment_value;}
            
            
            $data['clientslist'][$x]->debit_credit_value=$sales_sum-$take_sum-$take_sum2;
            if(($sales_sum-$take_sum-$take_sum2)>=0){$data['clientslist'][$x]->debit_credit='Debtor';}else{$data['clientslist'][$x]->debit_credit='Creditor';}
            }
    
		$this->renderc('reports/report5',$data);
        }
   
}
?>