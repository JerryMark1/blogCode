<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $model = M('article');
        $result = $model->select();
        $this->assign('result',$result);
        $this->assign('title','我是标题哦');
        $this->assign('content','我是内容区');
        $this->display();
    }


}