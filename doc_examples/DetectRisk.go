<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\DetectRisk();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\DetectRiskRequest();
    $params->accessToken = "21.010f66764a0002a1c3ad8c528473eb61.1332106.4210414876.226361-37738168"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->appkey = "WXF5pGOvo1TTGU0qCMMhEjvFBkF4bO1Z"; // 文档中对应字段：appkey，实际使用时请替换成真实参数
    $params->xtoken = "{\"key\":\"jU+mx5VJ1+k8+JfN8cLPNfQZIVbCAZwhMIlTtnt5yl+YTPK7E+12s51UwTqR8eKQEyKu1Qbd5xknxNNoYl6w3o/7/qemfUNn3pDXmsYnaZz2tM0k0bhRD5TusfOXXqXRo3gWuUdnWttnIhxvYKGwhzL3sUF6fqnxY7S2PUnGE2g=\", \"value\": \"TPHtjm4RTDX3pUpcUjbhRu/t3MA82kF+mFv1DPmNSx4zMsTsT6Yitu+DoQ6CJS4f6tQBHpqzQ5vfW6nV8Zm0HWkkXK6xkF5jSTSEWH4KkLAMdzWwqLKZQTaWG8r+MU+1qOqYF1mc00oB1WSSfPJQ2ZUYpY+3RezUMWK4xyUB/4vEy58HZ6SYZjsfmJOYNcVsh2A8fTsoHDsNBiXYA3KUe3ZxiSzmyLYe1EYjW4XLcL+iUgcToNuH323Ypn+Py0OxOD7lS8BgWVNV3sdGriYuRDAN8rcugPbVscFoEeOcDWIDaHNKs846vDvmQQCc7M1EXsQ1W/NDdze35dgJ2AL1ZLV+8Ahe0ISoxflpRKjvl6Jl44+p5jESon0DLJA74/+n8FAbCifa2mZLvyHJ+gTSR1h6lLSZW4ZntrbeofVP8MZTYsPip5k3Kt3A8G/ABj3K5k4FIx1iM6UQWvPgFFOJ/vbCf7c1FXVDLHDid7V8qGwJ0TTRur0MJH7yVPiS5dltOQkIIAQcK7C+nTgi+EKY3RwwoOYw\"}"; // 文档中对应字段：xtoken，实际使用时请替换成真实参数
    $params->type = "marketing"; // 文档中对应字段：type，实际使用时请替换成真实参数
    $params->clientip = "103.4.7.2"; // 文档中对应字段：clientip，实际使用时请替换成真实参数
    $params->ts = 1580730861; // 文档中对应字段：ts，实际使用时请替换成真实参数
    $params->ev = "1"; // 文档中对应字段：ev，实际使用时请替换成真实参数
    $params->useragent = "Mozilla/2.2 (Macintosh, Intel Mac OS X 64_24_3) AppleWebKit/838.64 (KHTML, like Gecko) Chrome/01.2.5250.05 Safari/618.75"; // 文档中对应字段：useragent，实际使用时请替换成真实参数
    $params->phone = ""; // 文档中对应字段：phone，实际使用时请替换成真实参数

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