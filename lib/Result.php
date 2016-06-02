<?php

/** 发送结果
 * Created by PhpStorm.
 * User: bingone
 * Date: 16/1/19
 * Time: 下午4:15
 */

class Result
{
    public $success;
    public $statusCode;
    public $requestData;
    public $responseData;
    public $error;
    public function __construct($statusCode=null,$requestData = null, $responseData = null,$error=null )
    {
        $this->success = false;
        if ($statusCode == 200)
            $this->success = true;
        $this->statusCode = $statusCode;
        $this->requestData = $requestData;
        $this->responseData = $responseData;
        $this->error = $error;
    }

    public function getData()
    {
        return $this->responseData;
    }
    public function isSuccess(){
        return $this->success;
    }
}