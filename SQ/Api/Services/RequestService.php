<?php
namespace SQ\Api\Services;

use SQ\Api\Models\Model;
use SQ\Api\Response;

class RequestService
{
    protected $url = 'http://oms.sq-exp.com/';

    protected $client_code;
    protected $client_secret;
    protected $version;

    public function __construct($client_code, $client_secret, $version = '1')
    {
        $this->client_code = $client_code;
        $this->client_secret = $client_secret;

        $this->version = 'v' . $version;
    }

    /**
     * 调用方法
     *
     * @param string $method
     * @param array|Model $data
     * @return Response
     */
    public function makeRequest($method, $data = [])
    {
        if ($data instanceof Model) {
            $data = $data->toArray();
        }

        $date = date('Y-m-d H:i:s');
        $sign = SignService::Sign($data, $date, $this->client_secret);

        $request_data_arr = [
            'client_code' => $this->client_code,
            'data' => $data,
            'time' => $date,
            'sign' => $sign,
        ];
        $request_data = base64_encode(json_encode($request_data_arr));

        $url = $this->url . $this->version . '/' . $method;
        $api_result_json = $this->curlRequest($url, compact('request_data'));

        $response = new Response($api_result_json);

        return $response;
    }

    private function curlRequest($url, $data = [])
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: multipart/form-data',
        ]);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

}