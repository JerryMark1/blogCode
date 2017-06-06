<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <script src="/Public/js/jquery-1.12.3.min.js"></script>
</head>
<body>
      <!--<span>
        姓名:<?php if(($age) == $age): ?>正常<?php echo ($age); else: ?>不正常<?php endif; ?><br/>
          名字:<?php if($age <= 50): ?>正常<?php echo ($age); else: ?>不正常<?php endif; ?>
      </span>-->
    <ul>
        <li>姓名: <input type="text" name="name" id="name"></li>
        <li>年龄: <input type="text" name="age" id="age"></li>
        <li><input type="button" value="注册" id="J-register"></li>
    </ul>

<script>
    $(function(){
        $('#J-register').on('click',function(){
            var name =$('#name').val();
            var age = $('#age').val();
            $.ajax({
                url:'/index.php/Home/Register/registerUser',
                type:'post',
                dataType:'json',
                data:{name:name,age:age},
                success:function( res ){
                    if( res.code == 1){
                        alert('注册成功');
                    }else{
                        alert( res.msg );
                    }
                }
            })
        })

    })
</script>
</body>
</html>