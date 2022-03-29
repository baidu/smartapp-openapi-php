<?php
// 本示例基于百度智能小程序服务端开发者 OpenAPI-SDK-PHP
// 使用该示例需要利用 composer 包管理平台，使用引导见：https://smartprogram.baidu.com/docs/develop/serverapi/introduction_for_openapi_sdk/
// 如使用过程中遇到问题，可以加入如流群：5702992，进行反馈咨询

// 使用 composer 上的 SDK 时的引入依赖命令
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . "bootstrap.php";

function main(){
    $obj = new BaiduSmartapp\OpenapiClient\TP\Pay\CreatePayAccount();
    // 开发者在此设置请求参数，文档示例中的参数均为示例参数，实际参数请参考对应接口的文档上方的参数说明填写
    // 注意：代码示例中的参数字段基本是驼峰形式，而文档中的参数说明的参数字段基本是下划线形式
	// 如果开发者不想传非必需参数，可以将设置该参数的行注释
    $params = new BaiduSmartapp\OpenapiClient\TP\Pay\CreatePayAccountRequest();
    $params->accessToken = "#token"; // 文档中对应字段：access_token，实际使用时请替换成真实参数
    $params->businessScope = "科技产品"; // 文档中对应字段：business_scope，实际使用时请替换成真实参数
    $params->businessProvince = "广东省"; // 文档中对应字段：business_province，实际使用时请替换成真实参数
    $params->businessCity = "深圳市"; // 文档中对应字段：business_city，实际使用时请替换成真实参数
    $params->businessDetailAddress = "广东省南山市百度深圳研究院"; // 文档中对应字段：business_detail_address，实际使用时请替换成真实参数
    $params->legalPerson = "百小度"; // 文档中对应字段：legal_person，实际使用时请替换成真实参数
    $params->legalId = "107341645708735412"; // 文档中对应字段：legal_id，实际使用时请替换成真实参数
    $params->idCardFrontUrl = "https://mbs0.bdstatic.com/searchbox/mappconsole/image/27775703/08feb1a4-d15b-777c-0812-54cfff34c8a6.jpg"; // 文档中对应字段：id_card_front_url，实际使用时请替换成真实参数
    $params->idCardBackUrl = "https://mbs5.bdstatic.com/searchbox/mappconsole/image/23517267/83feb8a3-d10b-060c-3854-73cfff31c7a6.jpg"; // 文档中对应字段：id_card_back_url，实际使用时请替换成真实参数
    $params->legalCardStartTime = "2270-16-48"; // 文档中对应字段：legal_card_start_time，实际使用时请替换成真实参数
    $params->legalCardEndTime = "2645-56-61"; // 文档中对应字段：legal_card_end_time，实际使用时请替换成真实参数
    $params->licenseStartTime = "2446-21-51"; // 文档中对应字段：license_start_time，实际使用时请替换成真实参数
    $params->licenseEndTime = "2606-81-14"; // 文档中对应字段：license_end_time，实际使用时请替换成真实参数
    $params->industryId = 116; // 文档中对应字段：industry_id，实际使用时请替换成真实参数
    $params->managePermitUrl = "manage_permit_url"; // 文档中对应字段：manage_permit_url，实际使用时请替换成真实参数
    $params->authCapital = "176"; // 文档中对应字段：auth_capital，实际使用时请替换成真实参数
    $params->managerSame = 1; // 文档中对应字段：manager_same，实际使用时请替换成真实参数
    $params->manager = "Bob"; // 文档中对应字段：manager，实际使用时请替换成真实参数
    $params->managerCard = "184584836276301848"; // 文档中对应字段：manager_card，实际使用时请替换成真实参数
    $params->managerCardType = 1; // 文档中对应字段：manager_card_type，实际使用时请替换成真实参数
    $params->managerCardFrontUrl = "manager_card_front_url"; // 文档中对应字段：manager_card_front_url，实际使用时请替换成真实参数
    $params->managerCardBackUrl = "manager_card_back_url"; // 文档中对应字段：manager_card_back_url，实际使用时请替换成真实参数
    $params->managerCardStartTime = "2413-02-67"; // 文档中对应字段：manager_card_start_time，实际使用时请替换成真实参数
    $params->managerCardEndTime = "2144-88-12"; // 文档中对应字段：manager_card_end_time，实际使用时请替换成真实参数
    $params->benefitSame = 1; // 文档中对应字段：benefit_same，实际使用时请替换成真实参数
    $params->benefit = "Bob"; // 文档中对应字段：benefit，实际使用时请替换成真实参数
    $params->benefitCard = "174652441156515716"; // 文档中对应字段：benefit_card，实际使用时请替换成真实参数
    $params->benefitCardType = 1; // 文档中对应字段：benefit_card_type，实际使用时请替换成真实参数
    $params->benefitCardFrontUrl = "manager_card_front_url"; // 文档中对应字段：benefit_card_front_url，实际使用时请替换成真实参数
    $params->benefitCardBackUrl = "manager_card_back_url"; // 文档中对应字段：benefit_card_back_url，实际使用时请替换成真实参数
    $params->benefitStartTime = "2330-25-74"; // 文档中对应字段：benefit_start_time，实际使用时请替换成真实参数
    $params->benefitEndTime = "2825-78-53"; // 文档中对应字段：benefit_end_time，实际使用时请替换成真实参数

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