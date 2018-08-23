<?php
session_start();
include './protected/config/common.conf.php';
include './protected/config/routes.conf.php';
include './protected/config/db.conf.php';
include './protected/config/acl.conf.php';

#Just include this for production mode
//include $config['BASE_PATH'].'deployment/deploy.php';
include $config['BASE_PATH'].'Doo.php';
include $config['BASE_PATH'].'app/DooConfig.php';

# Uncomment for auto loading the framework classes.
spl_autoload_register('Doo::autoload');

Doo::conf()->set($config);

# remove this if you wish to see the normal PHP error view.
//include $config['BASE_PATH'].'diagnostic/debug.php';
//error_reporting(E_ALL & ~(E_NOTICE | E_STRICT));
//error_reporting(0);

# ACL 
Doo::acl()->rules = $acl;
Doo::acl()->defaultFailedRoute = '/error';

# database usage
//Doo::useDbReplicate();	#for db replication master-slave usage

Doo::db()->setMap($dbmap);

Doo::db()->setDb($dbconfig, $config['APP_MODE']);
Doo::db()->sql_tracking = true;	#for debugging/profiling purpose



Doo::app()->route = $route;

include_once("./protected/class/play.php");
include_once("./protected/class/imagethumbnail_corners.php");
// barcode
require_once('./protected/class/barcode/BCGFontFile.php');
require_once('./protected/class/barcode/BCGColor.php');
require_once('./protected/class/barcode/BCGDrawing.php');
require_once('./protected/class/barcode/BCGcode39.barcode.php');


include_once('./protected/class/phpthumb.class.php');
include_once('./protected/class/phpthumb.functions.php');
include_once('./protected/class/phpthumb.bmp.php');

Doo::loadController('../module/'.Doo::conf()->adminmod.'/controller/CoreController');
Doo::loadController('../module/members/controller/MembersController');

Doo::loadController('FrontController');

# Uncomment for DB profiling
//Doo::logger()->beginDbProfile('doowebsite');
Doo::app()->run();
$config['AUTOROUTE'] = true;
$config['MODULES'] = array('adm','members');

//Doo::logger()->endDbProfile('doowebsite');
//Doo::logger()->rotateFile(20);
//Doo::logger()->writeDbProfiles();
?>
