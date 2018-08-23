<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class TownsController extends CoreController{
	

    public function index(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Towns',array('select'=>'id')))/$paging);
                if(!isset($_GET['page'])){
                    $data['townslist']=Doo::db()->find('Towns',array('limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['townslist']=Doo::db()->find('Towns',array('limit'=>($_GET['page']-1)*$paging.','.$paging));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager
  
		$this->renderc('towns/index',$data);
    }

    public function add(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
		$this->renderc('towns/add',$data);
    }

	    public function insert(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      $banks = Doo::loadModel('Towns', true);
      $uu=Doo::db()->find('Towns', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
      if(!empty($uu)){
          echo('0');
        }else{
        $banks->name=$_POST['name'];
       
        $banks->create_date=date('Y-m-d H:m:s');
        $banks->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($banks);
        
        if(!empty($lastinserted)){

   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Towns',array('select'=>'id')))/$paging);
                if(!isset($_GET['page'])){
                    $data['townslist']=Doo::db()->find('Towns',array('limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['townslist']=Doo::db()->find('Towns',array('limit'=>($_GET['page']-1)*$paging.','.$paging));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager

		$this->renderc('towns/index',$data);
        
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    }

   public function delete(){
        $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $res =Doo::db()->delete('Towns', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );

   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Towns',array('select'=>'id')))/$paging);
                if(!isset($_GET['page'])){
                    $data['townslist']=Doo::db()->find('Towns',array('limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['townslist']=Doo::db()->find('Towns',array('limit'=>($_GET['page']-1)*$paging.','.$paging));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager

		$this->renderc('towns/index',$data);
            
        
		//$this->renderc('users/add',$data);
    }
    
  public function edit(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   
    $data['town']=Doo::db()->find('Towns',array('where'=>"id='".$this->params[0]."'", 'limit'=>1));
    
        
		$this->renderc('towns/edit',$data);
    }
    
    public function update(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      
      $uu=Doo::db()->find('Towns', array('select'=>'name',
        'where'=>"name='".$_POST['name']."' && id !='".$_POST['old_id']."'" , 'limit'=>1) );   
      if(!empty($uu)){
          echo('0');
        }else{
        $banks = Doo::loadModel('Towns', true);
        
        $banks->id=$_POST['old_id'];
        
      $banks->name=$_POST['name'];
      
        $banks->edit_date=date('Y-m-d H:m:s');
        $banks->edit_by=$_SESSION['username']['id'];
        
       $lastinserted=$this->db()->update($banks);
       
        if(!empty($lastinserted)){
           
        
      
   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Towns',array('select'=>'id')))/$paging);
                if(!isset($_GET['page'])){
                    $data['townslist']=Doo::db()->find('Towns',array('limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['townslist']=Doo::db()->find('Towns',array('limit'=>($_GET['page']-1)*$paging.','.$paging));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager

		$this->renderc('towns/index',$data);
        
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    } 
}
?>