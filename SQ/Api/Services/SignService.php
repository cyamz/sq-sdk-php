<?php
namespace SQ\Api\Services;

class SignService
{
    /**
     * 加密
     *
     * @param array $data
     * @param string $date
     * @param string $client_secret
     * @return string
     */
    public static function Sign($data, $date, $client_secret)
    {
        $sign_arr = [
            $client_secret,
            $data,
            $date
        ];
        sort($sign_arr);

        return strtolower(md5(json_encode($sign_arr, JSON_UNESCAPED_SLASHES)));
    }


}