<?php
namespace Model;
use Think\Model;
class UserModel extends Model{

    protected $_validate        =   array(
        array('username','require','用户名不能为空'),
        array('password','require','密码不能为空'),
        array('code','require','验证码不能为空'),
        array('username','/\S{3,12}/','用户名格式错误'),
        array('password','/^[a-zA-Z0-9]{6,10}$/','密码格式错误'),
        array('password','config','两次密码不一致',1,'confirm'),

    );



}
