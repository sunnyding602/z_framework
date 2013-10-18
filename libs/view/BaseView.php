<?php
include('Smarty.class.php');
class BaseView {
    const LEFT_DELIMITER  = '{=';
    const RIGHT_DELIMITER = '=}';
    private static $tpl = NULL;

    public function __construct () {
        if (NULL === self::$tpl) {
            self::$tpl = new Smarty();
            self::$tpl->template_dir    = Config::get_path('template_path');    
            self::$tpl->compile_dir     = Config::get_path('template_c_path'); 
            self::$tpl->plugins_dir[]   = Config::get_path('smarty_myplugin_path'); 
            self::$tpl->left_delimiter  = self::LEFT_DELIMITER;
            self::$tpl->right_delimiter = self::RIGHT_DELIMITER;
            self::$tpl->compile_locking = false;
            ////自动转义html标签，防止xss，不转义使用{=$data nofilter=}
            //function escFilter ($content, $smarty) {
            //    return htmlspecialchars($content,ENT_QUOTES,'GB2312');
            //}   
            //self::$tpl->registerFilter('variable', 'escFilter');
        }   
    }   

    public function __call ($func, $args) {
        return call_user_func_array(array(&self::$tpl,$func),$args);
    }   
}
