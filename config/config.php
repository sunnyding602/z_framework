<?php
define('SITE_ROOT', dirname(dirname(__FILE__)).'/'); //带斜线
date_default_timezone_set('Asia/Chongqing' );
class Config{
    private static $app;
    public static function get_app(){//这个会在get参数里面传过来!!! 目前先默认default 
        return self::$app = 'default';
    }
    public static function set_app($app){
        self::$app = $app;
    }

    public static function get_path($module=null){
        $paths = array(
            'config_path' => SITE_ROOT.'config/', 
            'model_path'=>SITE_ROOT.'model/', 
            'modeldb_path'=>SITE_ROOT.'model/db/', 
            'basecontoller_path'=>SITE_ROOT.'libs/controller/', 
            'view_path'=>SITE_ROOT.'libs/view', 
            'basemodel_path'=>SITE_ROOT.'libs/model/', 
            'basedb_path'=>SITE_ROOT.'libs/db/', 
            'baseview_path'=>SITE_ROOT.'libs/view/', 
            'smarty_plugin_path'=>SITE_ROOT.'libs/plugins/', 
            'smarty_myplugin_path'=>SITE_ROOT.'libs/myplugins/', 
            'template_c_path'=>SITE_ROOT.'template_c/', 
            'template_path'=>SITE_ROOT.'app/'.self::$app.'/template/', 
        );
        if(empty($module)){
            return $paths;
        }else{
            return $paths[$module];
        }
    }
    public static function get_db_config(){
        return array('ENGINE'=> 'mysql', 'DB_HOST'=> getenv('DB_HOST'),'DB_NAME'=>getenv('DB_NAME'), 'DB_PORT'=> getenv('DB_PORT'), 'DB_USER' => getenv('DB_USER'), 'DB_PASS'=>getenv('DB_PASS') );
    }
}
