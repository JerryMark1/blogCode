<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {

    /**
     * parms  true 是要验证登录
     */
   public function _initialize($islogin = true){
        if ($islogin) {
            $this->checkLogin();
        }
    }


    /**
     * 验证会员是否登录
     *
     */
    protected function checkLogin() {

        if ($_SESSION['is_login'] != '1') {
            @header("location:/index.php/Admin/Login/login");
            exit;
        }
    }

    /**
     * 访问空控制器
     *
     */
    public function _empty()
    {
        //可以自己处理，跳转到相应链接
        $this->redirect('Index/error');
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