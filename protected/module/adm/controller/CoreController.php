<?php

class CoreController extends DooController {

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
		;
		//session_start();
		//if not login, group = anonymous
        play::cleanquotes();
		$role = (isset($_SESSION['username']['group_id'])) ? $_SESSION['username']['group_id']=$_SESSION['username']['group_id'] : $_SESSION['username']['group_id']='anonymous';
		//$role = (isset($_SESSION['username']['group'])) ? $_SESSION['username']['group'] : 'anonymous';
		if($rs = $this->checkperm($_SESSION['username']['group_id'], $resource, $action)){
        //if($rs = $this->acl()->process($role, $resource, $action )){
			//echo $role .' is not allowed for '. $resource . ' '. $action;
			return $rs;
		}
	}

function login()
{
$this->renderc('index');	
}
function checklogin(){
    
		if(isset($_SESSION['username'])){
			$data['username'] = $_SESSION['username'];
		}else{
			$data['username'] = null;
		}
        
        
		if($data['username'] == null && $_POST==null ){
         
            $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
            
            if('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==Doo::conf()->APP_URL.Doo::conf()->adminmod){
				$this->renderc('login', $data);            	
            }else{
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod);	
            }
            

            //$this->renderc('login', $data);
            exit;	
        }
	
}
 /**
 * Before run method
 */
/*
 public function beforeRun($resource, $action) {
 $this->_view->requestInfo = array("controller" => $resource, "action" => $action);
 }
*/
 /**
 * Redirect method
 */
/*
 public function _redirect($url) {
 header("Location: " . $url);
 }
*/
 /**
 * isPost Returns true if method is post
 *
 * @return boolean
 */
/*
 public function isPost() {
 if ($_SERVER['REQUEST_METHOD'] == "POST") return true;
 else return false;
 }
*/
 /**
 * isGet Returns true if method is get
 *
 * @return boolean
 */
/*
 public function isGet() {
 if ($_SERVER['REQUEST_METHOD'] == "GET") return true;
 else return false;
 }
*/
 /**
 * Appends file to header
 *
 * @param array $data Data for view part
 * @param string $url Url of the file
 * @param string $type Type of the file example: "text/javascript"
 */
/*
 public function appendFile(&$data, $url, $type) {
 switch ($type) {
 case 'text/javascript':
 $html = '<script type="'.$type.'" src="'.$url.'"></script>';
 break;
 case '':
 break;
 }
 if (isset($data['scripts'])) {
 $data['scripts'] .= $html;
 } else {
 $data['scripts'] = $html;
 }
 }
*/
 /**
 * Gets path to javascript folder
 *
 * @return string Javascript path
 */
/*
 public function getJsPath() {
 return $this->jsPath;
 }*/
public function sayhi($hi) {
 return 'hi '.$hi;
 }

public function checkperm($role, $resource, $action ) {
 $actions=array();
 $perms=Doo::db()->find('Permissions',array('select'=>'id,actions','where'=>" group_id='".$role."' && controller_name='".$resource."'   ", 'limit'=>1));   
if(!empty($perms->actions)){$actions=explode(',',$perms->actions);}


$coco='1';
 if(!in_array($action,$actions) &&  $resource !='MainController' && $action!='login' && $coco!='*'){
 	$data['title']= 'Access Denied';
    $data['message']= '<h2>You Have No Permession To Access This Page</h2>';
	$this->renderc('error/permission',$data);
	exit();
 //$arr=array('/error/notallow','internal');
 //return $arr;
     }
 
 
 }




}
?>
