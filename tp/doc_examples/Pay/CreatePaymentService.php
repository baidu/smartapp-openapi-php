<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . '/../bootstrap.php';

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\Pay\CreatePaymentService();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\Pay\CreatePaymentServiceRequest();
    $params->accessToken = "#token"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->appName = "app_name"; // 文档中对应字段：app_name，实际使用时请替换成真实参数
    $params->servicePhone = "17824433130"; // 文档中对应字段：service_phone，实际使用时请替换成真实参数
    $params->bankAccount = "bank_account"; // 文档中对应字段：bank_account，实际使用时请替换成真实参数
    $params->bankCard = "10636807841025"; // 文档中对应字段：bank_card，实际使用时请替换成真实参数
    $params->bankName = "招商银行"; // 文档中对应字段：bank_name，实际使用时请替换成真实参数
    $params->bankBranch = "招商银行北京上地支行"; // 文档中对应字段：bank_branch，实际使用时请替换成真实参数
    $params->openProvince = "广东省"; // 文档中对应字段：open_province，实际使用时请替换成真实参数
    $params->openCity = "深圳市"; // 文档中对应字段：open_city，实际使用时请替换成真实参数
    $params->paymentDays = 7; // 文档中对应字段：payment_days，实际使用时请替换成真实参数
    $params->commissionRate = 6; // 文档中对应字段：commission_rate，实际使用时请替换成真实参数
    $params->poolCashPledge = 183; // 文档中对应字段：pool_cash_pledge，实际使用时请替换成真实参数
    $params->dayMaxFrozenAmount = 15260; // 文档中对应字段：day_max_frozen_amount，实际使用时请替换成真实参数
    $params->bankPhoneNumber = "15111078746"; // 文档中对应字段：bank_phone_number，实际使用时请替换成真实参数

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