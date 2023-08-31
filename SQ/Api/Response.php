<?php
namespace SQ\Api;

use SQ\Api\Exceptions\ResponseException;

class Response
{
    public const CLIENT_ERROR_CODE = 1004;
    public const SERVER_ERROR_CODE = 1005;
    public const CHANNEL_ERROR_CODE = 1006;

    protected $json;

    protected $error_code;
    protected $message;
    protected $return_data;

    public function __construct($api_result_json)
    {
        $this->json = $api_result_json;

        $api_result = @json_decode($api_result_json, true);
        if (!$api_result) {
            throw new ResponseException("获取到的返回值数据结构为非json，请联系圣骐开发者。");
        }

        $this->error_code = $api_result['error_code'];
        $this->message = $api_result['message'];
        $this->return_data = $api_result['return_data'];
    }

    /**
     * 返回原数据
     *
     * @return string
     */
    public function getJson()
    {
        return $this->json;
    }

    /**
     * 调用是否成功
     *
     * @return bool
     */
    public function ok()
    {
        return $this->error_code === 0;
    }

    /**
     * 获取错误码
     *
     * @return int
     */
    public function getErrorCode()
    {
        return $this->error_code;
    }

    /**
     * 调用失败时，返回的信息
     *
     * @return string
     */
    public function getErrorMessage()
    {
        if (!$this->ok()) {
            return $this->message;
        }

        return '';
    }

    /**
     * 调用成功时，返回的数据
     *
     * @return array
     */
    public function getSuccessResult()
    {
        return $this->return_data;
    }

}