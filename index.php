<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

//调试函数
function show_bug($msg){
    echo "<pre style='color:red!important;'>";
    var_dump($msg);
    echo "</pre>";
}

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
// 定义应用目录
define('APP_PATH','./Application/');
//定义后台js、css、img 常量路径
define('ADMIN_JS','/Public/Admin/assets/js');
define('ADMIN_CSS','/Public/Admin/assets/css');
define('ADMIN_IMG','/Public/Admin/assets/img');
define('ADMIN_FONT','/Public/Admin/assets/fonts');

//配置ueditor
define('UE_SRC','/Public/Ueditor/');


// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单