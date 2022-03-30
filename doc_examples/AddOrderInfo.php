<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\AddOrderInfo();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPageVal = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPage();
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPageVal->Status = "2"; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPageVal->SwanSchema = "baiduboxapp://swan/B1GF8AWvCSr15myIs24uqaoYz1pPCSY5/wjz/bdxd/order-detail/order-detail?orderId=772606803413"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItem();
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal->Name = "四川大凉山丑苹果脆甜"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal->Value = "5斤小果25个左右偏小"; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemVal = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequestDataItemEXTMainOrderProductsItem();
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemVal->Desc = "四川大凉山丑苹果脆甜:5斤小果25个左右偏小;"; // 文档中对应字段：Desc，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemVal->DetailPage = $addOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPageVal; // 文档中对应字段：DetailPage，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemVal->ID = "1880203523568"; // 文档中对应字段：ID，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemVal->ImgList = array("xxxxx",); // 文档中对应字段：ImgList，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemVal->Name = "四川大凉山丑苹果脆甜红将军盐源丑苹果"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemVal->PayPrice = 2390; // 文档中对应字段：PayPrice，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemVal->Price = 2390; // 文档中对应字段：Price，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemVal->Quantity = 1; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderProductsItemVal->SkuAttr = array($addOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItemVal,); // 文档中对应字段：SkuAttr，实际使用时请替换成真实参数
    
    $addOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem();
    $addOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Name = "运费"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Quantity = 1; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal->Value = 100; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $addOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem();
    $addOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Name = "优惠券使用"; // 文档中对应字段：Name，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Quantity = 1; // 文档中对应字段：Quantity，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal->Value = 100; // 文档中对应字段：Value，实际使用时请替换成真实参数
    
    $addOrderInfoRequestDataItemEXTMainOrderPaymentVal = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequestDataItemEXTMainOrderPayment();
    $addOrderInfoRequestDataItemEXTMainOrderPaymentVal->Amount = 2390; // 文档中对应字段：Amount，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderPaymentVal->IsPayment = false; // 文档中对应字段：IsPayment，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderPaymentVal->Method = 1; // 文档中对应字段：Method，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderPaymentVal->PaymentInfo = array($addOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItemVal,); // 文档中对应字段：PaymentInfo，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderPaymentVal->PreferentialInfo = array($addOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItemVal,); // 文档中对应字段：PreferentialInfo，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderPaymentVal->Time = 0; // 文档中对应字段：Time，实际使用时请替换成真实参数
    
    $addOrderInfoRequestDataItemEXTMainOrderAppraiseVal = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequestDataItemEXTMainOrderAppraise();
    $addOrderInfoRequestDataItemEXTMainOrderAppraiseVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderAppraiseVal->SwanSchema = "baiduboxapp://swan/B6GF4AWvCSr83myIs76uqaoYz4pPCSY0/wjz/bdxd/order-detail/order-detail?orderId=466105236085"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $addOrderInfoRequestDataItemEXTMainOrderOrderDetailVal = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequestDataItemEXTMainOrderOrderDetail();
    $addOrderInfoRequestDataItemEXTMainOrderOrderDetailVal->Status = 0; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderOrderDetailVal->SwanSchema = "baiduboxapp://swan/B0GF5AWvCSr23myIs04uqaoYz7pPCSY6/wjz/bdxd/order-detail/order-detail?orderId=047688651888"; // 文档中对应字段：SwanSchema，实际使用时请替换成真实参数
    
    $addOrderInfoRequestDataItemEXTMainOrderVal = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequestDataItemEXTMainOrder();
    $addOrderInfoRequestDataItemEXTMainOrderVal->Appraise = $addOrderInfoRequestDataItemEXTMainOrderAppraiseVal; // 文档中对应字段：Appraise，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderVal->OrderDetail = $addOrderInfoRequestDataItemEXTMainOrderOrderDetailVal; // 文档中对应字段：OrderDetail，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderVal->Payment = $addOrderInfoRequestDataItemEXTMainOrderPaymentVal; // 文档中对应字段：Payment，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemEXTMainOrderVal->Products = array($addOrderInfoRequestDataItemEXTMainOrderProductsItemVal,); // 文档中对应字段：Products，实际使用时请替换成真实参数
    
    $addOrderInfoRequestDataItemEXTVal = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequestDataItemEXT();
    $addOrderInfoRequestDataItemEXTVal->MainOrder = $addOrderInfoRequestDataItemEXTMainOrderVal; // 文档中对应字段：MainOrder，实际使用时请替换成真实参数
    
    $addOrderInfoRequestDataItemVal = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequestDataItem();
    $addOrderInfoRequestDataItemVal->BizAPPID = "WXF3pGOvo6TTGU4qCMMhEjvFBkF5bO2Z"; // 文档中对应字段：BizAPPID，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemVal->CateID = 1; // 文档中对应字段：CateID，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemVal->Ctime = 1233212343; // 文档中对应字段：Ctime，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemVal->EXT = $addOrderInfoRequestDataItemEXTVal; // 文档中对应字段：EXT，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemVal->Mtime = 1233212343; // 文档中对应字段：Mtime，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemVal->ResourceID = "1460246024680"; // 文档中对应字段：ResourceID，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemVal->Status = 200; // 文档中对应字段：Status，实际使用时请替换成真实参数
    $addOrderInfoRequestDataItemVal->Title = "test"; // 文档中对应字段：Title，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\AddOrderInfoRequest();
    $params->accessToken = "26.631f35031a7043a3c7ad5c681028eb67.0423725.3017057518.346883-06083341"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->openId = "k60HEREQhWhWWB7WYqYT4ITUGX"; // 文档中对应字段：open_id，实际使用时请替换成真实参数
    $params->swanId = ""; // 文档中对应字段：swan_id，实际使用时请替换成真实参数
    $params->sceneId = "1108635733542"; // 文档中对应字段：scene_id，实际使用时请替换成真实参数
    $params->sceneType = 2; // 文档中对应字段：scene_type，实际使用时请替换成真实参数
    $params->pmAppKey = "baiduboxapp"; // 文档中对应字段：pm_app_key，实际使用时请替换成真实参数
	$params->data = array($addOrderInfoRequestDataItemVal,); // 文档中对应字段：Data，实际使用时请替换成真实参数

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