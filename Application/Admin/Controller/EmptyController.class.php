<?php
namespace Admin\Controller;
use Think\Controller;
class EmptyController extends Controller {

    public function _empty()
    {
//可以自己处理，跳转到相应链接
        $this->redirect('Index/error');
    }
}