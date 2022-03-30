<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\ApplyOrderRefund();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\ApplyOrderRefundRequest();
    $params->accessToken = "20.873c2426c53c84548d1efd7f6336ebd3.6537312.1244273866.483625-31274457"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->applyRefundMoney = 142; // 文档中对应字段：applyRefundMoney，实际使用时请替换成真实参数
    $params->bizRefundBatchId = ""; // 文档中对应字段：bizRefundBatchId，实际使用时请替换成真实参数
    $params->isSkipAudit = 0; // 文档中对应字段：isSkipAudit，实际使用时请替换成真实参数
    $params->orderId = 1063036654707; // 文档中对应字段：orderId，实际使用时请替换成真实参数
    $params->refundReason = "xxxxx"; // 文档中对应字段：refundReason，实际使用时请替换成真实参数
    $params->refundType = 1; // 文档中对应字段：refundType，实际使用时请替换成真实参数
    $params->tpOrderId = "1511674634347"; // 文档中对应字段：tpOrderId，实际使用时请替换成真实参数
    $params->userId = 1716134; // 文档中对应字段：userId，实际使用时请替换成真实参数
    $params->refundNotifyUrl = "xxxxx"; // 文档中对应字段：refundNotifyUrl，实际使用时请替换成真实参数
    $params->pmAppKey = "MMUpGO"; // 文档中对应字段：pmAppKey，实际使用时请替换成真实参数

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