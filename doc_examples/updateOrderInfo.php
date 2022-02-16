<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要首先下载该 SDK，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 使用之前请先确认下 SDK 版本是否为最新版本，如不是，请下载最新版本使用
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询
require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\UpdateOrderInfo();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem();
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Name = "运费"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Quantity = 1; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Value = 100; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem();
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Name = "优惠券使用"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Quantity = 1; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Value = 100; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentVal = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequestDataItemEXTMainOrderPayment();
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentVal->Amount = 2390; // 文档中对应字段：Amount，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentVal->IsPayment = false; // 文档中对应字段：IsPayment，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentVal->Method = 1; // 文档中对应字段：Method，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentVal->PaymentInfo = array($updateOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal,); // 文档中对应字段：PaymentInfo，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentVal->PreferentialInfo = array($updateOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal,); // 文档中对应字段：PreferentialInfo，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderPaymentVal->Time = 0; // 文档中对应字段：Time，实际使用时请替换成真实参数
    
    $updateOrderInfoRequestDataItemEXTMainOrderAppraiseVal = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequestDataItemEXTMainOrderAppraise();
    $updateOrderInfoRequestDataItemEXTMainOrderAppraiseVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderAppraiseVal->SwanSchema = "baiduboxapp://swan/B8GF7AWvCSr55myIs27uqaoYz2pPCSY5/wjz/bdxd/order-detail/order-detail?orderId=002840373111"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $updateOrderInfoRequestDataItemEXTMainOrderOrderDetailVal = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequestDataItemEXTMainOrderOrderDetail();
    $updateOrderInfoRequestDataItemEXTMainOrderOrderDetailVal->Status = 2; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderOrderDetailVal->SwanSchema = "baiduboxapp://swan/B1GF2AWvCSr74myIs70uqaoYz1pPCSY3/wjz/bdxd/order-detail/order-detail?orderId=166680466104"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPageVal = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPage();
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPageVal->Status = 2; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPageVal->SwanSchema = "baiduboxapp://swan/B5GF7AWvCSr08myIs78uqaoYz1pPCSY2/wjz/bdxd/order-detail/order-detail?orderId=177464658211"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItem();
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal->Name = "四川大凉山丑苹果脆甜"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal->Value = "5斤小果25个左右偏小"; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemVal = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequestDataItemEXTMainOrderProductsItem();
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemVal->Desc = "四川大凉山丑苹果脆甜:5斤小果25个左右偏小;"; // 文档中对应字段：Desc，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemVal->DetailPage = $updateOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPageVal; // 文档中对应字段：DetailPage，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemVal->ID = "1512151553357"; // 文档中对应字段：ID，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemVal->ImgList = array("xxxxx",); // 文档中对应字段：ImgList，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemVal->Name = "四川大凉山丑苹果脆甜红将军盐源丑苹果"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemVal->PayPrice = 2390; // 文档中对应字段：PayPrice，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemVal->Price = 2390; // 文档中对应字段：Price，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemVal->Quantity = 1; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderProductsItemVal->SkuAttr = array($updateOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal,); // 文档中对应字段：SkuAttr，实际使用时请替换成真实参数
    
    $updateOrderInfoRequestDataItemEXTMainOrderVal = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequestDataItemEXTMainOrder();
    $updateOrderInfoRequestDataItemEXTMainOrderVal->Appraise = $updateOrderInfoRequestDataItemEXTMainOrderAppraiseVal; // 文档中对应字段：Appraise，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderVal->OrderDetail = $updateOrderInfoRequestDataItemEXTMainOrderOrderDetailVal; // 文档中对应字段：OrderDetail，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderVal->Payment = $updateOrderInfoRequestDataItemEXTMainOrderPaymentVal; // 文档中对应字段：Payment，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemEXTMainOrderVal->Products = array($updateOrderInfoRequestDataItemEXTMainOrderProductsItemVal,); // 文档中对应字段：Products，实际使用时请替换成真实参数
    
    $updateOrderInfoRequestDataItemEXTVal = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequestDataItemEXT();
    $updateOrderInfoRequestDataItemEXTVal->MainOrder = $updateOrderInfoRequestDataItemEXTMainOrderVal; // 文档中对应字段：MainOrder，实际使用时请替换成真实参数
    
    $updateOrderInfoRequestDataItemVal = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequestDataItem();
    $updateOrderInfoRequestDataItemVal->BizAPPID = "WXF5pGOvo6TTGU0qCMMhEjvFBkF0bO3Z"; // 文档中对应字段：BizAPPID，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemVal->CateID = 1; // 文档中对应字段：CateID，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemVal->EXT = $updateOrderInfoRequestDataItemEXTVal; // 文档中对应字段：EXT，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemVal->ResourceID = "1534444631606"; // 文档中对应字段：ResourceID，实际使用时请替换成真实参数
    $updateOrderInfoRequestDataItemVal->Status = 200; // 文档中对应字段：Status，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\UpdateOrderInfoRequest();
    $params->accessToken = "25.854f15017a6101a5c8ad2c736636eb62.1777215.3141071634.770070-62468547"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->openId = "k11HEREQhWhWWB5WYqYT4ITUGX"; // 文档中对应字段：open_id，实际使用时请替换成真实参数
    $params->sceneId = "1084662004532"; // 文档中对应字段：scene_id，实际使用时请替换成真实参数
    $params->sceneType = 2; // 文档中对应字段：scene_type，实际使用时请替换成真实参数
    $params->pmAppKey = "baiduboxapp"; // 文档中对应字段：pm_app_key，实际使用时请替换成真实参数
	$params->data = array($updateOrderInfoRequestDataItemVal,); // 文档中对应字段：Data，实际使用时请替换成真实参数

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