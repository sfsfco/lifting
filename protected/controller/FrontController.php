<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class FrontController extends DooController{
	
	public $resource;
	public $action;

    public function FrontController(){
        
		
    }


    public function beforeRun($resource, $action){
    	$this->resource = $resource;
        $this->action = $action;
    }
    
}
?>