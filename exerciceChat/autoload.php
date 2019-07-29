<?php
function load($classe){
	$paths = array(
			'',
			'controller/',
			'Model/',
			'../controller/',
			'../Model/',
			'Views/',
			'../Views/',
	);
	foreach ($paths as $path) {
		$finalPath = $path.$classe.'.php';
		if (file_exists($finalPath)){
			require $finalPath;
			break;
		}
	}
}
spl_autoload_register('load');
?>
