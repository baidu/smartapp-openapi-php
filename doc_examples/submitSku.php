<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要首先下载该 SDK，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 使用之前请先确认下 SDK 版本是否为最新版本，如不是，请下载最新版本使用
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询
require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\SubmitSku();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $submitSkuRequestpriceInfoVal = new BaiduSmartapp\OpenapiClient\SubmitSkuRequestpriceInfo();
    $submitSkuRequestpriceInfoVal->org_price = "332"; // 文档中对应字段：org_price，实际使用时请替换成真实参数
    $submitSkuRequestpriceInfoVal->org_unit = "天"; // 文档中对应字段：org_unit，实际使用时请替换成真实参数
    $submitSkuRequestpriceInfoVal->range_max_price = "xxxxx"; // 文档中对应字段：range_max_price，实际使用时请替换成真实参数
    $submitSkuRequestpriceInfoVal->range_min_price = "xxxxx"; // 文档中对应字段：range_min_price，实际使用时请替换成真实参数
    $submitSkuRequestpriceInfoVal->real_price = "208"; // 文档中对应字段：real_price，实际使用时请替换成真实参数
    
    $submitSkuRequestactivityInfoItemVal = new BaiduSmartapp\OpenapiClient\SubmitSkuRequestactivityInfoItem();
    $submitSkuRequestactivityInfoItemVal->activity_desc = "满51减5"; // 文档中对应字段：activity_desc，实际使用时请替换成真实参数
    $submitSkuRequestactivityInfoItemVal->activity_end_time = 1608480000; // 文档中对应字段：activity_end_time，实际使用时请替换成真实参数
    $submitSkuRequestactivityInfoItemVal->activity_path = "/activity/coupon"; // 文档中对应字段：activity_path，实际使用时请替换成真实参数
    $submitSkuRequestactivityInfoItemVal->activity_start_time = 1593985486; // 文档中对应字段：activity_start_time，实际使用时请替换成真实参数
    $submitSkuRequestactivityInfoItemVal->activity_type = "领劵"; // 文档中对应字段：activity_type，实际使用时请替换成真实参数
    
    $submitSkuRequestBodyVal = new BaiduSmartapp\OpenapiClient\SubmitSkuRequestBody();
    $submitSkuRequestBodyVal->activity_info = array($submitSkuRequestactivityInfoItemVal,); // 文档中对应字段：activity_info，实际使用时请替换成真实参数
    $submitSkuRequestBodyVal->button_name = "预订/立即预订"; // 文档中对应字段：button_name，实际使用时请替换成真实参数
    $submitSkuRequestBodyVal->desc = "测试数据"; // 文档中对应字段：desc，实际使用时请替换成真实参数
    $submitSkuRequestBodyVal->images = array("xxxxx",); // 文档中对应字段：images，实际使用时请替换成真实参数
    $submitSkuRequestBodyVal->path = "/pages/detail/detail?id=482236"; // 文档中对应字段：path，实际使用时请替换成真实参数
    $submitSkuRequestBodyVal->price_info = $submitSkuRequestpriceInfoVal; // 文档中对应字段：price_info，实际使用时请替换成真实参数
    $submitSkuRequestBodyVal->region = "北京市"; // 文档中对应字段：region，实际使用时请替换成真实参数
    $submitSkuRequestBodyVal->schema = "{\"hotel_name\":\"北京大酒店\",\"hotel_addr\":\"北京西城区\",\"hotel_score\":\"4.7分\",\"hotel_star\":\"经济型酒店\"}"; // 文档中对应字段：schema，实际使用时请替换成真实参数
    $submitSkuRequestBodyVal->tag = "饮食健康;中餐"; // 文档中对应字段：tag，实际使用时请替换成真实参数
    $submitSkuRequestBodyVal->title = "测试数据，请勿审核"; // 文档中对应字段：title，实际使用时请替换成真实参数
    $submitSkuRequestBodyVal->trade_type = 5001; // 文档中对应字段：trade_type，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\SubmitSkuRequest();
    $params->accessToken = "26.bdc87bb3af2253e08b031f4354b23f31.6448332.7075105180.452728-113584250"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->requestBody = array($submitSkuRequestBodyVal,);

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