<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class MaillistController extends FrontController{
	

    public function done(){
	$data['title'] = '- Maillist';
    $data['resource'] = $this->resource;
    $data['action'] = $this->action;
		$this->renderc('maillist/done',$data);
    }
    public function error(){
	$data['title'] = '- Maillist';
    $data['resource'] = $this->resource;
    $data['action'] = $this->action;
    
		$this->renderc('maillist/error',$data);
    }

    public function add(){
        $maillist=Doo::db()->find('Maillist',array('where'=>" email='".$_POST['email']."'",'limit'=>1));
         if(!empty($maillist)){
            header( 'Location: '.Doo::conf()->APP_URL.'maillist/error');    
            
             }else{
                  $lines = Doo::loadModel('Maillist', true);
        $lines->name='Enter Name';
        $lines->email=$_POST['email'];
        
    
        $lines->create_date=date('Y-m-d H:m:s');
        $lastinserted=$this->db()->insert($lines);
             header( 'Location: '.Doo::conf()->APP_URL.'maillist/done');
         
                 }
        
         
         
         
    }


}
?>