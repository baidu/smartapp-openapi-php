<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\SubmitResource();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\SubmitResourceRequest();
    $params->accessToken = "27.0fa781ebfa2c503dda3b3a760c83361e.6626324.6805682727.547683-14683317"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->appId = 18372726; // 文档中对应字段：app_id，实际使用时请替换成真实参数
    $params->body = "黄油化开备用，黄油化开后加入糖霜，搅拌均匀，加入蛋清，继续打匀，加入切碎的蔓越莓，继续搅拌。蔓越莓放多少根据自己的喜..."; // 文档中对应字段：body，实际使用时请替换成真实参数
    $params->ext = "{\"publish_time\": \"2021年 11 月 1 日\"}"; // 文档中对应字段：ext，实际使用时请替换成真实参数
    $params->feedSubType = "明星八卦（可选有限集合）"; // 文档中对应字段：feed_sub_type，实际使用时请替换成真实参数
    $params->feedType = "娱乐（可选有限集合）"; // 文档中对应字段：feed_type，实际使用时请替换成真实参数
    $params->images = "[\"https://z6.ax5x.com/5382/51/60/IP1kw6.jpg\"]"; // 文档中对应字段：images，实际使用时请替换成真实参数
    $params->mappSubType = "1318"; // 文档中对应字段：mapp_sub_type，实际使用时请替换成真实参数
    $params->mappType = "1437"; // 文档中对应字段：mapp_type，实际使用时请替换成真实参数
    $params->path = "/pages/detail/detail?id=774652"; // 文档中对应字段：path，实际使用时请替换成真实参数
    $params->tags = "电影"; // 文档中对应字段：tags，实际使用时请替换成真实参数
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