<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ProductsController extends FrontController{

    public function index(){
    $data['title'] = '- Products';
    $data['resource'] = $this->resource;
    $data['action'] = $this->action;
    $data['products'] = Doo::db()->find('Products');
    
	$this->renderc('products/index',$data);
    } 
  
    public function show(){
    $data['title'] = '- Products';
    $data['resource'] = $this->resource;
    $data['action'] = $this->action;
    $data['product'] = Doo::db()->find('Products',array('where'=>" id='".$this->params[0]."' ",'limit'=>1));
    
		$this->renderc('products/show',$data);
    } 
  
      

}
?>