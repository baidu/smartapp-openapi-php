<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要首先下载该 SDK，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 使用之前请先确认下 SDK 版本是否为最新版本，如不是，请下载最新版本使用
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询
require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\CreateCoupon();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $createCouponRequestbaseInfodateInfoVal = new BaiduSmartapp\OpenapiClient\CreateCouponRequestbaseInfodateInfo();
    $createCouponRequestbaseInfodateInfoVal->beginTimestamp = 1200881148; // 文档中对应字段：beginTimestamp，实际使用时请替换成真实参数
    $createCouponRequestbaseInfodateInfoVal->endTimestamp = 1578323285; // 文档中对应字段：endTimestamp，实际使用时请替换成真实参数
    $createCouponRequestbaseInfodateInfoVal->getEndTimestamp = 1020324603; // 文档中对应字段：getEndTimestamp，实际使用时请替换成真实参数
    $createCouponRequestbaseInfodateInfoVal->getStartTimestamp = 1373800602; // 文档中对应字段：getStartTimestamp，实际使用时请替换成真实参数
    $createCouponRequestbaseInfodateInfoVal->timeUnit = 0; // 文档中对应字段：timeUnit，实际使用时请替换成真实参数
    $createCouponRequestbaseInfodateInfoVal->timeValue = 0; // 文档中对应字段：timeValue，实际使用时请替换成真实参数
    $createCouponRequestbaseInfodateInfoVal->type = 1; // 文档中对应字段：type，实际使用时请替换成真实参数
    
    $createCouponRequestbaseInfoVal = new BaiduSmartapp\OpenapiClient\CreateCouponRequestbaseInfo();
    $createCouponRequestbaseInfoVal->appRedirectPath = "/pages/index/index"; // 文档中对应字段：appRedirectPath，实际使用时请替换成真实参数
    $createCouponRequestbaseInfoVal->codeType = 1; // 文档中对应字段：codeType，实际使用时请替换成真实参数
    $createCouponRequestbaseInfoVal->color = "B734"; // 文档中对应字段：color，实际使用时请替换成真实参数
    $createCouponRequestbaseInfoVal->dateInfo = $createCouponRequestbaseInfodateInfoVal; // 文档中对应字段：dateInfo，实际使用时请替换成真实参数
    $createCouponRequestbaseInfoVal->getLimit = 3; // 文档中对应字段：getLimit，实际使用时请替换成真实参数
    $createCouponRequestbaseInfoVal->quantity = 146; // 文档中对应字段：quantity，实际使用时请替换成真实参数
    $createCouponRequestbaseInfoVal->title = "自动化创建代金券230-42"; // 文档中对应字段：title，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\CreateCouponRequest();
    $params->accessToken = "26.616f46383a4607a0c1ad0c843655eb27.1385358.6061137024.550587-16334345"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->leastCost = 13480; // 文档中对应字段：leastCost，实际使用时请替换成真实参数
    $params->reduceCost = 1630; // 文档中对应字段：reduceCost，实际使用时请替换成真实参数
    $params->discount = ""; // 文档中对应字段：discount，实际使用时请替换成真实参数
    $params->baseInfo = $createCouponRequestbaseInfoVal; // 文档中对应字段：baseInfo，实际使用时请替换成真实参数
    $params->description = "使用描述"; // 文档中对应字段：description，实际使用时请替换成真实参数
    $params->callbackUrl = "/test"; // 文档中对应字段：callbackUrl，实际使用时请替换成真实参数
    $params->couponType = "CASH"; // 文档中对应字段：couponType，实际使用时请替换成真实参数

    if ($obj->doRequest($params)){
        // 如果请求成功 可以直接通过 getData 方法获取到返回结构体里的 data 字段值
        var_dump($obj->getData());
        // 如果请求成功 可以通过 getErrMsg 方法获取到完整的响应信息
        var_dump($obj->getErrMsg());
    } else {
        // 如果请求失败 可以直接通过 getErrMsg 方法获取到报错信息，辅助问题定位
        var_dump($obj->getErrMsg());
    }
}
main();