<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要首先下载该 SDK，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 使用之前请先确认下 SDK 版本是否为最新版本，如不是，请下载最新版本使用
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询
require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\ModifyMaterial();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\ModifyMaterialRequest();
    $params->accessToken = "22.4fa050ebfa5c705dda3b0a052c70150e.0038231.2024645284.117673-21083753"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->appId = 12840518; // 文档中对应字段：app_id，实际使用时请替换成真实参数
    $params->id = 10310; // 文档中对应字段：id，实际使用时请替换成真实参数
    $params->imageUrl = "https://mbs4.bdstatic.com/searchbox/mappconsole/image/04877318/d75d6283-abf8-6d76-a2c0-df8e0b42655b.png"; // 文档中对应字段：imageUrl，实际使用时请替换成真实参数
    $params->title = "修改测试数据"; // 文档中对应字段：title，实际使用时请替换成真实参数
    $params->path = "/pages/index/index"; // 文档中对应字段：path，实际使用时请替换成真实参数
    $params->category1Code = "7"; // 文档中对应字段：category1Code，实际使用时请替换成真实参数
    $params->category2Code = "71334"; // 文档中对应字段：category2Code，实际使用时请替换成真实参数
    $params->desc = ""; // 文档中对应字段：desc，实际使用时请替换成真实参数
    $params->labelAttr = ""; // 文档中对应字段：labelAttr，实际使用时请替换成真实参数
    $params->labelDiscount = ""; // 文档中对应字段：labelDiscount，实际使用时请替换成真实参数
    $params->buttonName = ""; // 文档中对应字段：buttonName，实际使用时请替换成真实参数
    $params->bigImage = ""; // 文档中对应字段：bigImage，实际使用时请替换成真实参数
    $params->verticalImage = ""; // 文档中对应字段：verticalImage，实际使用时请替换成真实参数
    $params->extJson = ""; // 文档中对应字段：extJson，实际使用时请替换成真实参数

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