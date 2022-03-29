<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateSubStatus();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $updateSubStatusRequestDataItemEXTSubsOrderItemsItemVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateSubStatusRequestDataItemEXTSubsOrderItemsItem();
    $updateSubStatusRequestDataItemEXTSubsOrderItemsItemVal->SubOrderID = "xxxxx"; // 文档中对应字段：SubOrderID，实际使用时请替换成真实参数
    $updateSubStatusRequestDataItemEXTSubsOrderItemsItemVal->SubStatus = 0; // 文档中对应字段：SubStatus，实际使用时请替换成真实参数
    
    $updateSubStatusRequestDataItemEXTSubsOrderVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateSubStatusRequestDataItemEXTSubsOrder();
    $updateSubStatusRequestDataItemEXTSubsOrderVal->Items = array($updateSubStatusRequestDataItemEXTSubsOrderItemsItemVal,); // 文档中对应字段：Items，实际使用时请替换成真实参数
    $updateSubStatusRequestDataItemEXTSubsOrderVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    
    $updateSubStatusRequestDataItemEXTVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateSubStatusRequestDataItemEXT();
    $updateSubStatusRequestDataItemEXTVal->SubsOrder = $updateSubStatusRequestDataItemEXTSubsOrderVal; // 文档中对应字段：SubsOrder，实际使用时请替换成真实参数
    
    $updateSubStatusRequestDataItemVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateSubStatusRequestDataItem();
    $updateSubStatusRequestDataItemVal->BizAPPID = "xxxxx"; // 文档中对应字段：BizAPPID，实际使用时请替换成真实参数
    $updateSubStatusRequestDataItemVal->CateID = 0; // 文档中对应字段：CateID，实际使用时请替换成真实参数
    $updateSubStatusRequestDataItemVal->EXT = $updateSubStatusRequestDataItemEXTVal; // 文档中对应字段：EXT，实际使用时请替换成真实参数
    $updateSubStatusRequestDataItemVal->ResourceID = "xxxxx"; // 文档中对应字段：ResourceID，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateSubStatusRequest();
    $params->accessToken = "#token"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->openId = "107"; // 文档中对应字段：open_id，实际使用时请替换成真实参数
    $params->sceneId = "137"; // 文档中对应字段：scene_id，实际使用时请替换成真实参数
    $params->sceneType = 2; // 文档中对应字段：scene_type，实际使用时请替换成真实参数
	$params->data = array($updateSubStatusRequestDataItemVal,); // 文档中对应字段：Data，实际使用时请替换成真实参数

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