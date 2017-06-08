<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {

    public function _initialize(){
        parent::_initialize();
    }


    /**
     * 用户首页
     * @author yxl 2017-5-25
     * @url /index.php/Admin/User/index
     *
     */
    public function index(){
        $model = M('user');
        $user = $_SESSION['userName'];
        $result = $model ->field('username,ctime,avatar,alias,signature')->where(['username'=>$user])->find();
        $result['ctime'] = date('Y-m-d H:i:s',$result['ctime']);
        $this->assign('result',$result);
        $this->display();
    }

    /**
     * 用户资料保存
     * @author yxl 2017-5-25
     * @url /index.php/Admin/User/saveData
     *
     */
    public function saveData(){
        $model = M('user');
        $uid = $_SESSION['userId'];
        if(IS_AJAX){
            $data = array(
                'alias' => I('alias'),
                'avatar' => I('avatar'),
                'signature' => I('signature')
            );
            $result = $model->where(['id'=>$uid])->save($data);
            if( $result ){
                jsonReturn('保存成功',1);
            }else{
                jsonReturn('保存失败',0);
            }
        }

    }

    /**
     * 头像处理
     * @author yxl 2017-5-25
     * @url /index.php/Admin/User/avatar
     *
     */
    public function avatar(){
        if (!empty($_FILES)) {
            //图片上传设置
            $config = array(
                'maxSize'    =>    3145728,
                'savePath'   =>    '',
                'saveName'   =>    array('uniqid',''),
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub'    =>    true,
                'subName'    =>    array('date','Ymd'),
                'rootPath'   =>    './Uploads/avatar/',
                'savePath'   =>    ''
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            // 上传文件
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                jsonReturn('上传失败',0);
            } else {// 上传成功
                //取得图片路径
                $imgUrl = './Uploads/avatar/'.$info['file']['savepath'].$info['file']['savename'];
                $urlInfo['img'] = substr($imgUrl,1);
                jsonReturn('上传成功',1,$urlInfo);
            }
        }
    }





}