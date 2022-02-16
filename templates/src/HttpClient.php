<?php
namespace BaiduSmartapp\OpenapiClient;

class HttpClient{
    private $ch;
    private $contentType;
    private $method;
    private $getParam;
    private $postParam;
    private $host;
    private $path;
    private $headers;

    function __construct(){
        $this->ch = curl_init();
        $this->setConnectTimeoutMS(1000);
        $this->setTimeoutMS(2000);
        $this->headers = array();
    }

    public function setPath(string $value){
        $this->path = $value;
        return $this;
    }
    public function setHost(string $value){
        $this->host = $value;
        return $this;
    }
    public function setContentType(string $value){
        $this->contentType = $value;
        $header = "Content-Type:" . $value . ";";
        array_push($this->headers, $header);
        return $this;
    }

    //setMethod 设置请求方法
    public function setMethod(string $method){
        $this->method = $method;
        switch ($method) {
            case "POST":
                curl_setopt($this->ch, CURLOPT_POST, true);
                break;
            case "GET":
                curl_setopt($this->ch, CURLOPT_HTTPGET, true);
                break;
        }
        return $this;
    }

    public function addHeader(string $key, string $value){
        $header = $key .":". $value .";";
        array_push($this->headers, $header);
        return $this;
    }

    public function addPostParam(string $key, string $value){
        $this->postParam[$key] = $value;
        return $this;
    }
    public function addGetParam(string $key, string $value){
        $this->getParam[$key] = $value;
        return $this;
    }
    //setTimeoutMS 设置超时，单位毫秒从php 5.2.3版本开始支持
    public function setTimeoutMS(int $timeout){
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT_MS, $timeout);
        return $this;
    }

    //setConnectTimeoutMS 设置链接超时，单位毫秒从php 5.2.3版本开始支持
    public function setConnectTimeoutMS(int $timeout){
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT_MS, $timeout);
        return $this;
    }

    //setPostData 设置 post 参数
    //将参数$data url encode 之后设置到 postbody， content-type 人 
    public function setPostData(array $data){
        $this->postParam = $data;
        return $this;
    }
    public function execute(){
        $this->setURL();
        $this->setHeaders();
        $this->setBody();
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_HEADER, true);
        $body = curl_exec($this->ch);
        $headerSize =  curl_getinfo($this->ch, CURLINFO_HEADER_SIZE);
        $response = array(
            'status_code' =>  curl_getinfo($this->ch, CURLINFO_HTTP_CODE),
            'header' => substr($body, 0, $headerSize),
            'content_type' => curl_getinfo($this->ch, CURLINFO_CONTENT_TYPE),
            'body' => substr($body, $headerSize),
        );
        return $response;
    }
    private function setHeaders(){
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $this->headers);
    }

    private function setBody(){
        if ($this->method === "GET"){
            return $this;
        }
        switch ($this->contentType){
            case "application/json":
                curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($this->postParam));
                break;
            default:
                curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($this->postParam));
        }
    }
    //setURL 设置url
    private function setURL(){
        $url = "https://" . $this->host . $this->path . "?" . http_build_query($this->getParam);
        curl_setopt($this->ch, CURLOPT_URL, $url);
        return $this;
    }

    function __destruct(){
        curl_close($this->ch);     
    }
}