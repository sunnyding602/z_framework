<?php
class DefaultController extends BaseController{
    public function index(){
        $this->setView('hello', 'fsdjlfds你好,世界 shu');

        $a = new BaseModelDB('');
        $this->display('index.html');
    }

}
