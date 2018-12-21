<?php
// 您的 API Token，在用户中心可查询到
$apiToken = "********************************";
// 需要检测的地址或域名
$reqUrl = "www.qq.com";
$url = sprintf("https://wx.horocn.com/api/v1/wxUrlCheck?api_token=%s&req_url=%s", $apiToken, $reqUrl);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$responseBody = curl_exec($ch);
$responseArr = json_decode($responseBody, true);
if (json_last_error() != JSON_ERROR_NONE) {
    echo "JSON 解析接口结果出错\n";
    return;
}
if (isset($responseArr['code']) && $responseArr['code'] == 0) {
    // 接口正确返回
    // $responseArr['data']['status'] 的取值范围：ok、blocked
    // ok 表示正常、blocked 表示被封
    printf("测试地址（%s）的状态为：%s\n", $reqUrl, $responseArr['data']['status']);
} else {
    printf("接口异常：%s\n", var_export($responseArr, true));
}
