<?php

namespace SQ\Api\Exceptions;

use Exception;

class ModelException extends Exception
{
    public function __construct($class_name, $message, $code = 0)
    {
        parent::__construct($class_name . " 数据合法化验证错误: " . $message, $code);
    }

}