<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {

    public function _initialize(){
        parent::_initialize();
    }


    /**
     * 文章列表页
     * @author yxl 2017-5-25
     * @url /index.php/Admin/Index/index
     *
     */

    public function index(){
        $this->display();
    }



}