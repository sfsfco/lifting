<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class PurchasesController extends CoreController{
	

    public function index(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;

        //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Purchases',array('select'=>'id')))/$paging);
            
                if(!isset($_GET['page'])){
                    $data['purchaseslist']=Doo::db()->relate('Purchases','Suppliers',array('select'=>'purchases.*,suppliers.name','limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['purchaseslist']=Doo::db()->relate('Purchases','Suppliers',array('select'=>'purchases.*,suppliers.name','limit'=>($_GET['page']-1)*$paging.','.$paging));
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager


    for($x=0;$x<count($data['purchaseslist']);$x++){
        $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['purchaseslist'][$x]->create_by."' ",'limit'=>1));
        $data['purchaseslist'][$x]->by=$user->first_name." ".$user->last_name;
        }
   
    
		$this->renderc('purchases/index',$data);
    }

    public function add(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['suppliers']=Doo::db()->find('Suppliers',array('select'=>'name,id'));
    $data['items']=Doo::db()->find('Items',array('select'=>'name,id'));
    $data['stockrooms']=Doo::db()->find('Stockrooms',array('select'=>'name,id'));
    $data['banks']=Doo::db()->find('Banks',array('select'=>'name,id'));
    
    $data['categories']=Doo::db()->find('Categories',array('select'=>'name,id'));
		$this->renderc('purchases/add',$data);
    }

	    public function insert(){
            
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
    $nuu=0;
    foreach($_POST as $key=>$value){
        $vv=explode('barcode_',$key);
        if(count($vv)>1){$nuu=$nuu+1;}
        }
 
      
      
      $purchases = Doo::loadModel('Purchases', true);
        
        $purchases->supplier=$_POST['supplier'];
        $purchases->purchase_date=$_POST['purchase_date'];
        $purchases->payment_method=$_POST['payment_method'];
        $purchases->total_value=$_POST['total_value'];
        
        $purchases->create_date=date('Y-m-d H:m:s');
        $purchases->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($purchases);
        if(isset($_POST['paid_value'])&& $_POST['paid_value']>'0'){
      $payments = Doo::loadModel('Payments', true);
        
        $payments->payment_date=$_POST['purchase_date'];
        $payments->payment_type='pay';
        $payments->payment_for=$_POST['supplier'];
        $payments->payment_value=$_POST['paid_value'];
        $payments->payment_id=$lastinserted;
        $payments->payment_method=$_POST['payment_method'];
        if($_POST['payment_method']=='1'){$payments->bank_id=$_POST['banks'];}
        
        //$payments->bank_no=$_POST['bank_no'];
        $payments->details="مشتريات";
        
        $payments->create_date=date('Y-m-d H:m:s');
        $payments->create_by=$_SESSION['username']['id'];
        $this->db()->insert($payments);
        }
        
        if(!empty($lastinserted)){
            
             for($x=0;$x<$nuu;$x++){
                 $purchasesdetails = Doo::loadModel('PurchasesDetails', true);
                 $purchasesdetails->item=$_POST['item_name_'.$x];
                 $purchasesdetails->purchase_price=$_POST['purchase_price_'.$x];
                 $purchasesdetails->purchase_discount=$_POST['purchase_discount_'.$x];
                 $purchasesdetails->sell_price=$_POST['sell_price_'.$x];
                 $purchasesdetails->sell_discount=$_POST['sell_discount_'.$x];
                 $purchasesdetails->package=$_POST['package_'.$x];
                 //$purchasesdetails->unit=$_POST['unit_'.$x];
                 $purchasesdetails->expire_date=$_POST['expire_date_'.$x];
                 $purchasesdetails->purchase=$lastinserted;
                 $purchasesdetails->create_date=date('Y-m-d H:m:s');
                 $purchasesdetails->create_by=$_SESSION['username']['id'];
                 $purchasesdetails->stockroom=$_POST['stockroom'];
                $this->db()->insert($purchasesdetails);
                
                $storedata=Doo::db()->find('Stores',array('select'=>'id,package','where'=>" item='".$_POST['item_name_'.$x]."' && stockroom='".$_POST['stockroom']."'", 'limit'=>1));        
                
                if(!empty($storedata->id)){
                    $stores = Doo::loadModel('Stores', true);
                    $stores->id=$storedata->id;
                    $stores->package=$storedata->package+$_POST['package_'.$x];
                    //$stores->unit=$storedata->unit+$_POST['unit_'.$x];
                    $stores->edit_date=date('Y-m-d H:m:s');
                    $stores->edit_by=$_SESSION['username']['id'];
                    $this->db()->update($stores);
                    }else{
                    $stores = Doo::loadModel('Stores', true);
                    
                    $stores->item=$_POST['item_name_'.$x];
                    $stores->purchase_price=$_POST['purchase_price_'.$x];
                    $stores->purchase_discount=$_POST['purchase_discount_'.$x];
                    
                    $stores->package=$_POST['package_'.$x];
                    //$stores->unit=$_POST['unit_'.$x];
                    $stores->expire_date=$_POST['expire_date_'.$x];
                    $stores->sell_price=$_POST['sell_price_'.$x];
                    $stores->sell_discount=$_POST['sell_discount_'.$x];
                    $stores->purchase=$lastinserted;
                    $stores->stockroom=$_POST['stockroom'];
                    $stores->create_date=date('Y-m-d H:m:s');
                    $stores->create_by=$_SESSION['username']['id'];
                    $this->db()->insert($stores);
                        }
                
                }
            
        
           
            }
          
       $data['purchaseslist']=Doo::db()->relate('Purchases','Suppliers',array('select'=>'purchases.*,suppliers.name'));
        //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Purchases',array('select'=>'id')))/$paging);
            
                if(!isset($_GET['page'])){
                    $data['purchaseslist']=Doo::db()->relate('Purchases','Suppliers',array('select'=>'purchases.*,suppliers.name','limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['purchaseslist']=Doo::db()->relate('Purchases','Suppliers',array('select'=>'purchases.*,suppliers.name','limit'=>($_GET['page']-1)*$paging.','.$paging));
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager


    for($x=0;$x<count($data['purchaseslist']);$x++){
        $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['purchaseslist'][$x]->create_by."' ",'limit'=>1));
        $data['purchaseslist'][$x]->by=$user->first_name." ".$user->last_name;
        }
   
    
		$this->renderc('purchases/index',$data);
      
        
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
         $data['rootUrl']=Doo::conf()->APP_URL;
         $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
    $data['suppliers']=Doo::db()->find('Suppliers',array('select'=>'name,id'));
  
    
    
     $data['purchaseslist']=Doo::db()->relate('PurchasesDetails','Purchases',array('select'=>'purchases.*,purchases_details.* ','where'=>" purchases.id=' ".$this->params[0]." ' "));
     //play::pr($data['purchaseslist']);die();
     $supplier_name=Doo::db()->find('Suppliers',array('select'=>'name','where'=>" id='".$data['purchaseslist'][0]->Purchases->supplier."' ",'limit'=>1));
        $data['purchaseslist'][0]->Purchases->supplier_name=$supplier_name->name;
        $total=0;
        for($x=0;$x<count($data['purchaseslist']);$x++){
            
            $item=Doo::db()->find('Items',array('select'=>'barcode,name,unit_type,category','where'=>" id='".$data['purchaseslist'][$x]->item."' ",'limit'=>1));
            $data['purchaseslist'][$x]->barcode=$item->barcode;
            $data['purchaseslist'][$x]->item_name=$item->name;
            $data['purchaseslist'][$x]->unit_type=$item->unit_type;
            $category=Doo::db()->find('Categories',array('select'=>'name','where'=>" id='".$item->category."' ",'limit'=>1));
            $data['purchaseslist'][$x]->category=$category->name;
            $tot=($data['purchaseslist'][$x]->package+($data['purchaseslist'][$x]->unit/2))*$data['purchaseslist'][$x]->purchase_price;
            $tot1=($tot*$data['purchaseslist'][$x]->purchase_discount)/100;
            $total=($tot-$tot1)+$total;
            $data['purchaseslist'][$x]->total=$tot-$tot1;
            }
        $data['purchaseslist'][0]->Purchases->total=$total;
		$this->renderc('purchases/details',$data);
      
        }
}
?>