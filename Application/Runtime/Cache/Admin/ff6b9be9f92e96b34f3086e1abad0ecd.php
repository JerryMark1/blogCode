<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true">
    <meta content="telephone=no" name="format-detection">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="favicon.png" />
    <!--[if (gt IE 9)|!(IE)]><!-->
    <!-- custom CSS -->
    <link href="<?php echo (ADMIN_CSS); ?>/main.css" rel="stylesheet" type="text/css" />
    <!-- END custom CSS -->
    <!--<![endif]-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>404 Page</title>
</head>
<body>
<div class="wrapper-sticky-footer">
    <div class="content-sticky">
        <!-- Content-->
        <div class="wrap-error">
            <div class="error clearfix">
                <div class="error__left">
                    <p class="error__text">404</p>
                </div>
                <div class="error__right">
                    <div class="error__head">Page not found...</div>
                    <p class="error__text">We're sorry, but we can't find the page you were looking for. It's probably some thing we've done wrong but now we know about it we'll try to fix it. In the meantime, try one of this options:</p>
                    <ul class="error__list">
                        <li>
                            <a href="#" class="link">Go back to previous page</a>
                        </li>
                        <li>
                            <a href="index.html" class="link">Go to homepage</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END content-->
    </div>

</div>
<!-- END Footer -->
<!-- All JavaScript libraries -->
<!-- jQuery -->
<script src="<?php echo (ADMIN_JS); ?>/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo (ADMIN_JS); ?>/bootstrap.min.js"></script>
<!-- Custom JavaScript -->
<script src="<?php echo (ADMIN_JS); ?>/main.js"></script>
</body>
</html>