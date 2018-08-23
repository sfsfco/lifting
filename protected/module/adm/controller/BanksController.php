<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class BanksController extends CoreController{
	

    public function index(){
	
        $data['title']="Banks";
    if(isset($_GET['load'])){
      if(isset($_POST['data_ids'])){
        $ids=explode(',',$_POST['data_ids']);
        foreach ($ids as $id) {
           Doo::db()->delete('Banks', array('where'=>"id='".$id."'", 'limit'=>1) );
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
        $where=" name like '%".$_POST['search']['value']."%'  ||  id = '".$_POST['search']['value']."'  ";
      }else{
        $where=" id != '0' ";
      }
      if(isset($_POST['order'])){
        $ordering=array('id','name','create_date');
        $order=array($_POST['order']['0']['dir']=>$ordering[$_POST['order']['0']['column']]);
      }else{
        $order=array('desc'=>'id');
      }
      
      $lists=Doo::db()->find('Banks',array('where'=>$where,'select'=>'id,name,create_date',key($order)=>$order[key($order)],'limit'=>$limit));
      if(count($lists)>0){
      foreach ($lists as $list) {
        $info['data'][]=array(
          "<div class='ids text-center'>".$list->id."</div>",
          $list->name,
          "<div class='text-center'>".date('Y/m/d',strtotime($list->create_date))."</div>",
          "<div class='text-center'><a href='".Doo::conf()->APP_URL.Doo::conf()->adminmod."banks/edit/".$list->id."' ><div  class='btn btn-warning'><i class='fa fa-cog'></i> Edit</div></a></div>"
          );
      }
    }else{
         $info['data'][]=array("","","","");

    }
      $datamodel = Doo::loadModel('Banks', true);
      $info['draw']=(isset($_POST["draw"]))?$_POST['draw']:$datamodel->count();

      $info['length']=$datamodel->count();
      $info['recordsTotal']=$datamodel->count();

      $info['recordsFiltered']=count(Doo::db()->find('Banks',array('where'=>$where,'select'=>'id')));

      echo(json_encode($info));
    exit;

    }   
        
  
		$this->renderc('banks/index',$data);
    }

    public function add(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
      $data['title']="Add Bank";
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
		$this->renderc('banks/add',$data);
    }

	    public function insert(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      $banks = Doo::loadModel('Banks', true);
      $uu=Doo::db()->find('Banks', array('select'=>'name','where'=>"name='".$_POST['name']."'", 'limit'=>1) );
      if(!empty($uu)){
           $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'banks/add/');
        }else{
        $banks->name=$_POST['name'];
        $banks->number=$_POST['number'];
        $banks->account_name=$_POST['account_name'];
        $banks->branch=$_POST['branch'];
        $banks->swift_code=$_POST['swift_code'];
       
        $banks->create_date=date('Y-m-d H:m:s');
        $banks->create_by=$_SESSION['username']['id'];
        $lastinserted=$this->db()->insert($banks);
        
        if(!empty($lastinserted)){

            $_SESSION['inner_message']['success'][]='Data Added Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'banks' );           

		$this->renderc('banks/index',$data);
        
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    }

   public function delete(){
        $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $res =Doo::db()->delete('Banks', array('where'=>"id='".$this->params[0]."'", 'limit'=>1) );

   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Banks',array('select'=>'id')))/$paging);
                if(!isset($_GET['page'])){
                    $data['bankslist']=Doo::db()->find('Banks',array('limit'=>'0,'.$paging));
                    $data['selectedpage']='1';
                }else{
                    $data['bankslist']=Doo::db()->find('Banks',array('limit'=>($_GET['page']-1)*$paging.','.$paging));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager

		$this->renderc('banks/index',$data);
            
        
		//$this->renderc('users/add',$data);
    }
    
  public function edit(){
    $data['title']='Edit Bank';
	
    $data['bank']=Doo::db()->find('Banks',array('where'=>"banks.id='".$this->params[0]."'", 'limit'=>1));
    
        
		$this->renderc('banks/edit',$data);
    }
    
    public function update(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
      
      $uu=Doo::db()->find('Banks', array('select'=>'name',
        'where'=>"name='".$_POST['name']."' && id !='".$this->params[0]."'" , 'limit'=>1) );   
      if(!empty($uu)){
            $_SESSION['inner_message']['error'][]='Name Already Exist.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'banks/edit/'.$this->params[0]);
          echo('0');
        }else{
        $banks = Doo::loadModel('Banks', true);
        
        $banks->id=$this->params[0];
        
      $banks->name=$_POST['name'];
      $banks->number=$_POST['number'];
      $banks->account_name=$_POST['account_name'];
        $banks->branch=$_POST['branch'];
        $banks->swift_code=$_POST['swift_code'];
       
        $banks->edit_date=date('Y-m-d H:m:s');
        $banks->edit_by=$_SESSION['username']['id'];
        
       $lastinserted=$this->db()->update($banks);
       
        if(!empty($lastinserted)){
           
        
            $_SESSION['inner_message']['success'][]='Data Updated Successfully';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'banks' );           

		$this->renderc('banks/index',$data);
        
           
            }
          }
      
      
        
		//$this->renderc('users/add',$data);
    } 
}
?>