<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class UsersController extends MembersController{

    public function index(){
     $data['title']="Users";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           $photo=Doo::db()->find('Users',array('select'=>'pic,sign','where'=>"id='".$id."'", 'limit'=>1));
           @unlink(Doo::conf()->SITE_PATH.'global/uploads/users/150X150_'.$photo->pic.'.jpg');
           @unlink(Doo::conf()->SITE_PATH.'global/uploads/users/'.$photo->pic.'.jpg');
           @unlink(Doo::conf()->SITE_PATH.'global/uploads/users/150X150_'.$photo->sign.'.jpg');
           @unlink(Doo::conf()->SITE_PATH.'global/uploads/users/'.$photo->sign.'.jpg');
           Doo::db()->delete('Users', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        /*Doo::db()->relate('Users','Groups',array('where'=>" users.id!='1' ",'select'=>'users.*,groups.name','limit'=>'0,'.$paging));*/
        $where=" users.first_name like '%".$_POST['search']['value']."%'  || users.last_name like '%".$_POST['search']['value']."%'  || users.username like '%".$_POST['search']['value']."%'  || groups.name like '%".$_POST['search']['value']."%'  ||  users.id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" users.id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('users.id','users.username','users.first_name','users.last_name','users.pic','groups.name','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      
      $lists=Doo::db()->relate('Users','Groups',array('where'=>" (users.id != '1') && (".$where." ) ",'select'=>'users.*,groups.name',key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->username,
          $list->first_name,
          $list->last_name,
          $list->Groups->name,
          "<div class='ids text-center'><a class='fbox profile' href='".Doo::conf()->APP_URL."global/uploads/users/".$list->pic.".jpg'><img src='".Doo::conf()->APP_URL."global/uploads/users/150X150_".$list->pic.".jpg' /></a></div>",
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."users/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","","","","","");

    }
      $datamodel = Doo::loadModel('Users', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->relate('Users','Groups',array('where'=>$where,'select'=>'users.id')));

      echo(json_encode($info));
    exit;

    }   
        
    
		$this->renderc('users/index',$data);
    }
	   
    public function add(){
        $data['title']="Add New User";
        $data['groupslist']=$this->db()->find('Groups');       
		$this->renderc('users/add',$data);
    }
	
    public function edit(){
   $data['title']='Edit User';
    $data['user']=Doo::db()->find('Users',array('where'=>" id='".$this->params[0]."'", 'limit'=>1));
        $data['groupslist']=$this->db()->find('Groups');       
		$this->renderc('users/edit',$data);
    }
	
	    public function insert(){
            
      $user = Doo::loadModel('Users', true);
      $uu=Doo::db()->find('Users', array('select'=>'username','where'=>" username='".$_POST['username']."'", 'limit'=>1) );

      if(!empty($uu)){
          $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'users/add/');
        }else{
            $user->sign=play::uploadmedia_url($_FILES["sign"]["tmp_name"],'users',null,'100%','100%');
            play::resizemedia(Doo::conf()->SITE_PATH.'global/uploads/users/'.$user->sign.'.jpg','150X150','150','150');
            $user->pic=play::uploadmedia_url($_FILES["pic"]["tmp_name"],'users',null,'100%','100%');
            play::resizemedia(Doo::conf()->SITE_PATH.'global/uploads/users/'.$user->pic.'.jpg','150X150','150','150');
            $user->first_name=$_POST['first_name'];
            $user->last_name=$_POST['last_name'];
            $user->username=$_POST['username'];
            $user->password=md5($_POST['password']);
            $user->address=$_POST['address'];
            $user->salary=$_POST['salary'];
            $user->phone=$_POST['phone'];
            $user->mobile=$_POST['mobile'];
            $user->group_id=$_POST['group_id'];
            $user->active=(isset($_POST['active']))?'1':'0';
            $user->details=$_POST['details'];
            $user->create_date=date('Y-m-d H:m:s');
            $user->create_by=$_SESSION['member_username']['id'];
            $lastinserted=$this->db()->insert($user);
        
        if(!empty($lastinserted)){
            $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'users' );           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    }
    public function update(){
      $uu=Doo::db()->find('Users', array('select'=>'username',
        'where'=>"username='".$_POST['username']."' && id !='".$this->params[0]."'" , 'limit'=>1) );   
      if(!empty($uu)){
          $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'users/edit/'.$this->params[0]);
        }else{
        $user = Doo::db()->find('Users', array('where'=>" id ='".$this->params[0]."'" , 'limit'=>1) );
        
        
            if($_FILES["sign"]["tmp_name"]){
           
                @unlink(Doo::conf()->SITE_PATH.'global/uploads/users/150X150_'.$user->sign.'.jpg');
                @unlink(Doo::conf()->SITE_PATH.'global/uploads/users/'.$user->sign.'.jpg');
            $user->sign=play::uploadmedia_url($_FILES["sign"]["tmp_name"],'users',null,'100%','100%');
            play::resizemedia(Doo::conf()->SITE_PATH.'global/uploads/users/'.$user->sign.'.jpg','150X150','150','150');
            }
            if($_FILES["pic"]["tmp_name"]){
                @unlink(Doo::conf()->SITE_PATH.'global/uploads/users/150X150_'.$user->pic.'.jpg');
                @unlink(Doo::conf()->SITE_PATH.'global/uploads/users/'.$user->pic.'.jpg');
            $user->pic=play::uploadmedia_url($_FILES["pic"]["tmp_name"],'users',null,'100%','100%');
            play::resizemedia(Doo::conf()->SITE_PATH.'global/uploads/users/'.$user->pic.'.jpg','150X150','150','150');
            }
        $user->first_name=$_POST['first_name'];
        $user->last_name=$_POST['last_name'];
        $user->username=$_POST['username'];
        $user->salary=$_POST['salary'];
        $user->phone=$_POST['phone'];
        $user->mobile=$_POST['mobile'];
        $user->password=($_POST['password']!='')?md5($_POST['password']):$user->password;
        $user->group_id=$_POST['group_id'];
        $user->active=(isset($_POST['active']))?'1':'0';
       $user->details=$_POST["details"];
        
        $user->edit_date=date('Y-m-d H:m:s');
        $user->edit_by=$_SESSION['member_username']['id'];
        
       $lastinserted=$this->db()->update($user);
       
        if(!empty($lastinserted)){
         $_SESSION['inner_message']['success'][]='Data Updated Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'users' );           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    }    
    
    public function updatepass(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      
      $uu=Doo::db()->find('Users', array('select'=>'password',
        'where'=>"password='".md5($_POST['old_password'])."' && id ='".$_POST['old_id']."'" , 'limit'=>1) );   
      if(empty($uu)){
          echo('0');
        }else{
        $user = Doo::loadModel('Users', true);
        
        $user->id=$_POST['old_id'];
        $user->password=md5($_POST['password']);
        
        $user->create_date=date('Y-m-d H:m:s');
        $user->create_by=$_SESSION['member_username']['id'];
        
       $lastinserted=$this->db()->update($user);
       
        if(!empty($lastinserted)){
        
        //
         $paging=$this->paging;
	$data['pages']=ceil(count(Doo::db()->find('Users',array('select'=>'id')))/$paging);
		if(!isset($_GET['page'])){
            $data['userslist']=Doo::db()->relate('Users','Groups',array('select'=>'users.*,groups.name','limit'=>'0,'.$paging));
			$data['selectedpage']='1';
		}else{
            
            $data['userslist']=Doo::db()->relate('Users','Groups',array('select'=>'users.*,groups.name','limit'=>($_GET['page']-1)*$paging.','.$paging));
			$data['selectedpage']=$_GET['page'];
		}	
        //
		$this->renderc('users/index',$data);
        
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    }
	
	    public function checkusername(){
        $res =Doo::db()->find('Users', array('where'=>"username='".$this->params[0]."'", 'limit'=>1) );
		if(!empty($res)){echo "The Name Already Exists";}
        
		//$this->renderc('users/add',$data);
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
        $res =Doo::db()->delete('Users', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
    //
    $paging=$this->paging;
	$data['pages']=ceil(count(Doo::db()->find('Users',array('select'=>'id')))/$paging);
		if(!isset($_GET['page'])){
            $data['userslist']=Doo::db()->relate('Users','Groups',array('select'=>'users.*,groups.name','limit'=>'0,'.$paging));
			$data['selectedpage']='1';
		}else{
            
            $data['userslist']=Doo::db()->relate('Users','Groups',array('select'=>'users.*,groups.name','limit'=>($_GET['page']-1)*$paging.','.$paging));
			$data['selectedpage']=$_GET['page'];
		}	
    //

		$this->renderc('users/index',$data);
            
        
		//$this->renderc('users/add',$data);
    }
	
       public function editpass(){
           
        $data['rootUrl']=Doo::conf()->APP_URL;
        $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['old_id']=$this->params[0];
		$this->renderc('users/editpass',$data);
            
        
		//$this->renderc('users/add',$data);
    }

function uploadimg(){
    
    	$error = "";
	$msg = "";
    if(isset($this->params[0])){$fileElementName =$this->params[0];}else{$fileElementName ='per_img';}
	
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
	}elseif(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else 
	{
            $newname=date('Hms').$_FILES[$fileElementName]['name'];
			$msg .= $newname;
			//$msg .= " File Name: " . $_FILES['fileToUpload']['name'] . ", ";
			//$msg .= " File Size: " . @filesize($_FILES['fileToUpload']['tmp_name']);
			//for security reason, we force to remove all uploaded file
            move_uploaded_file($_FILES[$fileElementName]['tmp_name'],Doo::conf()->SITE_PATH.'global/uploads/users/'.$newname);
			//@unlink($_FILES['fileToUpload']);		
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
    }
	
}
?>