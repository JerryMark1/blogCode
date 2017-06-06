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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> 文章列表</h3>
                        </div>
                        <div class="panel-body">
                            <div style="margin-bottom: 10px;">
                                <a class="btn btn-primary" href="<?php echo U('Admin/Article/article_add');?>">添加文章</a>
                                <a class="btn btn-primary" href="<?php echo U('Admin/Article/article_classify');?>">文章分类管理</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped"
                                       style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th style="text-align:center;">序号</th>
                                        <th style="text-align:center;">作者</th>
                                        <th style="text-align:center;">文章标题</th>
                                        <th style="text-align:center;">文章简介</th>
                                        <th style="text-align:center;">所属分类</th>
                                        <th style="text-align:center;">发布人</th>
                                        <th style="text-align:center;">更新时间</th>
                                        <th style="text-align:center;">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody id="J-content">
                                    <!-- <?php if(is_array($result)): foreach($result as $k=>$v): ?><tr data-id="<?php echo ($v["id"]); ?>">
                                             <td><?php echo ($v["id"]); ?></td>
                                             <td><?php echo ($v["author"]); ?></td>
                                             <td><?php echo ($v["title"]); ?></td>
                                             <td><?php echo ($v["descript"]); ?></td>
                                             <?php if($v["categoryName"] != ''): ?><td><?php echo ($v["categoryName"]); ?></td>
                                                 <?php else: ?>
                                                 <td>暂无分类</td><?php endif; ?>
                                             <td><?php echo ($v["author"]); ?></td>
                                             <td><?php echo (date("Y-m-d h:i:s",$v["ctime"])); ?></td>
                                             <td> <a href="/index.php/Admin/Article/article_modify/aid/<?php echo ($v["id"]); ?>">修改</a> | <a href="javascript:;" class="J-del">删除</a></td>
                                         </tr><?php endforeach; endif; ?>-->

                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right">
                                <ul id="example"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">提示</h4>
            </div>
            <div class="modal-body" id="modal-cont">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="J-ok">ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel2">提示</h4>
            </div>
            <div class="modal-body" id="modal-cont2">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="J-ok2">ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!-- jQuery -->
<script src="<?php echo (ADMIN_JS); ?>/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo (ADMIN_JS); ?>/bootstrap.min.js"></script>
<script src="<?php echo (ADMIN_JS); ?>/bootstrap-paginator.js"></script>
<script>
    $(function () {

        //分页

        function AjaxPaginator(obj) {
            $.ajax({
                type: 'POST',
                url: '/index.php/Admin/Article/article_list',
                dataType: 'JSON',
                data: {page: 1},
                success: function (data) {
                    var list = data.list;
                    if (data.code == 1) {
                        if (list) {
                            var _html = '';
                            $.each(list, function (v, k) {
                                var tagName = '';
                                _html += '<tr data-id="' + k.id + '">\
                                                       <td>' + k.id + '</td>\
                                                <td>' + k.author + '</td>\
                                                <td>' + k.title + '</td>\
                                                <td>' + k.descript + '</td>\
                                                <td>' + k.categoryName + '</td>\
                                                    <td>' + k.author + '</td>\
                                                <td>' + k.ctime + '</td>\
                                                <td> <a href="/index.php/Admin/Article/article_modify/aid/' + k.id + '">修改</a> | <a href="javascript:;" class="J-del">删除</a></td>\
                                                    </tr>';
                            })
                            $('#J-content').html(_html);
                        } else {
                            $('#J-content').html('暂无记录');
                        }

                    }

                    var currentPage = data.currentPage || 1;
                    var totalPages = data.curren.totalPages || 10;
                    var options = {
                        currentPage: currentPage, //当前页
                        totalPages: totalPages, //总页数
                        numberOfPages: 5, //设置控件显示的页码数
                        bootstrapMajorVersion: 3,//如果是bootstrap3版本需要加此标识，并且设置包含分页内容的DOM元素为UL,如果是bootstrap2版本，则DOM包含元素是DIV
                        useBootstrapTooltip: false,//是否显示tip提示框
                        itemTexts: function (type, page, current) {
                            //文字翻译
                            switch (type) {
                                case "first":
                                    return "首页";
                                case "prev":
                                    return "上一页";
                                case "next":
                                    return "下一页";
                                case "last":
                                    return "尾页";
                                case "page":
                                    return page;
                            }
                        },
                        onPageClicked: function (event, originalEvent, type, page) {
                            $.ajax({
                                url: '/index.php/Admin/Article/article_list', //点击分页提交当前页码
                                type: 'post',
                                dataType: 'json',
                                data: {page: page},
                                success: function (res) {
                                    var list = res.list;
                                    if (res.code == 1) {
                                        if (list) {
                                            var _html = '';
                                            $.each(list, function (v, k) {
                                                var tagName = '';
                                                if (k.categoryName) {
                                                    tagName = '<td>' + k.categoryName + '</td>';
                                                } else {
                                                    tagName = '暂无分类';
                                                }
                                                _html += '<tr data-id="' + k.id + '">\
                                                       <td>' + k.id + '</td>\
                                                <td>' + k.author + '</td>\
                                                <td>' + k.title + '</td>\
                                                <td>' + k.descript + '</td>\
                                                ' + tagName + '\
                                                    <td>' + k.author + '</td>\
                                                <td>' + k.ctime + '</td>\
                                                <td> <a href="/index.php/Admin/Article/article_modify/aid/' + k.id + '">修改</a> | <a href="javascript:;" class="J-del">删除</a></td>\
                                                    </tr>';
                                            })
                                            $('#J-content').html(_html);
                                        } else {
                                            $('#J-content').html('暂无记录');
                                        }

                                    }
                                }
                            })
                        }
                    }
                    obj.bootstrapPaginator(options);
                }
            })
        }

        AjaxPaginator($('#example'));


        function showDialog(data, isHide, fn) {
            var isHide = isHide ? true : false;
            $('#modal-cont').text(data);
            $('#myModal').modal('show');
            if (isHide) {
                $('#J-ok').on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    $('#myModal').modal('hide');
                    fn();

                })
            } else {
                $('#J-ok').on('click', function () {
                    $('#myModal').modal('hide');
                })
            }

        }


        $('.J-del').on('click', function () {
            var self = $(this),
                    id = self.parents('tr').attr('data-id');
            showDialog('你真的确定删除这篇文章吗?', true, function () {
                $.ajax({
                    url: '/index.php/Admin/Article/article_del',
                    type: 'post',
                    dataType: 'json',
                    data: {id: id}
                }).then(function (res) {
                    console.log(res);
                    if (res.code == 1) {

                        $('#modal-cont2').text(res.msg);
                        $('#myModal2').modal('show');
                        $('#J-ok2').on('click', function () {
                            window.location.reload();
                        });

                    } else {
                        showDialog('删除失败');
                    }
                })
            });


        })
    })
</script>


</body>

</html>