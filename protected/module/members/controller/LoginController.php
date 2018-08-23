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
				
				
				
				$user = $this->db()->find('Clients', array('where'=>"username='".$_POST['username']."' && password='".md5($_POST['password'])."' && active = '1' ",'limit'=>1));
				
				if($user){
                 
                    
                    
					$x=1;	
					unset($_SESSION['member_username']);
					$_SESSION['member_username'] = array(
											'id'=>$user->id, 
											'user'=>$user->username,
											'first_name'=>$user->name,
											'last_name'=>$user->representative,
										);
                                
									
					unset($_SESSION['inner_message']);
					header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod);
                    
				}
			}
		}
        if($x==0){
    $_SESSION['inner_message']['error'][]='Failed to login !';
        //$this->flash->addMessage('Failed to login !');
		//DooController::view()->flashMessenger = $this->flash;
		//$this->renderc('login', $data);
		header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod);	
	}
	}
    
    function logout(){
        unset($_SESSION['member_username']);
        			header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod );
        }
        
      

}
?>