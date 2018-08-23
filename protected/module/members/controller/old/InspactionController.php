<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class InspactionController extends MembersController{
	

    public function index(){

    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   //pager
            $paging=$this->paging;
            
            $data['pages']=ceil(count(Doo::db()->find('Inspaction',array('select'=>'id')))/$paging);
                if(!isset($_GET['page'])){
                    $data['inspactionlist']=Doo::db()->find('Inspaction',array('limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['inspactionlist']=Doo::db()->find('Inspaction',array('limit'=>($_GET['page']-1)*$paging.','.$paging));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager
           
        
		$this->renderc('inspaction/index',$data);
    }
    
    public function read(){
        $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['inspaction']=Doo::db()->find('Inspaction',array('where'=>" id='".$this->params[0]."'",'limit'=>1));    
    $inspaction=Doo::loadModel('Inspaction', true);
    $inspaction->id=$this->params[0];
    $inspaction->readed='1';
    $this->db()->update($inspaction);
    
    $this->renderc('inspaction/read',$data);
        }
    
        public function add(){
            $data['rootUrl']=Doo::conf()->APP_URL;
            $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
            if(isset($this->params[0])){$data['email']=$this->params[0]; }else{$data['email']='';}
            if(isset($this->params[1])){$data['subject']='Replay : '.$this->params[1]; }else{$data['subject']='';}
            
            $this->renderc('inspaction/add',$data);        
            }
        public function send(){
            $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
           $mail = new DooMailer();
        $mail->addTo($_POST['to']);

 $mail->setSubject($_POST['subject']);
 
 $mail->setBodyHtml($_POST['message']);
 $mail->setFrom($data['prefrances']->mail,$data['prefrances']->site_name);
 $mail->send();
 
 $this->index();
            }

}
?>