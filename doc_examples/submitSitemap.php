<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要首先下载该 SDK，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 使用之前请先确认下 SDK 版本是否为最新版本，如不是，请下载最新版本使用
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询
require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\SubmitSitemap();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\SubmitSitemapRequest();
    $params->accessToken = "26.8fa511ebfa5c343dda1b0a611c16085e.2075554.6081414160.365437-18070022"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->appId = 11518766; // 文档中对应字段：app_id，实际使用时请替换成真实参数
    $params->desc = "智能小程序示例"; // 文档中对应字段：desc，实际使用时请替换成真实参数
    $params->frequency = "3"; // 文档中对应字段：frequency，实际使用时请替换成真实参数
    $params->type = "1"; // 文档中对应字段：type，实际使用时请替换成真实参数
    $params->url = "https://mbs1.bdstatic.com/searchbox/mappconsole/image/21616882/321c08eb-e600-1b03-18ed-7f185a1e6d16.json"; // 文档中对应字段：url，实际使用时请替换成真实参数

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