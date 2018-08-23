<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ItemsController extends CoreController{
	

    public function index(){
    $data['title']="Items";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Items', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where=" items.name like '%".$_POST['search']['value']."%'  || items.purchase_price like '%".$_POST['search']['value']."%'  || items.order_limit like '%".$_POST['search']['value']."%'  ||  items.id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('items.id','items.name','items.create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      $lists=Doo::db()->relate('Items','Categories',array('select'=>'items.*,categories.name','where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->name,
          $list->Categories->name,
          $list->purchase_price,
          $list->order_limit,
          '<div class="text-center"><img src="'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'items/printbarcode/'.$list->barcode.'" style="max-width:50px;max-height:50px;"></div>',
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."items/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","");

    }
      $datamodel = Doo::loadModel('Items', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Items',array('where'=>$where,'select'=>'id')));

      echo(json_encode($info));
    exit;

    }   
    
    
		$this->renderc('items/index',$data);
    }

    public function add(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['categories']=Doo::db()->find('Categories',array('select'=>'name,id'));
		$this->renderc('items/add',$data);
    }

	    public function insert(){
            
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      $items = Doo::loadModel('Items', true);
      $uu=Doo::db()->find('Items', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
      if(!empty($uu)){
           $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'items/add/');
        }else{
        $items->name=$_POST['name'];
        $items->barcode=$_POST['barcode'];
        
        $items->purchase_price='0';
        $items->purchase_discount='0';
        $items->unit_type=$_POST['unit_type'];
        $items->package_units=$_POST['package_units'];
        $items->category=$_POST['category'];
        $items->country=$_POST['country'];
        $items->order_limit=$_POST['order_limit'];
        
        
        $items->details=$_POST['details'];
        $items->create_date=date('Y-m-d H:m:s');
        $items->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($items);
        
        if(!empty($lastinserted)){
            
            $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'items' );           
           
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    }

   public function delete(){
        $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $res =Doo::db()->delete('Items', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Items',array('select'=>'id')))/$paging);
                if(!isset($_GET['page'])){
                    $data['itemslist']=Doo::db()->relate('Items','Categories',array('select'=>'items.*,categories.name','limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['itemslist']=Doo::db()->relate('Items','Categories',array('select'=>'items.*,categories.name','limit'=>($_GET['page']-1)*$paging.','.$paging));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager

		$this->renderc('items/index',$data);
            
        
		//$this->renderc('users/add',$data);
    }
    
  public function edit(){
    $data['title']='Edit Item';
   $data['item']=Doo::db()->relate('Items','Categories',array('where'=>"items.id='".$this->params[0]."'", 'limit'=>1));
    
    $data['categories']=Doo::db()->find('Categories',array('select'=>'name,id'));
        
		$this->renderc('items/edit',$data);
    }
    
    public function update(){
        
      $uu=Doo::db()->find('Items', array('select'=>'name','where'=>"name='".$_POST['name']."' && id !='".$this->params[0]."'" , 'limit'=>1) );   
      if(!empty($uu)){
          $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'items/edit/'.$this->params[0]);
        }else{
        $items = Doo::loadModel('Items', true);
        $items->id=$this->params[0];
        $items->name=$_POST['name'];
        $items->barcode=$_POST['barcode'];
        $items->purchase_price='0';
        $items->purchase_discount='0';
        $items->unit_type=$_POST['unit_type'];
        $items->package_units=$_POST['package_units'];
        $items->category=$_POST['category'];
        $items->country=$_POST['country'];
        $items->order_limit=$_POST['order_limit'];
        $items->details=$_POST['details'];
        $items->edit_date=date('Y-m-d H:m:s');
        $items->edit_by=$_SESSION['username']['id'];
        
       $lastinserted=$this->db()->update($items);
       
        if(!empty($lastinserted)){
            
         $_SESSION['inner_message']['success'][]='Data Updated Successfully';
        header('Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'items' );   
        
        
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    } 
public function printing(){
     $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
     echo("<div style='text-align:center'><img src='".$data['formUrl'].Doo::conf()->adminmod."items/printbarcode/".$this->params[0]."'><br>".rawurldecode($this->params[1])."</div>");
     
     }
 public function printbarcode(){ 
       $colorFront = new BCGColor(0, 0, 0);
        $colorBar = new BCGColor(0, 0, 0);
        //$colorBack = new BCGColor(0, 0, 0);
        $colorBack = new BCGColor(255, 255, 255);
        $font = new BCGFontFile('./protected/class/barcode/font/Arial.ttf', 18);
        
        $code = new BCGcode39(); // Or another class name from the manual
        $code->setScale(2); // Resolution
        $code->setThickness(30); // Thickness
        $code->setForegroundColor($colorBar); // Color of bars
        $code->setBackgroundColor('#FFF'); // Color of spaces
        $code->setFont(0); // Font (or 0)
        $code->parse($this->params[0]); // Text
        $drawing = new BCGDrawing('', $colorBack);
        $drawing->setBarcode($code);
        $drawing->draw();
        header('Content-Type: image/png');
        $drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
        

        }
}
?>