<?php


spl_autoload_register('myAutoLoader');


function myAutoLoader($className)   //autoloader function
{

	$searchFiles = array(
       	    INCLUDES_DIR.$className.'.php',        //look inside the Includes directory for anything with class name
			    );

    foreach ($searchFiles as $file) {
    	if (file_exists($file)) {
      require_once($file);
			return;
    	}
    }









} //AUTOLOADER
