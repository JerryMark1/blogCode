<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

    /**
     * parms  true 是要验证登录
     */
    public function _initialize(){
       parent::_initialize();
        //输出分类
        $classInfo = $this->$classfilyArr;
        $this->assign('classInfo',$classInfo);
    }


    /**
     * 首页
     * @author yxl 2017-5-25
     * @url /index.php/Home/Index/Index
     */
    public function index(){
        $this->display();
    }


    /**
     * 文章列表页
     * @author yxl 2017-5-25
     * @url /index.php/Home/Index/article_list
     */
    public function article_list(){
        if(IS_AJAX){
            $model = M('Article');
            $classfi = M('article_category');
            //1. 获得当前记录总条数
            $total = $model -> count();
            $page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
            $pageNum = 5;
            //总页数
            $totalPages = ceil($total / $pageNum);
            //2. 实例化分页类对象
            $page = new \Component\Page($total,$page,$pageNum); //autoload
            //3. 拼装sql语句获得每页信息
            $sql = "select * from b_article order by ctime desc ".$page->limit;
            $info = $model -> query($sql);
            if($info){
                foreach($info as $k => $v){
                    $canitain['id'] = $v['fid'];
                    $tem  = $classfi->where(['id'=>$canitain['id']])->find();
                    $info[$k]['categoryName'] = $tem ? $tem['category_name'] : '普通';
                    $info[$k]['descript'] = substr($v['descript'],0,20);
                    $info[$k]['ctime'] = date('Y-m-d h:i:s',$v['ctime']);
                }
            }
            jsonList('ok',1,$info,['totalPages' => $totalPages]);
        }
    }


    /**
     * 404
     * @author yxl 2017-5-25
     * @url /index.php/Home/Index/error
     */
    public function error(){
        $this->display();
    }

    /**
     * 文章详情页
     * @author yxl 2017-5-25
     * @url /index.php/Home/Index/article_detail
     */
    public function article_detail(){
        if(!I('get.id')){
            $this->redirect('Index/error');
        }
        $model = M('article');
        $classfi = M('article_category');
        $result = $model->where(['id'=>I('get.id')])->find();
        if( $result ){
            $canitain['id'] = $result['fid'];
            $tem  = $classfi->where(['id'=>$canitain['id']])->find();
            $result['categoryName'] = $tem ? $tem['category_name'] : '普通';
            $result['descript'] = substr($result['descript'],0,20);
            $result['ctime'] = date('Y-m-d h:i:s',$result['ctime']);
//            show_bug($result);
            $this->assign('result',$result);
            $this->display();
        }else{
            $this->redirect('Index/error');
        }

    }


}