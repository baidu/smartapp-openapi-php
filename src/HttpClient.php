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

    public function setPath($value){
        $this->path = $value;
        return $this;
    }
    public function setHost($value){
        $this->host = $value;
        return $this;
    }
    public function setContentType($value){
        $this->contentType = $value;
        $header = "Content-Type:" . $value . ";";
        array_push($this->headers, $header);
        return $this;
    }

    //setMethod 设置请求方法
    public function setMethod($method){
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

    public function addHeader($key, $value){
        $header = $key .":". $value .";";
        array_push($this->headers, $header);
        return $this;
    }

    public function addPostParam($key, $value){
        $this->postParam[$key] = $value;
        return $this;
    }
    public function addGetParam($key, $value){
        $this->getParam[$key] = $value;
        return $this;
    }
    //setTimeoutMS 设置超时，单位毫秒从php 5.2.3版本开始支持
    public function setTimeoutMS($timeout){
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT_MS, $timeout);
        return $this;
    }

    //setConnectTimeoutMS 设置链接超时，单位毫秒从php 5.2.3版本开始支持
    public function setConnectTimeoutMS($timeout){
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT_MS, $timeout);
        return $this;
    }

    //setPostData 设置 post 参数
    //将参数$data url encode 之后设置到 postbody， content-type 人 
    public function setPostData($data){
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
            case "multipart/form-data":
                $this->curl_multipart_postfields($this->ch, $this->postParam);
                //curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->postParam);
                break;
            default:
                curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($this->postParam));
        }
    }
    //formatURL 设置url
    private function formatURL(){
        $url = "https://" . $this->host . $this->path . "?" . http_build_query($this->getParam);
        return $url;
    }
    //setURL 设置url
    private function setURL(){
        curl_setopt($this->ch, CURLOPT_URL, $this->formatURL());
        return $this;
    }

    function __destruct(){
        curl_close($this->ch);     
    }

    function curl_multipart_postfields($ch, $params = array()) {
        $assoc = array();
        $files = array();
        foreach($params as $k => $v){
            if (gettype($v) == "object" || gettype($v) =="class"){
                if (get_class($v) == "CURLFile") {
                    $files[$k] = $v->name;
                    continue;
                }
            } 
            $assoc[$k] = $v;
        }
        $this->curl_custom_postfields($ch, $assoc, $files);
    }
    function curl_custom_postfields($ch, $assoc = array(), $files = array()) {
        // invalid characters for "name" and "filename"
        static $disallow = array("\0", "\"", "\r", "\n");
        // build normal parameters
        foreach ($assoc as $k => $v) {
            $k = str_replace($disallow, "_", $k);
            $body[] = implode("\r\n", array(
                "Content-Disposition: form-data; name=\"{$k}\"",
                "",
                filter_var($v),
            ));
        }
       
        // build file parameters
        foreach ($files as $k => $v) {
            switch (true) {
                case false === $v = realpath(filter_var($v)):
                case !is_file($v):
                case !is_readable($v):
                    continue; // or return false, throw new InvalidArgumentException
            }
            $data = file_get_contents($v);
            //$v = call_user_func("end", explode(DIRECTORY_SEPARATOR, $v));
            $k = str_replace($disallow, "_", $k);
            // $v = str_replace($disallow, "_", $v);
            $v = basename($v);
            $body[] = implode("\r\n", array(
                "Content-Disposition: form-data; name=\"{$k}\"; filename=\"{$v}\"",
                "Content-Type: application/octet-stream",
                "",
                $data,
            ));
        }
       
        // generate safe boundary
        do {
            $boundary = "---------------------" . md5(mt_rand() . microtime());
        } while (preg_grep("/{$boundary}/", $body));
       
        // add boundary for each parameters
        array_walk($body, function (&$part) use ($boundary) {
            $part = "--{$boundary}\r\n{$part}";
        });
       
        // add final boundary
        $body[] = "--{$boundary}--";
        $body[] = "";
       
        // set options
        return @curl_setopt_array($ch, array(
            CURLOPT_POST       => true,
            CURLOPT_POSTFIELDS => implode("\r\n", $body),
            CURLOPT_HTTPHEADER => array(
                "Expect: 100-continue",
                "Content-Type: multipart/form-data; boundary={$boundary}", // change Content-Type
            ),
        ));
    }    
}