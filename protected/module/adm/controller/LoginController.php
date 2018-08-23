<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class LoginController extends DooController{

	
    function login(){

	$data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
    	$x=0;
		if(isset($_POST['username']) && isset($_POST['password']) ){
			
			$_POST['username'] = trim($_POST['username']);
			$_POST['password'] = trim($_POST['password']);
			
			//check User existance in DB, if so start session and redirect to home page.
			if(!empty($_POST['username']) && !empty($_POST['password'])){
				
				
				
				$user = $this->db()->find('Users', array('where'=>"username='".$_POST['username']."' && password='".md5($_POST['password'])."' && active = '1' ",'limit'=>1));
				
				if($user){
                    $group=$this->db()->find('Groups', array('select'=>'name','where'=>"id='".$user->group_id."' && active='1' ",'limit'=>1));    
                    
                    if(!empty($group->name)){
					$x=1;	
					unset($_SESSION['username']);
					$_SESSION['username'] = array(
											'id'=>$user->id, 
											'user'=>$user->username,
											'first_name'=>$user->first_name,
											'last_name'=>$user->last_name,
											'pic'=>$user->pic,
											'sign'=>$user->sign,
											'group_id'=>$user->group_id,
                                            'group'=>$group->name,
										);
                                Doo::loadModel('Users');
                                $ur=new Users;
                                $ur->id='1';
                                $ur->last_login=date('Y-m-d H:m:s');
                                
								Doo::db()->update($ur);
									
					unset($_SESSION['inner_message']);
					header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod);
                    }
				}
			}
		}
        if($x==0){
    $_SESSION['inner_message']['error'][]='Failed to login !';
        //$this->flash->addMessage('Failed to login !');
		//DooController::view()->flashMessenger = $this->flash;
		//$this->renderc('login', $data);
		header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod);	
	}
	}
    
    function logout(){
        unset($_SESSION['username']);
        			header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod );
        }
        
      

}
?>