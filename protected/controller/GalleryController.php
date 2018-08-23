<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class GalleryController extends FrontController{

    public function index(){
    	$data['title'] = '- Gallery';
    	$data['resource'] = $this->resource;
    	$data['action'] = $this->action;
        $data['photos'] = Doo::db()->find('Photos');
        
		$this->renderc('gallery/index',$data);
    } 
  
      

}
?>