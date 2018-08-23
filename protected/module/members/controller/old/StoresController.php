<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class StoresController extends MembersController{
	

 public function index(){
    $data['title']="Stores";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Stores', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where=" items.name like '%".$_POST['search']['value']."%'  ||  stores.id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" stores.id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('stores.id','items.name','stores.create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      
      //$lists=Doo::db()->find('Stores',array('where'=>$where,'select'=>'id,name,create_date',key($order)=>$order[key($order)],'limit'=>$limit));
      $lists=Doo::db()->relate('Stores','Items',array('select'=>'stores.*,items.name','where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {
        $stockroom=Doo::db()->find('Stockrooms',array('select'=>'name','where'=>"id='".$list->stockroom."'",'limit'=>1));
        $stockroom_name=$stockroom->name;
        
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->Items->name,
          $stockroom_name,
          $list->quantity,
          $list->price,
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."stores/transfare/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Transfare</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","","","","","");

    }
      $datamodel = Doo::loadModel('Stores', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->relate('Stores','Items',array('where'=>$where,'select'=>'stores.id')));

      echo(json_encode($info));
    exit;

    }   
        
$this->renderc('stores/index',$data);
        
    }  
    


 public function transfare(){
    $data['title']='Transfare Stock';
    $data['storeslist']=Doo::db()->find('Stores',array('select'=>'item,id,quantity,stockroom','where'=>" id='".$this->params[0]."'",'limit'=>1));
    $item=Doo::db()->find('Items',array('select'=>'name','where'=>" id='".$data['storeslist']->item."'",'limit'=>1));
    $data['item']=$item->name;
    $data['stockrooms']=Doo::db()->find('Stockrooms',array('select'=>'name,id'));
     		$this->renderc('stores/transfare',$data);
     } 
 
public function dotransfare(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
    $uu=Doo::db()->find('Stores', array('where'=>" id='".$this->params[0]." ' " ,'limit'=>1));   
    
    if($uu->quantity < $_POST['quantity'] ){
          echo('0');
        }else{
        if($_POST['stockroom']!=$_POST['old_stock']){
        // check if transfare all stock
         if($uu->quantity-$_POST['quantity']==0 ) {
             Doo::db()->delete('Stores', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
             }else{
                $stores = Doo::loadModel('Stores', true);
                $stores->id=$this->params[0];
                $stores->quantity=$uu->quantity-$_POST['quantity'];
                $stores->edit_date=date('Y-m-d H:m:s');
                $stores->edit_by=$_SESSION['member_username']['id'];
               $lastinserted=$this->db()->update($stores);                 
                 }
        
        /// check if we have another stock in same store
        $findstore=Doo::db()->find('Stores',array('select'=>'id,quantity','where'=>" stockroom='".$_POST['stockroom']."' && item='".$uu->item."'",'limit'=>1));
        if(isset($findstore->id)){
                $stores = Doo::loadModel('Stores', true);
                $stores->id=$findstore->id;
                $stores->quantity=$findstore->quantity+$_POST['quantity'];
                $stores->edit_date=date('Y-m-d H:m:s');
                $stores->edit_by=$_SESSION['member_username']['id'];
               $lastinserted=$this->db()->update($stores);                 
            
            }else{
         $stores = Doo::loadModel('Stores', true);
        $stores->quantity=$_POST['quantity'];
        $stores->price=$uu->price;
        $stores->discount=$uu->discount;
        $stores->good=$uu->good;
        $stores->item=$uu->item;
        $stores->stockroom=$_POST['stockroom'];

        $stores->create_date=date('Y-m-d H:m:s');
        $stores->create_by=$_SESSION['member_username']['id'];
       $lastinserted=$this->db()->insert($stores);
                
                }
    
            }
      }
    
        $_SESSION['inner_message']['success'][]='Stock Transfared Successfully';
        header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'stores' );           
        
    }
    
    
    
}
?>