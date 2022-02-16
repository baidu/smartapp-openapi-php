<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要首先下载该 SDK，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 使用之前请先确认下 SDK 版本是否为最新版本，如不是，请下载最新版本使用
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询
require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\UpdateOrderSubStatus();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $updateOrderSubStatusRequestDataItemEXTSubsOrderItemsItemVal = new BaiduSmartapp\OpenapiClient\UpdateOrderSubStatusRequestDataItemEXTSubsOrderItemsItem();
    $updateOrderSubStatusRequestDataItemEXTSubsOrderItemsItemVal->SubOrderID = "onlyOne"; // 文档中对应字段：SubOrderID，实际使用时请替换成真实参数
    $updateOrderSubStatusRequestDataItemEXTSubsOrderItemsItemVal->SubStatus = 403; // 文档中对应字段：SubStatus，实际使用时请替换成真实参数
    
    $updateOrderSubStatusRequestDataItemEXTSubsOrderVal = new BaiduSmartapp\OpenapiClient\UpdateOrderSubStatusRequestDataItemEXTSubsOrder();
    $updateOrderSubStatusRequestDataItemEXTSubsOrderVal->Items = array($updateOrderSubStatusRequestDataItemEXTSubsOrderItemsItemVal,); // 文档中对应字段：Items，实际使用时请替换成真实参数
    $updateOrderSubStatusRequestDataItemEXTSubsOrderVal->Status = 403; // 文档中对应字段：Status，实际使用时请替换成真实参数
    
    $updateOrderSubStatusRequestDataItemEXTVal = new BaiduSmartapp\OpenapiClient\UpdateOrderSubStatusRequestDataItemEXT();
    $updateOrderSubStatusRequestDataItemEXTVal->SubsOrder = $updateOrderSubStatusRequestDataItemEXTSubsOrderVal; // 文档中对应字段：SubsOrder，实际使用时请替换成真实参数
    
    $updateOrderSubStatusRequestDataItemVal = new BaiduSmartapp\OpenapiClient\UpdateOrderSubStatusRequestDataItem();
    $updateOrderSubStatusRequestDataItemVal->BizAPPID = "WXF4pGOvo0TTGU8qCMMhEjvFBkF3bO5Z"; // 文档中对应字段：BizAPPID，实际使用时请替换成真实参数
    $updateOrderSubStatusRequestDataItemVal->CateID = 1; // 文档中对应字段：CateID，实际使用时请替换成真实参数
    $updateOrderSubStatusRequestDataItemVal->EXT = $updateOrderSubStatusRequestDataItemEXTVal; // 文档中对应字段：EXT，实际使用时请替换成真实参数
    $updateOrderSubStatusRequestDataItemVal->ResourceID = "1222626628210"; // 文档中对应字段：ResourceID，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\UpdateOrderSubStatusRequest();
    $params->accessToken = "26.511f63332a1074a3c3ad4c258746eb20.2275603.0141234158.130347-03602873"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->openId = "k72HEREQhWhWWB7WYqYT0ITUGX"; // 文档中对应字段：open_id，实际使用时请替换成真实参数
    $params->sceneId = "1848884810315"; // 文档中对应字段：scene_id，实际使用时请替换成真实参数
    $params->sceneType = 1; // 文档中对应字段：scene_type，实际使用时请替换成真实参数
    $params->pmAppKey = "WXF0pGOvo6TTGU1qCMMhEjvFBkF1bO5Z"; // 文档中对应字段：pm_app_key，实际使用时请替换成真实参数
	$params->data = array($updateOrderSubStatusRequestDataItemVal,); // 文档中对应字段：Data，实际使用时请替换成真实参数

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