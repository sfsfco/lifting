<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class MainController extends FrontController{

    public function index(){
    $data['title'] = '- Main Page';
    $data['resource'] = $this->resource;
    $data['action'] = $this->action;
        $data['welcome']=Doo::db()->find('Articles',array('where'=>" id='1' ",'limit'=>1));
        $data['products']=Doo::db()->find('Products',array('where'=>" featured='1' ",'limit'=>8));
        
        
        $this->renderc('main/index',$data);
    } 

    public function error(){

      $this->renderc('main/error');  
    }

    
  public function gen_model(){
        Doo::loadCore('db/DooModelGen');
        DooModelGen::genMySQL();
    }
    
        
      

}
?>