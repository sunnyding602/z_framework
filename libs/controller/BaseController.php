<?php
class BaseController{
    private $controller;
    private $action;
    private $view = array();

    public function setView($key, $value){
        $this->view[$key] = $value;
    }


    /** 
     *
     * 显示模版
     * @param string $tplFile
     * @return 
     */
    protected function display($tplFile) {
        if (in_array($_REQUEST['format'], array('json', 'xml'))) {
            BaseModelMessage::showSucc('获取数据', $this->view); 
        }   
        echo $this->fetch($tplFile);
    }   

    /** 
     *
     * 返回解析内容
     * @param string $tplFile
     * @return html
     */
    protected function fetch($tplFile) {
        $tpl = new BaseView();
        $tpl->assign($this->view);
        return $tpl->fetch($tplFile);
    }   

    public function run(){
        $url_str = trim($_SERVER['PHP_SELF']);
        $url_fragments = explode('/', $url_str);
        if(count($url_fragments) ==  4){//带app信息
            Config::set_app($url_fragments[1]);
            $this->controller =  $url_fragments[2];
            $this->action =  $url_fragments[3];
        }else if(count($url_fragments) ==  3){//带app信息
            Config::set_app('default');
            $this->controller =  $url_fragments[1];
            $this->action =  $url_fragments[2];
        }

        if(!empty($this->controller) && !empty($this->action)){
            $this->controller =  ucfirst($this->controller).'Controller';
            $c = new $this->controller();
            $action  = $this->action;
            $c->$action();
        }else{
            throw new Exception("controller $this->controller or action $this->action is empty");
        }
    }
}
