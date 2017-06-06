<?php
namespace Home\Controller;//表示当前类是Home模块下的控制器类
use Think\Controller;//表示引入 Think\Controller 命名空间便于直接使用
class RegisterController extends Controller {
    public function register(){
        $this->assign('title','注册');
        $this->assign('age',50);
        $this->display();
    }
    public function registerUser(){

        if(IS_AJAX){
            $name = I('name');
            $age = I('age');
            if(empty($name)){
                jsonReturn('用户名不能为空',0);
            }
            if(empty($age)){
                jsonReturn('年龄不能为空',0);
            }
            $list = [
                'isTrue'=>1,
                'isSet'=>'ajax请求'
            ];
            jsonReturn('ok',1,$list);
        }else{
            jsonReturn('非法请求',0);
        }

    }
}