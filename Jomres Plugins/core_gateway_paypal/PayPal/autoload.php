<?php

// if(file_exists(__DIR__.JRDS.'vendor'.JRDS.'autoload.php')) {
	// include_once(__DIR__.JRDS.'vendor'.JRDS.'autoload.php');
// }

spl_autoload_register(function($class) {
	
	$file = get_showtime('paypal_sdk_path').implode(JRDS, array_slice(explode('\\', $class ), 0, -1)).JRDS.implode('' , array_slice( explode( '\\' , $class ), -1 , 1)).'.php';
	
	if(file_exists($file)) 
		{
		include($file);
		}
});
