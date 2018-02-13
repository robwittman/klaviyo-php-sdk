<?php

namespace Klaviyo;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Klaviyo
{
    protected $apiUrl = 'https://a.klaviyo.com';

    protected $client;

    protected $apiKey;

    public function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    public function getClient()
    {
        if (is_null($this->client)) {
            $this->initDefaultClient();
        }
        return $this->client;
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function request($path, $method = 'GET', array $params = array())
    {
        $params['api_key'] = $this->getApiKey();
        $requestUrl = $this->getApiUrl($path);
        $args = array();
        if ($method == 'GET') {
            $args['query'] = $params;
        } else {
            $args['json'] = $params;
        }
        $request = new Request($method, $requestUrl);
        $res = $this->client->send($request, $args);
        $body = json_decode($res->getBody()->getContents(), true);
        return $body;
    }

    protected function initDefaultClient()
    {
        $client = new Client();
        $this->client = $client;
    }

    protected function getApiUrl($path)
    {
        return sprintf(
            "%s/api/v1/%s",
            $this->apiUrl,
            $path
        );
    }
}
