<?php

spl_autoload_register(function ($fqn) {
	
	// $fqn = Webhade\controller\HomeController
	
    $prefix = 'Webhade\\';
    
    $fqn = str_replace($prefix, '', $fqn);
    
    // $fqn = controller\HomeController
    
    $fqn = str_replace('\\', DS, $fqn);

    // $fqn = controller/HomeController
    
    $base_dir = __DIR__ . DS . '..' . DS;
    
    // $base_dir = /var/www/oopmvc/app/core/../

    $file = $base_dir . $fqn . '.php';
    // $file = /var/www/oopmvc/app/core/../controller/HomeController.php

    if (file_exists($file)) {
        require $file;
    }
    
});
