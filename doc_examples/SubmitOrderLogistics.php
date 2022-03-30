<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\SubmitOrderLogistics();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal = new BaiduSmartapp\OpenapiClient\SubmitOrderLogisticsRequestDataItemEXTMainOrderExpress();
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal->Code = "SFEXPRESS"; // 文档中对应字段：Code，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal->ID = "1344732022"; // 文档中对应字段：ID，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal->Name = "顺丰快递"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal->Type = 1; // 文档中对应字段：Type，实际使用时请替换成真实参数
    
    $submitOrderLogisticsRequestDataItemEXTMainOrderVal = new BaiduSmartapp\OpenapiClient\SubmitOrderLogisticsRequestDataItemEXTMainOrder();
    $submitOrderLogisticsRequestDataItemEXTMainOrderVal->Express = $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal; // 文档中对应字段：Express，实际使用时请替换成真实参数
    
    $submitOrderLogisticsRequestDataItemEXTVal = new BaiduSmartapp\OpenapiClient\SubmitOrderLogisticsRequestDataItemEXT();
    $submitOrderLogisticsRequestDataItemEXTVal->MainOrder = $submitOrderLogisticsRequestDataItemEXTMainOrderVal; // 文档中对应字段：MainOrder，实际使用时请替换成真实参数
    
    $submitOrderLogisticsRequestDataItemVal = new BaiduSmartapp\OpenapiClient\SubmitOrderLogisticsRequestDataItem();
    $submitOrderLogisticsRequestDataItemVal->BizAPPID = "WXF8pGOvo6TTGU0qCMMhEjvFBkF0bO0Z"; // 文档中对应字段：BizAPPID，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemVal->CateID = 2; // 文档中对应字段：CateID，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemVal->EXT = $submitOrderLogisticsRequestDataItemEXTVal; // 文档中对应字段：EXT，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemVal->ResourceID = "2152056083441"; // 文档中对应字段：ResourceID，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\SubmitOrderLogisticsRequest();
    $params->accessToken = "21.517f06780a0154a5c2ad3c574657eb15.4180108.5871245735.470003-03635146"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->openId = "k56HEREQhWhWWB1WYqYT6ITUGX"; // 文档中对应字段：open_id，实际使用时请替换成真实参数
    $params->sceneId = "1378710506414"; // 文档中对应字段：scene_id，实际使用时请替换成真实参数
    $params->sceneType = 2; // 文档中对应字段：scene_type，实际使用时请替换成真实参数
    $params->pmAppKey = "WXF8pGOvo6TTGU3qCMMhEjvFBkF0bO6Z"; // 文档中对应字段：pm_app_key，实际使用时请替换成真实参数
	$params->data = array($submitOrderLogisticsRequestDataItemVal,); // 文档中对应字段：Data，实际使用时请替换成真实参数

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