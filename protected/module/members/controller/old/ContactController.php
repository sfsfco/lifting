<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ContactController extends MembersController{
	

    public function index(){

    $data['title']="Messages";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           
           Doo::db()->delete('Contact', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where=" `name` like '%".$_POST['search']['value']."%'  || `email` like '%".$_POST['search']['value']."%'  || `subject` like '%".$_POST['search']['value']."%'  ||  `id` = '".$_POST['search']['value']."'  ";
      }else{
        $where=" `id`!= '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('id','name','email','subject','readed','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      $lists = Doo::db()->find('Contact',array('select'=>'id,name,email,subject,readed,create_date','where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));
      
      if(count($lists)>0){
      foreach ($lists as $list) {
        $readed=($list->readed=='0')?"<i class='fa fa-envelope' aria-hidden='true'></i>":"<i class='fa fa-envelope-open' aria-hidden='true'></i>";
        $myclass=($list->readed=='0')?"bold":"";
        $info['data'][]=array(
          "<div class='ids text-center ".$myclass."'>".$list->id."</div>",
          "<div class='ids text-center ".$myclass."'>".$list->name."</div>",
          "<div class='ids text-center ".$myclass."'>".$list->email."</div>",
          "<div class='ids text-center ".$myclass."'>".$list->subject."</div>",
          "<div class='ids text-center ".$myclass."'>".$readed."</div>",
          "<div class='text-center ".$myclass."'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center ".$myclass."'><a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."contact/read/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-folder-open-o'></i> Read</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array(
          "<div class='ids text-center'></div>",
          "",
          "<div class='ids text-center'></div>",
          "<div class='text-center'></div>",
          "<div class='text-center'></div>",
          "<div class='text-center'></div>",
          "<div class='text-center'></div>"
          );

    }
      $datamodel = Doo::loadModel('Contact', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Contact',array('select'=>'id','where'=>$where)));

      echo(json_encode($info));
    exit;

    }       
        
		$this->renderc('contact/index',$data);
    }
    
    public function read(){
    $data['title']='Read Message';
    $data['contact']=Doo::db()->find('Contact',array('where'=>" id='".$this->params[0]."'",'limit'=>1));    
    $contact=Doo::loadModel('Contact', true);
    $contact->id=$this->params[0];
    $contact->readed='1';
    $this->db()->update($contact);
    
    $this->renderc('contact/read',$data);
        }
    
        public function add(){
            $data['rootUrl']=Doo::conf()->APP_URL;
            $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
            if(isset($this->params[0])){$data['email']=$this->params[0]; }else{$data['email']='';}
            if(isset($this->params[1])){$data['subject']='Replay : '.$this->params[1]; }else{$data['subject']='';}
            
            $this->renderc('contact/add',$data);        
            }
        public function send(){
            $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
           $mail = new DooMailer();
        $mail->addTo($_POST['to']);

 $mail->setSubject($_POST['subject']);
 
 $mail->setBodyHtml($_POST['message']);
 $mail->setFrom($data['prefrances']->mail,$data['prefrances']->site_name);
 $mail->send();

 $_SESSION['inner_message']['success'][]='Message Sent Successfully';
        header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'contact' );
 
            }

}
?>