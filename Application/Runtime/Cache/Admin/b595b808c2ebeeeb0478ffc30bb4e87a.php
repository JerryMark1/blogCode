<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ((isset($title ) && ($title !== ""))?($title ):'博客'); ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo (ADMIN_CSS); ?>/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo (ADMIN_CSS); ?>/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->

    <!-- Custom Fonts -->
    <link href="<?php echo (ADMIN_FONT); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">后台管理系统</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">
               <!-- <li class="message-preview">
                    <a href="#">
                        <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong><?php echo (session('username')); ?></strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>-->
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
              <!--  <li>
                    <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                </li>-->
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo (session('userName')); ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="/index.php/Admin/Login/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <!--<li class="active">
                <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
            </li>
            <li>
                <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
            </li>-->
            <li>
                <a href="<?php echo U('Admin/Article/article_list');?>"><i class="fa fa-fw fa-edit"></i> 文章管理</a>
            </li>
           <!-- <li>
                <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
            </li>
            <li>
                <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
            </li>
            <li>
                <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
            </li>-->
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
</body>
</html>
    <div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="page-header">
                <h1> <small>欢迎登录CMS管理系统后台</small></h1>
            </div>
            <div class="jumbotron">
                <p>
                    系统信息
                </p>
                <p>
                    服务器域名:<?php echo ($_SERVER["HTTP_HOST"]); ?>
                </p>
                <p>
                    客户端ip:<?php echo ($_SERVER['REMOTE_ADDR']); ?>
                </p>
                <p>
                    服务器语言:<?php echo ($_SERVER['HTTP_ACCEPT_LANGUAGE']); ?>
                </p>
                <p>
                    系统类型及版本号:<?php echo (PHP_UNAME()); ?>
                </p>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo (ADMIN_JS); ?>/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo (ADMIN_JS); ?>/bootstrap.min.js"></script>


</body>

</html>