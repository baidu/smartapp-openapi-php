<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfo();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItem();
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal->Value = "xxxxx"; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfoRequestDataItemEXTMainOrderProductsItem();
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemVal->Desc = "xxxxx"; // 文档中对应字段：Desc，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemVal->ID = "xxxxx"; // 文档中对应字段：ID，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemVal->ImgList = array("xxxxx",); // 文档中对应字段：ImgList，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemVal->PayPrice = 0; // 文档中对应字段：PayPrice，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemVal->Price = 0; // 文档中对应字段：Price，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemVal->Quantity = 0; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderProductsItemVal->SkuAttr = array($updateMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal,); // 文档中对应字段：SkuAttr，实际使用时请替换成真实参数
    
    $updateMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem();
    $updateMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Quantity = 0; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Value = 0; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $updateMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem();
    $updateMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Quantity = 0; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Value = 0; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $updateMainInfoRequestDataItemEXTMainOrderPaymentVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfoRequestDataItemEXTMainOrderPayment();
    $updateMainInfoRequestDataItemEXTMainOrderPaymentVal->Amount = 0; // 文档中对应字段：Amount，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderPaymentVal->IsPayment = false; // 文档中对应字段：IsPayment，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderPaymentVal->Method = 0; // 文档中对应字段：Method，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderPaymentVal->PaymentInfo = array($updateMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal,); // 文档中对应字段：PaymentInfo，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderPaymentVal->PreferentialInfo = array($updateMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal,); // 文档中对应字段：PreferentialInfo，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderPaymentVal->Time = 0; // 文档中对应字段：Time，实际使用时请替换成真实参数
    
    $updateMainInfoRequestDataItemEXTMainOrderAppraiseVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfoRequestDataItemEXTMainOrderAppraise();
    $updateMainInfoRequestDataItemEXTMainOrderAppraiseVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderAppraiseVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderAppraiseVal->SwanSchema = "xxxxx"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $updateMainInfoRequestDataItemEXTMainOrderOrderDetailVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfoRequestDataItemEXTMainOrderOrderDetail();
    $updateMainInfoRequestDataItemEXTMainOrderOrderDetailVal->Name = "xxxxx"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderOrderDetailVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderOrderDetailVal->SwanSchema = "xxxxx"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $updateMainInfoRequestDataItemEXTMainOrderVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfoRequestDataItemEXTMainOrder();
    $updateMainInfoRequestDataItemEXTMainOrderVal->Appraise = $updateMainInfoRequestDataItemEXTMainOrderAppraiseVal; // 文档中对应字段：Appraise，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderVal->OrderDetail = $updateMainInfoRequestDataItemEXTMainOrderOrderDetailVal; // 文档中对应字段：OrderDetail，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderVal->Payment = $updateMainInfoRequestDataItemEXTMainOrderPaymentVal; // 文档中对应字段：Payment，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemEXTMainOrderVal->Products = array($updateMainInfoRequestDataItemEXTMainOrderProductsItemVal,); // 文档中对应字段：Products，实际使用时请替换成真实参数
    
    $updateMainInfoRequestDataItemEXTVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfoRequestDataItemEXT();
    $updateMainInfoRequestDataItemEXTVal->MainOrder = $updateMainInfoRequestDataItemEXTMainOrderVal; // 文档中对应字段：MainOrder，实际使用时请替换成真实参数
    
    $updateMainInfoRequestDataItemVal = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfoRequestDataItem();
    $updateMainInfoRequestDataItemVal->BizAPPID = "xxxxx"; // 文档中对应字段：BizAPPID，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemVal->CateID = 0; // 文档中对应字段：CateID，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemVal->EXT = $updateMainInfoRequestDataItemEXTVal; // 文档中对应字段：EXT，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemVal->ResourceID = "xxxxx"; // 文档中对应字段：ResourceID，实际使用时请替换成真实参数
    $updateMainInfoRequestDataItemVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\TP\Order\UpdateMainInfoRequest();
    $params->accessToken = "#token"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->openId = "108"; // 文档中对应字段：open_id，实际使用时请替换成真实参数
    $params->sceneId = "143"; // 文档中对应字段：scene_id，实际使用时请替换成真实参数
    $params->sceneType = 2; // 文档中对应字段：scene_type，实际使用时请替换成真实参数
	$params->data = array($updateMainInfoRequestDataItemVal,); // 文档中对应字段：Data，实际使用时请替换成真实参数

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