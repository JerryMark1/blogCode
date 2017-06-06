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
<link rel="stylesheet" href="<?php echo (ADMIN_CSS); ?>/webuploader.css">
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
                            <i class="fa fa-edit"></i> 文章修改
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">

                    <form role="form" id="J-add-form">

                        <div class="form-group">
                            <label>文章标题</label>
                            <input class="form-control" name="title" value="<?php echo ($result["title"]); ?>" id="title" placeholder="请输入文章标题">
                        </div>

                        <div class="form-group">
                            <label>文章所属分类</label>
                            <select class="form-control" name="fid">
                               <?php if(is_array($list)): foreach($list as $k=>$v): if(($v["id"]) == $result["fid"]): ?><option value="<?php echo ($v["id"]); ?>" selected><?php echo ($v["category_name"]); ?></option>
                                       <?php else: ?>
                                       <option value="<?php echo ($v["id"]); ?>"><?php echo ($v["category_name"]); ?></option><?php endif; endforeach; endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>文章缩略图</label>
                            <div id="uploader-demo">
                                <!--用来存放item-->
                                <div id="fileList" class="uploader-list">
                                    <img src="<?php echo ($result["picthum"]); ?>" alt="">
                                </div>
                                <div id="filePicker">选择图片</div>
                            </div>
                            <input type="hidden" name="picurl" id="J-picurl">
                            <input type="hidden" name="picthum" id="J-picthum">
                        </div>
                        <div class="form-group">
                            <label>标签云</label>
                            <input class="form-control" name="tag" value="<?php echo ($result["tag"]); ?>" placeholder="多个用逗号隔开">
                        </div>
                        <div class="form-group">
                            <label>内容概要</label>
                            <!--<input class="form-control" placeholder="请输入内容概要">-->
                            <textarea class="form-control"  id="J-descript" name="descript"  cols="30" rows="10" placeholder="请输入内容概要"><?php echo ($result["descript"]); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>文章内容</label>
                            <script id="editor" type="text/plain" style="width:1024px;height:500px;">
                                <div id="J-h-cs"><?php echo ($result["content"]); ?></div>
                            </script>
                            <input type="hidden" name="content"  id="J-h-c"  value="">
                        </div>

                        <input type="hidden" value="<?php echo ($result["id"]); ?>" name="aid">
                        <button type="button" id="J-add" class="btn btn-default">修改</button>


                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>


    </div>
    <!-- /#page-wrapper -->

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



<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo (ADMIN_JS); ?>/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo (ADMIN_JS); ?>/bootstrap.min.js"></script>
<script src="<?php echo (ADMIN_JS); ?>/webuploader.min.js"></script>

<script type="text/javascript" charset="utf-8" src="<?php echo (UE_SRC); ?>ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo (UE_SRC); ?>ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="<?php echo (UE_SRC); ?>lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
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


    $(function(){
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,
            crop:true,
            fileNumLimit:1,
            duplicate :true,

            // swf文件路径

            // 文件接收服务端。
            server: '/index.php/Admin/Article/uploadPic',

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',


            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });

        // 当有文件添加进来的时候
        uploader.on( 'fileQueued', function( file ) {
            var $li = $(
                            '<div id="' + file.id + '" class="file-item thumbnail">' +
                            '<img>' +
                            '<div class="info">' + file.name + '</div>' +
                            '</div>'
                    ),
                    $img = $li.find('img');


            // $list为容器jQuery实例
            $('#fileList').html( $li );

            // 创建缩略图
            // 如果为非图片文件，可以不用调用此方法。
            // thumbnailWidth x thumbnailHeight 为 100 x 100
            uploader.makeThumb( file, function( error, src ) {
                if ( error ) {
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }

                $img.attr( 'src', src );
            }, 400, 200 );
        });

        // 文件上传过程中创建进度条实时显示。
        uploader.on( 'uploadProgress', function( file, percentage ) {
            var $li = $( '#'+file.id ),
                    $percent = $li.find('.progress span');

            // 避免重复创建
            if ( !$percent.length ) {
                $percent = $('<p class="progress"><span></span></p>')
                        .appendTo( $li )
                        .find('span');
            }

            $percent.css( 'width', percentage * 100 + '%' );
        });

// 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on( 'uploadSuccess', function( file,res ) {
            console.log( res );
            $( '#'+file.id ).addClass('upload-state-done');
            if(res.code == 1){
                $('#J-picurl').val( res.data.img );
                $('#J-picthum').val( res.data.img_m );
            }
        });

// 文件上传失败，显示上传出错。
        uploader.on( 'uploadError', function( file,response ) {
            var $li = $( '#'+file.id ),
                    $error = $li.find('div.error');

            // 避免重复创建
            if ( !$error.length ) {
                $error = $('<div class="error"></div>').appendTo( $li );
            }

            $error.text('上传失败');
        });

// 完成上传完了，成功或者失败，先删除进度条。
        uploader.on( 'uploadComplete', function( file ) {
            $( '#'+file.id ).find('.progress').remove();
        });




        $('#J-add').on('click',function(){
            var content = ue.getContent(),
                    title = $('#title').val(),
                    desc = $('#J-descript').val();
            $('#J-h-c').val( content );
            if(!content){
                $('#modal-cont').text('文章内容不能为空');
                $('#myModal').modal('show');
                return
            }
            if(!title){
                $('#modal-cont').text('文章标题不能为空');
                $('#myModal').modal('show');
                return
            }
            if(!desc){
                $('#modal-cont').text('文章描述不能为空');
                $('#myModal').modal('show');
                return
            }

            ajaxSubmit('/index.php/Admin/Article/article_modify','#J-add-form',function( res ){
                  if( res.code == 1){
                      $('#modal-cont').text(res.msg);
                      $('#myModal').modal('show');

                      $('#J-ok').on('click',function(){
                          $('#myModal').modal('hide');
                          window.location.href = '/index.php/Admin/Article/article_list';
                      })

                  }else{
                      console.log(0);
                      $('#modal-cont').text(res.msg);
                      $('#myModal').modal('show');
                  }
            })
        })
    })
</script>


</body>

</html>