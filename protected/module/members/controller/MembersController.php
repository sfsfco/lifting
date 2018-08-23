<?php

class MembersController extends DooController {

 /**
 * Current URL
 */

 protected static $_currentUrl = null;

 /**
 * Instance of Doo::db
 */

 protected $_db = null;

 /**
 * Translator
 */
 protected $_translate = null;

 /**
 * Instance of Doo::cache
 */

 protected $_cache = null;

 /**
 * Base path of application
 */

 public $_basePath = null;

 /**
 * Instace of DooSession
 */
 public $_session = null;

 /**
 * Instance of DooAcl
 */

 public $_acl = null;

 /**
 * Host
 */

 public $host = null;

 /**
 * Js path
 */

 public  $jsPath = null;
 public  $data = null;
 
 public  $paging = null;
 public  $rootUrl = null;
 public  $formUrl = null;

 public function __construct() {
	$this->paging='50';
	$this->checklogin();

//echo $translator->translate("test");die();
/*
 $this->_basePath = Doo::conf()->ROOT_DIR;
 // add some globals that we need
 $this->_db = Doo::db();
 $this->_view = DooController::view();
 $this->host = Doo::conf()->host;
 $this->_view->host = Doo::conf()->host;
 // ACL
 $this->_acl = Doo::acl();
 // add sessions
 $this->_session = Doo::session("mywebsite");
 $templateVariables = $this->getSettings();
 // session
 $this->_view->_session = $this->_session;
 $this->_cache = Doo::cache('apc');
 $this->jsPath = $this->_view->host . 'static/js/';
*/
 }
	public function beforeRun($resource, $action){
		
		play::cleanquotes();
		
	}

function login()
{
$this->renderc('index');	
}
function checklogin(){
    
	$data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
		if(isset($_SESSION['member_username'])){
			$data['username'] = $_SESSION['member_username'];
		}else{
			$data['username'] = null;
		}
        
        
        
		if($data['username'] == null && $_POST==null ){
         
            $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
            
            if('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==Doo::conf()->APP_URL.Doo::conf()->membermod){
				$this->renderc('login', $data);            	
            }else{
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod);	
            }
            

            //$this->renderc('login', $data);
            exit;	
        }
	
}




}
?>
