<?php

namespace Admin\Controller;
use Think\Controller;

class LoginController extends BaseController{

    public function _initialize($islogin = true)
    {
        parent::_initialize(false);
    }


    /**
     * 登录
     * @author yxl 2017-5-27
     * @url /index.php/Admin/Login/login
     *
     */
    public function login(){
        $user = M('user');
        if(IS_AJAX){
            $rules = array(
                array('username','require','用户名必须！'), // 用户名必须
                array('password','require','密码必须'), // 验证密码必须
                array('code','require','验证码必须'), // 验证码必须
            );
            if (!$user->validate($rules)->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                jsonReturn($user->getError(),0);
            }
            // 检查验证码
            $verify = I('code','');
            if(!check_verify($verify)){
                jsonReturn('验证码错误',0);
            }

            $data = array(
                'username' => I('username'),
                'password' => md5(I('password')),
            );
            $info = $user->where($data)->find();
            if( $info ){
                $_SESSION['userId'] = $info['id'];
                $_SESSION['is_login'] = 1;
                $_SESSION['userName'] = $data['username'];
                jsonReturn('ok',1);
            }else{
                jsonReturn('用户名或者密码错误',0);
            }
        }
        $this->display();
    }

    /**
     * 登录退出
     * @author yxl 2017-5-27
     * @url /index.php/Admin/Login/logout
     */
    public function logout(){
        session_unset();
        session_destroy();
        $this->redirect('Login/login');
    }



    /**
     * 检测该用户是否已经注册
     * @author yxl 2017-5-27
     * @url /index.php/Admin/Login/isRegister
     *
     */

    public function isRegister(){
        $user = M('user');
        if(IS_AJAX){
           $username = I('username');
            $res = $user->where(['username' => $username])->find();
            if($res){
                jsonReturn('该用户已经存在',0);
            }else{
                jsonReturn('ok',1);
            }
        }else{
            jsonReturn('非法操作',0);
        }
    }

    /**
     * 注册
     * @author yxl 2017-5-27
     * @url /index.php/Admin/Login/register
     *
     */

    public function register(){
        $user = M('user');
        if(IS_AJAX){
            $res = $user->validate()->create();
            if(!$res){
                jsonReturn($user->getError(),0);
            }else{
                // 检查验证码
                $verify = I('code','');
                if(!check_verify($verify)){
                    jsonReturn('验证码错误',0);
                }
                $data = array(
                    'username' => I('username'),
                    'password' => md5(I('password')),
                    'ctime' => time()
                );
                $res = $user->where(['username'=>$data['username']])->find();
                if($res){
                    jsonReturn('该用户已经存在',0);
                }
                $result = $user->add( $data );
                if( $result ){
                    jsonReturn('注册成功',1);
                }else{
                    jsonReturn('注册失败',0);
                }
            }
        }else{
            jsonReturn('非法操作',0);
        }
    }


    /**
     * 验证码
     * @author yxl 2017-5-27
     * @url /index.php/Admin/Login/verify_c
     *
     */
    public function verify_c(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 18;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->codeSet = implode('',array_merge(range(0,9,1),range('a','z',1)));
        $Verify->imageW = 205;
        $Verify->imageH = 50;
        //$Verify->expire = 600;
        $Verify->entry();
    }


}