<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class SalesController extends MembersController{
	

    public function index(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    //$data['purchaseslist']=Doo::db()->relate('Sales','Suppliers',array('select'=>'purchases.*,suppliers.name'));
    

        //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Sales',array('select'=>'id')))/$paging);
            
                if(!isset($_GET['page'])){
                    $data['saleslist']=Doo::db()->relate('Sales','Clients',array('select'=>'sales.*,clients.name','limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['saleslist']=Doo::db()->relate('Sales','Clients',array('select'=>'sales.*,clients.name','limit'=>($_GET['page']-1)*$paging.','.$paging));
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager

    for($x=0;$x<count($data['saleslist']);$x++){
        $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['saleslist'][$x]->create_by."' ",'limit'=>1));
        $data['saleslist'][$x]->by=$user->first_name." ".$user->last_name;
        }
    
		$this->renderc('sales/index',$data);
    }

    public function add(){
        
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['clients']=Doo::db()->find('Clients',array('select'=>'name,id'));
    $data['stores']=Doo::db()->find('Stores',array('select'=>'id,item'));
      for($x=0;$x<count($data['stores']);$x++){
        $item=Doo::db()->find('Items',array('select'=>'name','where'=>" id='".$data['stores'][$x]->item."' ",'limit'=>1));
        $data['stores'][$x]->name=$item->name;
        }
   
    $data['stockrooms']=Doo::db()->find('Stockrooms',array('select'=>'name,id'));
    $data['banks']=Doo::db()->find('Otherbanks',array('select'=>'name,id'));

    $data['categories']=Doo::db()->find('Categories',array('select'=>'name,id'));
		$this->renderc('sales/add',$data);
    }

	    public function insert(){
            
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
    $nuu=0;
    foreach($_POST as $key=>$value){
        $vv=explode('barcode_',$key);
        if(count($vv)>1){$nuu=$nuu+1;}
        }
 
      
      
      $sales = Doo::loadModel('Sales', true);
      
      
        
        $sales->client=$_POST['client'];
        $sales->sell_date=date('Y-m-d');
        $sales->payment_method=$_POST['payment_method'];
        $sales->total_value=$_POST['total_value'];
        
        $sales->create_date=date('Y-m-d H:m:s');
        $sales->create_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->insert($sales);
        if(isset($_POST['paid_value'])&& $_POST['paid_value']>'0'){
        $payments = Doo::loadModel('Payments', true);
        $payments->payment_date=date('Y-m-d');
        $payments->payment_type='income';
        $payments->payment_for=$_POST['client'];
        $payments->payment_value=$_POST['paid_value'];
        $payments->payment_id=$lastinserted;
        $payments->payment_method=$_POST['payment_method'];
        if($_POST['payment_method']=='1'){$payments->bank_id=$_POST['banks'];}
        
        //$payments->bank_no=$_POST['bank_no'];
        $payments->details="مبيعات";
        
        $payments->create_date=date('Y-m-d H:m:s');
        $payments->create_by=$_SESSION['member_username']['id'];
        $this->db()->insert($payments);
        }
        if(!empty($lastinserted)){
             for($x=0;$x<$nuu;$x++){
                 $salesdetails = Doo::loadModel('SalesDetails', true);
                 $salesdetails->item=$_POST['item_name_'.$x];
                 $salesdetails->sell_price=$_POST['sell_price_'.$x];
                 $salesdetails->sell_discount=$_POST['sell_discount_'.$x];
                 $salesdetails->package=$_POST['package_'.$x];
                 $salesdetails->unit=$_POST['unit_'.$x];
                 $salesdetails->expire_date=$_POST['expire_date_'.$x];
                 $salesdetails->sales=$lastinserted;
                 $salesdetails->create_date=date('Y-m-d H:m:s');
                 $salesdetails->create_by=$_SESSION['member_username']['id'];
                $this->db()->insert($salesdetails);
                
                $storedata=Doo::db()->find('Stores',array('select'=>'id,package,unit','where'=>" item='".$_POST['item_name_'.$x]."' && expire_date='".$_POST['expire_date_'.$x]."'", 'limit'=>1));        
                
                
                if(!empty($storedata->id)){
                    $stores = Doo::loadModel('Stores', true);
                    $stores->id=$storedata->id;
                    $stores->package=$storedata->package-$_POST['package_'.$x];
                    $stores->unit=$storedata->unit-$_POST['unit_'.$x];
                    $stores->edit_date=date('Y-m-d H:m:s');
                    $stores->edit_by=$_SESSION['member_username']['id'];
                    $this->db()->update($stores);
                    }
                
                }
            
        
           
            }
          
        //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Sales',array('select'=>'id')))/$paging);
            
                if(!isset($_GET['page'])){
                    $data['saleslist']=Doo::db()->relate('Sales','Clients',array('select'=>'sales.*,clients.name','limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['saleslist']=Doo::db()->relate('Sales','Clients',array('select'=>'sales.*,clients.name','limit'=>($_GET['page']-1)*$paging.','.$paging));
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager

    for($x=0;$x<count($data['saleslist']);$x++){
        $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['saleslist'][$x]->create_by."' ",'limit'=>1));
        $data['saleslist'][$x]->by=$user->first_name." ".$user->last_name;
        }
    
		$this->renderc('sales/index',$data);
      
        
		//$this->renderc('users/add',$data);
    }


    

    

    
    public function getnames(){
        $data['item']=Doo::db()->find('Items',array('select'=>'barcode,unit_type,category,package_units','where'=>"id='".$this->params[0]."'", 'limit'=>1));
        $data['store']=Doo::db()->find('Stores',array('select'=>'sell_price,sell_discount,expire_date','where'=>"item='".$this->params[0]."' && stockroom='".$this->params[1]."' ", 'limit'=>1));
        
        $category=Doo::db()->find('Categories',array('select'=>'name','where'=>"id='".$data['item']->category."'", 'limit'=>1));
        $x=$data['store']->sell_price-(($data['store']->sell_price*$data['store']->sell_discount)/100);
        
        if(!isset($data['item'])){echo '';}else{echo $data['item']->barcode.','.$data['item']->unit_type.','.$data['store']->sell_price.','.$data['store']->sell_discount.','.$category->name.','.$x.','.$data['store']->expire_date.','.$data['item']->package_units;}
        
        }  
        
    public function getnumber(){
       $data['item']=Doo::db()->find('Items',array('select'=>'id,unit_type,category,package_units','where'=>"barcode='".$this->params[0]."'", 'limit'=>1));
       
           $data['store']=Doo::db()->find('Stores',array('select'=>'sell_price,sell_discount,expire_date','where'=>"item='".$data['item']->id."' && stockroom='".$this->params[1]."' ", 'limit'=>1));
       
       
            $category=Doo::db()->find('Categories',array('select'=>'name','where'=>"id='".$data['item']->category."'", 'limit'=>1));    
            $x=$data['store']->sell_price-(($data['store']->sell_price*$data['store']->sell_discount)/100);
       
        
        
        if(!isset($data['item']) ){echo '';}else{echo $data['item']->id.','.$data['item']->unit_type.','.$data['store']->sell_price.','.$data['store']->sell_discount.','.$category->name.','.$x.','.$data['store']->expire_date.','.$data['item']->package_units;}
        }
    
    public function details(){
         $data['rootUrl']=Doo::conf()->APP_URL;
         $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
    $data['clients']=Doo::db()->find('Clients',array('select'=>'name,id'));
  $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
    
    
     $data['saleslist']=Doo::db()->relate('SalesDetails','Sales',array('select'=>'sales.*,sales_details.* ','where'=>" sales.id=' ".$this->params[0]." ' "));
     
     $client_name=Doo::db()->find('Clients',array('select'=>'name','where'=>" id='".$data['saleslist'][0]->Sales->client."' ",'limit'=>1));
        $data['saleslist'][0]->Sales->client_name=$client_name->name;
        $total=0;
        for($x=0;$x<count($data['saleslist']);$x++){
            
            $item=Doo::db()->find('Items',array('select'=>'barcode,name,unit_type,category','where'=>" id='".$data['saleslist'][$x]->item."' ",'limit'=>1));
            $data['saleslist'][$x]->barcode=$item->barcode;
            $data['saleslist'][$x]->item_name=$item->name;
            $data['saleslist'][$x]->unit_type=$item->unit_type;
            $category=Doo::db()->find('Categories',array('select'=>'name','where'=>" id='".$item->category."' ",'limit'=>1));
            $data['saleslist'][$x]->category=$category->name;
            $tot=($data['saleslist'][$x]->package+($data['saleslist'][$x]->unit/2))*$data['saleslist'][$x]->sell_price;
            $tot1=($tot*$data['saleslist'][$x]->sell_discount)/100;
            $total=($tot-$tot1)+$total;
            $data['saleslist'][$x]->total=$tot-$tot1;
            }
        $data['saleslist'][0]->Sales->total=$total;
		$this->renderc('sales/details',$data);
      
        }

   
}
?>