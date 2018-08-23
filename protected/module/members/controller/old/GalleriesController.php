<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class GalleriesController extends MembersController{
	

 public function index(){
    $data['title']="Galleries";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Galleries', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where=" name like '%".$_POST['search']['value']."%'  ||  galleries.id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" galleries.id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('galleries.id','galleries.create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      
      //$lists=Doo::db()->find('Galleries',array('where'=>$where,'select'=>'id,name,create_date',key($order)=>$order[key($order)],'limit'=>$limit));
      $lists=Doo::db()->find('Galleries',array('where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {
        
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->name,
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."galleries/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","","","","","");

    }
      $datamodel = Doo::loadModel('Galleries', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Galleries',array('where'=>$where,'select'=>'galleries.id')));

      echo(json_encode($info));
    exit;

    }   
        
$this->renderc('galleries/index',$data);
        
    }  
    


 
    public function add(){
    //Just replace these
    //Doo::loadCore('app/DooSiteMagic');
    //DooSiteMagic::displayHome();
      $data['title']="Add Gallery";
    
    $this->renderc('galleries/add',$data);
    }

      public function insert(){
  
      $galleries = Doo::loadModel('Galleries', true);
      $uu=Doo::db()->find('Galleries', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
      if(!empty($uu)){
           $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'galleries/add/');
        }else{
        $galleries->name=$_POST['name'];
        $galleries->ar_name=$_POST['ar_name'];
        
        $galleries->create_date=date('Y-m-d H:m:s');
        $galleries->create_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->insert($galleries);
        
        if(!empty($lastinserted)){

            $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'galleries' );           

    $this->renderc('galleries/index',$data);
        
           
            }
          }
      
      
        
    //$this->renderc('users/add',$data);
    }
    

 public function edit(){
    $data['title']='Edit Gallery';
  
    $data['gallery']=Doo::db()->find('Galleries',array('where'=>"galleries.id='".$this->params[0]."'", 'limit'=>1));
    
        
    $this->renderc('galleries/edit',$data);
    }
    
    public function update(){
    
      $uu=Doo::db()->find('Galleries', array('select'=>'name',
        'where'=>"name='".$_POST['name']."' && id !='".$this->params[0]."'" , 'limit'=>1) );   
      if(!empty($uu)){
            $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'galleries/edit/'.$this->params[0]);
          echo('0');
        }else{
        $galleries = Doo::loadModel('Galleries', true);
        
        $galleries->id=$this->params[0];
        
      $galleries->name=$_POST['name'];
      $galleries->ar_name=$_POST['ar_name'];
      
       
        $galleries->edit_date=date('Y-m-d H:m:s');
        $galleries->edit_by=$_SESSION['member_username']['id'];
        
       $lastinserted=$this->db()->update($galleries);
       
        if(!empty($lastinserted)){
    
            $_SESSION['inner_message']['success'][]='Data Updated Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'galleries' );           

    
           
            }
          }
      }
      
    
}
?>