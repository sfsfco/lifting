<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class QuotationsController extends CoreController{
	
    public function index(){
       $data['title']="Quotations";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Quotations', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where=" title like '%".$_POST['search']['value']."%'  ||  id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('id','title','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      
      $lists=Doo::db()->find('Quotations',array('where'=>$where,'select'=>'id,title,request_no,client,create_date',key($order)=>$order[key($order)],'limit'=>$limit));

      if(count($lists)>0){
      foreach ($lists as $list) {
            $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$list->client."'",'limit'=>1));
            $workorder=Doo::db()->find('Workorders',array('select'=>'id','where'=>" quotation='".$list->id."'",'limit'=>1));
          if(isset($workorder->id)){
            $has_workorder="<div  class='btn btn-success'> Converted</div>";
          }else{
            $has_workorder="<a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."quotations/convert/".$list->id."' ><div  class='btn btn-danger'><i class='fa fa-share-square'></i> Convert</div></a>";
        }
          if(isset($client->name)){
          $list->client_name=$client->name;}else{$list->client_name='Deleted';}

        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->title,
          "<div class='ids text-center'>".$list->client_name."</div>",
          "<div class='ids text-center'>".$list->request_no."</div>",
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'>
          <a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."quotations/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a> 
          <a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."quotations/send/".$list->id."' ><div  class='btn btn-success'><i class='fa fa-send'></i> Send</div></a> 
          <a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."quotations/details/".$list->id."' ><div  class='btn btn-info'><i class='fa fa-print'></i> Details</div></a> 
          ".$has_workorder." 

          </div>"
          );
      }
    }else{
         $info['data'][]=array("","","","","","");

    }
      $datamodel = Doo::loadModel('Quotations', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Quotations',array('where'=>$where,'select'=>'id')));

      echo(json_encode($info));
    exit;

    }   
        


            /*
      for($x=0;$x<count($data['quotationslist']);$x++){
          $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$data['quotationslist'][$x]->client."'",'limit'=>1));
          $workorder=Doo::db()->find('Workorders',array('select'=>'id','where'=>" quotation='".$data['quotationslist'][$x]->id."'",'limit'=>1));
          if(isset($workorder->id)){$data['quotationslist'][$x]->has_workorder='1';}else{$data['quotationslist'][$x]->has_workorder='0';}
          if(isset($client->name)){
          $data['quotationslist'][$x]->client_name=$client->name;}else{$data['quotationslist'][$x]->client_name='Deleted';}
          }*/
          
          
    $this->renderc('quotations/index',$data);
    
    }
    
    public function add(){
          $data['title']='Add Quotation';
          $data['clients']=Doo::db()->find('Clients',array('select'=>'id,name'));
          
            $this->renderc('quotations/add',$data);
        
        }
        
    public function insert(){
         
        $quotations = Doo::loadModel('Quotations', true);
        $quotations->title=$_POST['title'];
        $quotations->client=$_POST['client'];
        $quotations->request_no=$_POST['request_no'];
        $quotations->quotation_date=$_POST['quotation_date'];
        $quotations->net_value=$_POST['net_value'];
        $quotations->tax=$_POST['tax'];
        $quotations->total_value=$_POST['total_value'];
        $quotations->delivery_date=$_POST['delivery_date'];
        
        $quotations->create_date=date('Y-m-d H:m:s');
        $quotations->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($quotations);
          if(!empty($lastinserted)){
              $nuu=0;
                foreach($_POST as $key=>$value){$vv=explode('num_',$key);if(count($vv)>1){$nuu=$nuu+1;}}
                for($x=0;$x<$nuu;$x++){
                     $quotationsdetails = Doo::loadModel('QuotationsDetails', true);
                     $quotationsdetails->quotation=$lastinserted;
                     $quotationsdetails->quantity=$_POST['quantity_'.$x];
                     $quotationsdetails->details=$_POST['details_'.$x];
                     $quotationsdetails->swl=$_POST['swl_'.$x];
                     $quotationsdetails->unit_cost=$_POST['unit_cost_'.$x];
                     $quotationsdetails->total=$_POST['total_'.$x];
                     $quotationsdetails->currency=$_POST['currency_'.$x];
                     $quotationsdetails->create_date=date('Y-m-d H:m:s');
                     $quotationsdetails->create_by=$_SESSION['username']['id'];
                    $this->db()->insert($quotationsdetails);
                    }
              
              }
             $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'quotations' );  
        }

    public function edit(){
        $data['title']='Edit Quotation';
        $data['clients']=Doo::db()->find('Clients',array('select'=>'id,name'));
        $data['quotation']=Doo::db()->find('Quotations',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
        $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$data['quotation']->client."'",'limit'=>1));
        $data['quotation']->client_name=$client->name;
        $data['quotationsdetails']=Doo::db()->find('QuotationsDetails',array('where'=>" quotation='".$data['quotation']->id."'"));
        $this->renderc('quotations/edit',$data);
        
        }
    
     public function update(){
        $quotations = Doo::loadModel('Quotations', true);
        $quotations->id=$this->params[0];
        $quotations->title=$_POST['title'];
        $quotations->client=$_POST['client'];
        $quotations->request_no=$_POST['request_no'];
        $quotations->quotation_date=$_POST['quotation_date'];
        $quotations->net_value=$_POST['net_value'];
        $quotations->tax=$_POST['tax'];
        $quotations->total_value=$_POST['total_value'];
        $quotations->delivery_date=$_POST['delivery_date'];
        
        $quotations->edit_date=date('Y-m-d H:m:s');
        $quotations->edit_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->update($quotations);
        
          if(!empty($lastinserted)){
              Doo::db()->delete('QuotationsDetails',array('where'=>" quotation='".$this->params[0]."'"));
              $nuu=0;
                foreach($_POST as $key=>$value){$vv=explode('num_',$key);if(count($vv)>1){$nuu=$nuu+1;}}
                for($x=0;$x<$nuu;$x++){
                     $quotationsdetails = Doo::loadModel('QuotationsDetails', true);
                     $quotationsdetails->quotation=$this->params[0];
                     $quotationsdetails->quantity=$_POST['quantity_'.$x];
                     $quotationsdetails->details=$_POST['details_'.$x];
                     $quotationsdetails->swl=$_POST['swl_'.$x];
                     $quotationsdetails->unit_cost=$_POST['unit_cost_'.$x];
                     $quotationsdetails->total=$_POST['total_'.$x];
                     $quotationsdetails->currency=$_POST['currency_'.$x];
                     $quotationsdetails->create_date=date('Y-m-d H:m:s');
                     $quotationsdetails->create_by=$_SESSION['username']['id'];
                    $this->db()->insert($quotationsdetails);
                    }
              
              }
        $this->index();
        }

   public function details(){
        $data['title']='Quotation Details';
        $data['rootUrl']=Doo::conf()->APP_URL;
        $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['quotation']=Doo::db()->find('Quotations',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
        $user=Doo::db()->find('Users',array('select'=>'id,first_name,last_name','where'=>" id='".$data['quotation']->create_by."'",'limit'=>1));
        
        $data['quotation']->create_by_name=(isset($user->first_name))?$user->first_name." ".$user->last_name:'';
        $client=Doo::db()->find('Clients',array('select'=>'id,name,representative','where'=>" id='".$data['quotation']->client."'",'limit'=>1));
        $data['quotation']->client_name=$client->name;
        $data['quotation']->client_contact=$client->representative;
        $data['quotationsdetails']=Doo::db()->find('QuotationsDetails',array('where'=>" quotation='".$data['quotation']->id."'"));
        $this->renderc('quotations/details',$data);
        
        }
        
public function convert(){
  $data['title']='Convert Quotation';
    $data['quotation']=Doo::db()->find('Quotations',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
    
    
    $client=Doo::db()->find('Clients',array('select'=>'id,name,address','where'=>" id='".$data['quotation']->client."'",'limit'=>1));
          $data['address']=$client->address;
            $this->renderc('quotations/convert',$data);
    }
 public function convertnow(){
      $data['quotation']=Doo::db()->find('Quotations',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
     $data['quotationsdetails']=Doo::db()->find('QuotationsDetails',array('where'=>" quotation='".$data['quotation']->id."'"));
     $workorder = Doo::loadModel('Workorders', true);
         $workorder->title=$data['quotation']->title;
        $workorder->client=$data['quotation']->client;
        $workorder->request_no=$data['quotation']->request_no;
        $workorder->quotation_date=$data['quotation']->quotation_date;
        $workorder->net_value=$data['quotation']->net_value;
        $workorder->tax=$data['quotation']->tax;
        $workorder->total_value=$data['quotation']->total_value;
        $workorder->po_no=$_POST['po_no'];
        $workorder->quotation=$this->params[0];
        $workorder->delivery_date=$_POST['delivery_date'];
        $workorder->delivery_address=$_POST['delivery_address'];
        
        $workorder->create_date=date('Y-m-d H:m:s');
        $workorder->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($workorder);
         if(!empty($lastinserted)){
             for($x=0;$x<count($data['quotationsdetails']);$x++){
              $workordersdetails = Doo::loadModel('WorkordersDetails', true);
                     $workordersdetails->workorder=$lastinserted;
                     $workordersdetails->quantity=$data['quotationsdetails'][$x]->quantity;
                     $workordersdetails->details=$data['quotationsdetails'][$x]->details;
                     $workordersdetails->swl=$data['quotationsdetails'][$x]->swl;
                     $workordersdetails->unit_cost=$data['quotationsdetails'][$x]->unit_cost;
                     $workordersdetails->total=$data['quotationsdetails'][$x]->total;
                     $workordersdetails->currency=$data['quotationsdetails'][$x]->currency;
                     $workordersdetails->create_date=date('Y-m-d H:m:s');
                     $workordersdetails->create_by=$_SESSION['username']['id'];
                    $this->db()->insert($workordersdetails);
                }
             }
            $_SESSION['inner_message']['success'][]='Quotation Converted Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'quotations' );  
     }
    public function delete(){
            Doo::db()->delete('Quotations',array('where'=>" id='".$this->params[0]."'"));
            Doo::db()->delete('QuotationsDetails',array('where'=>" quotation='".$this->params[0]."'"));
            $this->index();
    }

   public function send(){
            $data['title']='Send Quotation';
            $data['quotation']=Doo::db()->find('Quotations',array('where'=>" id='".$this->params[0]."'",'select'=>'id,client','limit'=>1));
            $client=Doo::db()->find('Clients',array('where'=>" id='".$data['quotation']->client."'",'select'=>'mail,name','limit'=>1));
            $data['client_name']=$client->name;
            $data['email']=$client->mail;
            $data['subject']='Your Quotation Copy ';
            $data['message']='<div style="text-align: center;"><img src="'.Doo::conf()->APP_URL.'global/uploads/prefrances/'.play::prefrances('logo').'"/></div><strong>Dear Sir</strong>,'."\n".'<br>Kindly Check Your Quotation Copy From The Link Below <br><div style="text-align: center;width: 50%;margin: 6px auto;background: #797a7b;font-weight: bold;"><a href="'.Doo::conf()->APP_URL.'clients/printquotation/'.$this->params[0].'" style="color:#FFF;  " />LINK</a></div><hr style="display: block;height: 1px;border: 0;border-top: 1px solid #ccc;margin: 1em 0;padding: 0;" />'.nl2br(play::prefrances('contacts'))." ";
            
            $this->renderc('quotations/send',$data);        
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
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'quotations' );  
            }
}
?>