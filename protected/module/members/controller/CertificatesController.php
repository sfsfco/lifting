<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
 //DATE OF NEXT EXAMINATION
class CertificatesController extends MembersController{
	
    public function index(){
  $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['title'] = 'Certificates';
    if(isset($_GET['load'])){
          if(isset($_POST['data_ids'])){
            $ids=explode(',',$_POST['data_ids']);

            foreach ($ids as $id) {
               Doo::db()->delete('Certificates', array('where'=>"id='".$id."'", 'limit'=>1) );
               Doo::db()->delete('CertificatesDetails',array('where'=>' certificate="'.$id.'"'));
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
            $where=" (certificate_form like '%".$_POST['search']['value']."%'  ||   certificat_type like '%".$_POST['search']['value']."%'  ||  workorder = '".$_POST['search']['value']."'  ||  id = '".$_POST['search']['value']."' ) && id='".$_SESSION['member_username']['id']."' ";
          }else{
            $where=" id != '0' ";
          }
          if(isset($_POST['order'])){
            $ordering=array('id','client','workorder','test_date','certificate_form','certificat_type','create_date');
            $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
          }else{
            $order=array('desc'=>'id');
          }
          
          $lists=Doo::db()->find('Certificates',array('where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));
          
            $old_workorder='';

          if(count($lists)>0){
          foreach ($lists as $list) {

             if($list->next_examination<date('Y-m-d',strtotime("+7 days")) && $list->last_sent<date('Y-m-d',strtotime("-7 days"))){
          
            
            $mail = new DooMailer();
            $to=Doo::db()->find('Clients',array('select'=>'mail,name','where'=>" id='".$list->client."'",'limit'=>1));
            if(isset($to->mail)){
            $mail->addTo($to->mail);
            $mail->setSubject('Expiration Notification');
            $mail->setBodyHtml("<p>Dear Sir,</p><p>It's Now Less Than 1 Week For Your&nbsp;Certificate Expiration Date .</p><p>You Need To Renew Your&nbsp;Certificate&nbsp;Immediately</p>");
            $mail->setFrom(play::prefrances('mail'),play::prefrances('site_name'));
            $mail->send();
            
            }
            
            $certificates = Doo::loadModel('Certificates', true);
            $certificates->id=$list->id;
            $certificates->last_sent=date('Y-m-d H:m:s');
            $this->db()->update($certificates);
            
              
              }
          //end ak
          if($old_workorder!=$list->workorder){
              $y=1;
              $old_workorder=$list->workorder;
              $list->work_id=$list->workorder.'/'.($y);
              
            }else{$y++;$list->work_id=$list->workorder.'/'.($y);}
          $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$list->client."'",'limit'=>1));
          $list->client=(isset($client->name))?$client->name:'deleted';

          $user=Doo::db()->find('Users',array('select'=>'id,first_name,last_name','where'=>" id='".$list->test_by."'",'limit'=>1));
          
          (!isset($user->first_name))?$list->test_by=play::prefrances('site_name'):$list->test_by=$user->first_name." ".$user->last_name;
                                      
                                   
            $info['data'][]=array(
              "<div class='ids text-center'>".$list->id."</div>",
              "<div class='ids text-center'>".$list->work_id."</div>",
              substr($list->client,0,10).'...',
              "<div class='ids text-center'>".$list->workorder."</div>",
              "<div class='ids text-center'>".date('d-m-Y',strtotime($list->test_date))."</div>",
              "<div class='ids text-center'>".$list->certificate_form."</div>",
              "<div class='ids text-center'>".$list->certificat_type."</div>",
              "<div class='text-center'>
              <a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."certificates/details/".$list->id."' ><div  class='btn btn-info'><i class='fa fa-print'></i> Details</div></a> 
              </div>"
              );
          }
        }else{
             $info['data'][]=array("","","","","","","","");

        }
          $datamodel = Doo::loadModel('Certificates', true);
          $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

          $info['length']=$datamodel->count();
          $info['recordsTotal']=$datamodel->count();

          $info['recordsFiltered']=count(Doo::db()->find('Certificates',array('where'=>$where,'select'=>'id')));

          echo(json_encode($info));
        exit;

        }   
    
          
    $this->renderc('certificates/index',$data);
    
    }
    
    public function add(){
        $data['title']='Add Certificate';
        $data['workorders']=Doo::db()->find('Workorders',array('select'=>'id,title,delivery_date'));
        $data['clients']=Doo::db()->find('Clients',array('select'=>'id,name,address'));
        $data['users']=Doo::db()->find('Users',array('select'=>'id,first_name,last_name','where'=>' active="1"'));
        
        $this->renderc('certificates/add',$data);
        }
        
   

    public function edit(){
      $data['title']='Edit Certificate';
        $data['workorders']=Doo::db()->find('Workorders',array('select'=>'id,title,delivery_date'));
        $data['clients']=Doo::db()->find('Clients',array('select'=>'id,name,address'));
        $data['users']=Doo::db()->find('Users',array('select'=>'id,first_name,last_name','where'=>' active="1"'));
        $data['certificate']=Doo::db()->find('Certificates',array('where'=>' id="'.$this->params[0].'"','limit'=>1));
          
              $client=Doo::db()->find('Clients',array('select'=>'name','where'=>" id='".$data['certificate']->client."'",'limit'=>1));
              $data['certificate']->client_name=$client->name;
              $workorder=Doo::db()->find('Workorders',array('select'=>'id,title,delivery_date','where'=>" id='".$data['certificate']->workorder."'",'limit'=>1));
                $data['certificate']->workorder_title=$workorder->id.' : '.$workorder->title.' ['.date('d-m-Y',strtotime($workorder->delivery_date)).']';
          $test_by=Doo::db()->find('Users',array('select'=>'first_name,last_name','where'=>" id='".$data['certificate']->test_by."'",'limit'=>1));
                $data['certificate']->test_by_name=(isset($test_by->first_name))?$test_by->first_name.' '.$test_by->last_name:'deleted';
          
        $data['certificate_details']=Doo::db()->find('CertificatesDetails',array('where'=>' certificate="'.$this->params[0].'"'));

        
        $this->renderc('certificates/edit',$data);
        
        }
    
    public function insert_items(){
        
          
              $nuu=0;
                foreach($_POST as $key=>$value){$vv=explode('num_',$key);if(count($vv)>1){$nuu=$nuu+1;}}
                
                for($x=0;$x<100;$x++){
                    if(isset($_POST['id_'.$x])){
        $certificates = Doo::loadModel('Certificates', true);
        $certificates->workorder=$_POST['workorder'];
        $certificates->client=$_POST['client'];
        $certificates->client_address=$_POST['client_address'];
        $certificates->test_date=$_POST['test_date'];
        $certificates->test_by=$_POST['test_by'];
        
        $certificates->certificat_type=$_POST['certificat_type_'.$x];
        $certificates->certificate_form=$_POST['certificate_form_'.$x];
        
        $certificates->magnet_type=$_POST['magnet_type'];
        $certificates->next_examination=$_POST['next_examination'];
        $certificates->according_to=$_POST['according_to_'.$x];
        
        $certificates->create_date=date('Y-m-d H:m:s');
        $certificates->create_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->insert($certificates);

                     $certificatesdetails = Doo::loadModel('CertificatesDetails', true);
                     $certificatesdetails->certificate=$lastinserted;
                     $certificatesdetails->workorder=$_POST['workorder'];
                     $certificatesdetails->workorder_item=$_POST['id_'.$x];
                     $certificatesdetails->i_d=$x;
                     $certificatesdetails->quantity=$_POST['quantity_'.$x];
                     $certificatesdetails->details=$_POST['details_'.$x];
                     $certificatesdetails->swl=$_POST['swl_'.$x];
                     $certificatesdetails->pl=$_POST['pl_'.$x];
                     $certificatesdetails->idno=(isset($_POST['idno_'.$x]))?$_POST['idno_'.$x]:0;
                     
                     $certificatesdetails->original_cert_no=$_POST['original_cert_no_'.$x];
                     $certificatesdetails->original_cert_date=$_POST['original_cert_date_'.$x];
                     $certificatesdetails->name_cert=$_POST['name_cert_'.$x];
                     $certificatesdetails->last_exam=$_POST['last_exam_'.$x];
                     
                     
                     $certificatesdetails->create_date=date('Y-m-d H:m:s');
                     $certificatesdetails->create_by=$_SESSION['member_username']['id'];
                    $this->db()->insert($certificatesdetails);}
                    }
              
              
        $this->index();
        
        }
    public function insert(){
          $data['rootUrl']=Doo::conf()->APP_URL;
          $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        if(isset($_POST['split_items'])){$this->insert_items();}else{
        $certificates = Doo::loadModel('Certificates', true);
        $certificates->workorder=$_POST['workorder'];
        $certificates->client=$_POST['client'];
        $certificates->client_address=$_POST['client_address'];
        $certificates->test_date=$_POST['test_date'];
        $certificates->test_by=$_POST['test_by'];
        $certificates->certificat_type=$_POST['certificat_type_1'];
        
        $certificates->certificate_form=$_POST['certificate_form_1'];
        $certificates->magnet_type=$_POST['magnet_type'];
        
        $certificates->next_examination=$_POST['next_examination'];
        $certificates->according_to=$_POST['according_to_1'];
        
        $certificates->create_date=date('Y-m-d H:m:s');
        $certificates->create_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->insert($certificates);
        
          if(!empty($lastinserted)){
              $nuu=0;
                foreach($_POST as $key=>$value){$vv=explode('num_',$key);if(count($vv)>1){$nuu=$nuu+1;}}
                
                for($x=0;$x<100;$x++){
                    if(isset($_POST['id_'.$x])){
                     $certificatesdetails = Doo::loadModel('CertificatesDetails', true);
                     $certificatesdetails->certificate=$lastinserted;
                     $certificatesdetails->workorder=$_POST['workorder'];
                     $certificatesdetails->workorder_item=$_POST['id_'.$x];
                     $certificatesdetails->i_d=$x;
                     $certificatesdetails->quantity=$_POST['quantity_'.$x];
                     $certificatesdetails->details=$_POST['details_'.$x];
                     $certificatesdetails->swl=$_POST['swl_'.$x];
                     $certificatesdetails->pl=$_POST['pl_'.$x];
                     $certificatesdetails->idno=$_POST['idno_'.$x];
                     $certificatesdetails->original_cert_no=$_POST['original_cert_no_'.$x];
                     $certificatesdetails->original_cert_date=$_POST['original_cert_date_'.$x];
                     $certificatesdetails->name_cert=$_POST['name_cert_'.$x];
                     $certificatesdetails->last_exam=$_POST['last_exam_'.$x];
                     
                     $certificatesdetails->create_date=date('Y-m-d H:m:s');
                     $certificatesdetails->create_by=$_SESSION['member_username']['id'];
                    $this->db()->insert($certificatesdetails);}
                    }
              
              }
        
        $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'certificates' ); 
        }
        }
     public function update(){
         
        $certificates = Doo::loadModel('Certificates', true);
        
        $certificates->id=$this->params[0];
        $certificates->workorder=$_POST['workorder'];
        $certificates->certificat_no=$this->params[0];
        $certificates->client=$_POST['client'];
        $certificates->client_address=$_POST['client_address'];
        $certificates->test_date=$_POST['test_date'];
        $certificates->test_by=$_POST['test_by'];
        $certificates->certificat_type=$_POST['certificat_type'];
        $certificates->certificate_form=$_POST['certificate_form'];
        $certificates->magnet_type=$_POST['magnet_type'];
        $certificates->next_examination=$_POST['next_examination'];
        $certificates->according_to=$_POST['according_to'];

        $certificates->edit_date=date('Y-m-d H:m:s');
        $certificates->edit_by=$_SESSION['member_username']['id'];
        $lastinserted=$this->db()->update($certificates);
        
          if(!empty($lastinserted)){
              Doo::db()->delete('CertificatesDetails',array('where'=>" certificate='".$this->params[0]."'"));
              $nuu=0;
                foreach($_POST as $key=>$value){$vv=explode('num_',$key);if(count($vv)>1){$nuu=$nuu+1;}}
              
                for($x=0;$x<100;$x++){
              
                    if(isset($_POST['id_'.$x])){
                      
                     $certificatesdetails = Doo::loadModel('CertificatesDetails', true);
                     $certificatesdetails->certificate=$this->params[0];
                     $certificatesdetails->workorder=$_POST['workorder'];
                     $certificatesdetails->workorder_item=$_POST['id_'.$x];
                     $certificatesdetails->i_d=$x;
                     $certificatesdetails->quantity=$_POST['quantity_'.$x];
                     $certificatesdetails->details=$_POST['details_'.$x];
                     $certificatesdetails->swl=$_POST['swl_'.$x];
                     $certificatesdetails->pl=$_POST['pl_'.$x];
                     $certificatesdetails->idno=$_POST['idno_'.$x];
                     
                     $certificatesdetails->original_cert_no=$_POST['original_cert_no_'.$x];
                     echo $_POST['original_cert_date_'.$x];
                     $certificatesdetails->original_cert_date=$_POST['original_cert_date_'.$x];
                     $certificatesdetails->name_cert=$_POST['name_cert_'.$x];
                     $certificatesdetails->last_exam=$_POST['last_exam_'.$x];
                     
                     $certificatesdetails->edit_date=date('Y-m-d H:m:s');
                     $certificatesdetails->edit_by=$_SESSION['member_username']['id'];
                    $this->db()->insert($certificatesdetails);}
                    }
              
              }
        $_SESSION['inner_message']['success'][]='Data updated Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'certificates' ); 
        }

