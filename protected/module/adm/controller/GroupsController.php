<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class GroupsController extends CoreController{

    public function index(){
	$data['title']="Groups";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Groups', array('where'=>"id='".$id."'", 'limit'=>1) );
           Doo::db()->delete('Permissions', array('where'=>"group_id='".$id."'") );
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
        $where=" name like '%".$_POST['search']['value']."%'  ||  id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('id','name','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      
      $lists=Doo::db()->find('Groups',array('where'=>$where,'select'=>'id,name,create_date',key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->name,
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."groups/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","");

    }
      $datamodel = Doo::loadModel('Groups', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Groups',array('where'=>$where,'select'=>'id')));

      echo(json_encode($info));
    exit;

    }   
        
$this->renderc('groups/index',$data);
		
    }  
    
   public function add(){
    $data['title']='Add New Group';
    $arr=array(
    'articles'=>'ArticlesController',
    
    'photos'=>'PhotosController',
    'products'=>'ProductsController',
    'productcategories'=>'ProductcategoriesController',
    'galleries'=>'GalleriesController',
    'contact'=>'ContactController',
    'maillist'=>'MaillistController',
    'users'=>'UsersController',
    'groups'=>'GroupsController',
    'clients'=>'ClientsController',
    'suppliers'=>'SuppliersController',
    'otherbanks'=>'OtherbanksController',
    'categories'=>'CategoriesController',
    'stockrooms'=>'StockroomsController',
    'items'=>'ItemsController',
    'stores'=>'StoresController',
    'stockallocations'=>'StockallocationsController',
    'good'=>'GoodController',
    'expenses'=>'ExpensesController',
    'invoices'=>'InvoicesController',
    'banks'=>'BanksController',
    'payments'=>'PaymentsController',
    'purchases'=>'PurchasesController',
    'workorders'=>'WorkordersController',
    'certificates'=>'CertificatesController',
    'delivery'=>'DeliveryController',
    'quotations'=>'QuotationsController',
    'reports'=>'ReportsController',
    'prefrances'=>'PrefrancesController',
    'searchs'=>'SearchesController'
    );
    $data['modules']=$arr;
    		$this->renderc('groups/add',$data);
    }
	
    public function edit(){
    $data['title']='Edit Group';
    $data['group']=Doo::db()->find('Groups',array('where'=>"id='".$this->params[0]."'",'limit'=>1));
$arr=array(
    'articles'=>'ArticlesController',
    
    'photos'=>'PhotosController',
    'products'=>'ProductsController',
    'productcategories'=>'ProductcategoriesController',
    'galleries'=>'GalleriesController',
    'contact'=>'ContactController',
    'maillist'=>'MaillistController',
    'users'=>'UsersController',
    'groups'=>'GroupsController',
    'clients'=>'ClientsController',
    'suppliers'=>'SuppliersController',
    'otherbanks'=>'OtherbanksController',
    'categories'=>'CategoriesController',
    'stockrooms'=>'StockroomsController',
    'items'=>'ItemsController',
    'stores'=>'StoresController',
    'stockallocations'=>'StockallocationsController',
    'good'=>'GoodController',
    'expenses'=>'ExpensesController',
    'invoices'=>'InvoicesController',
    'banks'=>'BanksController',
    'payments'=>'PaymentsController',
    'purchases'=>'PurchasesController',
    'workorders'=>'WorkordersController',
    'certificates'=>'CertificatesController',
    'delivery'=>'DeliveryController',
    'quotations'=>'QuotationsController',
    'reports'=>'ReportsController',
    'prefrances'=>'PrefrancesController',
    'searchs'=>'SearchesController'
    );
    $data['modules']=$arr;
    foreach($arr as $key=>$val){
    $arrview=Doo::db()->find('permissions',array('select'=>'actions','where'=>"group_id='".$data['group']->id."' && controller_name='".$val."' ",'limit'=>1));
    
    if(isset($arrview->actions)){
        $exploded=explode(',',$arrview->actions);
        if(in_array('index',$exploded)){$data[$key.'_view']='1';}else{$data[$key.'_view']='0';}
        if(in_array('add',$exploded)){$data[$key.'_add']='1';}else{$data[$key.'_add']='0';}
        if(in_array('edit',$exploded)){$data[$key.'_update']='1';}else{$data[$key.'_update']='0';}
        if(in_array('delete',$exploded)){$data[$key.'_delete']='1';}else{$data[$key.'_delete']='0';}    
        }
    
    }
   
		$this->renderc('groups/edit',$data);
    }
	
	    public function insert(){
    
      $group = Doo::loadModel('Groups', true);
      $uu=Doo::db()->find('Groups', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
      if(!empty($uu)){
           $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'groups/add/');
        }else{
        $group->name=$_POST['name'];
        $group->active=(isset($_POST['active']))?'1':'0';
       
        $group->create_date=date('Y-m-d H:m:s');
        $group->edit_date=date('Y-m-d H:m:s');
        $group->last_edit=date('Y-m-d H:m:s');
        $group->create_by=$_SESSION['username']['id'];
        $group->edit_by=$_SESSION['username']['id'];
        
        $lastinserted=$this->db()->insert($group);
        
        if(!empty($lastinserted)){
            
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='MainController';$permission->actions='index,login,logout';$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);

            $rights='';
             if(isset($_POST['articles_view'])){$rights.='index,';}
             if(isset($_POST['articles_add'])){$rights.='add,insert,';}
             if(isset($_POST['articles_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['articles_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ArticlesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ServicesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
             if(isset($_POST['photos_view'])){$rights.='index,cats,getimg,';}
             if(isset($_POST['photos_add'])){$rights.='add,insert,upload,addcats,insertcats,deletecats,featured,';}
             if(isset($_POST['photos_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['photos_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='PhotosController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     

            $rights='';
             if(isset($_POST['galleries_view'])){$rights.='index,cats,getimg,';}
             if(isset($_POST['galleries_add'])){$rights.='add,insert,upload,addcats,insertcats,deletecats,featured,';}
             if(isset($_POST['galleries_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['galleries_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='GalleriesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     

            $rights='';
             if(isset($_POST['products_view'])){$rights.='index,cats,getimg,';}
             if(isset($_POST['products_add'])){$rights.='add,insert,upload,addcats,insertcats,deletecats,featured,';}
             if(isset($_POST['products_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['products_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ProductsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);   

             $rights='';
             if(isset($_POST['productcategories_view'])){$rights.='index,cats,getimg,';}
             if(isset($_POST['productcategories_add'])){$rights.='add,insert,upload,addcats,insertcats,deletecats,featured,';}
             if(isset($_POST['productcategories_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['productcategories_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ProductcategoriesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
             if(isset($_POST['contact_view'])){$rights.='index,read,';}
             if(isset($_POST['contact_add'])){$rights.='add,send,';}
             if(isset($_POST['contact_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['contact_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ContactController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='InspactionController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
             if(isset($_POST['maillist_view'])){$rights.='index,read,';}
             if(isset($_POST['maillist_add'])){$rights.='add,insert,';}
             if(isset($_POST['maillist_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['maillist_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='MaillistController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     

             $rights='';
             if(isset($_POST['users_view'])){$rights.='index,';}
             if(isset($_POST['users_add'])){$rights.='insert,add,checkusername,';}
             if(isset($_POST['users_update'])){$rights.='edit,update,updatepass,editpass,activate,uploadimg,';}
             if(isset($_POST['users_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='UsersController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);

            $rights='';
             if(isset($_POST['groups_view'])){$rights.='index,';}
             if(isset($_POST['groups_add'])){$rights.='add,insert,';}
             if(isset($_POST['groups_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['groups_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='GroupsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
             if(isset($_POST['clients_view'])){$rights.='index,';}
             if(isset($_POST['clients_add'])){$rights.='add,insert,';}
             if(isset($_POST['clients_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['clients_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ClientsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            

            $rights='';
            if(isset($_POST['suppliers_view'])){$rights.='index,';}
             if(isset($_POST['suppliers_add'])){$rights.='insert,add,checkusername,';}
             if(isset($_POST['suppliers_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['suppliers_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='SuppliersController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
                 
           $rights='';
            if(isset($_POST['otherbanks_view'])){$rights.='index,';}
             if(isset($_POST['otherbanks_add'])){$rights.='insert,add,checkusername,';}
             if(isset($_POST['otherbanks_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['otherbanks_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='OtherbanksController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
                 

            $rights='';
             if(isset($_POST['categories_view'])){$rights.='index,';}
             if(isset($_POST['categories_add'])){$rights.='insert,add,';}
             if(isset($_POST['categories_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['categories_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='CategoriesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
             
            $rights='';
             if(isset($_POST['stockrooms_view'])){$rights.='index,';}
             if(isset($_POST['stockrooms_add'])){$rights.='insert,add,';}
             if(isset($_POST['stockrooms_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['stockrooms_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='StockroomsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
             
            $rights='';
             if(isset($_POST['items_view'])){$rights.='index,printing,printbarcode,';}
             if(isset($_POST['items_add'])){$rights.='insert,add,checkusername,';}
             if(isset($_POST['items_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['items_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ItemsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
 
             
            $rights='';
             if(isset($_POST['stores_view'])){$rights.='index,filter,';}
             if(isset($_POST['stores_add'])){$rights.='insert,add,checkusername,transfare,dotransfare,';}
             if(isset($_POST['stores_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['stores_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='StoresController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);

            $rights='';
            if(isset($_POST['stockallocations_view'])){$rights.='index,getitems,details,get_items,';}
             if(isset($_POST['stockallocations_add'])){$rights.='insert,add,';}
             if(isset($_POST['stockallocations_update'])){$rights.='edit,update,';}
             if(isset($_POST['stockallocations_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='StockallocationsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
            if(isset($_POST['good_view'])){$rights.='index,getnames,getnumber,details,getpurchase,';}
             if(isset($_POST['good_add'])){$rights.='insert,add,';}
             if(isset($_POST['good_update'])){$rights.='edit,update,';}
             if(isset($_POST['good_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='GoodController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
             
            $rights='';
            if(isset($_POST['expenses_view'])){$rights.='index,';}
             if(isset($_POST['expenses_add'])){$rights.='insert,add,';}
             if(isset($_POST['expenses_update'])){$rights.='edit,update,';}
             if(isset($_POST['expenses_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ExpensesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
             
            $rights='';
            if(isset($_POST['banks_view'])){$rights.='index,';}
             if(isset($_POST['banks_add'])){$rights.='insert,add,';}
             if(isset($_POST['banks_update'])){$rights.='edit,update,';}
             if(isset($_POST['banks_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='BanksController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
             
            $rights='';
            if(isset($_POST['payments_view'])){$rights.='index,pay,income,paymenttype,paymenttype1,getpaymentid1,getpaymentid,details,';}
             if(isset($_POST['payments_add'])){$rights.='insert,add,addpay,insertpay,';}
             if(isset($_POST['payments_update'])){$rights.='edit,update,';}
             if(isset($_POST['payments_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='PaymentsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            
            $rights='';
            if(isset($_POST['purchases_view'])){$rights.='index,getnames,getnumber,details,';}
             if(isset($_POST['purchases_add'])){$rights.='insert,add,checkusername,';}
             if(isset($_POST['purchases_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['purchases_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='PurchasesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);        

            $rights='';
            if(isset($_POST['workorders_view'])){$rights.='index,details,';}
             if(isset($_POST['workorders_add'])){$rights.='insert,add,';}
             if(isset($_POST['workorders_update'])){$rights.='edit,update,';}
             if(isset($_POST['workorders_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='WorkordersController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);        

            $rights='';
            if(isset($_POST['certificates_view'])){$rights.='index,getitems,details,getaddress,';}
             if(isset($_POST['certificates_add'])){$rights.='insert,add,';}
             if(isset($_POST['certificates_update'])){$rights.='edit,update,insert_items,send,sending,';}
             if(isset($_POST['certificates_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='CertificatesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);        

            $rights='';
            if(isset($_POST['delivery_view'])){$rights.='index,getitems,details,';}
             if(isset($_POST['delivery_add'])){$rights.='insert,add,';}
             if(isset($_POST['delivery_update'])){$rights.='edit,update,';}
             if(isset($_POST['delivery_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='DeliveryController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);        

            $rights='';
            if(isset($_POST['quotations_view'])){$rights.='index,details,';}
             if(isset($_POST['quotations_add'])){$rights.='insert,add,convert,convertnow,';}
             if(isset($_POST['quotations_update'])){$rights.='edit,update,activate,send,sending,';}
             if(isset($_POST['quotations_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='QuotationsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);        


            $rights='';
            if(isset($_POST['reports_view'])){$rights.='index,report1,report2,report3,report4,report5,report6,report7,report8,report9,report10,report11,';}
             if(isset($_POST['reports_add'])){$rights.='insert,add,';}
             if(isset($_POST['reports_update'])){$rights.='edit,update,';}
             if(isset($_POST['reports_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ReportsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
            if(isset($_POST['prefrances_view'])){$rights.='index,';}
             if(isset($_POST['prefrances_add'])){$rights.='insert,add,checkusername,uploadphoto,';}
             if(isset($_POST['prefrances_update'])){$rights.='edit,update,activate,backup,restore,restoredone,';}
             if(isset($_POST['prefrances_delete'])){$rights.='delete,';}
              $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='PrefrancesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
              $rights='';
               if(isset($_POST['searchs_view'])){$rights.='index,find,';}
             if(isset($_POST['searchs_add'])){$rights.='insert,add,';}
             if(isset($_POST['searchs_update'])){$rights.='edit,update,';}
             if(isset($_POST['searchs_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='SearchesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
   
              $rights='';
               if(isset($_POST['invoices_view'])){$rights.='index,find,';}
             if(isset($_POST['invoices_add'])){$rights.='insert,add,getitems,details,';}
             if(isset($_POST['invoices_update'])){$rights.='edit,update,';}
             if(isset($_POST['invoices_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='InvoicesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
   
   
            $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'groups' );           
           
           
            }
          }
      
    }	    

public function update(){
    
      $group = Doo::loadModel('Groups', true);
      $uu=Doo::db()->find('Groups', array('select'=>'name','where'=>"name='".$_POST['name']."' && id!='".$this->params[0]."'", 'limit'=>1) );
      if(!empty($uu)){
          $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'groups/edit/'.$this->params[0]);
        }else{
        $group->id=$this->params[0];
        $group->name=$_POST['name'];
        $group->active=isset($_POST['active'])?'1':'0';
       
        $group->edit_date=date('Y-m-d H:m:s');
        $group->edit_by=$_SESSION['username']['id'];
        $this->db()->update($group);
        $lastinserted=$this->params[0];
        
        if(!empty($lastinserted)){
            ///insert all actions first                
   Doo::db()->delete('permissions', array('where'=>"group_id='".$lastinserted."'") );
$permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='MainController';$permission->actions='index,login,logout';$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);


            $rights='';
             if(isset($_POST['articles_view'])){$rights.='index,';}
             if(isset($_POST['articles_add'])){$rights.='add,insert,';}
             if(isset($_POST['articles_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['articles_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ArticlesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ServicesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
             if(isset($_POST['photos_view'])){$rights.='index,cats,getimg,';}
             if(isset($_POST['photos_add'])){$rights.='add,insert,upload,addcats,insertcats,deletecats,featured,';}
             if(isset($_POST['photos_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['photos_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='PhotosController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission); 

            $rights='';
             if(isset($_POST['galleries_view'])){$rights.='index,cats,getimg,';}
             if(isset($_POST['galleries_add'])){$rights.='add,insert,upload,addcats,insertcats,deletecats,featured,';}
             if(isset($_POST['galleries_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['galleries_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='GalleriesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     


             $rights='';
             if(isset($_POST['products_view'])){$rights.='index,cats,getimg,';}
             if(isset($_POST['products_add'])){$rights.='add,insert,upload,addcats,insertcats,deletecats,featured,';}
             if(isset($_POST['products_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['products_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ProductsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
             if(isset($_POST['productcategories_view'])){$rights.='index,cats,getimg,';}
             if(isset($_POST['productcategories_add'])){$rights.='add,insert,upload,addcats,insertcats,deletecats,featured,';}
             if(isset($_POST['productcategories_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['productcategories_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ProductcategoriesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
             if(isset($_POST['contact_view'])){$rights.='index,read,';}
             if(isset($_POST['contact_add'])){$rights.='add,send,';}
             if(isset($_POST['contact_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['contact_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ContactController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='InspactionController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
        
            $rights='';
             if(isset($_POST['maillist_view'])){$rights.='index,read,';}
             if(isset($_POST['maillist_add'])){$rights.='add,insert,';}
             if(isset($_POST['maillist_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['maillist_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='MaillistController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     

             $rights='';
             if(isset($_POST['users_view'])){$rights.='index,';}
             if(isset($_POST['users_add'])){$rights.='insert,add,checkusername,';}
             if(isset($_POST['users_update'])){$rights.='edit,update,updatepass,editpass,activate,uploadimg,';}
             if(isset($_POST['users_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='UsersController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);

            $rights='';
             if(isset($_POST['groups_view'])){$rights.='index,';}
             if(isset($_POST['groups_add'])){$rights.='add,insert,';}
             if(isset($_POST['groups_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['groups_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='GroupsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
             if(isset($_POST['clients_view'])){$rights.='index,';}
             if(isset($_POST['clients_add'])){$rights.='add,insert,';}
             if(isset($_POST['clients_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['clients_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ClientsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            

            $rights='';
            if(isset($_POST['suppliers_view'])){$rights.='index,';}
             if(isset($_POST['suppliers_add'])){$rights.='insert,add,checkusername,';}
             if(isset($_POST['suppliers_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['suppliers_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='SuppliersController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
                 
           $rights='';
            if(isset($_POST['otherbanks_view'])){$rights.='index,';}
             if(isset($_POST['otherbanks_add'])){$rights.='insert,add,checkusername,';}
             if(isset($_POST['otherbanks_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['otherbanks_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='OtherbanksController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
                 

            $rights='';
             if(isset($_POST['categories_view'])){$rights.='index,';}
             if(isset($_POST['categories_add'])){$rights.='insert,add,';}
             if(isset($_POST['categories_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['categories_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='CategoriesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
             
            $rights='';
             if(isset($_POST['stockrooms_view'])){$rights.='index,';}
             if(isset($_POST['stockrooms_add'])){$rights.='insert,add,';}
             if(isset($_POST['stockrooms_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['stockrooms_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='StockroomsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
             
            $rights='';
             if(isset($_POST['items_view'])){$rights.='index,printing,printbarcode,';}
             if(isset($_POST['items_add'])){$rights.='insert,add,checkusername,';}
             if(isset($_POST['items_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['items_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ItemsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
 
             
            $rights='';
             if(isset($_POST['stores_view'])){$rights.='index,filter,';}
             if(isset($_POST['stores_add'])){$rights.='insert,add,checkusername,transfare,dotransfare,';}
             if(isset($_POST['stores_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['stores_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='StoresController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);

            $rights='';
            if(isset($_POST['stockallocations_view'])){$rights.='index,getitems,details,get_items,';}
             if(isset($_POST['stockallocations_add'])){$rights.='insert,add,';}
             if(isset($_POST['stockallocations_update'])){$rights.='edit,update,';}
             if(isset($_POST['stockallocations_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='StockallocationsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
            if(isset($_POST['good_view'])){$rights.='index,getnames,getnumber,details,getpurchase,';}
             if(isset($_POST['good_add'])){$rights.='insert,add,';}
             if(isset($_POST['good_update'])){$rights.='edit,update,';}
             if(isset($_POST['good_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='GoodController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
             
            $rights='';
            if(isset($_POST['expenses_view'])){$rights.='index,';}
             if(isset($_POST['expenses_add'])){$rights.='insert,add,';}
             if(isset($_POST['expenses_update'])){$rights.='edit,update,';}
             if(isset($_POST['expenses_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ExpensesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
             
            $rights='';
            if(isset($_POST['banks_view'])){$rights.='index,';}
             if(isset($_POST['banks_add'])){$rights.='insert,add,';}
             if(isset($_POST['banks_update'])){$rights.='edit,update,';}
             if(isset($_POST['banks_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='BanksController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
             
            $rights='';
            if(isset($_POST['payments_view'])){$rights.='index,pay,income,paymenttype,paymenttype1,getpaymentid1,getpaymentid,details,';}
             if(isset($_POST['payments_add'])){$rights.='insert,add,addpay,insertpay,';}
             if(isset($_POST['payments_update'])){$rights.='edit,update,';}
             if(isset($_POST['payments_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='PaymentsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            
            $rights='';
            if(isset($_POST['purchases_view'])){$rights.='index,getnames,getnumber,details,';}
             if(isset($_POST['purchases_add'])){$rights.='insert,add,checkusername,';}
             if(isset($_POST['purchases_update'])){$rights.='edit,update,activate,';}
             if(isset($_POST['purchases_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='PurchasesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);        

            $rights='';
            if(isset($_POST['workorders_view'])){$rights.='index,details,';}
             if(isset($_POST['workorders_add'])){$rights.='insert,add,';}
             if(isset($_POST['workorders_update'])){$rights.='edit,update,';}
             if(isset($_POST['workorders_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='WorkordersController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);        

            $rights='';
            if(isset($_POST['certificates_view'])){$rights.='index,getitems,details,getaddress,';}
             if(isset($_POST['certificates_add'])){$rights.='insert,add,';}
             if(isset($_POST['certificates_update'])){$rights.='edit,update,insert_items,send,sending,';}
             if(isset($_POST['certificates_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='CertificatesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);        

            $rights='';
            if(isset($_POST['delivery_view'])){$rights.='index,getitems,details,';}
             if(isset($_POST['delivery_add'])){$rights.='insert,add,';}
             if(isset($_POST['delivery_update'])){$rights.='edit,update,';}
             if(isset($_POST['delivery_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='DeliveryController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);        

            $rights='';
            if(isset($_POST['quotations_view'])){$rights.='index,details,';}
             if(isset($_POST['quotations_add'])){$rights.='insert,add,convert,convertnow,';}
             if(isset($_POST['quotations_update'])){$rights.='edit,update,activate,send,sending,';}
             if(isset($_POST['quotations_delete'])){$rights.='delete,';}
             $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='QuotationsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);        


            $rights='';
            if(isset($_POST['reports_view'])){$rights.='index,report1,report2,report3,report4,report5,report6,report7,report8,report9,report10,report11,';}
             if(isset($_POST['reports_add'])){$rights.='insert,add,';}
             if(isset($_POST['reports_update'])){$rights.='edit,update,';}
             if(isset($_POST['reports_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='ReportsController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
            
            $rights='';
            if(isset($_POST['prefrances_view'])){$rights.='index,';}
             if(isset($_POST['prefrances_add'])){$rights.='insert,add,checkusername,uploadphoto,';}
             if(isset($_POST['prefrances_update'])){$rights.='edit,update,activate,backup,restore,restoredone,';}
             if(isset($_POST['prefrances_delete'])){$rights.='delete,';}
              $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='PrefrancesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
              $rights='';
               if(isset($_POST['searchs_view'])){$rights.='index,find,';}
             if(isset($_POST['searchs_add'])){$rights.='insert,add,';}
             if(isset($_POST['searchs_update'])){$rights.='edit,update,';}
             if(isset($_POST['searchs_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='SearchesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
   
            $rights='';
            if(isset($_POST['invoices_view'])){$rights.='index,find,';}
             if(isset($_POST['invoices_add'])){$rights.='insert,add,getitems,details,';}
             if(isset($_POST['invoices_update'])){$rights.='edit,update,';}
             if(isset($_POST['invoices_delete'])){$rights.='delete,';}
            $permission =Doo::loadModel('Permissions', true);$permission->group_id=$lastinserted;$permission->controller_name='InvoicesController';$permission->actions=$rights;$permission->create_date=date('Y-m-d H:m:s');$permission->edit_date=date('Y-m-d H:m:s');$permission->create_by=$_SESSION['username']['id'];$this->db()->insert($permission);     
//
    
         $_SESSION['inner_message']['success'][]='Data Updated Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'groups' );           
           
            }
          }
      
    }
  

        public function activate(){
        $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $res =Doo::db()->find('Users', array('select'=>'id,active','where'=>"id='".$this->params[0]."'", 'limit'=>1) );
		if($res->active=='1'){
            $res->active ='0';
        	Doo::db()->update($res);
            echo("<div class='false'></div>");
            }else{
                $res->active ='1';
        	Doo::db()->update($res);
            echo("<div class='true'></div>"); 
                }
        
		//$this->renderc('users/add',$data);
    }
	
        public function delete(){
        $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $res =Doo::db()->delete('Groups', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
        $res =Doo::db()->delete('Permissions', array('where'=>"group_id='".$this->params[0]."'") );
    //
    $paging=$this->paging;
	$data['pages']=ceil(count(Doo::db()->find('Groups',array('select'=>'id')))/$paging);
		if(!isset($_GET['page'])){
            $data['groupslist']=Doo::db()->find('Groups',array('limit'=>'0,'.$paging));
			$data['selectedpage']='1';
		}else{
            
            $data['groupslist']=Doo::db()->find('Groups',array('limit'=>($_GET['page']-1)*$paging.','.$paging));
			$data['selectedpage']=$_GET['page'];
		}	
    //

		$this->renderc('groups/index',$data);
            
        
		//$this->renderc('users/add',$data);
    }

}
?>