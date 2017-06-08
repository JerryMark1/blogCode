<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    //分类
    protected $classfilyArr = array();

    /**
     * parms
     */
    public function _initialize(){
        $this->getClassify();
    }


    /**
     * 查询分类信息
     *
     */
    public function getClassify(){
        $classfild = M('article_category');
        //输出分类
        $classInfo = $classfild->field('category_name')->select();
        $this -> $classfilyArr = $classInfo;
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


}