<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要首先下载该 SDK，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 使用之前请先确认下 SDK 版本是否为最新版本，如不是，请下载最新版本使用
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询
require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\UpdateOrderStatus();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $updateOrderStatusRequestDataItemVal = new BaiduSmartapp\OpenapiClient\UpdateOrderStatusRequestDataItem();
    $updateOrderStatusRequestDataItemVal->BizAPPID = "WXF0pGOvo7TTGU2qCMMhEjvFBkF8bO8Z"; // 文档中对应字段：BizAPPID，实际使用时请替换成真实参数
    $updateOrderStatusRequestDataItemVal->CateID = 5; // 文档中对应字段：CateID，实际使用时请替换成真实参数
    $updateOrderStatusRequestDataItemVal->ResourceID = "G13813758316231373226454371227"; // 文档中对应字段：ResourceID，实际使用时请替换成真实参数
    $updateOrderStatusRequestDataItemVal->Status = 1; // 文档中对应字段：Status，实际使用时请替换成真实参数
    
    $params = new BaiduSmartapp\OpenapiClient\UpdateOrderStatusRequest();
    $params->accessToken = "26.185f10711a2465a6c6ad2c482482eb85.3333307.5612223221.454885-10432677"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->openId = "k15HEREQhWhWWB3WYqYT6ITUGX"; // 文档中对应字段：open_id，实际使用时请替换成真实参数
    $params->sceneId = "1271263446687"; // 文档中对应字段：scene_id，实际使用时请替换成真实参数
    $params->sceneType = 2; // 文档中对应字段：scene_type，实际使用时请替换成真实参数
    $params->pmAppKey = "WXF3pGOvo2TTGU4qCMMhEjvFBkF3bO3Z"; // 文档中对应字段：pm_app_key，实际使用时请替换成真实参数
	$params->data = array($updateOrderStatusRequestDataItemVal,); // 文档中对应字段：Data，实际使用时请替换成真实参数

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