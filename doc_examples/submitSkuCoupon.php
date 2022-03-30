<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\SubmitSkuCoupon();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $submitSkuCouponRequestpriceInfoVal = new BaiduSmartapp\OpenapiClient\SubmitSkuCouponRequestpriceInfo();
    $submitSkuCouponRequestpriceInfoVal->org_price = "1272"; // 文档中对应字段：org_price，实际使用时请替换成真实参数
    $submitSkuCouponRequestpriceInfoVal->real_price = "940"; // 文档中对应字段：real_price，实际使用时请替换成真实参数
    
    $submitSkuCouponRequestBodyVal = new BaiduSmartapp\OpenapiClient\SubmitSkuCouponRequestBody();
    $submitSkuCouponRequestBodyVal->desc = "测试数据"; // 文档中对应字段：desc，实际使用时请替换成真实参数
    $submitSkuCouponRequestBodyVal->images = array("xxxxx",); // 文档中对应字段：images，实际使用时请替换成真实参数
    $submitSkuCouponRequestBodyVal->path = "/test/test/coupon236622"; // 文档中对应字段：path，实际使用时请替换成真实参数
    $submitSkuCouponRequestBodyVal->price_info = $submitSkuCouponRequestpriceInfoVal; // 文档中对应字段：price_info，实际使用时请替换成真实参数
    $submitSkuCouponRequestBodyVal->region = "北京市"; // 文档中对应字段：region，实际使用时请替换成真实参数
    $submitSkuCouponRequestBodyVal->schema = "{\"coupon_brand_name\":\"三只松鼠\",\"collect_coupon_begin_time\":\"1418-11-25 42:48:03\",\"coupon_use_time\":\"4710-02-83 05:11:88~3134-48-10 78:74:81\",\"coupon_sort\":\"PAY\",\"collect_coupon_end_time\":\"5287-20-84 72:10:56\",\"coupon_brand_logo\":[\"https://mbs5.bdstatic.com/searchbox/mappconsole/image/73235134/e38a7826-36f7-4ba4-aa2f-62c5e221f6ad.jpg\"],\"coupon_stock_value\":50,\"adapt_system_types\":[\"android\"]}"; // 文档中对应字段：schema，实际使用时请替换成真实参数
    $submitSkuCouponRequestBodyVal->title = "测试数据，请勿审核"; // 文档中对应字段：title，实际使用时请替换成真实参数
    $submitSkuCouponRequestBodyVal->trade_type = 2004; // 文档中对应字段：trade_type，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\SubmitSkuCouponRequest();
    $params->accessToken = "26.bdc45bb8af6482e46b521f1371b08f32.6327664.4161114471.240713-688685114"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->requestBody = array($submitSkuCouponRequestBodyVal,);

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