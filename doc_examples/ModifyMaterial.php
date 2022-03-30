<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\ModifyMaterial();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\ModifyMaterialRequest();
    $params->accessToken = "28.8fa028ebfa3c387dda0b8a866c14774e.4074358.3267474128.415760-25706248"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->appId = 12381844; // 文档中对应字段：app_id，实际使用时请替换成真实参数
    $params->id = 11175; // 文档中对应字段：id，实际使用时请替换成真实参数
    $params->imageUrl = "https://mbs7.bdstatic.com/searchbox/mappconsole/image/36246353/d20d1301-abf0-6d03-a4c7-df4e8b28620b.png"; // 文档中对应字段：imageUrl，实际使用时请替换成真实参数
    $params->title = "修改测试数据"; // 文档中对应字段：title，实际使用时请替换成真实参数
    $params->path = "/pages/index/index"; // 文档中对应字段：path，实际使用时请替换成真实参数
    $params->category1Code = "7"; // 文档中对应字段：category1Code，实际使用时请替换成真实参数
    $params->category2Code = "75544"; // 文档中对应字段：category2Code，实际使用时请替换成真实参数
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
    } else {
        // 如果请求失败 可以直接通过 getErrMsg 方法获取到报错信息，辅助问题定位
        var_dump($obj->getErrMsg());
    }
    // 请求成功或失败，都可以通过 getResponse 方法获取到原始响应信息
    var_dump($obj->getResponse());
}
main();