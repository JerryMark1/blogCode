<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends BaseController {

    public function _initialize()
    {
        parent::_initialize(true);
    }


    /**
     * 文章列表页
     * @author yxl 2017-5-25
     * @url /index.php/Admin/Article/article_list
     */
    public function article_list(){
        $model = M('Article');
        $classfi = M('article_category');
        if(IS_AJAX){
            //1. 获得当前记录总条数
            $total = $model -> count();
            $page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
            $pageNum = 10;
            //总页数
            $totalPages = ceil($total / $pageNum);
            //2. 实例化分页类对象
            $page = new \Component\Page($total,$page); //autoload
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
        $this->assign('title','文章列表');
        $this->display();
    }





    /**
     * 文章添加页面
     * @author yxl 2017-5-25
     * @url /index.php/Admin/Article/article_add
     */
    public function article_add(){
        $mode = M('article_category');
        $result = $mode -> select();
        if(!$result){
           $this->error('系统异常',U('Article/article_classify'));
        }
        $this -> assign('info',$result);
        $this -> assign('title','文章添加');
        $this -> display();
    }
    /**
     * 文章添加接口
     * @author yxl 2017-5-25
     * @url /index.php/Admin/Article/article_add_json
     */
    public function article_add_json(){
        $model = M('article');
        if(IS_AJAX){
            $rules = array(
                array('title','require','文章标题必须！'),
                array('descript','require','文章描述必须'),
                array('content','require','文章内容必须'),
            );
            if (!$model->validate($rules)->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                jsonReturn($model->getError(),0);
            }
            $data = array(
                'title' => I('title'),
                'author' => $_SESSION['userName'],
                'content' => $_POST['editorValue'],
                'fid'  => I('fid'),
                'ctime' => time(),
                'descript' => I('descript'),
                'tag' => I('tag')
            );
            $res = $model->where(['title' => $data['title']])->select();
            if( $res ){
                jsonReturn('该文章标题已存在',0);
            }else{
                $result = $model->add( $data );
                if($result){
                    jsonReturn('文章添加成功',1);
                }else{
                    jsonReturn('文章添加失败',0);
                }
            }


        }

    }


    /**
     * 文章修改
     * @author yxl 2017-5-28
     * @url /index.php/Admin/Article/article_modify
     */

    public function article_modify(){
        $model = M('article');
        $classify = M('article_category');
        $id = I('get.aid');
        if(IS_AJAX){
            $rules = array(
                array('title','require','文章标题必须！'),
                array('descript','require','文章描述必须'),
                array('content','require','文章内容必须'),
            );
            if (!$model->validate($rules)->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                jsonReturn($model->getError(),0);
            }
            $aid = I('aid');
            $data = array(
                'title' => I('title'),
                'author' => $_SESSION['userName'],
                'content' => $_POST['content'],
                'fid'  => I('fid'),
                'ctime' => time(),
                'descript' => I('descript'),
                'tag' => I('tag')
            );
            $res = $model->where(['id'=>$aid])->save($data);
            if($res){
                jsonReturn('文章修改成功',1);
            }else{
                jsonReturn('文章修改失败',0);
            }


        }else{
            $result = $model->where(['id'=>$id])->find();
            $list = $classify->select();
            if(!$result){
                $this->error('不存在此文章',U('Article/article_list'));
            }
            $this->assign('list',$list);
            $this->assign('result',$result);
            $this->display();
        }

    }
    /**
     * 文章删除
     * @author yxl 2017-5-25
     * @url /index.php/Admin/Article/article_del
     */
        public function article_del(){
            $model = M('article');
            if(IS_AJAX){
                $id = I('id');
                $result = $model->where(['id'=>$id])->delete();
                if( $result ){
                    jsonReturn('删除成功',1);
                }else{
                    jsonReturn('删除失败',0);
                }
            }else{
                jsonReturn('非法操作',0);
            }
        }


    /**
     * 分类页面
     * @author yxl 2017-5-25
     * @url /index.php/Admin/Article/article_classify
     */
    public function article_classify(){

        $model = M('article_category');
        $result = $model -> select();
        $result = $result ? $result : null;
        $this->assign('result',$result);
        $this->assign('title','文章分类添加');
        $this->display();
    }



    /**
     * 分类添加
     * @author yxl 2017-5-25
     * @url /index.php/Admin/Article/article_classify_add
     */

    public function article_classify_add($name){
        if(IS_POST){
            if(empty($name)){
                jsonReturn('分类名称不能为空',0);
            }
                $model = D("article_category"); // 实例化User对象
                $data = [];
                //先判断该分类是否存在
                $condition['category_name'] = $name;
                $result = $model->where($condition)->select();
                if(!$result){
                    $data['category_name'] = trim($name);
                    //fileter()方法可以安全过滤
                    $result = $model->data($data)->filter('strip_tags')->add();
                    if($result){
                        jsonReturn('分类添加成功',1);
                    }else{
                        jsonReturn('分类添加失败',0);
                    }
                }else{
                    jsonReturn('该分类已存在',0);
            }
        }
    }

    /**
     * 分类修改
     * @author yxl 2017-5-25
     * @url /index.php/Admin/Article/article_classify_modification
     */
        public function article_classify_modification(){
            $model = M('article_category');
            $article = M('article');
            if(IS_AJAX){
                $classifyName = I('category_name');
                $fid = I('id');
                if(!$classifyName){
                    jsonReturn('分类名称不能为空',0);
                }
                if(!fid){
                    jsonReturn('分类id错误',0);
                }
                $result = $model->where(['id'=>$fid])->save(['category_name'=>$classifyName]);
                if($result){
                    jsonReturn('修改成功',1);
                }else{
                    jsonReturn('修改失败',0);
                }



            }
        }

    /**
     * 分类删除
     * @author yxl 2017-5-25
     * @url /index.php/Admin/Article/article_classify_del
     */

    public function article_classify_del(){
        if(IS_AJAX){
            $article = M('article'); //文章表
            $category = M('article_category');//分类表
            $data = I('ids');
            if(!$data){
                jsonReturn('分类必选',0);
            }
//            print_r( $data );
           foreach($data as $v){
               $contain['id'] = $v;
               $contain2['fid'] = $v;
               $tmp = $article->where($contain2)->select();
               if($tmp){
                   $result1 = $article->where($contain2)->delete();
               }
               $result2 = $category->where($contain)->delete();
           }
            if( $result2 ){
                jsonReturn('删除分类成功',1);
            }else{
                jsonReturn('删除分类失败',0);
            }

        }
    }

}