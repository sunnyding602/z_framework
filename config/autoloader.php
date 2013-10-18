<?php
spl_autoload_register(function ($class) {
    $paths = Config::get_path(); 
    $file_exist = false;
    if(strpos($class , 'Smarty') !== false ){// smarty 命名不符合我的规范
        return;
    }
    foreach( $paths as $path){
        $class_file = $path.$class.'.php';
        $file_exist = file_exists($class_file);
        if($file_exist == true){
            require($class_file);
            return;
        }
    }
    //如果是controller
    if( $file_exist == false && strpos(strtolower($class), 'controller') !== false){
        require(SITE_ROOT.'app/'.Config::get_app().'/controller/'.$class.'.php');
        return;
    }
    if($file_exist == false){
        throw new Exception("path $path class ".$class.' not found');
    }
});

