<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\AddOrderSubInfo();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemOrderDetailVal = new BaiduSmartapp\OpenapiClient\AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItemOrderDetail();
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemOrderDetailVal->Status = "3"; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemOrderDetailVal->SwanSchema = "baiduboxapp://swan/B1GF4AWvCSr14myIs42uqaoYz8pPCSY1/wjz/bdxd/order-detail/order-detail?orderId=120622783683"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItemVal = new BaiduSmartapp\OpenapiClient\AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItem();
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItemVal->Amount = 100; // 文档中对应字段：Amount，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItemVal->ID = "123088631450"; // 文档中对应字段：ID，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItemVal->Quantity = 1; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundVal = new BaiduSmartapp\OpenapiClient\AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefund();
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundVal->Amount = 1868; // 文档中对应字段：Amount，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundVal->Product = array($addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItemVal,); // 文档中对应字段：Product，实际使用时请替换成真实参数
    
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemVal = new BaiduSmartapp\OpenapiClient\AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItem();
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemVal->CTime = 1571026203; // 文档中对应字段：CTime，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemVal->MTime = 1571026203; // 文档中对应字段：MTime，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemVal->OrderDetail = $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemOrderDetailVal; // 文档中对应字段：OrderDetail，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemVal->OrderType = 1; // 文档中对应字段：OrderType，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemVal->Refund = $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundVal; // 文档中对应字段：Refund，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemVal->SubOrderID = "onlyOne"; // 文档中对应字段：SubOrderID，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemVal->SubStatus = 401; // 文档中对应字段：SubStatus，实际使用时请替换成真实参数
    
    $addOrderSubInfoRequestDataItemEXTSubsOrderVal = new BaiduSmartapp\OpenapiClient\AddOrderSubInfoRequestDataItemEXTSubsOrder();
    $addOrderSubInfoRequestDataItemEXTSubsOrderVal->Items = array($addOrderSubInfoRequestDataItemEXTSubsOrderItemsItemVal,); // 文档中对应字段：Items，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemEXTSubsOrderVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    
    $addOrderSubInfoRequestDataItemEXTVal = new BaiduSmartapp\OpenapiClient\AddOrderSubInfoRequestDataItemEXT();
    $addOrderSubInfoRequestDataItemEXTVal->SubsOrder = $addOrderSubInfoRequestDataItemEXTSubsOrderVal; // 文档中对应字段：SubsOrder，实际使用时请替换成真实参数
    
    $addOrderSubInfoRequestDataItemVal = new BaiduSmartapp\OpenapiClient\AddOrderSubInfoRequestDataItem();
    $addOrderSubInfoRequestDataItemVal->BizAPPID = "WXF3pGOvo1TTGU5qCMMhEjvFBkF1bO3Z"; // 文档中对应字段：BizAPPID，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemVal->CateID = 1; // 文档中对应字段：CateID，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemVal->EXT = $addOrderSubInfoRequestDataItemEXTVal; // 文档中对应字段：EXT，实际使用时请替换成真实参数
    $addOrderSubInfoRequestDataItemVal->ResourceID = "1768613647100"; // 文档中对应字段：ResourceID，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\AddOrderSubInfoRequest();
    $params->accessToken = "27.163f55711a5717a2c6ad8c166607eb70.5383678.5724621134.074428-70685740"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->openId = "k72HEREQhWhWWB8WYqYT3ITUGX"; // 文档中对应字段：open_id，实际使用时请替换成真实参数
    $params->sceneId = "1707710547781"; // 文档中对应字段：scene_id，实际使用时请替换成真实参数
    $params->sceneType = 2; // 文档中对应字段：scene_type，实际使用时请替换成真实参数
    $params->pmAppKey = "WXF6pGOvo6TTGU4qCMMhEjvFBkF1bO5Z"; // 文档中对应字段：pm_app_key，实际使用时请替换成真实参数
	$params->data = array($addOrderSubInfoRequestDataItemVal,); // 文档中对应字段：Data，实际使用时请替换成真实参数

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