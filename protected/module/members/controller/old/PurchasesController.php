<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class PurchasesController extends MembersController{
    

    public function index(){
        //Just replace these
        //Doo::loadCore('app/DooSiteMagic');
        //DooSiteMagic::displayHome();
    $data['title']='Purchases';



    

    if(isset($_GET['load'])){
          if(isset($_POST['data_ids'])){
            $ids=explode(',',$_POST['data_ids']);
            foreach ($ids as $id) {
               Doo::db()->delete('Purchases', array('where'=>"id='".$id."'", 'limit'=>1) );
               Doo::db()->delete('PurchasesDetails', array('where'=>" purchase='".$id."'") );
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
            $where=" suppliers.name like '%".$_POST['search']['value']."%'  ||  purchases.id = '".$_POST['search']['value']."'  ";
          }else{
            $where=" id != '0' ";
          }
          if(isset($_POST['order'])){
            $ordering=array('id','name','payment_method','create_date');
            $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
          }else{
            $order=array('desc'=>'id');
          }
          
          
          $lists=Doo::db()->relate('Purchases','Suppliers',array('where'=>$where,'select'=>'purchases.*,suppliers.name',key($order)=>$order[key($order)],'limit'=>$limit));
          if(count($lists)>0){
          foreach ($lists as $list) {
            $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$list->create_by."' ",'limit'=>1));
            if(isset($user->first_name)){
            $list->by=$user->first_name." ".$user->last_name;
            }else{$list->by='deleted';}
            $good=Doo::db()->find('Good',array('select'=>'id','where'=>" purchase='".$list->id."' ",'limit'=>1));
            if(isset($good->id)){$list->received='Yes';}else{$list->received='No';}

            $info['data'][]=array(
              "<div class='ids text-center'>".$list->id."</div>",
              $list->Suppliers->name,
              $list->purchase_date,
              ($list->payment_method=='0')?'Monetary':'Check',
              $list->total_value,
              $list->received,
              $list->by,
              "<a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."purchases/details/".$list->id."' ><div  class='btn btn-info'><i class='fa fa-print'></i> Details</div></a> 
              "
              );
          }
        }else{
             $info['data'][]=array("","","","");

        }
          $datamodel = Doo::loadModel('Banks', true);
          $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

          $info['length']=$datamodel->count();
          $info['recordsTotal']=$datamodel->count();

          $info['recordsFiltered']=count(Doo::db()->relate('Purchases','Suppliers',array('where'=>$where,'select'=>'purchases.id')));

          echo(json_encode($info));
        exit;

        }  
    
        $this->renderc('purchases/index',$data);
    }

    public function add(){
    $data['title']='Add New Purchase';
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
        $purchases->create_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->insert($purchases);
        
        
        if(!empty($lastinserted)){
            
             for($x=0;$x<$nuu;$x++){
                 $purchasesdetails = Doo::loadModel('PurchasesDetails', true);
                 $purchasesdetails->item=$_POST['item_name_'.$x];
                 $purchasesdetails->price=$_POST['price_'.$x];
                 $purchasesdetails->discount=$_POST['discount_'.$x];
                 $purchasesdetails->quantity=$_POST['quantity_'.$x];
                 $purchasesdetails->purchase=$lastinserted;
                 $purchasesdetails->details=$_POST['details_'.$x];
                 $purchasesdetails->create_date=date('Y-m-d H:m:s');
                 $purchasesdetails->create_by=$_SESSION['member_username']['id'];
                 $purchasesdetails->stockroom=$_POST['stockroom'];
                $this->db()->insert($purchasesdetails);
               
                }
            
        
           
            }
          
       $_SESSION['inner_message']['success'][]='Data Inserted Successfully';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'purchases' );  
        
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
        $data['title']='Purchase Details';
    $data['suppliers']=Doo::db()->find('Suppliers',array('select'=>'name,id'));
  
    
    
     $data['purchaseslist']=Doo::db()->relate('PurchasesDetails','Purchases',array('select'=>'purchases.*,purchases_details.* ','where'=>" purchases.id=' ".$this->params[0]." ' "));
     //play::pr($data['purchaseslist']);die();
     $supplier_name=Doo::db()->find('Suppliers',array('select'=>'name','where'=>" id='".$data['purchaseslist'][0]->Purchases->supplier."' ",'limit'=>1));
        $data['purchaseslist'][0]->Purchases->supplier_name=$supplier_name->name;
        $total=0;
        for($x=0;$x<count($data['purchaseslist']);$x++){
            
            $item=Doo::db()->find('Items',array('select'=>'barcode,name,unit_type,category','where'=>" id='".$data['purchaseslist'][$x]->item."' ",'limit'=>1));
            if(isset($item->name)){
                $data['purchaseslist'][$x]->barcode=$item->barcode;
                $data['purchaseslist'][$x]->item_name=$item->name;
                $data['purchaseslist'][$x]->unit_type=$item->unit_type;
                
                $category=Doo::db()->find('Categories',array('select'=>'name','where'=>" id='".$item->category."' ",'limit'=>1));
                $data['purchaseslist'][$x]->category=$category->name;
                $tot=$data['purchaseslist'][$x]->quantity*$data['purchaseslist'][$x]->price;
                $tot1=($tot*$data['purchaseslist'][$x]->discount)/100;
                
            }else{
                $data['purchaseslist'][$x]->barcode='0';
                $data['purchaseslist'][$x]->item_name='Deleted';
                $data['purchaseslist'][$x]->unit_type='Deleted';
                $data['purchaseslist'][$x]->category='Deleted';
                $tot='0';
                $tot1='0';
            }
            $total=($tot-$tot1)+$total;
            $data['purchaseslist'][$x]->total=$tot-$tot1;
            }
        $data['purchaseslist'][0]->Purchases->total=$total;
        $this->renderc('purchases/details',$data);
      
        }
        
public function delete(){
    Doo::db()->delete('Purchases', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
    Doo::db()->delete('PurchasesDetails', array('where'=>" purchase='".$this->params[0]."'") );
    $this->index();
    }
}
?>