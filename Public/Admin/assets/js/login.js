$(function(){
	
	$('#switch_qlogin').click(function(){
		$('#userCue').html("快速注册请注意格式");
		$('#loginCur').html("登录提示");
		$('#switch_login').removeClass("switch_btn_focus").addClass('switch_btn');
		$('#switch_qlogin').removeClass("switch_btn").addClass('switch_btn_focus');
		$('#switch_bottom').animate({left:'0px',width:'70px'});
		$('#qlogin').css('display','none');
		$('#web_qr_login').css('display','block');
		
		});
	$('#switch_login').click(function(){
		$('#userCue').html("快速注册请注意格式");
		$('#loginCur').html("登录提示");
		$('#switch_login').removeClass("switch_btn").addClass('switch_btn_focus');
		$('#switch_qlogin').removeClass("switch_btn_focus").addClass('switch_btn');
		$('#switch_bottom').animate({left:'154px',width:'70px'});
		
		$('#qlogin').css('display','block');
		$('#web_qr_login').css('display','none');
		});
if(getParam("a")=='0')
{
	$('#switch_login').trigger('click');
}

	});
	
function logintab(){
	scrollTo(0);
	$('#switch_qlogin').removeClass("switch_btn_focus").addClass('switch_btn');
	$('#switch_login').removeClass("switch_btn").addClass('switch_btn_focus');
	$('#switch_bottom').animate({left:'154px',width:'96px'});
	$('#qlogin').css('display','none');
	$('#web_qr_login').css('display','block');

}


//根据参数名获得该参数 pname等于想要的参数名
function getParam(pname) {
    var params = location.search.substr(1); // 获取参数 平且去掉？
    var ArrParam = params.split('&');
    if (ArrParam.length == 1) {
        //只有一个参数的情况
        return params.split('=')[1];
    }
    else {
         //多个参数参数的情况
        for (var i = 0; i < ArrParam.length; i++) {
            if (ArrParam[i].split('=')[0] == pname) {
                return ArrParam[i].split('=')[1];
            }
        }
    }
}


var reMethod = "GET",
	pwdmin = 6;

$(document).ready(function() {


	$('#reg').click(function() {
		var user = $.trim($("#user").val()),
				pw = $.trim($("#passwd").val()),
				pw2 = $.trim($("#passwd2").val()),
				code = $.trim($('#code').val());

		if ($('#user').val() == "") {
			$('#user').focus().css({
				border: "1px solid red",
				boxShadow: "0 0 2px red"
			});
			$('#userCue').html("<font color='red'><b>×用户名不能为空</b></font>");
			return false;
		}



		if ($('#user').val().length < 3 || $('#user').val().length > 16) {

			$('#user').focus().css({
				border: "1px solid red",
				boxShadow: "0 0 2px red"
			});
			$('#userCue').html("<font color='red'><b>×用户名位3-16字符</b></font>");
			return false;

		}



		if ($('#passwd').val().length < pwdmin) {
			$('#passwd').focus();
			$('#userCue').html("<font color='red'><b>×密码不能小于" + pwdmin + "位</b></font>");
			return false;
		}
		if ($('#passwd2').val() != $('#passwd').val()) {
			$('#passwd2').focus();
			$('#userCue').html("<font color='red'><b>×两次密码不一致！</b></font>");
			return false;
		}

		if ($('#code').val() == "") {
			$('#code').focus().css({
				border: "1px solid red",
				boxShadow: "0 0 2px red"
			});
			$('#userCue').html("<font color='red'><b>×验证码不能为空</b></font>");
			return false;
		}


		$.ajax({
			url: '/index.php/Admin/Login/isRegister',
			type: "post",
			dataType:'json',
			data: {username:user}
		}).then(function( res ){
				if (res.code == 0) {
					$('#user').focus().css({
						border: "1px solid red",
						boxShadow: "0 0 2px red"
					});$("#userCue").html(res.msg);
					return false;
				} else {
					$('#user').css({
						border: "1px solid #D7D7D7",
						boxShadow: "none"
					});
				}
		}).then(function(){
			$.ajax({
				url: '/index.php/Admin/Login/register',
				type: "post",
				dataType:'json',
				data: {username:user,password:pw,config:pw2,code:code},
				success: function( res ) {
					if (res.code == 0) {
						$('#userCue').html("<font color='red'><b>×"+res.msg+"</b></font>");
						return false;
					} else {
						$('#userCue').html("<font color='red'><b>注册成功,请登录</b></font>");

					}

				}
			});
		});




	});


	//登录
	$('#J-login').on('click',function(){
		var username = $.trim($('#u').val()),
				password =  $.trim($('#p').val()),
				code = $.trim($('#l_code').val());
		if(!username){
			$('#loginCur').html("<font color='red'><b>×用户名必须</b></font>");
			return
		}
		if(!password){
			$('#loginCur').html("<font color='red'><b>×密码必须</b></font>");
			return
		}
		$.ajax({
			url:'/index.php/Admin/Login/login',
			type:'post',
			dataType:'json',
			data:{username:username,password:password,code:code}
		}).then(function( res ){
			console.log( res );
			if( res.code == 1 ){
				window.location.href = '/index.php/Admin/Index/index';
			}else{
				$('#loginCur').html("<font color='red'><b>×"+res.msg+"</b></font>");
			}
		})
	})

	//验证码
		$('.J-code').on('click',function(){
			// 验证码生成
			var self = $(this);
			var verifyimg = self.attr("src");
			self.attr('title', '点击刷新');
				if( verifyimg.indexOf('?') > 0){
					$(this).attr("src", verifyimg+'&random='+Math.random());
				}else{
					$(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
				}

		})


});