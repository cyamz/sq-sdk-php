<?php
namespace SQ\Api\Services;

class BaseService
{
    protected $request_service = null;

    public function __construct($client_code, $client_secret, $version = '1')
    {
        $this->request_service = new RequestService($client_code, $client_secret, $version);
    }

}