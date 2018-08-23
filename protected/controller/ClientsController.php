<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ClientsController extends FrontController{
	
    public function signin(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
    $data['services']=Doo::db()->find('Services',array('select'=>'id,name'));
        if(isset($_POST['username']) && isset($_POST['password']) ){
            $data['client']=$this->db()->find('Clients',array('where'=>" username='".$_POST['username']."' && password='".md5($_POST['password'])."' ",'limit'=>1));
            
            if(isset($data['client']->name)){
                $_SESSION['clienty']['id']=$data['client']->id;
            $_SESSION['clienty']['name']=$data['client']->name;
                header( 'Location:'.Doo::conf()->APP_URL.'clients/board' );
                //$this->renderc('clients/board',$data);
            }else{$this->renderc('clients/login',$data);}
            }else{
                header( 'Location:'.Doo::conf()->APP_URL.'clients/login' );
                }
        
        }

    public function signout(){
        unset($_SESSION['clienty']);
        $this->login();
        }
    public function login(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
    $data['services']=Doo::db()->find('Services',array('select'=>'id,name'));
    $this->renderc('clients/login',$data);
        }
     public function board(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
    $data['services']=Doo::db()->find('Services',array('select'=>'id,name'));
    
    if(isset($_SESSION['clienty']['id']) && $_SESSION['clienty']['id']!=''){
    $data['certificates']=$this->db()->find('Certificates',array('where'=>" client='".$_SESSION['clienty']['id']."' "));
    $data['quotations']=$this->db()->find('Quotations',array('where'=>" client='".$_SESSION['clienty']['id']."' "));
    $this->renderc('clients/board',$data);
    }else{header( 'Location:'.Doo::conf()->APP_URL.'clients/login' );}
        }
    public function index(){
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
		$this->renderc('contact/index',$data);
    }

 
   
    
public function send(){
      $lines = Doo::loadModel('Inspaction', true);
        $lines->name=$_POST['name'];
        $lines->email=$_POST['email'];
        $lines->subject=$_POST['subject'];
        $lines->message=$_POST['message'];
        $lines->readed='0';
       
    
        $lines->create_date=date('Y-m-d H:m:s');
        $lastinserted=$this->db()->insert($lines);
        
        $data['prefrances']=Doo::db()->find('Prefrances',array('limit'=>1));
        
        $mail = new DooMailer();
        $mail->addTo($data['prefrances']->mail);
        $mail->setSubject($_POST['subject']);
        $mail->setBodyHtml($_POST['message']);
        $mail->setFrom($_POST['email'],$_POST['name']);
        $mail->send();
 
        $data['message']='Request Sent';
        $data['message_flag']='success';
        $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
    $data['services']=Doo::db()->find('Services',array('select'=>'id,name'));
    
    if(isset($_SESSION['clienty']['id']) && $_SESSION['clienty']['id']!=''){
    $data['certificates']=$this->db()->find('Certificates',array('where'=>" client='".$_SESSION['clienty']['id']."' "));
    $this->renderc('clients/board',$data);
    }else{header( 'Location:'.Doo::conf()->APP_URL.'clients/login' );}
        
    
    }

public function done(){
      $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
     $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
     $data['services']=Doo::db()->find('Services',array('select'=>'id,name'));
     
    $this->renderc('contact/done',$data);
    }


public function printit(){
        $data['rootUrl']=Doo::conf()->APP_URL;
        $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['prefrances']=Doo::db()->find('Prefrances',array('limit'=>1));
        $data['a7a']=Doo::db()->find('Certificates',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
        
        
        $data['quotation']=Doo::db()->find('Workorders',array('where'=>" id='".$data['a7a']->workorder."'",'limit'=>1));
        $data['user']=Doo::db()->find('Users',array('select'=>'id,first_name,last_name','where'=>" id='".$data['a7a']->test_by."'",'limit'=>1));
        
        (isset($data['quotation']->create_by_name))?$data['quotation']->create_by_name=$user->first_name." ".$user->last_name:$data['quotation']->create_by_name='deleted';
        
        $client=Doo::db()->find('Clients',array('select'=>'id,name,representative','where'=>" id='".$data['quotation']->client."'",'limit'=>1));
        $data['quotation']->client_name=$client->name;
        (isset($data['quotation']->client_name))?$data['quotation']->client_name=$client->name:$data['quotation']->client_name='deleted';
        $data['quotation']->client_contact=$client->representative;
        //$data['quotationsdetails']=Doo::db()->find('WorkordersDetails',array('where'=>" workorder='".$data['quotation']->id."'"));
        $data['quotationsdetails']=Doo::db()->find('CertificatesDetails',array('where'=>" certificate='".$this->params[0]."'"));
        
        if($data['a7a']->certificat_type=='work_certificate' && $data['a7a']->certificate_form=='report of thorough examination'){
        $this->renderc('certificates/work/test',$data);    
        //$this->renderc('certificates/work/details1',$data);    
            }
            
        if($data['a7a']->certificat_type=='work_certificate' && $data['a7a']->certificate_form=='ec declaraion'){
        $this->renderc('certificates/work/details2',$data);    
            }
        
        if($data['a7a']->certificat_type=='work_certificate' && $data['a7a']->certificate_form=='test certificate'){
        $this->renderc('certificates/work/details3',$data);    
            }
            
         if($data['a7a']->certificat_type=='test_certificate' && $data['a7a']->certificate_form=='test certificate'){
        $this->renderc('certificates/test/details1',$data);    
            }
        
        if($data['a7a']->certificat_type=='test_certificate' && $data['a7a']->certificate_form=='test and mpi certificate'){
        
        $this->renderc('certificates/test/details2',$data);    
        
            }
        
        if($data['a7a']->certificat_type=='test_certificate' && $data['a7a']->certificate_form=='test and dpi certificate'){
        $this->renderc('certificates/test/details3',$data);    
            }
            
        if($data['a7a']->certificat_type=='test_certificate' && $data['a7a']->certificate_form=='visual certificate'){
        $this->renderc('certificates/test/details4',$data);    
            }
            
        if($data['a7a']->certificat_type=='test_certificate' && $data['a7a']->certificate_form=='visual and mpi certificate'){
        $this->renderc('certificates/test/details5',$data);    
            }
        
        if($data['a7a']->certificat_type=='test_certificate' && $data['a7a']->certificate_form=='visual and dpi certificate'){
        $this->renderc('certificates/test/details6',$data);    
            }
            
        if($data['a7a']->certificat_type=='test_certificate' && $data['a7a']->certificate_form=='ec declaration'){
            
        $this->renderc('certificates/test/details7',$data);    
            }
            
       if($data['a7a']->certificat_type=='test_certificate' && $data['a7a']->certificate_form=='report of thorough examination'){
        $this->renderc('certificates/test/details8',$data);    
            }
            
        if($data['a7a']->certificat_type=='test_certificate' && $data['a7a']->certificate_form=='ndt reports'){
        $this->renderc('certificates/test/details9',$data);    
            }
        
        
        
        

    }
   public function printquotation(){
        $data['rootUrl']=Doo::conf()->APP_URL;
        $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
        
        $data['quotation']=Doo::db()->find('Quotations',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
        $user=Doo::db()->find('Users',array('select'=>'id,first_name,last_name','where'=>" id='".$data['quotation']->create_by."'",'limit'=>1));
        (isset($data['user']->first_name))?$data['quotation']->create_by_name=$data['user']->first_name." ".$data['user']->last_name:$data['quotation']->create_by_name='deleted';
        //$data['quotation']->create_by_name=$user->first_name." ".$user->last_name;
        $client=Doo::db()->find('Clients',array('select'=>'id,name,representative','where'=>" id='".$data['quotation']->client."'",'limit'=>1));
        $data['quotation']->client_name=$client->name;
        $data['quotation']->client_contact=$client->representative;
        $data['quotationsdetails']=Doo::db()->find('QuotationsDetails',array('where'=>" quotation='".$data['quotation']->id."'"));
        $this->renderc('quotations/details',$data);
        
        }

public function changepass(){
       $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
     $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
     $data['services']=Doo::db()->find('Services',array('select'=>'id,name'));
     
    
    
     $old_pass=Doo::db()->find('Clients',array('select'=>'id','where'=>" id='".$_SESSION['clienty']['id']."' && password='".md5($_POST['old_password'])."' ",'limit'=>1));
     if(isset($old_pass->id)){
         
        $client = Doo::loadModel('Clients', true);
        $client->id=$old_pass->id;
        $client->password=md5($_POST['password']);
        $client->edit_date=date('Y-m-d H:m:s');
        $lastinserted=$this->db()->update($client);
        $data['message']='password updated';
        $data['message_flag']='success';
         }else{ 
        $data['message']='password not updated';
        $data['message_flag']='fail';
             
             }
            
        if(isset($_SESSION['clienty']['id']) && $_SESSION['clienty']['id']!=''){
    $data['certificates']=$this->db()->find('Certificates',array('where'=>" client='".$_SESSION['clienty']['id']."' "));
    $this->renderc('clients/board',$data);
    }else{header( 'Location:'.Doo::conf()->APP_URL.'clients/login' );}
        
    
    
    }

}
?>