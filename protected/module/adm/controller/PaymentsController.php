<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class PaymentsController extends CoreController{
	

    public function index(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
        $data['title']='Payments';
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Banks',array('select'=>'id')))/$paging);
                if(!isset($_GET['page'])){
                    $data['bankslist']=Doo::db()->find('Banks',array('limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['bankslist']=Doo::db()->find('Banks',array('limit'=>($_GET['page']-1)*$paging.','.$paging));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager
  
		$this->renderc('banks/index',$data);
    }

    public function pay(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
        $data['title']='Payment Check';
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Payments',array('select'=>'id','where'=>"payment_type='pay' || payment_type='expense'")))/$paging);
                if(!isset($_GET['page'])){
                    $data['paymentslist']=Doo::db()->find('Payments',array('limit'=>'0,'.$paging,'where'=>"payment_type='pay' || payment_type='expense'"));
                    $data['selectedpage']='1';
                }else{
                    $data['paymentslist']=Doo::db()->find('Payments',array('limit'=>($_GET['page']-1)*$paging.','.$paging,'where'=>"payment_type='pay'  || payment_type='expense'"));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager
        
         for($x=0;$x<count($data['paymentslist']);$x++){
             if($data['paymentslist'][$x]->payment_type=='pay'){
             $suppliers=Doo::db()->find('Suppliers',array('select'=>'name','where'=>"id='".$data['paymentslist'][$x]->payment_for."'",'limit'=>1));
             $data['paymentslist'][$x]->supplier=$suppliers->name;
             }else{
             $expenses=Doo::db()->find('Expenses',array('select'=>'name','where'=>"id='".$data['paymentslist'][$x]->payment_for."'",'limit'=>1));
             $data['paymentslist'][$x]->supplier=$expenses->name;
                 
                 }
             }
		$this->renderc('payments/index',$data);
    }
    public function income(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['title']='Income Check';
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Payments',array('select'=>'id','where'=>"payment_type='income'")))/$paging);
                if(!isset($_GET['page'])){
                    $data['paymentslist']=Doo::db()->find('Payments',array('limit'=>'0,'.$paging,'where'=>"payment_type='income'"));
                    $data['selectedpage']='1';
                }else{
                    $data['paymentslist']=Doo::db()->find('Payments',array('limit'=>($_GET['page']-1)*$paging.','.$paging,'where'=>"payment_type='income' "));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager
        
         for($x=0;$x<count($data['paymentslist']);$x++){
             $clients=Doo::db()->find('Clients',array('select'=>'name','where'=>"id='".$data['paymentslist'][$x]->payment_for."'",'limit'=>1));
             $data['paymentslist'][$x]->client=$clients->name;
             }
		$this->renderc('payments/incomeindex',$data);
    }

    public function paymenttype(){
        
        if($this->params[0]=='expense'){
            $expenses=Doo::db()->find('Expenses',array('select'=>'id,name'));
           
            foreach($expenses as $expense){ echo('<option value="'.$expense->id.'">'.$expense->name.'</option>');}
             
            }
        if($this->params[0]=='pay'){
            $suppliers=Doo::db()->find('Suppliers',array('select'=>'id,name'));
           
            foreach($suppliers as $supplier){ echo('<option value="'.$supplier->id.'">'.$supplier->name.'</option>');}
             
            }
        }
   public function paymenttype1(){
        
        if($this->params[0]=='other'){
            echo('<option value="0">Other</option>');
             
            }
        if($this->params[0]=='income'){
            $clients=Doo::db()->find('Clients',array('select'=>'id,name'));
           
            foreach($clients as $client){ echo('<option value="'.$client->id.'">'.$client->name.'</option>');}
             
            }
        }
   public function getpaymentid1(){
        
        if($this->params[1]=='other'){
            echo('<option value="0">Other</option>');
            }
        if($this->params[1]=='income'){
            
            $sales=Doo::db()->find('Sales',array('select'=>'id','where'=>" client='".$this->params[0]."'"));
            
           echo('<option value="0">Other</option>');
            foreach($sales as $sale){ echo('<option value="'.$sale->id.' Bill No : '.$sale->id.'</option>');}
            //foreach($slaes as $sale){ echo('<option value="'.$sale->id.'" >'.$sale->id.'</option>');}
             
            }
        }

  public function getpaymentid(){
        
        if($this->params[1]=='expense'){
            echo('<option value="0">Other</option>');
            }
        if($this->params[1]=='pay'){
            
            $purchases=Doo::db()->find('Purchases',array('select'=>'id','where'=>" supplier='".$this->params[0]."'"));
           echo('<option value="0">Other</option>');
            foreach($purchases as $purchase){ echo('<option value="'.$purchase->id.' Bill No : '.$purchase->id.'</option>');}
             
            }
        }

    public function add(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['title']='Add Payment';
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['suppliers']=Doo::db()->find('Suppliers',array('select'=>'id,name'));
    $data['otherbanks']=Doo::db()->find('Otherbanks',array('select'=>'id,name'));
    $data['banks']=Doo::db()->find('Banks',array('select'=>'id,name'));
    $data['payments']=Doo::db()->find('Purchases',array('select'=>'id,total_value',"where"=>" supplier='".$data['suppliers'][0]->id."'"));
    for($x=0;$x<count($data['payments']);$x++){
        $paid_values=$this->db()->find('Payments',array('select'=>'payment_value','where'=>"  payment_for='".$data['suppliers'][0]->id."' && payment_id='".$data['payments'][$x]->id."' "));
        $total_paid_values=0;
        foreach($paid_values as $paid){$total_paid_values=$total_paid_values+$paid->payment_value;}
        $data['payments'][$x]->rest_value=$total_paid_values;
        }
		$this->renderc('payments/add',$data);
    }
   public function addpay(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['title']='Add Payment';
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['clients']=Doo::db()->find('Clients',array('select'=>'id,name'));
    $data['otherbanks']=Doo::db()->find('Otherbanks',array('select'=>'id,name'));
    $data['sales']=Doo::db()->find('Sales',array('select'=>'id,total_value',"where"=>" client='".$data['clients'][0]->id."'"));
    for($x=0;$x<count($data['sales']);$x++){
        $paid_values=$this->db()->find('Payments',array('select'=>'payment_value','where'=>" payment_type='income' &&  payment_for='".$data['clients'][0]->id."' && payment_id='".$data['sales'][$x]->id."' "));
        $total_paid_values=0;
        foreach($paid_values as $paid){$total_paid_values=$total_paid_values+$paid->payment_value;}
        $data['sales'][$x]->rest_value=$total_paid_values;
        }
		$this->renderc('payments/addpay',$data);
    }

	    public function insert(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   $payments = Doo::loadModel('Payments', true);
        
        $payments->payment_date=$_POST['payment_date'];
        $payments->payment_type=$_POST['payment_type'];
        $payments->payment_for=$_POST['payment_for'];
        $payments->payment_value=$_POST['payment_value'];
        $payments->payment_id=$_POST['payment_id'];
        $payments->payment_method=$_POST['payment_method'];
        if($_POST['payment_method']=='1'){$payments->bank_id=$_POST['banks'];}
        
        //$payments->bank_no=$_POST['bank_no'];
        $payments->details=$_POST['details'];
        
        $payments->create_date=date('Y-m-d H:m:s');
        $payments->create_by=$_SESSION['username']['id'];
        $this->db()->insert($payments);

        $this->pay();
            
          }

	    public function insertpay(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   $payments = Doo::loadModel('Payments', true);
        
        $payments->payment_date=$_POST['payment_date'];
        $payments->payment_type=$_POST['payment_type'];
        $payments->payment_for=$_POST['payment_for'];
        $payments->payment_value=$_POST['payment_value'];
        $payments->payment_id=$_POST['payment_id'];
        $payments->payment_method=$_POST['payment_method'];
        if($_POST['payment_method']=='1'){$payments->bank_id=$_POST['banks'];}
        
        //$payments->bank_no=$_POST['bank_no'];
        $payments->details=$_POST['details'];
        
        $payments->create_date=date('Y-m-d H:m:s');
        $payments->create_by=$_SESSION['username']['id'];
        $this->db()->insert($payments);

   $this->income();
           
            
          }


  
    
 
public function details(){
   $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
$data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
    $data['details']=Doo::db()->find('Payments',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
    if($data['details']->payment_type=='pay'){
        $pay_for=Doo::db()->find('Suppliers',array('select'=>'id,name','where'=>" id='".$data['details']->payment_for."'",'limit'=>1));
        $data['details']->pay_for=$pay_for->name;
        if($data['details']->payment_method=='1'){
            $bank=Doo::db()->find('Banks',array('select'=>'id,name','where'=>" id='".$data['details']->bank_id."'",'limit'=>1));
            $data['details']->bank=$bank->name;
            }

        
        }
    if($data['details']->payment_type=='expense'){
        $pay_for=Doo::db()->find('Expenses',array('select'=>'id,name','where'=>" id='".$data['details']->payment_for."'",'limit'=>1));
        $data['details']->pay_for=$pay_for->name;
        if($data['details']->payment_method=='1'){
            $bank=Doo::db()->find('Banks',array('select'=>'id,name','where'=>" id='".$data['details']->bank_id."'",'limit'=>1));
            $data['details']->bank=$bank->name;
            }

        
        }
    if($data['details']->payment_type=='income'){
        $pay_for=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$data['details']->payment_for."'",'limit'=>1));
        $data['details']->pay_for=$pay_for->name;
        if($data['details']->payment_method=='1'){
            $bank=Doo::db()->find('Otherbanks',array('select'=>'id,name','where'=>" id='".$data['details']->bank_id."'",'limit'=>1));
            $data['details']->bank=$bank->name;
            }

        }
    $this->renderc('payments/details',$data);
    }

public function delete(){
    Doo::db()->delete('Payments', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
    if($this->params[1]=='pay'){$this->pay();}else{$this->income();}
    
    }
}
?>