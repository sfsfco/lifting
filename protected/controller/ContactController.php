<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ContactController extends FrontController{
	

    public function index(){
     
        $data['title'] = '- Contact Us';
        $data['resource'] = $this->resource;
        $data['action'] = $this->action;
        $this->renderc('contact/index',$data);
    }

    public function catalog(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
    $data['services']=Doo::db()->find('Services',array('select'=>'id,name'));
 $data['photoslist']=$this->db()->find('Photos',array('limit'=>4,'order by'=>'id desc'));

 //   $data['intro']=$this->db()->find('Articles',array('where'=>" id='1'",'limit'=>1));
        
      
        //play::pr($data['programslist'][0]);die();
		$this->renderc('contact/catalog',$data);
    }

 
   
    
public function send(){
      $lines = Doo::loadModel('Contact', true);
        $lines->name='Name';
        $lines->email=$_POST['email'];
        $lines->subject=$_POST['subject'];
        $lines->message=$_POST['message'];
        $lines->readed='0';
       
    
        $lines->create_date=date('Y-m-d H:m:s');
        $lastinserted=$this->db()->insert($lines);
        
       
        $mail = new DooMailer();
        $mail->addTo(play::prefrances('mail'));
        $mail->setSubject($_POST['subject']);
        $mail->setBodyHtml($_POST['message']);
        $mail->setFrom($_POST['email'],$_POST['subject']);
        $mail->send();
 
        
        header( 'Location: '.Doo::conf()->APP_URL.'contact/done');
    
    }

public function done(){
      $data['title'] = '- Message Sent';
        $data['resource'] = $this->resource;
        $data['action'] = $this->action;
    $this->renderc('contact/done',$data);
    }
}
?>