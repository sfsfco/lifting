<?php
/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class PrefrancesController extends CoreController{
	

    public function index(){

    $data['title']="Prefrances";
   
   
        if($_POST){
            
            if($_FILES["logo"]["tmp_name"]){
                @unlink(Doo::conf()->SITE_PATH.'global/uploads/prefrances/'.play::prefrances('logo'));
                $newfile=time().$_FILES["logo"]["name"];
                move_uploaded_file($_FILES["logo"]["tmp_name"],Doo::conf()->SITE_PATH.'global/uploads/prefrances/'.$newfile);
                $logo = $newfile;
            }else{
                $logo=play::prefrances('logo');
            }
            
            Doo::db()->deleteAll('Prefrances');
            $prefrances = Doo::loadModel('Prefrances', true);
            foreach($_POST as $k=>$v){

                    $prefrances->k=$k;
                    $prefrances->v=$v;
                    $result = Doo::db()->insert( $prefrances );
            }
            $prefrances = Doo::loadModel('Prefrances', true);
            $prefrances->k='logo';
            $prefrances->v= $logo;
            Doo::db()->insert( $prefrances );
        }

        $data['prefrances'] =  Doo::db()->find('Prefrances');
		$this->renderc('prefrances/index',$data);
    }

   public function insert(){
		//Just replace these
		//Doo::loadCore('app/DooSiteMagic');
		//DooSiteMagic::displayHome();
    $data['rootUrl']=Doo::conf()->APP_URL;
	$data['formUrl']=(Doo::conf()->sef=='0')?Doo::conf()->APP_URL.'index.php/':Doo::conf()->APP_URL;
    
     
     $old_logo=$this->db()->find('Prefrances',array('select'=>'logo','limit'=>1));
     //remove old logo
     
     if($_POST['preflogo']!=$old_logo->logo){
         @unlink(Doo::conf()->SITE_PATH.'global/uploads/'.$old_logo->logo);
         }
     
     $prefrance = Doo::loadModel('Prefrances', true);
     $prefrance->id='1';
     $prefrance->site_name=$_POST['site_name'];
     $prefrance->logo=$_POST['preflogo'];
     $prefrance->meta=$_POST['meta'];
     $prefrance->serial=$_POST['serial'];
     $prefrance->none_serial=$_POST['none_serial'];
     $prefrance->tax_id=$_POST['tax_id'];
     /*$prefrance->slave_host=$_POST['slave_host'];
     $prefrance->slave_database=$_POST['slave_database'];
     $prefrance->slave_user=$_POST['slave_user'];
     $prefrance->slave_password=$_POST['slave_password'];*/
     $prefrance->paging=$_POST['paging'];
     $prefrance->currency=$_POST['currency'];
     $prefrance->contacts=$_POST['contacts'];
     $this->db()->update($prefrance);
     
    
    $data['prefrances']=Doo::db()->find('Prefrances',array('limit'=>1));
   $data['message']='تم الحفظ';
    
		$this->renderc('prefrances/index',$data);
    }

    public function upload(){
        	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else 
	{
			$msg .= " File Name: " . $_FILES['fileToUpload']['name'] . ", ";
			$msg .= " File Size: " . @filesize($_FILES['fileToUpload']['tmp_name']);
			//for security reason, we force to remove all uploaded file
			@unlink($_FILES['fileToUpload']);		
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
}

	

    public function sync(){
        /// connect to slave host
        $prefrances=$this->db()->find('Prefrances',array('limit'=>1));
        $db2=new DooSqlMagic;
         $x=array('dev'=>array($prefrances->slave_host,$prefrances->slave_database,$prefrances->slave_user,$prefrances->slave_password,'mysql','1'),'prod'=>array($prefrances->slave_host,$prefrances->slave_database,$prefrances->slave_user,$prefrances->slave_password,'mysql','1'));
                $db2->setDb($x,'dev');
                $db2->connect();
        
        
        
        $host['categories']=$this->db()->find('Categories');
        $host['clients']=$this->db()->find('Clients');
        $host['groups']=$this->db()->find('Groups');
        $host['items']=$this->db()->find('Items');
        $host['purchases']=$this->db()->find('Purchases');
        $host['purchases_details']=$this->db()->find('PurchasesDetails');
        $host['sales']=$this->db()->find('Sales');
        $host['sales_details']=$this->db()->find('SalesDetails');
        $host['stores']=$this->db()->find('Stores');
        $host['suppliers']=$this->db()->find('Suppliers');
        $host['topermissions']=$this->db()->find('Topermissions');
        $host['users']=$this->db()->find('Users');
        
		
        //// start sync users
        $db2->deleteAll('Users');
			   foreach($host['users'] as $user){
                $slaveusers=Doo::loadModel('Users',true);
                $slaveusers->id=$user->id;
                $slaveusers->first_name=$user->first_name;
                $slaveusers->last_name=$user->last_name;
                $slaveusers->mail=$user->mail;
                $slaveusers->username=$user->username;
                $slaveusers->password=$user->password;
                $slaveusers->address=$user->address;
                $slaveusers->country=$user->country;
                $slaveusers->salary=$user->salary;
                $slaveusers->phone=$user->phone;
                $slaveusers->mobile=$user->mobile;
                $slaveusers->details=$user->details;
                $slaveusers->create_date=$user->create_date;
                $slaveusers->edit_date=$user->edit_date;
                $slaveusers->last_login=$user->last_login;
                $slaveusers->create_by=$user->create_by;
                $slaveusers->edit_by=$user->edit_by;
                $slaveusers->group_id=$user->group_id;
                $slaveusers->active=$user->active;
                $db2->insert($slaveusers);
                }		
        //// end sync users
        
        //// start sync categories
        $db2->deleteAll('Categories');
			   foreach($host['categories'] as $category){
                $categories=Doo::loadModel('Categories',true);
                $categories->id=$category->id;
                $categories->name=$category->name;
                $categories->create_date=$category->create_date;
                $categories->edit_date=$category->edit_date;
                $categories->create_by=$category->create_by;
                $categories->edit_by=$category->edit_by;
                $db2->insert($categories);
                }		
        //// end sync categories
        
        //// start sync clients
        $db2->deleteAll('Clients');
			   foreach($host['clients'] as $client){
                $clients=Doo::loadModel('Clients',true);
                $clients->id=$client->id;
                $clients->name=$client->name;
                $clients->representative=$client->representative;
                $clients->city=$client->city;
                $clients->postal_code=$client->postal_code;
                $clients->country=$client->country;
                $clients->phone=$client->phone;
                $clients->mail=$client->mail;
                $clients->fax=$client->fax;
                $clients->mobile=$client->mobile;
                $clients->debit_credit=$client->debit_credit;
                $clients->debit_credit_value=$client->debit_credit_value;
                $clients->active=$client->active;
                $clients->details=$client->details;
                $clients->create_date=$client->create_date;
                $clients->edit_date=$client->edit_date;
                $clients->create_by=$client->create_by;
                $clients->edit_by=$client->edit_by;
                $db2->insert($clients);
                }		
        //// end sync clients
        
        //// start sync groups
        $db2->deleteAll('Groups');
			   foreach($host['groups'] as $group){
                $groups=Doo::loadModel('Groups',true);
                $groups->id=$group->id;
                $groups->name=$group->name;
                $groups->active=$group->active;
                
                $groups->create_date=$group->create_date;
                $groups->edit_date=$group->edit_date;
                $groups->create_by=$group->create_by;
                $groups->edit_by=$group->edit_by;
                $db2->insert($groups);
                }		
        //// end sync groups
        
        //// start sync items
        $db2->deleteAll('Items');
			   foreach($host['items'] as $item){
                $items=Doo::loadModel('Items',true);
                $items->id=$item->id;
                $items->name=$item->name;
                $items->country=$item->country;
                $items->purchase_price=$item->purchase_price;
                $items->purchase_discount=$item->purchase_discount;
                $items->barcode=$item->barcode;
                $items->category=$item->category;
                $items->unit_type=$item->unit_type;
                $items->package_units=$item->package_units;
                $items->order_limit=$item->order_limit;
                $items->details=$item->details;
                
                $items->create_date=$item->create_date;
                $items->edit_date=$item->edit_date;
                $items->create_by=$item->create_by;
                $items->edit_by=$item->edit_by;
                $db2->insert($items);
                }		
        //// end sync items
        
        //// start sync purchases
        $db2->deleteAll('Purchases');
			   foreach($host['purchases'] as $purchase){
                $purchases=Doo::loadModel('Purchases',true);
                $purchases->id=$purchase->id;
                $purchases->first_name=$purchase->supplier;
                $purchases->last_name=$purchase->purchase_date;
                $purchases->mail=$purchase->payment_method;
                $purchases->username=$purchase->total_value;

                $purchases->create_date=$purchase->create_date;
                $purchases->edit_date=$purchase->edit_date;
                $purchases->create_by=$purchase->create_by;
                $purchases->edit_by=$purchase->edit_by;
                $db2->insert($purchases);
                }		
        //// end sync purchases
        
        //// start sync purchases_details
        $db2->deleteAll('PurchasesDetails');
			   foreach($host['purchases_details'] as $purchases_detail){
                $purchases_details=Doo::loadModel('PurchasesDetails',true);
                $purchases_details->id=$purchases_detail->id;
                $purchases_details->item=$purchases_detail->item;
                $purchases_details->purchase_price=$purchases_detail->purchase_price;
                $purchases_details->purchase_discount=$purchases_detail->purchase_discount;
                $purchases_details->package=$purchases_detail->package;
                $purchases_details->unit=$purchases_detail->unit;
                $purchases_details->expire_date=$purchases_detail->expire_date;
                $purchases_details->sell_price=$purchases_detail->sell_price;
                $purchases_details->sell_discount=$purchases_detail->sell_discount;
                $purchases_details->purchase=$purchases_detail->purchase;
             
                $purchases_details->create_date=$purchases_detail->create_date;
                $purchases_details->edit_date=$purchases_detail->edit_date;
                $purchases_details->create_by=$purchases_detail->create_by;
                $purchases_details->edit_by=$purchases_detail->edit_by;
                $db2->insert($purchases_details);
                }		
        //// end sync purchases_details
        
        //// start sync Sales
        $db2->deleteAll('Sales');
			   foreach($host['sales'] as $sale){
                $sales=Doo::loadModel('Sales',true);
                $sales->id=$sale->id;
                $sales->client=$sale->client;
                $sales->sell_date=$sale->sell_date;
                $sales->payment_method=$sale->payment_method;
                $sales->total_value=$sale->total_value;
               
                
                $sales->create_date=$sale->create_date;
                $sales->edit_date=$sale->edit_date;
                $sales->create_by=$sale->create_by;
                $sales->edit_by=$sale->edit_by;

                $db2->insert($sales);
                }		
        //// end sync Sales
        
        //// start sync SalesDetails
        $db2->deleteAll('SalesDetails');
			   foreach($host['sales_details'] as $sales_detail){
                $sales_details=Doo::loadModel('SalesDetails',true);
                $sales_details->id=$sales_detail->id;
                $sales_details->item=$sales_detail->item;
                $sales_details->package=$sales_detail->package;
                $sales_details->unit=$sales_detail->unit;
                $sales_details->expire_date=$sales_detail->expire_date;
                $sales_details->sell_price=$sales_detail->sell_price;
                $sales_details->sell_discount=$sales_detail->sell_discount;
                $sales_details->sales=$sales_detail->sales;
               
                $sales_details->create_date=$sales_detail->create_date;
                $sales_details->edit_date=$sales_detail->edit_date;
                $sales_details->create_by=$sales_detail->create_by;
                $sales_details->edit_by=$sales_detail->edit_by;
                $db2->insert($sales_details);
                }		
        //// end sync SalesDetails
        
        //// start sync Stores
        $db2->deleteAll('Stores');
			   foreach($host['stores'] as $store){
                $stores=Doo::loadModel('Stores',true);
                $stores->id=$store->id;
                $stores->item=$store->item;
                $stores->purchase_price=$store->purchase_price;
                $stores->purchase_discount=$store->purchase_discount;
                $stores->package=$store->package;
                $stores->unit=$store->unit;
                $stores->expire_date=$store->expire_date;
                $stores->sell_price=$store->sell_price;
                $stores->sell_discount=$store->sell_discount;
                $stores->purchase=$store->purchase;
                
                $stores->create_date=$store->create_date;
                $stores->edit_date=$store->edit_date;
                $stores->create_by=$store->create_by;
                $stores->edit_by=$store->edit_by;
                $db2->insert($stores);
                }		
        //// end sync Stores
        
        //// start sync supplier
        $db2->deleteAll('Suppliers');
			   foreach($host['suppliers'] as $supplier){
                $suppliers=Doo::loadModel('Suppliers',true);
                $suppliers->id=$supplier->id;
                $suppliers->name=$supplier->name;
                $suppliers->address=$supplier->address;
                $suppliers->phone1=$supplier->phone1;
                $suppliers->phone2=$supplier->phone2;
                $suppliers->fax=$supplier->fax;
                $suppliers->mobile=$supplier->mobile;
                $suppliers->city=$supplier->city;
                $suppliers->country=$supplier->country;
                $suppliers->postal_code=$supplier->postal_code;
                $suppliers->site=$supplier->site;
                $suppliers->mail=$supplier->mail;
                $suppliers->details=$supplier->details;
                $suppliers->debit_credit=$supplier->debit_credit;
                $suppliers->debit_credit_value=$supplier->debit_credit_value;
                
                $suppliers->create_date=$supplier->create_date;
                $suppliers->edit_date=$supplier->edit_date;
                $suppliers->create_by=$supplier->create_by;
                $suppliers->edit_by=$supplier->edit_by;
                
                $db2->insert($suppliers);
                }		
        //// end sync supplier
        
         //// start sync topermissions
        $db2->deleteAll('Topermissions');
			   foreach($host['topermissions'] as $topermission){
                $topermissions=Doo::loadModel('Topermissions',true);
                $topermissions->id=$topermission->id;
                $topermissions->action_name=$topermission->action_name;
                $topermissions->controller_name=$topermission->controller_name;
                $topermissions->allow=$topermission->allow;
                $topermissions->group_id=$topermission->group_id;
               
                
                $topermissions->create_date=$topermission->create_date;
                $topermissions->edit_date=$topermission->edit_date;
                $topermissions->create_by=$topermission->create_by;
                $topermissions->edit_by=$topermission->edit_by;
                
                $db2->insert($topermissions);
                }		
        //// end sync supplier
        echo "تمت المزامنة بنجاح";
        }


        function backup(){
    
    $dbHost = Doo::conf()->host;
    $dbUsername = Doo::conf()->user;
    $dbPassword = Doo::conf()->password;
    $dbName = Doo::conf()->dbname;
    $tables = '*';
    //connect & select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
    mysqli_set_charset($db,"utf8");

    //get all of the tables
    if($tables == '*'){
        $tables = array();
        $result = $db->query("SHOW TABLES");
        while($row = $result->fetch_row()){
            $tables[] = $row[0];
        }
    }else{
        $tables = is_array($tables)?$tables:explode(',',$tables);
    }

    //loop through the tables
    
    $return = "/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\n/*!40101 SET NAMES utf8mb4 */;\n";
    foreach($tables as $table){
        $result = $db->query("SELECT * FROM $table");
        $numColumns = $result->field_count;

        $return .= "DROP TABLE IF EXISTS $table;";

        $result2 = $db->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();

        $return .= "\n\n".$row2[1].";\n\n";

        for($i = 0; $i < $numColumns; $i++){
            while($row = $result->fetch_row()){
                $return .= "INSERT INTO $table VALUES(";
                for($j=0; $j < $numColumns; $j++){
                    $row[$j] = addslashes($row[$j]);
                    //$row[$j] = preg_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return .= '"'.$row[$j].'"' ; } else { $return .= '""'; }
                    if ($j < ($numColumns-1)) { $return.= ','; }
                }
                $return .= ");\n";
            }
        }

        $return .= "\n\n\n";
    }

    //save file
    /*
    $handle = fopen(Doo::conf()->SITE_PATH.'global/uploads/db-backup-'.time().'.sql','w+');
    fwrite($handle,$return);
    fclose($handle);
    file_put_contents('db-backup-'.time().'.sql', $return);
    */
    header("Content-type: text/csv;CHARSET=utf8");
    header("Cache-Control: no-store, no-cache");
    header('Content-Disposition: attachment; filename="db-backup-'.time().'.sql"');
    echo $return;
    exit();
    
}
        
 function restore(){
    $data['title'] = 'Restore Database';
    $this->renderc('prefrances/restore', $data);
 }

 function restoredone(){
    $fi=explode('.',$_FILES['database']['name']);
    $extension = end($fi);
    
    if(strtolower($extension) == 'sql'){
            $db = new PDO('mysql:dbname='.Doo::conf()->dbname.';host='.Doo::conf()->host, Doo::conf()->user, Doo::conf()->password);
            $sql = file_get_contents($_FILES['database']['tmp_name']);
            $qr = $db->exec($sql);

            $_SESSION['inner_message']['success'][]='Data Successfully Restored';
            header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'prefrances/restore/' );    
        }else{
            $_SESSION['inner_message']['error'][]='Invalid Database File.';
          header( 'Location:'.Doo::conf()->APP_URL.Doo::conf()->adminmod.'prefrances/restore/');
        }
        
 }


}
?>