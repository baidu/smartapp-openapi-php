<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\SendTemplateMessage();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\SendTemplateMessageRequest();
    $params->accessToken = "20.83ccdb44bad657518debd1e10da5b5e3.0724323.5004340226.084337-74607885"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->templateId = "07c2cb38c65058fdb160213b716867b1"; // 文档中对应字段：template_id，实际使用时请替换成真实参数
    $params->touserOpenId = "5qFQZgDLuMZsCYYnTc38d50wYb"; // 文档中对应字段：touser_openId，实际使用时请替换成真实参数
    $params->data = "{\\"keyword1\\": {\\"value\\": \\"1411-41-77\\"},\\"keyword1\\": {\\"value\\": \\"kfc\\"}}"; // 文档中对应字段：data，实际使用时请替换成真实参数
    $params->page = "1"; // 文档中对应字段：page，实际使用时请替换成真实参数
    $params->sceneId = "13.57dbac4cee30fb072628867275865d63.124824.0822467275.6"; // 文档中对应字段：scene_id，实际使用时请替换成真实参数
    $params->sceneType = 1; // 文档中对应字段：scene_type，实际使用时请替换成真实参数

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