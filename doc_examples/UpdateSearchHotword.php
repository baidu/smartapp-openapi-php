<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\UpdateSearchHotword();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $updateSearchHotwordRequesthotWordsItemVal = new BaiduSmartapp\OpenapiClient\UpdateSearchHotwordRequesthotWordsItem();
    $updateSearchHotwordRequesthotWordsItemVal->icon = "www.testurl.com"; // 文档中对应字段：icon，实际使用时请替换成真实参数
    $updateSearchHotwordRequesthotWordsItemVal->key = "社保"; // 文档中对应字段：key，实际使用时请替换成真实参数
    $updateSearchHotwordRequesthotWordsItemVal->rank = 1; // 文档中对应字段：rank，实际使用时请替换成真实参数
    $updateSearchHotwordRequesthotWordsItemVal->rank_color = "xxxxx"; // 文档中对应字段：rank_color，实际使用时请替换成真实参数
    $updateSearchHotwordRequesthotWordsItemVal->rank_type = 0; // 文档中对应字段：rank_type，实际使用时请替换成真实参数
    $updateSearchHotwordRequesthotWordsItemVal->show_type = 1; // 文档中对应字段：show_type，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\UpdateSearchHotwordRequest();
    $params->accessToken = "22.40fb7ae61435250dc03ae0f7d0ad6740.6024353.1855053800.526735-74458657"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->appKey = "WXF1pGOvo3TTGU4qCMMhEjvFBkF4bO3Z"; // 文档中对应字段：app_key，实际使用时请替换成真实参数
	$params->hotWords = array($updateSearchHotwordRequesthotWordsItemVal,); // 文档中对应字段：hot_words，实际使用时请替换成真实参数

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