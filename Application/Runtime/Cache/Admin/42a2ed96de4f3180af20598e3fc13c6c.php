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

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo U('Admin/Article/article_list');?>">文章管理</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> 文章分类管理
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#identifier" data-toggle="tab" >添加文章分类</a></li>
                    <li><a href="#identifier" data-toggle="tab">修改文章分类</a></li>
                    <li><a href="#identifier" data-toggle="tab">删除文章分类</a></li>
                </ul>
            </div>

            <div class="row tab" style="margin-top: 20px;">
                <div class="col-lg-12">
                    <form role="form">
                        <div class="form-group">
                            <label>分类名称</label>
                            <input class="form-control" id="J-name" placeholder="请输入文章分类名称">
                        </div>

                        <button type="button" id="J-add" class="btn btn-default">添加</button>

                    </form>

                </div>
            </div>
            <div class="row tab" style="display: none;margin-top: 20px;">
                <div class="col-lg-12">
                    <form role="form" id="J-adfy-form">
                        <?php if($result != ''): ?><div class="form-group">

                                <label>请选择要修改的分类名称</label>
                                <select class="form-control" name="id" id="">
                                    <?php if(is_array($result)): foreach($result as $k=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['category_name']); ?></option><?php endforeach; endif; ?>
                                </select>
                        </div>
                           <div class="form-group">
                               <label>修改后的分类名称</label>
                               <input type="text" class="form-control" id="cate-name" placeholder="请填写修改后的分类名称" name="category_name">
                           </div>
                            <?php else: ?>
                            <div class="jumbotron">
                                暂无分类修改
                            </div><?php endif; ?>

                        <button type="button" id="J-adfily" class="btn btn-default">修改</button>

                    </form>

                </div>
            </div>
            <div class="row tab tab2" style="display: none;margin-top: 20px;">
                <div class="col-lg-12">

                    <form role="form" id="J-form2">

                        <div class="form-group">
                            <label>分类名称</label>

                            <?php if(empty($result)): ?><div class="jumbotron">
                                    暂无分类
                                </div>
                                <?php else: ?>
                                <?php if(is_array($result)): foreach($result as $k=>$v): ?><div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="J-check" name="ids[]" value=" <?php echo ($v["id"]); ?>">
                                            <?php echo ($v["category_name"]); ?>
                                        </label>
                                    </div><?php endforeach; endif; endif; ?>
                        </div>

                        <button type="button" id="J-adify" class="btn btn-default">删除</button>

                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
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

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo (ADMIN_JS); ?>/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo (ADMIN_JS); ?>/bootstrap.min.js"></script>
<script>

    function ajaxSubmit(url, frm, fn, type) {
        type = type ? type : 'json';
        var dataPara = getFormJson(frm);
        $.ajax({
            url: url,
            type: "post",
            data: dataPara,
            async: false,
            dataType: type,
            success: fn
        });
    }


    //将form中的值转换为键值对
    function getFormJson(frm) {
        var o = {};
        var a = $(frm).serializeArray();
        $.each(a, function () {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    }

    function showDialog(data,isHide,fn){
        var isHide = isHide ? true : false;
        $('#modal-cont').text(data);
        $('#myModal').modal('show');
        if(isHide){
            $('#J-ok').on('click',function(){
                $('#myModal').modal('hide');
                fn();
            })
        }else{
            $('#J-ok').on('click',function(){
                $('#myModal').modal('hide');
            })
        }

    }

    //tab
    function Tab(menuBox, ele, showBox, className) {
        $(menuBox).find(ele).click(function () {
            var index = $(this).index();
            className ? $(this).addClass(className).siblings().removeClass(className) : '';
            $(showBox).hide().eq(index).show();
        });
    }


    $(function(){
        //tab
        Tab('.nav-tabs','li','.tab','active');


        //分类添加
        $('#J-add').on('click',function(){
            var name = $('#J-name').val();
            if(!name){
                showDialog('分类名称不能为空');
            }
            $.ajax({
                url:'/index.php/Admin/Article/article_classify_add',
                type:'post',
                dataType:'json',
                data:{name:name}
            }).then(function( res ){
               if( res.code == 1){
                   showDialog(res.msg,true,function(){
                       window.location.href = '/index.php/Admin/Article/article_list';
                   });
                }else{
                   showDialog(res.msg);
               }
            })
        });


        //分类修改
        $('#J-adfily').on('click',function(){
            var name = $('#cate-name').val();
            if(!name){
                showDialog('请填写修改后的分类名称');
                return;
            }
            ajaxSubmit('/index.php/Admin/Article/article_classify_modification','#J-adfy-form',function(res){
                if( res.code ==1){
                    showDialog(res.msg);
                    setTimeout(function(){
                        window.location.href = '/index.php/Admin/Article/article_list';
                    },3000)
                }else{
                    showDialog(res.msg);
                }
            })
        });


        //分类删除
        $('#J-adify').on('click',function(){
            if($('input[class="J-check"]:checked').length > 0){
                showDialog('删除了该分类，该分类下的文章也会删除，是否删除？',true,function(){
                    ajaxSubmit('/index.php/Admin/Article/article_classify_del','#J-form2',function( res ){
                        if( res.code == 1){
                            showDialog( res.msg);
                            setTimeout(function(){
                                window.location.href = '/index.php/Admin/Article/article_list';
                            },3000);

                        }else{
                            showDialog( res.msg );
                        }
                    })
                });
            }else{
                showDialog('先选择要删除的分类');
            }
        })



    })
</script>


</body>

</html>