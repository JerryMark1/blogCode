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
            $user = M('user');

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
                    $info[$k]['descript'] = $v['descript'];
                    $info[$k]['ctime'] = date('Y-m-d h:i:s',$v['ctime']);
                    $info[$k]['userinfo'] = $user->where(['id'=>$v['uid']])->find();
                }
            }
//            show_bug( $info );
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
        $result = $this->getArticleData(I('get.id'));
        if( $result ){
            getPv(I('get.id'));
            $this->assign('result',$result);
            $this->display();
        }else{
            $this->redirect('Index/error');
        }

    }

    /**
     * 文章详情数据
     * @author yxl 2017-6-8
     * @param id 文章id
     */
    public function getArticleData($id){
        if($id){
            $model = M('article');
            $classfi = M('article_category');
            $user = M('user');
            $result = $model->where(['id'=>$id])->find();
            if( $result ){
                $canitain['id'] = $result['fid'];
                $tem  = $classfi->where(['id'=>$canitain['id']])->find();
                $result['categoryName'] = $tem ? $tem['category_name'] : '普通';
                $result['descript'] = $result['descript'];
                $result['ctime'] = date('Y-m-d h:i:s',$result['ctime']);
                $result['userinfo'] = $user->where(['id'=>$result['uid']])->find();
               return $result;
            }else{
                return null;
            }
        }
    }



    /**
     * 文章关注
     * @author yxl 2017-6-8
     * @url /index.php/Home/Index/Likes
     */
    public function Likes(){
        if(IS_AJAX){
            if(!empty(I('id'))){
                $ip = getIp();
                $id = I('id');
                $article = M('article');
                $res = $article->field('like')->where(['id'=>$id])->find();
                $res['like'] = intval($res['like']);
                //关注
                if( $_SESSION['id'] && $_SESSION['id'] == $id){
                    jsonReturn('你已经关注过该文章',0);
                }
                        $res['like'] += 1;
                        $news = $article->where(['id'=>$id])->save(['like'=>$res['like']]);
                        if( $news ){
                            $_SESSION['id'] = $id;
                            jsonReturn('关注成功',1,$res['like']);
                        }else{
                            jsonReturn('关注失败',0);
                        }


                }
        }


    }


}