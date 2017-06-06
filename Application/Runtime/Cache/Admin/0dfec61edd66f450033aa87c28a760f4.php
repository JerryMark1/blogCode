<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo ((isset($title ) && ($title !== ""))?($title ):'博客'); ?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="<?php echo (ADMIN_CSS); ?>/login2.css" rel="stylesheet" type="text/css" />

</head>
<body>
<h1>后台管理系统<sup>/v1</sup></h1>

<div class="login" style="margin-top:50px;">

    <div class="header">
        <div class="switch" id="switch"><a class="switch_btn_focus" id="switch_qlogin" href="javascript:void(0);" tabindex="7">快速登录</a>
            <a class="switch_btn" id="switch_login" href="javascript:void(0);" tabindex="8">快速注册</a><div class="switch_bottom" id="switch_bottom" style="position: absolute; width: 64px; left: 0px;"></div>
        </div>
    </div>


    <div class="web_qr_login" id="web_qr_login" style="display: block; height: 350px;">

        <!--登录-->
        <div class="web_login" id="web_login">


            <div class="login-box">
                <div id="loginCur" class="cue" style="margin:0;">登录提示</div>
                <div class="login_form" style="margin-top: 0">
                        <div class="uinArea" id="uinArea">
                            <label class="input-tips" for="u">帐号：</label>
                            <div class="inputOuter" id="uArea">

                                <input type="text" id="u"  class="inputstyle"/>
                            </div>
                        </div>
                        <div class="pwdArea" id="pwdArea">
                            <label class="input-tips" for="p">密码：</label>
                            <div class="inputOuter" id="pArea">

                                <input type="password" id="p"  class="inputstyle"/>
                            </div>
                        </div>
                    <div class="pwdArea" id="codeArea">
                        <label class="input-tips" for="p">验证码：</label>
                        <div class="inputOuter" id="cArea">
                            <input type="text" id="l_code" placeholder="验证码"   class="inputstyle" />
                            <img style="width:205px;" src="/index.php/Admin/Login/verify_c" class="J-code" title="点击刷新" alt="">
                        </div>
                    </div>


                        <div style="padding-left:70px;margin-top:50px;"><input type="button" id="J-login" value="登 录" style="width:200px;" class="button_blue"/></div>
                </div>

            </div>

        </div>
        <!--登录end-->
    </div>

    <!--注册-->
    <div class="qlogin" id="qlogin" style="display: none; ">

        <div class="web_login">
            <ul class="reg_form" id="reg-ul">
                <div id="userCue" class="cue">快速注册请注意格式</div>
                <li>

                    <label for="user"  class="input-tips2">用户名：</label>
                    <div class="inputOuter2">
                        <input type="text" id="user"  placeholder="请输入用户名" maxlength="12" class="inputstyle2"/>
                    </div>

                </li>

                <li>
                    <label for="passwd" class="input-tips2">密码：</label>
                    <div class="inputOuter2">
                        <input type="password" id="passwd" placeholder="请输入密码"  maxlength="16" class="inputstyle2"/>
                    </div>

                </li>
                <li>
                    <label for="passwd2" class="input-tips2">确认密码：</label>
                    <div class="inputOuter2">
                        <input type="password" id="passwd2" placeholder="确认密码"  maxlength="16" class="inputstyle2" />
                    </div>

                </li>
                <li>
                    <label for="passwd2" class="input-tips2">验证码：</label>
                    <div class="inputOuter2">
                        <input type="text" id="code" placeholder="验证码"   class="inputstyle2" />
                        <img style="width:215px;" src="/index.php/Admin/Login/verify_c" class="J-code" title="点击刷新" alt="">
                    </div>

                </li>

                <li>
                    <div class="inputArea">
                        <input type="button" id="reg"  style="margin-top:10px;margin-left:85px;width:200px" class="button_blue" value="快速注册"/>
                    </div>

                </li><div class="cl"></div>
            </ul>


        </div>


    </div>
    <!--注册end-->
</div>

</body>
<script src="<?php echo (ADMIN_JS); ?>/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="<?php echo (ADMIN_JS); ?>/login.js"></script>
</html>