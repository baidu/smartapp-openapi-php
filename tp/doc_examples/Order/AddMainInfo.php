<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . '/../bootstrap.php';

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\Order\AddMainInfo();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $addMainInfoRequestDataItemEXTMainOrderAppraiseVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTMainOrderAppraise();
    $addMainInfoRequestDataItemEXTMainOrderAppraiseVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderAppraiseVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderAppraiseVal->SwanSchema = "xxxxx"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTMainOrderOrderDetailVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTMainOrderOrderDetail();
    $addMainInfoRequestDataItemEXTMainOrderOrderDetailVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderOrderDetailVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderOrderDetailVal->SwanSchema = "xxxxx"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItem();
    $addMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal->Value = "xxxxx"; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTMainOrderProductsItemVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTMainOrderProductsItem();
    $addMainInfoRequestDataItemEXTMainOrderProductsItemVal->Desc = "xxxxx"; // 文档中对应字段：Desc，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderProductsItemVal->ID = "xxxxx"; // 文档中对应字段：ID，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderProductsItemVal->ImgList = array("xxxxx",); // 文档中对应字段：ImgList，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderProductsItemVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderProductsItemVal->PayPrice = 0; // 文档中对应字段：PayPrice，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderProductsItemVal->Price = 0; // 文档中对应字段：Price，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderProductsItemVal->Quantity = 0; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderProductsItemVal->SkuAttr = array($addMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal,); // 文档中对应字段：SkuAttr，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem();
    $addMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Quantity = 0; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Value = 0; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem();
    $addMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Quantity = 0; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Value = 0; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTMainOrderPaymentVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTMainOrderPayment();
    $addMainInfoRequestDataItemEXTMainOrderPaymentVal->Amount = 0; // 文档中对应字段：Amount，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderPaymentVal->IsPayment = false; // 文档中对应字段：IsPayment，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderPaymentVal->Method = 0; // 文档中对应字段：Method，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderPaymentVal->PaymentInfo = array($addMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal,); // 文档中对应字段：PaymentInfo，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderPaymentVal->PreferentialInfo = array($addMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal,); // 文档中对应字段：PreferentialInfo，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderPaymentVal->Time = 0; // 文档中对应字段：Time，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTMainOrderVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTMainOrder();
    $addMainInfoRequestDataItemEXTMainOrderVal->Appraise = $addMainInfoRequestDataItemEXTMainOrderAppraiseVal; // 文档中对应字段：Appraise，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderVal->OrderDetail = $addMainInfoRequestDataItemEXTMainOrderOrderDetailVal; // 文档中对应字段：OrderDetail，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderVal->Payment = $addMainInfoRequestDataItemEXTMainOrderPaymentVal; // 文档中对应字段：Payment，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTMainOrderVal->Products = array($addMainInfoRequestDataItemEXTMainOrderProductsItemVal,); // 文档中对应字段：Products，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemOrderDetailVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTSubsOrderItemsItemOrderDetail();
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemOrderDetailVal->AndroidSchema = "xxxxx"; // 文档中对应字段：AndroidSchema，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemOrderDetailVal->IPhoneSchema = "xxxxx"; // 文档中对应字段：IPhoneSchema，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemOrderDetailVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemOrderDetailVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemOrderDetailVal->SwanSchema = "xxxxx"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItemVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItem();
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItemVal->Amount = 0; // 文档中对应字段：Amount，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItemVal->ID = "xxxxx"; // 文档中对应字段：ID，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItemVal->Quantity = 0; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemRefundVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTSubsOrderItemsItemRefund();
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemRefundVal->Amount = 0; // 文档中对应字段：Amount，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemRefundVal->Product = array($addMainInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItemVal,); // 文档中对应字段：Product，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTSubsOrderItemsItem();
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemVal->CTime = 0; // 文档中对应字段：CTime，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemVal->MTime = 0; // 文档中对应字段：MTime，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemVal->OrderDetail = $addMainInfoRequestDataItemEXTSubsOrderItemsItemOrderDetailVal; // 文档中对应字段：OrderDetail，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemVal->OrderType = 0; // 文档中对应字段：OrderType，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemVal->Refund = $addMainInfoRequestDataItemEXTSubsOrderItemsItemRefundVal; // 文档中对应字段：Refund，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemVal->SubOrderID = "xxxxx"; // 文档中对应字段：SubOrderID，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderItemsItemVal->SubStatus = 0; // 文档中对应字段：SubStatus，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTSubsOrderVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXTSubsOrder();
    $addMainInfoRequestDataItemEXTSubsOrderVal->Items = array($addMainInfoRequestDataItemEXTSubsOrderItemsItemVal,); // 文档中对应字段：Items，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTSubsOrderVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemEXTVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItemEXT();
    $addMainInfoRequestDataItemEXTVal->MainOrder = $addMainInfoRequestDataItemEXTMainOrderVal; // 文档中对应字段：MainOrder，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemEXTVal->SubsOrder = $addMainInfoRequestDataItemEXTSubsOrderVal; // 文档中对应字段：SubsOrder，实际使用时请替换成真实参数
    
    $addMainInfoRequestDataItemVal = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequestDataItem();
    $addMainInfoRequestDataItemVal->BizAPPID = "xxxxx"; // 文档中对应字段：BizAPPID，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemVal->CateID = 0; // 文档中对应字段：CateID，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemVal->Ctime = 0; // 文档中对应字段：Ctime，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemVal->EXT = $addMainInfoRequestDataItemEXTVal; // 文档中对应字段：EXT，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemVal->Mtime = 0; // 文档中对应字段：Mtime，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemVal->ResourceID = "xxxxx"; // 文档中对应字段：ResourceID，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $addMainInfoRequestDataItemVal->Title = "xxxxx"; // 文档中对应字段：Title，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\Order\AddMainInfoRequest();
    $params->accessToken = "#token"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->openId = "137"; // 文档中对应字段：open_id，实际使用时请替换成真实参数
    $params->sceneId = "142"; // 文档中对应字段：scene_id，实际使用时请替换成真实参数
    $params->sceneType = 2; // 文档中对应字段：scene_type，实际使用时请替换成真实参数
	$params->data = array($addMainInfoRequestDataItemVal,); // 文档中对应字段：Data，实际使用时请替换成真实参数

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