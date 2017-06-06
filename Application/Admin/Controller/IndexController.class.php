<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {

    public function _initialize(){
        parent::_initialize(true);
    }


    /**
     * 文章列表页
     * @author yxl 2017-5-25
     * @url /index.php/Admin/Index/index
     *
     */

    public function index(){
//        var_dump(get_defined_constants(true));

        $this->display();
    }


    /**
     * 404
     * @author yxl 2017-5-25
     * @url /index.php/Admin/Index/error
     *
     */
    public function error(){
        $this->display('Index/404');
    }

}