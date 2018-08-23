<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ProductCategoriesController extends CoreController{
	

 public function index(){
    $data['title']="ProductCategories";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('ProductCategories', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where=" name like '%".$_POST['search']['value']."%'  ||  product_categories.id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" product_categories.id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('product_categories.id','product_categories.create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      
      //$lists=Doo::db()->find('ProductCategories',array('where'=>$where,'select'=>'id,name,create_date',key($order)=>$order[key($order)],'limit'=>$limit));
      $lists=Doo::db()->find('ProductCategories',array('where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {
        
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->name,
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."productcategories/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","","","","","");

    }
      $datamodel = Doo::loadModel('ProductCategories', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('ProductCategories',array('where'=>$where,'select'=>'product_categories.id')));

      echo(json_encode($info));
    exit;

    }   
        
$this->renderc('productcategories/index',$data);
        
    }  
    


 
    public function add(){
    //Just replace these
    //Doo::loadCore('app/DooSiteMagic');
    //DooSiteMagic::displayHome();
      $data['title']="Add Product Categories";
    
    $this->renderc('productcategories/add',$data);
    }

      public function insert(){
  
      $productcategories = Doo::loadModel('ProductCategories', true);
      $uu=Doo::db()->find('ProductCategories', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
      if(!empty($uu)){
           $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'productcategories/add/');
        }else{
        $productcategories->name=$_POST['name'];
        $productcategories->ar_name=$_POST['ar_name'];
        
        $productcategories->create_date=date('Y-m-d H:m:s');
        $productcategories->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($productcategories);
        
        if(!empty($lastinserted)){

            $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'productcategories' );           

    $this->renderc('productcategories/index',$data);
        
           
            }
          }
      
      
        
    //$this->renderc('users/add',$data);
    }
    

 public function edit(){
    $data['title']='Edit Product Categories';
  
    $data['product_category']=Doo::db()->find('ProductCategories',array('where'=>"product_categories.id='".$this->params[0]."'", 'limit'=>1));
    
        
    $this->renderc('productcategories/edit',$data);
    }
    
    public function update(){
    
      $uu=Doo::db()->find('ProductCategories', array('select'=>'name',
        'where'=>"name='".$_POST['name']."' && id !='".$this->params[0]."'" , 'limit'=>1) );   
      if(!empty($uu)){
            $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'productcategories/edit/'.$this->params[0]);
          echo('0');
        }else{
        $productcategories = Doo::loadModel('ProductCategories', true);
        
        $productcategories->id=$this->params[0];
        
      $productcategories->name=$_POST['name'];
      $productcategories->ar_name=$_POST['ar_name'];
      
       
        $productcategories->edit_date=date('Y-m-d H:m:s');
        $productcategories->edit_by=$_SESSION['username']['id'];
        
       $lastinserted=$this->db()->update($productcategories);
       
        if(!empty($lastinserted)){
    
            $_SESSION['inner_message']['success'][]='Data Updated Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'productcategories' );           

    
           
            }
          }
      }
      
    
}
?>