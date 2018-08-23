<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ServicesController extends MembersController{
	

    public function index(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Services',array('select'=>'id')))/$paging);
                if(!isset($_GET['page'])){
                    $data['serviceslist']=Doo::db()->find('Services',array('limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['serviceslist']=Doo::db()->find('Services',array('limit'=>($_GET['page']-1)*$paging.','.$paging));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager
        for($x=0;$x<count($data['serviceslist']);$x++){
            $user=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['serviceslist'][$x]->create_by."'",'limit'=>1));
            (isset($user->first_name))?$data['serviceslist'][$x]->username=$user->first_name." ".$user->last_name:$data['serviceslist'][$x]->username='';
            }
		$this->renderc('services/index',$data);
    }

    public function add(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
		$this->renderc('services/add',$data);
    }

	    public function insert(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      $lines = Doo::loadModel('Services', true);
      $uu=Doo::db()->find('Services', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
      if(!empty($uu)){
          echo('0');
        }else{
        $lines->name=$_POST['name'];
        $lines->details=$_POST['details'];
       
        $lines->create_date=date('Y-m-d H:m:s');
        $lines->create_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->insert($lines);
        
        if(!empty($lastinserted)){$this->index();}
          }
      
      
        
		//$this->renderc('users/add',$data);
    }

   public function delete(){
        $res =Doo::db()->delete('Services', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
        $this->index();
    }
    
  public function edit(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   
    $data['services']=Doo::db()->find('Services',array('where'=>"services.id='".$this->params[0]."'", 'limit'=>1));
    
        
		$this->renderc('services/edit',$data);
    }
    
    public function update(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      
      $uu=Doo::db()->find('Services', array('select'=>'name',
        'where'=>"name='".$_POST['name']."' && id !='".$_POST['old_id']."'" , 'limit'=>1) );   
      if(!empty($uu)){
          echo('0');
        }else{
        $lines = Doo::loadModel('Services', true);
        
        $lines->id=$_POST['old_id'];
        
      $lines->name=$_POST['name'];
      $lines->details=$_POST['details'];
      
      
        $lines->edit_date=date('Y-m-d H:m:s');
        $lines->edit_by=$_SESSION['member_username']['id'];
        
       $lastinserted=$this->db()->update($lines);
       
        if(!empty($lastinserted)){$this->index();}
          }
      
      
        
		//$this->renderc('users/add',$data);
    } 
}
?>