<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class StockroomsController extends CoreController{
	

    public function index(){
	$data['title']="Stockrooms";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Stockrooms', array('where'=>"id='".$id."'", 'limit'=>1) );
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
      
      $lists=Doo::db()->find('Stockrooms',array('where'=>$where,'select'=>'id,name,create_date',key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->name,
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."stockrooms/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","");

    }
      $datamodel = Doo::loadModel('Stockrooms', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Stockrooms',array('where'=>$where,'select'=>'id')));

      echo(json_encode($info));
    exit;

    }   
        

		$this->renderc('stockrooms/index',$data);
    }

    public function add(){
        $data['title']="Add New Store";
		$this->renderc('stockrooms/add',$data);
    }

	    public function insert(){
    
      $stockrooms = Doo::loadModel('Stockrooms', true);
      $uu=Doo::db()->find('Stockrooms', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
      if(!empty($uu)){
            $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'stockrooms/add/');
        }else{
        $stockrooms->name=$_POST['name'];
       
        $stockrooms->create_date=date('Y-m-d H:m:s');
        $stockrooms->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($stockrooms);
        
        if(!empty($lastinserted)){
            $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'stockrooms' );           
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    }

   public function delete(){
        $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $findstore=Doo::db()->find('Stores', array('select'=>'id','where'=>"stockroom='".$this->params[0]."'", 'limit'=>1) );
        if(isset($findstore->id)){echo('لا يمكن حذف مخزن يحتوي على أصناف');}else{
            $res =Doo::db()->delete('Stockrooms', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
            }
        
   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Stockrooms',array('select'=>'id')))/$paging);
                if(!isset($_GET['page'])){
                    $data['stockroomslist']=Doo::db()->find('Stockrooms',array('limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['stockroomslist']=Doo::db()->find('Stockrooms',array('limit'=>($_GET['page']-1)*$paging.','.$paging));
                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager

		$this->renderc('stockrooms/index',$data);
            
        
		//$this->renderc('users/add',$data);
    }
    
  public function edit(){
    $data['title']='Edit Stock';
    $data['stockroom']=Doo::db()->find('Stockrooms',array('where'=>"stockrooms.id='".$this->params[0]."'", 'limit'=>1));
    
        
		$this->renderc('stockrooms/edit',$data);
    }
    
    public function update(){
   
      $uu=Doo::db()->find('Stockrooms', array('select'=>'name',
        'where'=>"name='".$_POST['name']."' && id !='".$this->params[0]."'" , 'limit'=>1) );   
      if(!empty($uu)){
           $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'stockrooms/edit/'.$this->params[0]);
        }else{
        $stockrooms = Doo::loadModel('Stockrooms', true);
        $stockrooms->id=$this->params[0];
        $stockrooms->name=$_POST['name'];
        $stockrooms->edit_date=date('Y-m-d H:m:s');
        $stockrooms->edit_by=$_SESSION['username']['id'];
        
       $lastinserted=$this->db()->update($stockrooms);
       
        if(!empty($lastinserted)){
           
            $_SESSION['inner_message']['success'][]='Data Updated Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'stockrooms' );   
        
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    } 
}
?>