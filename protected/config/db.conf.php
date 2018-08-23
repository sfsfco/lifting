<?php

$config['host']='localhost';
$config['dbname']='lifiting';
$config['user']='root';
$config['password']='newpwd';


$dbconfig['dev'] = array($config['host'],$config['dbname'],$config['user'],$config['password'],'mysql',true, 'collate'=>'utf8_unicode_ci', 'charset'=>'utf8');
$dbconfig['prod'] = array($config['host'],$config['dbname'],$config['user'],$config['password'],'mysql',true, 'collate'=>'utf8_unicode_ci', 'charset'=>'utf8');



$dbmap['Groups']['has_many']['Users'] = array('foreign_key'=>'group_id');
$dbmap['Users']['belongs_to']['Groups'] = array('foreign_key'=>'id');

$dbmap['Categories']['has_many']['Items'] = array('foreign_key'=>'category');
$dbmap['Items']['belongs_to']['Categories'] = array('foreign_key'=>'id');

$dbmap['Items']['has_many']['Stores'] = array('foreign_key'=>'item');
$dbmap['Stores']['belongs_to']['Items'] = array('foreign_key'=>'id');

$dbmap['Suppliers']['has_many']['Purchases'] = array('foreign_key'=>'supplier');
$dbmap['Purchases']['belongs_to']['Suppliers'] = array('foreign_key'=>'id');

$dbmap['Suppliers']['has_many']['Good'] = array('foreign_key'=>'supplier');
$dbmap['Good']['belongs_to']['Suppliers'] = array('foreign_key'=>'id');

$dbmap['Clients']['has_many']['Sales'] = array('foreign_key'=>'client');
$dbmap['Sales']['belongs_to']['Clients'] = array('foreign_key'=>'id');

$dbmap['Clients']['has_many']['Certificates'] = array('foreign_key'=>'client');
$dbmap['Certificates']['belongs_to']['Clients'] = array('foreign_key'=>'id');

$dbmap['Users']['has_many']['Certificates'] = array('foreign_key'=>'test_by');
$dbmap['Certificates']['belongs_to']['Users'] = array('foreign_key'=>'id');

$dbmap['Purchases']['has_many']['PurchasesDetails'] = array('foreign_key'=>'purchase');
$dbmap['PurchasesDetails']['belongs_to']['Purchases'] = array('foreign_key'=>'id');

$dbmap['Good']['has_many']['GoodDetails'] = array('foreign_key'=>'good');
$dbmap['GoodDetails']['belongs_to']['Good'] = array('foreign_key'=>'id');

$dbmap['Sales']['has_many']['SalesDetails'] = array('foreign_key'=>'sales');
$dbmap['SalesDetails']['belongs_to']['Sales'] = array('foreign_key'=>'id');

$dbmap['Groups']['has_many']['Topermissions'] = array('foreign_key'=>'group_id');
$dbmap['Topermissions']['belongs_to']['Groups'] = array('foreign_key'=>'id');

?>
