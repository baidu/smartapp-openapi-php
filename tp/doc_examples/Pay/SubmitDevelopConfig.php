<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . '/../bootstrap.php';

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\Pay\SubmitDevelopConfig();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\Pay\SubmitDevelopConfigRequest();
    $params->accessToken = "#token"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->tpPublicKey = "MIGfMA1GCSqGSIb7DQEBAQUAA7GNADCBiQKBgQC5ZbnSK0EeCMFq2KUdp3hyd8ExvfPYy26berLkjm1eKX5swDq0nF+bpCtM28+4pssRuoypaBIOTP0nf+Qpd6p8yP7kMQF4GbUy7t6kZzs5lqpGe2RZ/0ehVKIyLlCEgm2cUMFGKyLH48XL1QcQkqAJjinbjgYjtvt4Ms+VCmmolwIDAQAB"; // 文档中对应字段：tp_public_key，实际使用时请替换成真实参数
    $params->payNotifyUrl = "https://www.baidu.com"; // 文档中对应字段：pay_notify_url，实际使用时请替换成真实参数
    $params->refundAuditUrl = "https://www.baidu.com"; // 文档中对应字段：refund_audit_url，实际使用时请替换成真实参数
    $params->refundSuccUrl = "https://www.baidu.com"; // 文档中对应字段：refund_succ_url，实际使用时请替换成真实参数

    if ($obj->doRequest($params)){
        // 如果请求成功 可以直接通过 getData 方法获取到返回结构体里的 data 字段值
        var_dump($obj->getData());
    } else {
        // 如果请求失败 可以直接通过 getErrMsg 方法获取到报错信息，辅助问题定位
        var_dump($obj->getErrMsg());
    }
    // 请求成功或失败，都可以通过 getResponse 方法获取到原始响应信息
    var_dump($obj->getResponse());
}
main();