   public function details(){
        $data['rootUrl']=Doo::conf()->APP_URL;
        $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['prefrances']=Doo::db()->find('Prefrances',array('limit'=>1));
        $data['cert']=Doo::db()->find('Certificates',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
        
        
        $data['quotation']=Doo::db()->find('Workorders',array('where'=>" id='".$data['cert']->workorder."'",'limit'=>1));
        $data['user']=Doo::db()->find('Users',array('select'=>'id,first_name,last_name','where'=>" id='".$data['cert']->test_by."'",'limit'=>1));
        
        
        (isset($data['user']->first_name))?$data['quotation']->create_by_name=$data['user']->first_name." ".$data['user']->last_name:$data['quotation']->create_by_name='deleted';
        
        $client=Doo::db()->find('Clients',array('select'=>'id,name,representative','where'=>" id='".$data['quotation']->client."'",'limit'=>1));
        $data['quotation']->client_name=$client->name;
        (isset($data['quotation']->client_name))?$data['quotation']->client_name=$client->name:$data['quotation']->client_name='deleted';
        $data['quotation']->client_contact=$client->representative;
        //$data['quotationsdetails']=Doo::db()->find('WorkordersDetails',array('where'=>" workorder='".$data['quotation']->id."'"));
        $data['quotationsdetails']=Doo::db()->find('CertificatesDetails',array('where'=>" certificate='".$this->params[0]."'"));
        
        //echo $data['cert']->certificat_type.'-'.$data['cert']->certificate_form;
        $data['title'] = $data['cert']->certificat_type;
        $this->renderc('certificates/details',$data);

        /*
        if($data['cert']->certificat_type=='work_certificate' && $data['cert']->certificate_form=='report of thorough examination'){
        $this->renderc('certificates/work/test',$data);    
        //$this->renderc('certificates/work/details1',$data);    
            }
            
        if($data['cert']->certificat_type=='work_certificate' && $data['cert']->certificate_form=='ec declaraion'){
        $this->renderc('certificates/work/details2',$data);    
            }
        
        if($data['cert']->certificat_type=='work_certificate' && $data['cert']->certificate_form=='test certificate'){
        $this->renderc('certificates/work/details3',$data);    
            }
            
         if($data['cert']->certificat_type=='test_certificate' && $data['cert']->certificate_form=='test certificate'){
        $this->renderc('certificates/test/details1',$data);    
            }
        
        if($data['cert']->certificat_type=='test_certificate' && $data['cert']->certificate_form=='test and mpi certificate'){
        $this->renderc('certificates/test/details2',$data);    
        
            }
        
        if($data['cert']->certificat_type=='test_certificate' && $data['cert']->certificate_form=='test and dpi certificate'){
        $this->renderc('certificates/test/details3',$data);    
            }
            
        if($data['cert']->certificat_type=='test_certificate' && $data['cert']->certificate_form=='visual certificate'){
        $this->renderc('certificates/test/details4',$data);    
            }
            
        if($data['cert']->certificat_type=='test_certificate' && $data['cert']->certificate_form=='visual and mpi certificate'){
        $this->renderc('certificates/test/details5',$data);    
            }
        
        if($data['cert']->certificat_type=='test_certificate' && $data['cert']->certificate_form=='visual and dpi certificate'){
        $this->renderc('certificates/test/details6',$data);    
            }
            
        if($data['cert']->certificat_type=='test_certificate' && $data['cert']->certificate_form=='ec declaration'){
            
        $this->renderc('certificates/test/details7',$data);    
            }
            
       if($data['cert']->certificat_type=='test_certificate' && $data['cert']->certificate_form=='report of thorough examination'){
        $this->renderc('certificates/test/details8',$data);    
            }
            
        if($data['cert']->certificat_type=='test_certificate' && $data['cert']->certificate_form=='ndt reports'){
        $this->renderc('certificates/test/details9',$data);    
            }
        */
        
        
        }
        


    public function getitems(){ 
    $data['items']=Doo::db()->find('WorkordersDetails',array('where'=>" workorder='".$this->params[0]."'"));
    $data['type']=$this->params[1];
    
    $this->renderc('certificates/items',$data);    
   

    }
    
    public function delete(){
                Doo::db()->delete('Certificates',array('where'=>" id='".$this->params[0]."'"));
                Doo::db()->delete('CertificatesDetails',array('where'=>" certificate='".$this->params[0]."'"));
                $this->index();
            }
   public function getaddress(){
                $client=Doo::db()->find('Clients',array('where'=>" id='".$this->params[0]."'",'select'=>'address','limit'=>1));
                echo $client->address;
               
        }
        
   public function send(){
       
       //http://localhost/sls/clients/printit/39
            $data['title']='Send Certificate';
            $data['rootUrl']=Doo::conf()->APP_URL;
            $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
            $data['certificate']=Doo::db()->find('Certificates',array('where'=>" id='".$this->params[0]."'",'select'=>'id,client','limit'=>1));
            $client=Doo::db()->find('Clients',array('where'=>" id='".$data['certificate']->client."'",'select'=>'mail','limit'=>1));
            $data['email']=$client->mail;
            $data['subject']='Your Certificate Copy :';
            $data['message']='<div style="text-align: center;"><img src="'.Doo::conf()->APP_URL.'global/uploads/prefrances/'.play::prefrances('logo').'"/></div><strong>Dear Sir</strong>,'."\n".'<br>Kindly Check Your Certificate Copy From The Link Below <br><div style="text-align: center;width: 50%;margin: 6px auto;background: #797a7b;font-weight: bold;"><a href="'.Doo::conf()->APP_URL.'clients/printit'.$this->params[0].'" style="color:#FFF;  " />LINK</a></div><hr style="display: block;height: 1px;border: 0;border-top: 1px solid #ccc;margin: 1em 0;padding: 0;" />'.nl2br(play::prefrances('contacts'))." ";
            
           // $data['message']='Dear Sir,'."\n".'Kindly Check Your Certificate Copy From The Link Below'."\n\n".$data['rootUrl'].'clients/printit/'.$this->params[0];
            
            $this->renderc('certificates/send',$data);        
        }

        public function sending(){
            $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
     $to=explode(',',$_POST['to']);
           foreach($to as $toto){
               $mail = new DooMailer();
 $mail->addTo($toto);
 $mail->setSubject($_POST['subject']);
 $mail->setBodyHtml(nl2br($_POST['message']));
 
 $mail->setFrom(play::prefrances('mail'),play::prefrances('site_name'));

 $mail->send();
               }
 $_SESSION['inner_message']['success'][]='Data sent Successfully';
 header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'certificates' );  
            }

}
?>