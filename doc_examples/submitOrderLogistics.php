<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要首先下载该 SDK，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 使用之前请先确认下 SDK 版本是否为最新版本，如不是，请下载最新版本使用
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询
require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\SubmitOrderLogistics();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal = new BaiduSmartapp\OpenapiClient\SubmitOrderLogisticsRequestDataItemEXTMainOrderExpress();
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal->Code = "SFEXPRESS"; // 文档中对应字段：Code，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal->ID = "1486684887"; // 文档中对应字段：ID，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal->Name = "顺丰快递"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal->Type = 1; // 文档中对应字段：Type，实际使用时请替换成真实参数
    
    $submitOrderLogisticsRequestDataItemEXTMainOrderVal = new BaiduSmartapp\OpenapiClient\SubmitOrderLogisticsRequestDataItemEXTMainOrder();
    $submitOrderLogisticsRequestDataItemEXTMainOrderVal->Express = $submitOrderLogisticsRequestDataItemEXTMainOrderExpressVal; // 文档中对应字段：Express，实际使用时请替换成真实参数
    
    $submitOrderLogisticsRequestDataItemEXTVal = new BaiduSmartapp\OpenapiClient\SubmitOrderLogisticsRequestDataItemEXT();
    $submitOrderLogisticsRequestDataItemEXTVal->MainOrder = $submitOrderLogisticsRequestDataItemEXTMainOrderVal; // 文档中对应字段：MainOrder，实际使用时请替换成真实参数
    
    $submitOrderLogisticsRequestDataItemVal = new BaiduSmartapp\OpenapiClient\SubmitOrderLogisticsRequestDataItem();
    $submitOrderLogisticsRequestDataItemVal->BizAPPID = "WXF1pGOvo8TTGU3qCMMhEjvFBkF2bO5Z"; // 文档中对应字段：BizAPPID，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemVal->CateID = 2; // 文档中对应字段：CateID，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemVal->EXT = $submitOrderLogisticsRequestDataItemEXTVal; // 文档中对应字段：EXT，实际使用时请替换成真实参数
    $submitOrderLogisticsRequestDataItemVal->ResourceID = "2465313707076"; // 文档中对应字段：ResourceID，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\SubmitOrderLogisticsRequest();
    $params->accessToken = "27.877f86716a8352a4c0ad3c782021eb31.2357443.6108438082.414424-53764316"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->openId = "k61HEREQhWhWWB3WYqYT2ITUGX"; // 文档中对应字段：open_id，实际使用时请替换成真实参数
    $params->sceneId = "1880025408167"; // 文档中对应字段：scene_id，实际使用时请替换成真实参数
    $params->sceneType = 2; // 文档中对应字段：scene_type，实际使用时请替换成真实参数
    $params->pmAppKey = "WXF6pGOvo6TTGU1qCMMhEjvFBkF1bO3Z"; // 文档中对应字段：pm_app_key，实际使用时请替换成真实参数
	$params->data = array($submitOrderLogisticsRequestDataItemVal,); // 文档中对应字段：Data，实际使用时请替换成真实参数

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