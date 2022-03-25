<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . '/../bootstrap.php';

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\Feed\AccessResourceSubmit();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\Feed\AccessResourceSubmitRequest();
    $params->accessToken = "#token"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->appId = 163; // 文档中对应字段：app_id，实际使用时请替换成真实参数
    $params->body = "爱说唱是一款基于百度语音技术的智能小程序。即便你对嘻哈音乐一窍不通，只需对它说上几句话，便可智能合成最酷的嘻哈音乐。同时还支持歌词查看和等功能，在线即可完成rap单曲的创作和分享。来吧，让我们在嘻哈的世界肆意妄为，一起Freestyle吧！"; // 文档中对应字段：body，实际使用时请替换成真实参数
    $params->ext = "{\"publish_time\": \"2022年3月1日\"}"; // 文档中对应字段：ext，实际使用时请替换成真实参数
    $params->feedSubType = "明星八卦"; // 文档中对应字段：feed_sub_type，实际使用时请替换成真实参数
    $params->feedType = "娱乐"; // 文档中对应字段：feed_type，实际使用时请替换成真实参数
    $params->images = "[\"https://b.bdstatic.com/miniapp/resource/image/demo4.png\", \"https://b.bdstatic.com/miniapp/resource/image/demo6.png\"]"; // 文档中对应字段：images，实际使用时请替换成真实参数
    $params->mappSubType = 1310; // 文档中对应字段：mapp_sub_type，实际使用时请替换成真实参数
    $params->mappType = 1206; // 文档中对应字段：mapp_type，实际使用时请替换成真实参数
    $params->path = "/pages/detail/detail?id=402083"; // 文档中对应字段：path，实际使用时请替换成真实参数
    $params->tags = "电影,吴亦凡"; // 文档中对应字段：tags，实际使用时请替换成真实参数
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