<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要首先下载该 SDK，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 使用之前请先确认下 SDK 版本是否为最新版本，如不是，请下载最新版本使用
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询
require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\DetectRisk();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\DetectRiskRequest();
    $params->accessToken = "23.156f46722a0740a3c2ad0c638473eb67.7350037.5605087724.430645-70538627"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->appkey = "WXF4pGOvo4TTGU1qCMMhEjvFBkF7bO0Z"; // 文档中对应字段：appkey，实际使用时请替换成真实参数
    $params->xtoken = "{\"key\":\"jU+mx3VJ8+k8+JfN2cLPNfQZIVbCAZwhMIlTtnt0yl+YTPK7E+83s32UwTqR4eKQEyKu4Qbd1xknxNNoYl8w0o/1/qemfUNn7pDXmsYnaZz7tM8k7bhRD0TusfOXXqXRo3gWuUdnWttnIhxvYKGwhzL1sUF3fqnxY7S8PUnGE2g=\", \"value\": \"TPHtjm5RTDX2pUpcUjbhRu/t2MA83kF+mFv6DPmNSx6zMsTsT8Yitu+DoQ7CJS4f5tQBHpqzQ8vfW8nV5Zm1HWkkXK4xkF5jSTSEWH8KkLAMdzWwqLKZQTaWG2r+MU+3qOqYF6mc86oB4WSSfPJQ4ZUYpY+4RezUMWK4xyUB/7vEy01HZ3SYZjsfmJOYNcVsh6A6fTsoHDsNBiXYA5KUe1ZxiSzmyLYe7EYjW5XLcL+iUgcToNuH775Ypn+Py1OxOD4lS4BgWVNV7sdGriYuRDAN2rcugPbVscFoEeOcDWIDaHNKs651vDvmQQCc6M0EXsQ0W/NDdze36dgJ5AL2ZLV+8Ahe4ISoxflpRKjvl7Jl34+p0jESon1DLJA28/+n2FAbCifa5mZLvyHJ+gTSR5h3lLSZW7ZntrbeofVP6MZTYsPip6k5Kt0A8G/ABj3K4k7FIx4iM6UQWvPgFFOJ/vbCf8c7FXVDLHDid8V6qGwJ7TTRur3MJH6yVPiS1dltOQkIIAQcK1C+nTgi+EKY8RwwoOYw\"}"; // 文档中对应字段：xtoken，实际使用时请替换成真实参数
    $params->type = "marketing"; // 文档中对应字段：type，实际使用时请替换成真实参数
    $params->clientip = "101.7.0.4"; // 文档中对应字段：clientip，实际使用时请替换成真实参数
    $params->ts = 1466732231; // 文档中对应字段：ts，实际使用时请替换成真实参数
    $params->ev = "1"; // 文档中对应字段：ev，实际使用时请替换成真实参数
    $params->useragent = "Mozilla/2.0 (Macintosh, Intel Mac OS X 67_62_6) AppleWebKit/058.81 (KHTML, like Gecko) Chrome/48.2.0251.10 Safari/480.28"; // 文档中对应字段：useragent，实际使用时请替换成真实参数
    $params->phone = ""; // 文档中对应字段：phone，实际使用时请替换成真实参数

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