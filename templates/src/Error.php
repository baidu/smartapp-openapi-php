<?php
namespace BaiduSmartapp\OpenapiClient;

const ERROR_TYPE_CLIENT = 1;
const ERROR_TYPE_SERVER = 2;

class Error{
    private $errType;
    private $errMsg;
    function __construct(int $errType, string $errMsg){
        $this->errType = $errType;
        $this->errMsg = $errMsg;
    }

    public function getErrMsg(){
        return $this->errMsg;
    }

    public function getErrType(){
        return $this->errType;
    }
}