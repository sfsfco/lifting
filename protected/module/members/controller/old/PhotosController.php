<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class PhotosController extends MembersController{
	

    public function index(){
	$data['title']="Photos";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           $photo=Doo::db()->find('Photos',array('select'=>'photo','where'=>"id='".$id."'", 'limit'=>1));
             $ph=explode(',',$photo->photo);
             foreach($ph as $p){
               @unlink(Doo::conf()->SITE_PATH.'global/uploads/photos/300X300_'.$p.'.jpg');
               @unlink(Doo::conf()->SITE_PATH.'global/uploads/photos/'.$p.'.jpg');   
             }
           
           Doo::db()->delete('Photos', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $ordering=array('id','name','photo','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      $lists = Doo::db()->find('Photos',array('select'=>'id,name,featured,photo,create_date','where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));
      
      if(count($lists)>0){
      foreach ($lists as $list) {
        $photo = reset(explode(',',$list->photo));
        $star = ($list->featured=='0')?'fa-star-o':'fa-star goldn';
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->name,
          "<div class='ids text-center'><a class='fbox' href='".Doo::conf()->APP_URL."global/uploads/photos/".$photo.".jpg'><img src='".Doo::conf()->APP_URL."global/uploads/photos/300X300_".$photo.".jpg' /></a></div>",
          "<div class='text-center featured' icon-val='".$list->id."'><i class='fa ".$star."' aria-hidden='true'></i></div>",
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."photos/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array(
          "<div class='ids text-center'></div>",
          "",
          "<div class='ids text-center'></div>",
          "<div class='text-center'></div>",
          "<div class='text-center'></div>"
          );

    }
      $datamodel = Doo::loadModel('Photos', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Photos',array('select'=>'id','where'=>$where)));

      echo(json_encode($info));
    exit;

    }
		$this->renderc('photos/index',$data);
    }

    public function add(){
      $data['title']='Add Photos';
      $data['galleries']=Doo::db()->find('Galleries');
    $this->renderc('photos/add',$data);
    }
  public function edit(){
      $data['title']='Edit Photo';
      $data['galleries']=Doo::db()->find('Galleries');
      $data['photo']=Doo::db()->find('Photos',array('where'=>" id='".$this->params[0]."' ",limit=>1));

		$this->renderc('photos/edit',$data);
    }

	    public function insert(){

      $lines = Doo::loadModel('Photos', true);
      $uu=Doo::db()->find('Photos', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
      if(!empty($uu)){
          $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'photos/add/');
        }else{
        $lines->name=$_POST['name'];
        for($x=1;$x<=5;$x++){
          if($_FILES['photo_'.$x]['name']!=''){
            $ph[]=play::uploadmedia_url($_FILES['photo_'.$x]['tmp_name'],'photos',null,'100%','100%');
            play::resizemedia(Doo::conf()->SITE_PATH.'global/uploads/photos/'.end($ph).'.jpg','300X300','300','300');  
          }
        }
        $lines->photo=implode(',',$ph);
        $lines->gallery=$_POST['gallery'];
        $lines->ar_name=$_POST['ar_name'];

        $lines->details=$_POST['details'];
        $lines->ar_details=$_POST['ar_details'];

        $lines->create_date=date('Y-m-d H:m:s');
        $lines->create_by=$_SESSION['member_username']['id'];

        $lastinserted=$this->db()->insert($lines);
        
        $_SESSION['inner_message']['success'][]='Data Added Successfully';
        header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'photos' );
        }
      
      
        
    //$this->renderc('users/add',$data);
    }
 public function update(){

      
      $uu=Doo::db()->find('Photos', array('select'=>'name','where'=>"name='".$_POST['name']."' && id!='".$this->params[0]."' ", 'limit'=>1) );
      if(!empty($uu)){
          $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'photos/add/');
        }else{
        $lines = Doo::db()->find('Photos', array('select'=>'id,photo','where'=>"  id='".$this->params[0]."' ", 'limit'=>1) );
        $old_photos = '';
        foreach (explode(',', $_POST['old_photos']) as $rm) {
          @unlink(Doo::conf()->SITE_PATH.'global/uploads/photos/300X300_'.$rm.'.jpg');
          @unlink(Doo::conf()->SITE_PATH.'global/uploads/photos/'.$rm.'.jpg');   
          $lines->photo = str_replace($rm, '',$lines->photo);

        }
        $lines->photo = implode(',', array_filter(explode(',', $lines->photo)));
        
        $lines->name=$_POST['name'];
        $lines->ar_name=$_POST['ar_name'];
        $lines->details=$_POST['details'];
        $lines->ar_details=$_POST['ar_details'];
        $ph = array();
        for($x=1;$x<=5;$x++){
        
          if($_FILES['photo_'.$x]['name']!=''){
            $ph[]=play::uploadmedia_url($_FILES['photo_'.$x]['tmp_name'],'photos',null,'100%','100%');
            play::resizemedia(Doo::conf()->SITE_PATH.'global/uploads/photos/'.end($ph).'.jpg','300X300','300','300');  
          }
        }

        $lines->photo=($lines->photo!='')?$lines->photo.','.implode(',',$ph):implode(',',$ph);
        $lines->gallery=$_POST['gallery'];
        
    

        $lines->edit_date=date('Y-m-d H:m:s');
        $lines->edit_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->update($lines);
        
        $_SESSION['inner_message']['success'][]='Data Added Successfully';
        header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'photos' );
        }
      
      
        
		//$this->renderc('users/add',$data);
    }

   public function featured(){
    $photo = Doo::db()->find('Photos',array('select'=>'id,featured','where'=>" id='".$this->params[0]."' ",'limit'=>1));
    if($photo->featured=='0'){
      echo '1';
      $photo->featured = '1';
    }else{
      echo '0';
      $photo->featured = '0';
    }
    $this->db()->update($photo);
   }
   public function delete(){
        $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $old_photo=Doo::db()->find('Photos', array('select'=>'photo','where'=>"id='".$this->params[0]."'", 'limit'=>1) );
        if($old_photo->photo!='' && file_exists(Doo::conf()->SITE_PATH.'global/uploads/photos/'.$old_photo->photo)){@unlink(Doo::conf()->SITE_PATH.'global/uploads/photos/'.$old_photo->photo);}
        $res =Doo::db()->delete('Photos', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );

   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Photos',array('select'=>'id')))/$paging);
                if(!isset($_GET['page'])){
                    $data['photoslist']=Doo::db()->find('Photos',array('limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['photoslist']=Doo::db()->find('Photos',array('limit'=>($_GET['page']-1)*$paging.','.$paging));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager

		$this->renderc('photos/index',$data);
            
        
		//$this->renderc('users/add',$data);
    }
    
  
    
function upload(){
    
    	$error = "";
	$msg = "";
	$fileElementName ='fileToUpload';
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else 
	{
            $newname=date('Hms').$_FILES['fileToUpload']['name'];
			$msg .= $newname;
			//$msg .= " File Name: " . $_FILES['fileToUpload']['name'] . ", ";
			//$msg .= " File Size: " . @filesize($_FILES['fileToUpload']['tmp_name']);
			//for security reason, we force to remove all uploaded file
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'],Doo::conf()->SITE_PATH.'global/uploads/photos/'.$newname);
            Doo::loadHelper('DooGdImage');
                $gd = new DooGdImage(Doo::conf()->SITE_PATH.'global/uploads/photos/',Doo::conf()->SITE_PATH.'global/uploads/photos/resized/');
						$gd->generatedQuality = 85;
						$gd->thumbSuffix = '';
		                $gd->generatedType="jpg";
						$gd->adaptiveResize($newname,165,100);
			//@unlink($_FILES['fileToUpload']);		
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
    }

public function getimg(){
    $i = new imagethumbnail_corners();
    if(!file_exists($_GET["path"]) || !isset($_GET["path"])){$_GET["path"]=Doo::conf()->SITE_PATH."global/img/no-img.jpg";}
    if(!isset($_GET["X"])){$_GET["X"]="250";}
    if(!isset($_GET["Y"])){$_GET["Y"]="250";}
    
    $i->open($_GET["path"]);
    $i->setX($_GET["X"]);
	$i->setY($_GET["Y"]);
    header("Content-type: image/jpeg;");
    $i->imagejpeg();
    }

public function cats(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Categories',array('select'=>'id','where'=>" type='photos'")))/$paging);
                if(!isset($_GET['page'])){
                    $data['categorieslist']=Doo::db()->find('Categories',array('where'=>" type='photos'",'limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['categorieslist']=Doo::db()->find('Categories',array('where'=>" type='photos'",'limit'=>($_GET['page']-1)*$paging.','.$paging));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager
		$this->renderc('categories/index',$data);
    }

public function addcats(){
     $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $this->renderc('categories/add',$data);
    }

public function insertcats(){
    $lines = Doo::loadModel('Categories', true);
      $uu=Doo::db()->find('Categories', array('select'=>'name','where'=>"name='".$_POST['name']."' && type='photos'", 'limit'=>1) );
      if(!empty($uu)){
          echo('0');
        }else{
        $lines->name=$_POST['name'];
        $lines->type='photos';
        $lines->parent='0';
       
        $lines->create_date=date('Y-m-d H:m:s');
        $lines->create_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->insert($lines);
        
        if(!empty($lastinserted)){$this->cats();}
    }

}
public function deletecats(){
    $res =Doo::db()->delete('Categories', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
    $this->cats();
    }

}


?>