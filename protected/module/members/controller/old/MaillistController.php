<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class MaillistController extends MembersController{
	

    public function index(){
$data['title']="Messages";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           
           Doo::db()->delete('Maillist', array('where'=>"id='".$id."'", 'limit'=>1) );
        }
      }
      if(isset($_POST['length'])){
        if($_POST["length"] != -1)
        {
            $limit= $_POST['start'].",".$_POST['length'];

        }
      }else{
            $limit= "0,10";
      }
      if(isset($_POST['search']['value'])){
        $where=" `name` like '%".$_POST['search']['value']."%'  || `email` like '%".$_POST['search']['value']."%'  ||  `id` = '".$_POST['search']['value']."'  ";
      }else{
        $where=" `id`!= '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('id','name','email','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      $lists = Doo::db()->find('Maillist',array('select'=>'id,name,email,create_date','where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));
      
      if(count($lists)>0){
      foreach ($lists as $list) {
        $info['data'][]=array(
          "<div class='ids text-center ".$myclass."'>".$list->id."</div>",
          "<div class='ids text-center ".$myclass."'>".$list->name."</div>",
          "<div class='ids text-center ".$myclass."'>".$list->email."</div>",
          "<div class='text-center ".$myclass."'>".date('Y/m/d',strtotime($list->create_date))."</div>"
          );
      }
    }else{
         $info['data'][]=array(
          "<div class='ids text-center'></div>",
          "<div class='text-center'></div>",
          "<div class='text-center'></div>",
          "<div class='text-center'></div>"
          );

    }
      $datamodel = Doo::loadModel('Maillist', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Maillist',array('select'=>'id','where'=>$where)));

      echo(json_encode($info));
    exit;

    }
        
		$this->renderc('maillist/index',$data);
    }
    
    public function read(){
        $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['contact']=Doo::db()->find('Maillist',array('where'=>" id='".$this->params[0]."'",'limit'=>1));    
    $contact=Doo::loadModel('Maillist', true);
    $contact->id=$this->params[0];
    $contact->readed='1';
    $this->db()->update($contact);
    
    $this->renderc('contact/read',$data);
        }
    
        public function add(){
            if(isset($this->params[0])){$data['email']=$this->params[0]; }else{$data['email']='';}
            if(isset($this->params[1])){$data['subject']='Replay : '.$this->params[1]; }else{$data['subject']='';}
            $data['title']='Add To Maillist';
            $data['mails']=Doo::db()->find('Maillist',array('select'=>'id,name,email'));

            $this->renderc('maillist/add',$data);        
            }
        public function insert(){
            
           $mail = new DooMailer();
           $site_mail=play::prefrances('mail');
           $site_name=play::prefrances('site_name');
           $mail->setFrom($site_mail,$site_name);
 if($_POST['to']=='all'){
     $mails=Doo::db()->find('Maillist',array('select'=>'id,name,email'));
        foreach($mails as $mail){
            $mail->addTo($mail->email,$mail->name);         
            $mail->setSubject($_POST['subject']);             
             $mail->setBodyHtml($_POST['message']);
             $mail->setFrom($site_mail,$site_name);
             $mail->send();
             
            }
     }else{
         $mails=Doo::db()->find('Maillist',array('select'=>'id,name,email','where'=>" id='".$_POST['to']."'",'limit'=>1));
         $mail->addTo($mails->email,$mails->name);    
         $mail->setSubject($_POST['subject']);         
         $mail->setBodyHtml($_POST['message']);
         $mail->setFrom($site_mail,$site_name);
         $mail->send();
         }

 
        $_SESSION['inner_message']['success'][]='Message Sent Successfully';
        header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'maillist' );
 
 
            }

 public function delete(){
      $res =Doo::db()->delete('Maillist', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );
        $this->index();
     }

}
?>