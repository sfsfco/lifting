<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ArticlesController extends FrontController{

    public function index(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
        $data['prefrances']=$this->db()->find('Prefrances',array('limit'=>1));
        $data['services']=Doo::db()->find('Services',array('select'=>'id,name'));
        if(!isset($this->params[0])){
            $data['article']=Doo::db()->find('Articles',array('where'=>" id='4' ",'limit'=>1));
            }else{
            $data['article']=Doo::db()->find('Articles',array('where'=>" id='".$this->params[0]."' ",'limit'=>1));    
                }
                
            if(!isset($data['article']->name)){
        $this->renderc('articles/error',$data);        
                }else{
        $this->renderc('articles/index',$data);            
                    }

		
    } 
    public function about_us(){
        $data['article'] = Doo::db()->find('Articles',array('where'=>" id='4' ",'limit'=>1));
        $data['title'] = '- '.$data['article']->name;
        $data['resource'] = $this->resource;
        $data['action'] = $this->action;
        $this->renderc('articles/index',$data);
    }
   
     public function ourservices(){
        $data['article'] = Doo::db()->find('Articles',array('where'=>" id='11' ",'limit'=>1));
        $data['title'] = '- '.$data['article']->name;
        $data['resource'] = $this->resource;
        $data['action'] = $this->action;
        $this->renderc('articles/index',$data);  
    } 
    public function terms(){
        $data['article'] = Doo::db()->find('Articles',array('where'=>" id='15' ",'limit'=>1));
        $data['title'] = '- '.$data['article']->name;
        $data['resource'] = $this->resource;
        $data['action'] = $this->action;
        $this->renderc('articles/index',$data);  
    } 
    public function privacy(){
        $data['article'] = Doo::db()->find('Articles',array('where'=>" id='16' ",'limit'=>1));
        $data['title'] = '- '.$data['article']->name;
        $data['resource'] = $this->resource;
        $data['action'] = $this->action;
        $this->renderc('articles/index',$data);  
    } 
    public function sitemap(){
        $data['article'] = Doo::db()->find('Articles',array('where'=>" id='17' ",'limit'=>1));
        $data['title'] = '- '.$data['article']->name;
        $data['resource'] = $this->resource;
        $data['action'] = $this->action;
        $this->renderc('articles/index',$data);  
    } 
  
      

}
?>