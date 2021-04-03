<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__DIR__).DS);
define('JS_DIR',ROOT.'js'.DS);
define('IMAGES_DIR',ROOT.'images'.DS);
define('INCLUDES_DIR',ROOT.'includes'.DS);


require_once("autoloader.php");



$json = file_get_contents(JS_DIR.'/config.json');
$configvars = json_decode($json,true);

define('DB_HOST',$configvars['dbServer']);
define('DB_UNAME',$configvars['username']);
define('DB_PASS',$configvars['password']);
define('DB_DBNAME',$configvars['dbName']);
