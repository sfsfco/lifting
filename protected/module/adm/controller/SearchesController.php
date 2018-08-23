<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class SearchesController extends CoreController{
	
    public function index(){
  $data['title']='Search';
  $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
    $data['prefrances']=Doo::db()->find('Prefrances',array('limit'=>1));
   $this->renderc('searches/index',$data);
    
    }
    public function find(){
        $data['title']='Search Results';
        $data['key']=$_POST['search'];
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
    $data['prefrances']=Doo::db()->find('Prefrances',array('limit'=>1));
   if(!isset($_POST['search']) || $_POST['search']==''){$_POST['search']='#';}
   if(!isset($_POST['users'])||$_POST['users']==''){$_POST['users']='0';}
   if(!isset($_POST['groups'])||$_POST['groups']==''){$_POST['groups']='0';}
   if(!isset($_POST['clients'])||$_POST['clients']==''){$_POST['clients']='0';}
   if(!isset($_POST['suppliers'])|| $_POST['suppliers']==''){$_POST['suppliers']='0';}
   if(!isset($_POST['towns'])||$_POST['towns']==''){$_POST['towns']='0';}
   if(!isset($_POST['otherbanks'])||$_POST['otherbanks']==''){$_POST['otherbanks']='0';}
   if(!isset($_POST['categories'])||$_POST['categories']==''){$_POST['categories']='0';}
   if(!isset($_POST['stockrooms']) ||$_POST['stockrooms']==''){$_POST['stockrooms']='0';}
   if(!isset($_POST['items'])||$_POST['items']==''){$_POST['items']='0';}
   if(!isset($_POST['purchases'])||$_POST['purchases']==''){$_POST['purchases']='0';}
   
   if(!isset($_POST['sales'])||$_POST['sales']==''){$_POST['sales']='0';}
   if(!isset($_POST['returend'])||$_POST['returend']==''){$_POST['returend']='0';}
   if(!isset($_POST['banks'])||$_POST['banks']==''){$_POST['banks']='0';}
   if(!isset($_POST['income'])||$_POST['income']==''){$_POST['income']='0';}
   if(!isset($_POST['pay'])||$_POST['pay']==''){$_POST['pay']='0';}
   if(!isset($_POST['expenses'])||$_POST['expenses']==''){$_POST['expenses']='0';}

   if(!isset($_POST['date_from']) || $_POST['date_from']==''){$_POST['date_from']='2000-01-01';}
   if(!isset($_POST['date_to']) || $_POST['date_to']==''){$_POST['date_to']='2050-01-01';}
   
   
   if(isset($_POST['search']) && $_POST['search']!=''){
        ///tab1
       $data['articles']=Doo::db()->find('Articles',array('where'=>" ( name Like '%".$_POST['search']."%' || details Like '%".$_POST['search']."%' ) &&  ( create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')	 "));
       for($x=0;$x<count($data['articles']);$x++){
            $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['articles'][$x]->create_by."'",'limit'=>1));
            $data['articles'][$x]->username=(isset($data['articles'][$x]->username))?$user->first_name." ".$user->last_name:'';
            
            
            }
       ////tab2
       $data['services']=Doo::db()->find('Services',array('where'=>" (name Like '%".$_POST['search']."%' || details Like '%".$_POST['search']."%' )&&  ( create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')	 "));
       for($x=0;$x<count($data['services']);$x++){
            $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['services'][$x]->create_by."'",'limit'=>1));
            (isset($data['services'][$x]->username))?$user->first_name." ".$user->last_name:'';
            }
       ////tab3
       $data['photos']=Doo::db()->find('Photos',array('where'=>" (name Like '%".$_POST['search']."%')  &&  ( create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')	 "));
       ///tab4
       $data['contact']=Doo::db()->find('Contact',array('where'=>" (name Like '%".$_POST['search']."%' || email Like '%".$_POST['search']."%' || subject Like '%".$_POST['search']."%' || message Like '%".$_POST['search']."%'  ) && (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')	 "));
       ////tab5
       $data['inspaction']=Doo::db()->find('Inspaction',array('where'=>" (name Like '%".$_POST['search']."%' || email Like '%".$_POST['search']."%' || subject Like '%".$_POST['search']."%' || message Like '%".$_POST['search']."%' ) &&   (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')	 "));
       ////tab6       
        $data['maillist']=Doo::db()->find('Maillist',array('where'=>" (name Like '%".$_POST['search']."%' || email Like '%".$_POST['search']."%' ) &&  (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')	 "));       
       ////tab7
       $data['users']=Doo::db()->relate('Users','Groups',array('where'=>" (users.first_name Like '%".$_POST['search']."%' || users.last_name Like '%".$_POST['search']."%' || users.username Like '%".$_POST['search']."%') && ( users.create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."') "));
       ////tab8
       $data['groups']=Doo::db()->find('Groups',array('select'=>'id,name','where'=>" (name Like '%".$_POST['search']."%') && (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."') "));
       ////tab9
       $data['clients']=Doo::db()->find('Clients',array('where'=>" (name Like '%".$_POST['search']."%' || representative Like '%".$_POST['search']."%' || username Like '%".$_POST['search']."%') && (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')	 "));
        for($x=0;$x<count($data['clients']);$x++){
            $sales=$this->db()->find('Sales',array('select'=>'total_value','where'=>" client='".$data['clients'][$x]->id."' "));
            $sales_sum=0;
            foreach($sales as $sale){$sales_sum=$sales_sum+$sale->total_value;}
            
            $takes=$this->db()->find('Payments',array('select'=>'payment_value','where'=>"  payment_for='".$data['clients'][$x]->id."' && payment_type='income' "));
            $take_sum=0;
            foreach($takes as $take){$take_sum=$take_sum+$take->payment_value;}
            
            $takes2=$this->db()->find('Payments',array('select'=>'payment_value','where'=>"  payment_for='".$data['clients'][$x]->id."' && payment_type='returned' "));
            $take_sum2=0;
            foreach($takes2 as $take2){$take_sum2=$take_sum2+$take2->payment_value;}
            
            
            $data['clients'][$x]->debit_credit_value=$sales_sum-$take_sum-$take_sum2;
            if(($sales_sum-$take_sum-$take_sum2)>=0){$data['clients'][$x]->debit_credit='Debtor';}else{$data['clients'][$x]->debit_credit='Creditor';}
            }
    ////tab10
       $data['suppliers']=Doo::db()->find('Suppliers',array('where'=>" (name Like '%".$_POST['search']."%' ) && (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')	  "));
        for($x=0;$x<count($data['suppliers']);$x++){
            $purchases=$this->db()->find('Purchases',array('select'=>'total_value','where'=>" supplier='".$data['suppliers'][$x]->id."' "));
            $purchase_sum=0;
            foreach($purchases as $purchase){$purchase_sum=$purchase_sum+$purchase->total_value;}
            $takes=$this->db()->find('Payments',array('select'=>'payment_value','where'=>"  payment_for='".$data['suppliers'][$x]->id."'  && payment_type!='income' "));
            $take_sum=0;
            foreach($takes as $take){$take_sum=$take_sum+$take->payment_value;}
            
            
            $data['suppliers'][$x]->debit_credit_value=$take_sum-$purchase_sum;
            if(($take_sum-$purchase_sum)>=0){$data['suppliers'][$x]->debit_credit='Debtor';}else{$data['suppliers'][$x]->debit_credit='Creditor';}
            }
       //tab11
       $data['banks']=Doo::db()->find('Banks',array("select"=>'id,name','where'=>" (name LIKE '%".$_POST['search']."%') && ( create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."'	)  "));   
       ///tab12
       $data['otherbanks']=Doo::db()->find('Otherbanks',array('select'=>'id,name','where'=>" (name Like '%".$_POST['search']."%' ) &&  (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')	"));
       /////tab13
       $data['categories']=Doo::db()->find('Categories',array('select'=>'id,name','where'=>" (name Like '%".$_POST['search']."%' ) && (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')	 "));
       ////tab14
       $data['items']=Doo::db()->relate('Items','Categories',array('select'=>'items.*,categories.name','where'=>" (items.name Like '%".$_POST['search']."%')  &&(items.create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')	 "));
       ////tab15
       $data['stockallocations']=Doo::db()->find('Stockallocations',array('where'=>"  (workorder='".$_POST['search']."' ) && (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."') "));
       for($x=0;$x<count($data['stockallocations']);$x++){
          $workorder=Doo::db()->find('Workorders',array('select'=>'id,total_value,title','where'=>" id='".$data['stockallocations'][$x]->workorder."'",'limit'=>1));
         if(isset($workorder->title)){
          $data['stockallocations'][$x]->workorder_title=$workorder->title;
          $data['stockallocations'][$x]->order_value=$workorder->total_value;
          }else{
              $data['stockallocations'][$x]->workorder_title='deleted';
          $data['stockallocations'][$x]->order_value='deleted';
              }
          }
       ////tab16
       $data['stockrooms']=Doo::db()->find('Stockrooms',array('select'=>'id,name','where'=>" (name Like '%".$_POST['search']."%' ) && (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."')  "));
       ////tab17
       $data['good']=Doo::db()->relate('Good','Suppliers',array('select'=>'good.*,suppliers.name','where'=>" (good.id='".$_POST['search']."' ) &&  (good.create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."' ) "));
        for($x=0;$x<count($data['good']);$x++){
        $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['good'][$x]->create_by."' ",'limit'=>1));
        if(isset($user->first_name)){
        $data['good'][$x]->by=$user->first_name." ".$user->last_name;
        }else{$data['good'][$x]->by='deleted';}
        $good=Doo::db()->find('Good',array('select'=>'id','where'=>" purchase='".$data['good'][$x]->id."' ",'limit'=>1));
        if(isset($good->id)){$data['good'][$x]->received='Yes';}else{$data['good'][$x]->received='No';}
        }
       ///tab18
       $data['expenses']=Doo::db()->find('Expenses',array("select"=>'id,name','where'=>" (name LIKE '%".$_POST['search']."%' ) &&  (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."') "));
       ///tab19
       $data['incomes']=Doo::db()->find('Payments',array('where'=>" (payment_type='income') && (payment_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."') "));
         for($x=0;$x<count($data['incomes']);$x++){
                     $clients=Doo::db()->find('Clients',array('select'=>'name','where'=>" id='".$data['incomes'][$x]->payment_for."'",'limit'=>1));
                     $data['incomes'][$x]->client=$clients->name;
                     } 
        ///tab20
        $data['pays']=Doo::db()->find('Payments',array('where'=>" (payment_type='pay' || payment_type='expense')  && (payment_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."') "));
                for($x=0;$x<count($data['pays']);$x++){
             if($data['pays'][$x]->payment_type=='pay'){
             $suppliers=Doo::db()->find('Suppliers',array('select'=>'name','where'=>"id='".$data['pays'][$x]->payment_for."'",'limit'=>1));
             $data['pays'][$x]->supplier=$suppliers->name;
             }else{
             $expenses=Doo::db()->find('Expenses',array('select'=>'name','where'=>"id='".$data['pays'][$x]->payment_for."'",'limit'=>1));
             $data['pays'][$x]->supplier=$expenses->name;
                 
                 }
             }
        ///////tab21
       $data['purchases']=Doo::db()->relate('Purchases','Suppliers',array('select'=>'purchases.*,suppliers.name','where'=>" (suppliers.name LIKE '%".$_POST['search']."%' || suppliers.id = '".$_POST['search']."') &&  purchase_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."'	"));
        for($x=0;$x<count($data['purchases']);$x++){
            $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['purchases'][$x]->create_by."' ",'limit'=>1));
            if(isset($user->first_name)){
            $data['purchases'][$x]->by=$user->first_name." ".$user->last_name;
            }else{$data['purchases'][$x]->by='deleted';}
            $good=Doo::db()->find('Good',array('select'=>'id','where'=>" purchase='".$data['purchases'][$x]->id."' ",'limit'=>1));
            if(isset($good->id)){$data['purchases'][$x]->received='Yes';}else{$data['purchases'][$x]->received='No';}            
        }
        /////tab22
        $data['workorders']=Doo::db()->find('Workorders',array('where'=>" (id='".$_POST['search']."' || title LIKE '%".$_POST['search']."%')  && ( create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."') "));
        for($x=0;$x<count($data['workorders']);$x++){
          $hascertificate=Doo::db()->find('Certificates',array('select'=>'id','where'=>" workorder='".$data['workorders'][$x]->id."'"));
          if(isset($hascertificate[0]->id)){
              $data['workorders'][$x]->hascertificate='yes';
              }else{$data['workorders'][$x]->hascertificate='no';}
          $hasdelivery=Doo::db()->find('Delivery',array('select'=>'id','where'=>" workorder='".$data['workorders'][$x]->id."'"));
          if(isset($hasdelivery[0]->id)){
              $data['workorders'][$x]->hasdelivery='yes';
              }else{$data['workorders'][$x]->hasdelivery='no';}
          $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$data['workorders'][$x]->client."'",'limit'=>1));
          $data['workorders'][$x]->client_name=(isset($client->name))?$client->name:'deleted';
          }
        ///tab23
        $certdetails=Doo::db()->find('CertificatesDetails',array('select'=>'certificate','where'=>" idno ='".$_POST['search']."' "));
        $certidno='';
        foreach($certdetails as $cert){
          $certidno.="'".$cert->certificate."',";
        }
        
        $certidno=rtrim($certidno, ",");
        
        if($certidno ==''){
        $data['certificates']=Doo::db()->relate('Certificates','Clients',array('where'=>" (clients.name Like '%".$_POST['search']."%' || certificates.id ='".$_POST['search']."'  || certificates.workorder = '".$_POST['search']."') && ( certificates.create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."') "));
        }else{
        $data['certificates']=Doo::db()->relate('Certificates','Clients',array('where'=>" (clients.name Like '%".$_POST['search']."%' || certificates.id ='".$_POST['search']."' || certificates.id IN (".$certidno.") || certificates.workorder = '".$_POST['search']."') && ( certificates.create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."') "));
        }
        
        //play::pr($data['certificates']);die();
        //$data['certificates']=Doo::db()->relateMany('Certificates',array('Clients','Users'),array('where'=>" (clients.name Like '%".$_POST['search']."%' || certificates.id ='".$_POST['search']."' || certificates.workorder = '".$_POST['search']."')  && ( certificates.create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."') "));
        
        //play::pr($data['certificates']);die();
        for($x=0;$x<count($data['certificates']);$x++){
          
          $user=Doo::db()->find('Users',array('select'=>'id,first_name,last_name','where'=>" id='".$data['certificates'][$x]->test_by."'",'limit'=>1));
          $data['certificates'][$x]->test_by=(isset($user->first_name))?$user->first_name." ".$user->last_name:'';
          
          }
        ///tab24
        $data['delivery']=Doo::db()->find('Delivery',array('where'=>" (delivery_to LIKE '%".$_POST['search']."%' || id = '".$_POST['search']."'  ) &&  create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."'  "));
         for($x=0;$x<count($data['delivery']);$x++){
          $workorder=Doo::db()->find('Workorders',array('select'=>'id,client,title','where'=>" id='".$data['delivery'][$x]->workorder."'",'limit'=>1));
          if(isset($workorder->client)){
          $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$workorder->client."'",'limit'=>1));
          }
          $data['delivery'][$x]->title=(isset($workorder->title))?$workorder->title:'deleted';
          $data['delivery'][$x]->client_name=(isset($client->name))?$client->name:'deleted';
          }
        ////tab25
        $data['quotations']=Doo::db()->find('Quotations',array('where'=>" (title LIKE '%".$_POST['search']."%' ) &&  (create_date BETWEEN '".$_POST['date_from']."' AND  '".$_POST['date_to']."') "));
        for($x=0;$x<count($data['quotations']);$x++){
                  $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$data['quotations'][$x]->client."'",'limit'=>1));
                  $workorder=Doo::db()->find('Workorders',array('select'=>'id','where'=>" quotation='".$data['quotations'][$x]->id."'",'limit'=>1));
                  if(isset($workorder->id)){$data['quotations'][$x]->has_workorder='1';}else{$data['quotations'][$x]->has_workorder='0';}
                  if(isset($client->name)){
                  $data['quotations'][$x]->client_name=$client->name;}else{$data['quotations'][$x]->client_name='Deleted';}
                  }       
       
    
       
       
    }
       
		$this->renderc('searches/find',$data);
}

  

 
}
?>