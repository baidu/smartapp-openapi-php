# 项目名称 
百度智能小程序服务端 OpenAPI PHP SDK for TP，是基于小程序服务端 OpenAPI 封装的一套让第三方开发者方便使用的 SDK， 它可以帮开发者减少理解和使用 OpenAPI 的成本， 减少开发者直接调用服务端接口不当而引起的错误， 避免在开发中走弯路。

## 环境要求
- php版本不低于 5.5.0

## 目录说明
1. src/ openapi实现源码
2. examples/ 各方法调用样例

## 使用引导
1. 在项目下创建，composer.json
2. 引入sdk的依赖
   {
    "require": {
        "baidu-smartapp/openapi": "0.1.2"
    }
   }
3. composer install 后，就可以在您的项目中引入 require __DIR__ . '/vendor/autoload.php'; 后就可以开始使用啦！
3. 参考examples中的使用方式，调用您需要的SDK函数。
4. 函数具体功能参考文档：https://smartprogram.baidu.com/docs/third/introduction_for_thirdparty_sdk/ 。

## 联系我们
如流群号 "5702992", 如流下载地址：https://infoflow.baidu.com/