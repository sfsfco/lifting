<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class SyncController extends DooController{

    public function index(){
    if(isset($_GET['page'])==1){echo 'hi1';}
    echo 'hi';
    }
	   
    public function add(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['groupslist']=$this->db()->find('Groups');       
		$this->renderc('users/add',$data);
    }
	
    public function edit(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   // $data['user']=Doo::db()->find('Users', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
   
    $data['user']=Doo::db()->relate('Users','Groups',array('where'=>"users.id='".$this->params[0]."'", 'limit'=>1));
    
        $data['groupslist']=$this->db()->find('Groups');       
		$this->renderc('users/edit',$data);
    }
	
	    public function insert(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      $user = Doo::loadModel('Users', true);
      $uu=Doo::db()->find('Users', array('select'=>'username','where'=>"id='".$_POST['username']."'", 'limit'=>1) );
//$data['carfield']=Doo::db()->relate('cars','productphotos',array('where'=>"cars.id='".$this->params[0]."'"));      
      if(!empty($uu)){
          
         // play::pr($uu);
          //play::pr($uu[0]->username);
          echo('0');
        }else{
        $user->first_name=$_POST['first_name'];
        $user->last_name=$_POST['last_name'];
        $user->username=$_POST['username'];
        $user->password=md5($_POST['password']);
        $user->address=$_POST['address'];
        $user->salary=$_POST['salary'];
        $user->phone=$_POST['phone'];
        $user->mobile=$_POST['mobile'];
        $user->group_id=$_POST['group_id'];
        $user->active=$_POST['active'];
        $user->details=$_POST['details'];
        $user->create_date=date('Y-m-d H:m:s');
        $user->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($user);
        
        if(!empty($lastinserted)){
            ($_POST['active']=='1')?$active="<div class='true'></div>":$active="<div class='false'></div>";
        $data['userslist']=Doo::db()->relate('Users','Groups',array('select'=>'users.*,groups.name'));   
		$this->renderc('users/index',$data);
        
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    }
    public function update(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      
      $uu=Doo::db()->find('Users', array('select'=>'username',
        'where'=>"username='".$_POST['username']."' && id !='".$_POST['old_id']."'" , 'limit'=>1) );   
      if(!empty($uu)){
          echo('0');
        }else{
        $user = Doo::loadModel('Users', true);
        
        $user->id=$_POST['old_id'];
        
        $user->first_name=$_POST['first_name'];
        $user->last_name=$_POST['last_name'];
        $user->username=$_POST['username'];
        $user->salary=$_POST['salary'];
        $user->phone=$_POST['phone'];
        $user->mobile=$_POST['mobile'];
        $user->group_id=$_POST['group_id'];
        $user->active=$_POST['active'];
        
       $user->details=$_POST["details"];
        
        $user->edit_date=date('Y-m-d H:m:s');
        $user->edit_by=$_SESSION['username']['id'];
        
       $lastinserted=$this->db()->update($user);
       
        if(!empty($lastinserted)){
            ($_POST['active']=='1')?$active="<div class='true'></div>":$active="<div class='false'></div>";
        
        $data['userslist']=Doo::db()->relate('Users','Groups',array('select'=>'users.*,groups.name'));
		$this->renderc('users/index',$data);
        
           
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
        $user->create_by=$_SESSION['username']['id'];
        
       $lastinserted=$this->db()->update($user);
       
        if(!empty($lastinserted)){
        
        $data['userslist']=Doo::db()->relate('Users','Groups',array('select'=>'users.*,groups.name'));
		$this->renderc('users/index',$data);
        
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    }
	
	    public function checkusername(){
        
        $res =Doo::db()->find('Users', array('where'=>"username='".$this->params[0]."'", 'limit'=>1) );
		if(!empty($res)){echo "عفوا الإسم موجود من قبل";}
        
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
        $data['userslist']=$this->db()->find('Users');       
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
	
	
}
?>