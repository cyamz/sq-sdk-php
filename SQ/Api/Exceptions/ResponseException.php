<?php

namespace SQ\Api\Exceptions;

use Exception;

class ResponseException extends Exception
{
    public function __construct($message, $code = 0)
    {
        parent::__construct("返回值异常: " . $message, $code);
    }

}