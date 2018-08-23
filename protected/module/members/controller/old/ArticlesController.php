<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ArticlesController extends MembersController{
	

    public function index(){
    $data['title']='Articles';
    
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        print_r($ids);
        foreach ($ids as $id) {
           Doo::db()->delete('Articles', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where=" `name` like '%".$_POST['search']['value']."%'  ||  `id` = '".$_POST['search']['value']."'  ";
      }else{
        $where=" `id`!= '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('id','name','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      $articles = Doo::db()->find('Articles',array('select'=>'id,name,create_date','where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));

      foreach ($articles as $article) {
        $status="<i class='fa fa-check green'></i>";
        $info['data'][]=array(
          "<div class='ids text-center'>".$article->id."</div>",
          $article->name,
          "<div class='text-center'>".date('Y/m/d',strtotime($article->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."articles/edit/".$article->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }

      $articlemodel = Doo::loadModel('Articles', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$articlemodel->count();

      $info['length']=$articlemodel->count();
      $info['recordsTotal']=$articlemodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Articles',array('select'=>'id','where'=>$where)));

      echo(json_encode($info));
    exit;

    }

		$this->renderc('articles/index',$data);
    }

    public function add(){
		
    $data['title']='Add Article';
		$this->renderc('articles/add',$data);
    }

	    public function insert(){
      $lines = Doo::loadModel('Articles', true);
      $uu=Doo::db()->find('Articles', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
      if(!empty($uu)){
       $_SESSION['inner_message']['error'][]='Name Already Exist.';
       header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'articles/add/');
        }else{
        $lines->name=$_POST['name'];
        $lines->ar_name=$_POST['ar_name'];
        $lines->details=$_POST['details'];
        $lines->ar_details=$_POST['ar_details'];
        if($_FILES['photo']['name']!=''){
            $lines->photo=play::uploadmedia_url($_FILES["photo"]["tmp_name"],'articles',null,'100%','100%');
            play::resizemedia(Doo::conf()->SITE_PATH.'global/uploads/articles/'.$lines->photo.'.jpg','300X300','300','300');
          }
        
        $lines->create_date=date('Y-m-d H:m:s');
        $lines->create_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->insert($lines);
        $_SESSION['inner_message']['success'][]='Data Added Successfully';
        header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'articles' );
          }
      
      
        
		//$this->renderc('users/add',$data);
    }

   public function delete(){
        $res =Doo::db()->delete('Articles', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
        $this->index();
    }
    
  public function edit(){
    $data['title']='Edit Article';
    $data['articles']=Doo::db()->find('Articles',array('where'=>"articles.id='".$this->params[0]."'", 'limit'=>1));
    
        
		$this->renderc('articles/edit',$data);
    }
    
    public function update(){
      $uu=Doo::db()->find('Articles', array('select'=>'name',
        'where'=>"name='".$_POST['name']."' && id !='".$this->params[0]."'" , 'limit'=>1) );   
      if(!empty($uu)){
       $_SESSION['inner_message']['error'][]='Name Already Exist.';
       header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'articles/edit/'.$this->params[0]);
        }else{
        $lines = Doo::loadModel('Articles', true);
        $lines->id=$this->params[0];
      $lines->name=$_POST['name'];
      $lines->ar_name=$_POST['ar_name'];
      $lines->details=$_POST['details'];
      $lines->ar_details=$_POST['ar_details'];
        if($_FILES['photo']['name']){
            @unlink(Doo::conf()->SITE_PATH.'global/uploads/articles/300X300_'.$lines->photo.'.jpg');
            @unlink(Doo::conf()->SITE_PATH.'global/uploads/articles/'.$lines->photo.'.jpg');
            $lines->photo=play::uploadmedia_url($_FILES["photo"]["tmp_name"],'articles',null,'100%','100%');
            play::resizemedia(Doo::conf()->SITE_PATH.'global/uploads/articles/'.$lines->photo.'.jpg','300X300','300','300');
          }
        
        $lines->edit_date=date('Y-m-d H:m:s');
        $lines->edit_by=$_SESSION['member_username']['id'];
       $lastinserted=$this->db()->update($lines);
        $_SESSION['inner_message']['success'][]='Data Updated Successfully';
        header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'articles' );
          }
      

      
      
      
        
		//$this->renderc('users/add',$data);
    } 
}
?>