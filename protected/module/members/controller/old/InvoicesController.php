<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class InvoicesController extends MembersController{
	
    public function index(){
  $data['title']='Invoices';
  if(isset($_GET['load'])){
          if(isset($_POST['data_ids'])){
            $ids=explode(',',$_POST['data_ids']);

            foreach ($ids as $id) {
               Doo::db()->delete('Invoices', array('where'=>"id='".$id."'", 'limit'=>1) );
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
            $where="  name like '%".$_POST['search']['value']."%'  ||  serial = '".$_POST['search']['value']."'  ||  id = '".$_POST['search']['value']."'  ";
          }else{
            $where=" id != '0' ";
          }
          if(isset($_POST['order'])){
            $ordering=array('id','name','serial','delivery_date','client','po','quotation','create_date');
            $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
          }else{
            $order=array('desc'=>'id');
          }
          
          $lists=Doo::db()->find('Invoices',array('where'=>$where,key($order)=>$order[key($order)],'limit'=>$limit));
          
            $old_workorder='';

          if(count($lists)>0){
          foreach ($lists as $list) {

          $client=Doo::db()->find('Clients',array('select'=>'name','where'=>" id='".$list->client."'",'limit'=>1));
          $list->client=(isset($client->name))?$client->name:'deleted';
           
            $info['data'][]=array(
              "<div class='ids text-center'>".$list->id."</div>",
              "<div class='text-center'>".$list->name."</div>",
              "<div class='text-center'>".$list->serial."</div>",
              "<div class='ids text-center'>".date('d-m-Y',strtotime($list->delivery_date))."</div>",
              "<div class='ids text-center'>".$list->client."</div>",
              "<div class='ids text-center'>".$list->po."</div>",
              "<div class='ids text-center'>".$list->quotation."</div>",
              "<div class='ids text-center'>".date('d-m-Y',strtotime($list->create_date))."</div>",
              "<div class='text-center'>
              <a href='".Doo::conf()->APP_URL.Doo::conf()->membermod."invoices/details/".$list->id."' ><div  class='btn btn-info'><i class='fa fa-print'></i> Details</div></a> 
              </div>"
              );
          }
        }else{
             $info['data'][]=array("","","","","","","","");

        }
          $datamodel = Doo::loadModel('Invoices', true);
          $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

          $info['length']=$datamodel->count();
          $info['recordsTotal']=$datamodel->count();

          $info['recordsFiltered']=count(Doo::db()->find('Invoices',array('where'=>$where,'select'=>'id')));

          echo(json_encode($info));
        exit;

        }   
    $this->renderc('invoices/index',$data);
    
    }
    
    public function add(){
          $data['title']='Add Invoice';
          $data['rootUrl']=Doo::conf()->APP_URL;
          $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
          //$data['delivery']=Doo::db()->find('Delivery',array('select'=>'id,delivery_date'));
          $data['workorders']=Doo::db()->find('Workorders',array('select'=>'id,delivery_date'));
          $data['bank']=Doo::db()->find('Banks',array('select'=>'id,name'));
          
          
            $this->renderc('invoices/add',$data);
        
        }
        
    public function details(){
          

          $data['rootUrl']=Doo::conf()->APP_URL;
          $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
          $data['invoices']=Doo::db()->find('Invoices',array('where'=>" id='".$this->params[0]."' ",'limit'=>1));
          $data['title']=($data['invoices']->taxed=='1')?"ORIGINAL INVOICE":"INVOICE";
          
          $data['client']=Doo::db()->find('Clients',array('select'=>'name','where'=>" id='".$data['invoices']->client."'",'limit'=>1));
          $data['quotation']=Doo::db()->find('Quotations',array('select'=>'title,id','where'=>" id='".$data['invoices']->quotation."'",'limit'=>1));
          
          $data['bank']=Doo::db()->find('Banks',array('where'=>" id='".$data['invoices']->bank."' ",'limit'=>1));
          
          $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
          
          
          $data['items']=Doo::db()->find('QuotationsDetails',array('where'=>" id IN('".implode("','",array_filter(explode(',',$data['invoices']->items)))."') "));
          
          $data['total']=0;
          foreach($data['items'] as $item){
              $data['total']=$item->total+$data['total'];
              }
          
          
            $this->renderc('invoices/details',$data);
        
        }
        
    public function insert(){
        
          $data['rootUrl']=Doo::conf()->APP_URL;
          $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
          
        //$delivery=Doo::db()->find('Delivery',array('select'=>'workorder','where'=>" id='".$_POST['delivery_note']."'",'limit'=>1));
        //$workorders=Doo::db()->find('Workorders',array('select'=>'quotation,po_no,client','where'=>" id='".$delivery->workorder."'",'limit'=>1));
        $workorders=Doo::db()->find('Workorders',array('select'=>'quotation,po_no,client','where'=>" id='".$_POST['delivery_note']."'",'limit'=>1));
        
        $nuu=0;
        $items='';
                foreach($_POST as $key=>$value){
                  $exp_key = explode('_', $key);
                  if($exp_key[0] == 'id'){
                       $arr_result[] = $value;
                  }
                }
                $items=implode(',', $arr_result);
                
                
          
        $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
        
        
        $invoices = Doo::loadModel('Invoices', true);
        $invoices->name=$_POST['name'];
        $invoices->client=$workorders->client;
        $invoices->delivery_note=$_POST['delivery_note'];
        $invoices->delivery_date=$_POST['delivery_date'];
        $invoices->po=$workorders->po_no;
        $invoices->quotation=$workorders->quotation;
        $serial=Doo::db()->find('Invoices',array('select'=>'serial','where'=>" taxed='".$_POST['taxed']."' ",'desc'=>'id','limit'=>1));    
        if(!isset($serial->serial)){
        ($_POST['taxed']=='1')?$invoices->serial=$data['prefrances']->serial+1:$invoices->serial=$data['prefrances']->none_serial+1;
            }else{
        $invoices->serial=$serial->serial+1;        
                }
        
        $invoices->taxed=$_POST['taxed'];
        
        $invoices->tax=$_POST['tax'];
        
        $invoices->items=$items;
        $invoices->bank=$_POST['bank'];
        
        $invoices->create_date=date('Y-m-d H:m:s');
        $invoices->create_by=$_SESSION['member_username']['id'];
                     
    $this->db()->insert($invoices);
        
        $_SESSION['inner_message']['success'][]='Data Inserted Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->membermod.'invoices' ); 
        }

    public function edit(){
        $data['rootUrl']=Doo::conf()->APP_URL;
        $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['clients']=Doo::db()->find('Clients',array('select'=>'id,name'));
        $data['invoice']=Doo::db()->find('Invoices',array('where'=>" id='".$this->params[0]."'",'limit'=>1));
        $client=Doo::db()->find('Clients',array('select'=>'id,name','where'=>" id='".$data['invoice']->client."'",'limit'=>1));
        $data['invoice']->client_name=$client->name;
        $data['invoicesdetails']=Doo::db()->find('InvoicesDetails',array('where'=>" invoice='".$data['invoice']->id."'"));
        $this->renderc('invoices/edit',$data);
        
        }
    

        
public function getitems(){
    
        //$delivery=Doo::db()->find('Delivery',array('select'=>'workorder','where'=>" id='".$this->params[0]."'",'limit'=>1));
        //$workorders=Doo::db()->find('Workorders',array('select'=>'quotation','where'=>" id='".$delivery->workorder."'",'limit'=>1));
        $workorders=Doo::db()->find('Workorders',array('select'=>'quotation','where'=>" id='".$this->params[0]."'",'limit'=>1));
        $data['items']=Doo::db()->find('QuotationsDetails',array('where'=>" quotation='".$workorders->quotation."'"));
   
    $data['type']=$this->params[0];
    
    $this->renderc('invoices/items',$data);  
    }

    public function delete(){
            //Doo::db()->delete('Invoices',array('where'=>" id='".$this->params[0]."'"));
            $invoices = Doo::loadModel('Invoices', true);
            $invoices->id=$this->params[0];
            $invoices->deleted='1';
            $this->db()->update($invoices);
            $this->index();
    }

   public function send(){
       
       //http://localhost/sls/clients/printit/39
            $data['rootUrl']=Doo::conf()->APP_URL;
            $data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
            $data['invoice']=Doo::db()->find('Invoices',array('where'=>" id='".$this->params[0]."'",'select'=>'id,client','limit'=>1));
            $client=Doo::db()->find('Clients',array('where'=>" id='".$data['invoice']->client."'",'select'=>'mail','limit'=>1));
            $data['email']=$client->mail;
            $data['subject']='Your Invoice Copy :';
            $data['message']='Dear Sir,'."\n".'Kindly Check Your Invoice Copy From The Link Below'."\n\n".$data['rootUrl'].'clients/printinvoice/'.$this->params[0];
            
            $this->renderc('invoices/send',$data);        
        }

        public function sending(){
            $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
           
           $to=explode(',',$_POST['to']);
           foreach($to as $toto){
               $mail = new DooMailer();
 $mail->addTo($toto);
 $mail->setSubject($_POST['subject']);
 $mail->setBodyHtml(nl2br($_POST['message']));
 $mail->setFrom('operations@sls-egypt.com',$data['prefrances']->site_name);
 $mail->send();
               }
           
    
 $this->index();
            }
}
?>