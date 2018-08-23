<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ServicesController extends FrontController{

     public function services(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
            $data['service']=Doo::db()->find('Services',array('where'=>" id='".$this->params[0]."' ",'limit'=>1));
            $data['services']=Doo::db()->find('Services',array('select'=>'id,name'));
        $this->renderc('services/index',$data);            
    } 
  
  
      

}
?>