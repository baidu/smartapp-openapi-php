<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\TP\Feed\AccessResourceQuery();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\TP\Feed\AccessResourceQueryRequest();
    $params->accessToken = "#token"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->begin = 1375887710; // 文档中对应字段：begin，实际使用时请替换成真实参数
    $params->end = 1704034858; // 文档中对应字段：end，实际使用时请替换成真实参数
    $params->imageType = 0; // 文档中对应字段：image_type，实际使用时请替换成真实参数
    $params->pageNo = 1; // 文档中对应字段：page_no，实际使用时请替换成真实参数
    $params->pageSize = 16; // 文档中对应字段：page_size，实际使用时请替换成真实参数
    $params->status = 0; // 文档中对应字段：status，实际使用时请替换成真实参数
    $params->title = "百度智能小程序，给你全新的智能体验"; // 文档中对应字段：title，实际使用时请替换成真实参数

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