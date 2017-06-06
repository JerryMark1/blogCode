<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
</head>
<body>
<ul>
    <?php if(is_array($result)): foreach($result as $k=>$v): ?><li>
            <p>文章标题:<?php echo ($v["title"]); ?></p>
            <p>作者：<?php echo ($v["author"]); ?>时间:<?php echo (date("Y-m-d h:i:s",$v["ctime"])); ?>标签:<?php echo ($v["tag"]); ?>分类:<?php echo ($v["fid"]); ?></p>
            文章内容:
            <div>
                <?php echo ($v["content"]); ?>
            </div>
        </li><?php endforeach; endif; ?>
</ul>

<div>

</div>
</body>
</html>