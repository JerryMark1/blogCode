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