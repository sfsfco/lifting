<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class ReturnedController extends MembersController{
	
    public function index(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Payments',array('select'=>'id','where'=>"payment_type='returned' ")))/$paging);
                if(!isset($_GET['page'])){
                    $data['paymentslist']=Doo::db()->find('Payments',array('limit'=>'0,'.$paging,'where'=>"payment_type='returned' "));
                    $data['selectedpage']='1';
                }else{
                    $data['paymentslist']=Doo::db()->find('Payments',array('limit'=>($_GET['page']-1)*$paging.','.$paging,'where'=>"payment_type='returned'  "));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager
        
         for($x=0;$x<count($data['paymentslist']);$x++){
             
             $suppliers=Doo::db()->find('Clients',array('select'=>'name','where'=>"id='".$data['paymentslist'][$x]->payment_for."'",'limit'=>1));
             $data['paymentslist'][$x]->supplier=$suppliers->name;
             
             }
		$this->renderc('returned/index',$data);
    }

 
 
   public function getpaymentid(){
            $sales=Doo::db()->find('Sales',array('select'=>'id','where'=>" client='".$this->params[0]."'"));
            foreach($sales as $sale){ echo('<option value="'.$sale->id.'">فاتورة رقم : '.$sale->id.'</option>');}
            echo('#');
            //ak
     $data['saleslist']=Doo::db()->relate('SalesDetails','Sales',array('select'=>'sales.*,sales_details.* ','where'=>" sales.id=' ".$sale->id." ' "));
     
     $client_name=Doo::db()->find('Clients',array('select'=>'name','where'=>" id='".$data['saleslist'][0]->Sales->client."' ",'limit'=>1));
        $data['saleslist'][0]->Sales->client_name=$client_name->name;
        $total=0;
        for($x=0;$x<count($data['saleslist']);$x++){
            
            $item=Doo::db()->find('Items',array('select'=>'barcode,name,unit_type,category','where'=>" id='".$data['saleslist'][$x]->item."' ",'limit'=>1));
            $data['saleslist'][$x]->barcode=$item->barcode;
            $data['saleslist'][$x]->item_name=$item->name;
            $data['saleslist'][$x]->unit_type=$item->unit_type;
            $category=Doo::db()->find('Categories',array('select'=>'name','where'=>" id='".$item->category."' ",'limit'=>1));
            $data['saleslist'][$x]->category=$category->name;
            $tot=($data['saleslist'][$x]->package+($data['saleslist'][$x]->unit/2))*$data['saleslist'][$x]->sell_price;
            $tot1=($tot*$data['saleslist'][$x]->sell_discount)/100;
            $total=($tot-$tot1)+$total;
            $data['saleslist'][$x]->total=$tot-$tot1;
            }
        $data['saleslist'][0]->Sales->total=$total;
        ?>
      <table id="options-table">					
			<tr>
				<td>الرقم</td>
				<td>باركود</td>
				<td>الإسم</td>
				<td>التصنيف</td>
                <td>الصلاحية</td>
                <td>سعر البيع</td>
                <td>خصم البيع</td>
				<td>العبوة</td>
				<td>الوحدة</td>
				<td>نوع الوحدة</td>
				<td>إجمالي</td>
			</tr>
            <?php foreach($data['saleslist'] as $details){?>
            
			<tr class="first">
                <td><?php echo $details->id; ?></td>
                <td><?php echo $details->barcode; ?></td>
                <td>
                    <?php echo $details->item_name; ?>
                </td>
                <td><?php echo $details->category; ?></td>
                <td><?php echo $details->expire_date; ?></td>
                <td><?php echo $details->sell_price; ?></td>
                <td><?php echo $details->sell_discount; ?></td>
                <td><?php echo $details->package; ?></td>
                <td><?php echo $details->unit; ?></td>
                <td><?php echo $details->unit_type; ?></td>
                <td><?php echo $details->total; ?></td>
                
			</tr>        
            <?php } ?>
		</table>
        <?php
        echo("#".$data['saleslist'][0]->Sales->total);
            //ak
        }

    public function getpaymentdetails(){
            
     $data['saleslist']=Doo::db()->relate('SalesDetails','Sales',array('select'=>'sales.*,sales_details.* ','where'=>" sales.id=' ".$this->params[0]." ' "));
     
     $client_name=Doo::db()->find('Clients',array('select'=>'name','where'=>" id='".$data['saleslist'][0]->Sales->client."' ",'limit'=>1));
        $data['saleslist'][0]->Sales->client_name=$client_name->name;
        $total=0;
        for($x=0;$x<count($data['saleslist']);$x++){
            
            $item=Doo::db()->find('Items',array('select'=>'barcode,name,unit_type,category','where'=>" id='".$data['saleslist'][$x]->item."' ",'limit'=>1));
            $data['saleslist'][$x]->barcode=$item->barcode;
            $data['saleslist'][$x]->item_name=$item->name;
            $data['saleslist'][$x]->unit_type=$item->unit_type;
            $category=Doo::db()->find('Categories',array('select'=>'name','where'=>" id='".$item->category."' ",'limit'=>1));
            $data['saleslist'][$x]->category=$category->name;
            $tot=($data['saleslist'][$x]->package+($data['saleslist'][$x]->unit/2))*$data['saleslist'][$x]->sell_price;
            $tot1=($tot*$data['saleslist'][$x]->sell_discount)/100;
            $total=($tot-$tot1)+$total;
            $data['saleslist'][$x]->total=$tot-$tot1;
            }
        $data['saleslist'][0]->Sales->total=$total;
        ?>
      <table id="options-table">					
			<tr>
				<td>الرقم</td>
				<td>باركود</td>
				<td>الإسم</td>
				<td>التصنيف</td>
                <td>الصلاحية</td>
                <td>سعر البيع</td>
                <td>خصم البيع</td>
				<td>العبوة</td>
				<td>الوحدة</td>
				<td>نوع الوحدة</td>
				<td>إجمالي</td>
			</tr>
            <?php foreach($data['saleslist'] as $details){?>
            
			<tr class="first">
                <td><?php echo $details->id; ?></td>
                <td><?php echo $details->barcode; ?></td>
                <td>
                    <?php echo $details->item_name; ?>
                </td>
                <td><?php echo $details->category; ?></td>
                <td><?php echo $details->expire_date; ?></td>
                <td><?php echo $details->sell_price; ?></td>
                <td><?php echo $details->sell_discount; ?></td>
                <td><?php echo $details->package; ?></td>
                <td><?php echo $details->unit; ?></td>
                <td><?php echo $details->unit_type; ?></td>
                <td><?php echo $details->total; ?></td>
                
			</tr>        
            <?php } ?>
		</table>
        <?php
        echo("#".$data['saleslist'][0]->Sales->total);
            //ak
        }

 

    public function add(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    $data['clients']=Doo::db()->find('Clients',array('select'=>'id,name'));
    //$data['otherbanks']=Doo::db()->find('Otherbanks',array('select'=>'id,name'));
    $data['banks']=Doo::db()->find('Banks',array('select'=>'id,name'));
     $data['sales']=Doo::db()->find('Sales',array('select'=>'id,total_value',"where"=>" client='".$data['clients'][0]->id."'"));
            //ak
     $data['saleslist']=Doo::db()->relate('SalesDetails','Sales',array('select'=>'sales.*,sales_details.* ','where'=>" sales.id=' ".$data['sales'][0]->id." ' "));
     
     $client_name=Doo::db()->find('Clients',array('select'=>'name','where'=>" id='".$data['saleslist'][0]->Sales->client."' ",'limit'=>1));
        $data['saleslist'][0]->Sales->client_name=$client_name->name;
        $total=0;
        for($x=0;$x<count($data['saleslist']);$x++){
            
            $item=Doo::db()->find('Items',array('select'=>'barcode,name,unit_type,category','where'=>" id='".$data['saleslist'][$x]->item."' ",'limit'=>1));
            $data['saleslist'][$x]->barcode=$item->barcode;
            $data['saleslist'][$x]->item_name=$item->name;
            $data['saleslist'][$x]->unit_type=$item->unit_type;
            $category=Doo::db()->find('Categories',array('select'=>'name','where'=>" id='".$item->category."' ",'limit'=>1));
            $data['saleslist'][$x]->category=$category->name;
            $tot=($data['saleslist'][$x]->package+($data['saleslist'][$x]->unit/2))*$data['saleslist'][$x]->sell_price;
            $tot1=($tot*$data['saleslist'][$x]->sell_discount)/100;
            $total=($tot-$tot1)+$total;
            $data['saleslist'][$x]->total=$tot-$tot1;
            }
        $data['saleslist'][0]->Sales->total=$total;
            //ak
    for($x=0;$x<count($data['sales']);$x++){
        $paid_values=$this->db()->find('Payments',array('select'=>'payment_value','where'=>" payment_type='income' &&  payment_for='".$data['clients'][0]->id."' && payment_id='".$data['sales'][$x]->id."' "));
        $total_paid_values=0;
        foreach($paid_values as $paid){$total_paid_values=$total_paid_values+$paid->payment_value;}
        $data['sales'][$x]->rest_value=$total_paid_values;
        }
		$this->renderc('returned/add',$data);
    }
  

	    public function insert(){
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
   $payments = Doo::loadModel('Payments', true);
        
        $payments->payment_date=$_POST['payment_date'];
        $payments->payment_type=$_POST['payment_type'];
        $payments->payment_for=$_POST['payment_for'];
        $payments->payment_value=$_POST['payment_value'];
        $payments->payment_id=$_POST['payment_id'];
        $payments->payment_method=$_POST['payment_method'];
        if($_POST['payment_method']=='1'){$payments->bank_id=$_POST['banks'];$payments->bank_no=$_POST['bank_no'];}
        
        
        $payments->details=$_POST['details'];
        
        $payments->create_date=date('Y-m-d H:m:s');
        $payments->create_by=$_SESSION['member_username']['id'];
        $this->db()->insert($payments);

   //pager
            $paging=$this->paging;
            $data['pages']=ceil(count(Doo::db()->find('Payments',array('select'=>'id','where'=>"payment_type='pay'")))/$paging);
                if(!isset($_GET['page'])){
                    $data['paymentslist']=Doo::db()->find('Payments',array('limit'=>'0,'.$paging,'where'=>"payment_type='pay'"));
                    $data['selectedpage']='1';
                }else{
                    $data['paymentslist']=Doo::db()->find('Payments',array('limit'=>($_GET['page']-1)*$paging.','.$paging,'where'=>"payment_type='pay' "));                    
                    $data['selectedpage']=$_GET['page'];
                }	
                //
            //pager
        
         for($x=0;$x<count($data['paymentslist']);$x++){
             $suppliers=Doo::db()->find('Suppliers',array('select'=>'name','where'=>"id='".$data['paymentslist'][$x]->payment_for."'",'limit'=>1));
             $data['paymentslist'][$x]->supplier=$suppliers->name;
             }
		$this->renderc('payments/index',$data);
           
            
          }

	

  
    

    

}
?>