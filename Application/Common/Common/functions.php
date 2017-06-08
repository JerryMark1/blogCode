<?php

/**
 * json接口返回
 * @author yxl 2017-5-27
 *
 */
function jsonReturn($msg,$code = 1,$data = null){
    $result = [
        'msg' => $msg,
        'code' => $code,
        'data' => $data,
    ];
    header('Content-Type:application/json; charset=utf-8');
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit();
}

/**
 * json分页
 * @author yxl 2017-6-2
 *
 */
function jsonList($msg,$code = 1,$data = null,$curren){
    if(count($data) == 0)
        $data = null;
    $result = [
        'msg' => $msg,
        'code' => $code,
        'list' => $data,
    ];
    if($curren)
        $result['curren'] = $curren;

    header('Content-Type:application/json; charset=utf-8');
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit();
}

/**
 * 检测验证码
 * @author yxl 2017-5-27
 *
 */
function check_verify($code, $id = ""){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

/**
 * 获取文章pv
 * @author yxl 2017-6-8
 */
 function getPv($id){
    if(!empty($id)){
        $article = M('article');
        $res = $article->field('pv')->where(['id'=>$id])->find();
        $res['pv'] = intval($res['pv']);
        $res['pv'] += 1;
        $res = $article->where(['id'=>$id])->save(['pv'=>$res['pv']]);
        if( $res ){
            return true;
        }else{
            return false;
        }
    }
}

/**
 * 获取用户ip
 * @author yxl 2017-6-8
 */
function getIp() {
    if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    }
    elseif (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    }
    elseif (getenv('HTTP_X_FORWARDED')) {
        $ip = getenv('HTTP_X_FORWARDED');
    }
    elseif (getenv('HTTP_FORWARDED_FOR')) {
        $ip = getenv('HTTP_FORWARDED_FOR');

    }
    elseif (getenv('HTTP_FORWARDED')) {
        $ip = getenv('HTTP_FORWARDED');
    }
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function cn_substrr($str,$slen,$startdd=0)
{
    $str = cn_substr(stripslashes($str),$slen,$startdd);
    return addslashes($str);
}
//中文截取2，单字节截取模式
function cn_substr($str,$slen,$startdd=0)
{
    global $cfg_soft_lang;
    if($cfg_soft_lang=='utf-8')
    {
        return cn_substr_utf8($str,$slen,$startdd);
    }
    $restr = '';
    $c = '';
    $str_len = strlen($str);
    if($str_len < $startdd+1)
    {
        return '';
    }
    if($str_len < $startdd + $slen || $slen==0)
    {
        $slen = $str_len - $startdd;
    }
    $enddd = $startdd + $slen - 1;
    for($i=0;$i<$str_len;$i++)
    {
        if($startdd==0)
        {
            $restr .= $c;
        }
        else if($i > $startdd)
        {
            $restr .= $c;
        }
        if(ord($str[$i])>0x80)
        {
            if($str_len>$i+1)
            {
                $c = $str[$i].$str[$i+1];
            }
            $i++;
        }
        else
        {
            $c = $str[$i];
        }
        if($i >= $enddd)
        {
            if(strlen($restr)+strlen($c)>$slen)
            {
                break;
            }
            else
            {
                $restr .= $c;
                break;
            }
        }
    }
    return $restr;
}
//utf-8中文截取，单字节截取模式
function cn_substr_utf8($str, $length, $start=0)
{
    if(strlen($str) < $start+1)
    {
        return '';
    }
    preg_match_all("/./su", $str, $ar);
    $str = '';
    $tstr = '';
//为了兼容mysql教程4.1以下版本,与数据库教程varchar一致,这里使用按字节截取
    for($i=0; isset($ar[0][$i]); $i++)
    {
        if(strlen($tstr) < $start)
        {
            $tstr .= $ar[0][$i];
        }
        else
        {
            if(strlen($str) < $length + strlen($ar[0][$i]) )
            {
                $str .= $ar[0][$i];
            }
            else
            {
                break;
            }
        }
    }
    return $str;
}