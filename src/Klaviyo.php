<?php

namespace Klaviyo;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class Klaviyo
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Client
     */
    protected $client;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param Client $client
     * @return Klaviyo
     */
    public function setClient(Client $client): self
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        if (is_null($this->client)) {
            $this->initDefaultClient();
        }
        return $this->client;
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Config $config
     * @return $this
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return string
     */
    protected function getApiKey()
    {
        return $this->getConfig()->getApiKey();
    }

    /**
     * @param RequestInterface $request
     * @param array $params
     * @return mixed
     */
    public function send(RequestInterface $request, array $params = array())
    {
        $params['api_key'] = $this->getApiKey();
        $args = [];
        if ($request->getMethod() === 'GET') {
            $args['query'] = $params;
        } else {
            $args['json'] = $params;
        }

        $res = $this->getClient()->send($request, $args);
        $body = json_decode($res->getBody()->getContents(), true);
        return $body;
    }

    /**
     * @return void
     */
    protected function initDefaultClient(): void
    {
        $client = new Client(array(
            'base_uri' => $this->getConfig()->getApiUrl()
        ));
        $this->client = $client;
    }

    public function getApiUrl($path): string
    {
        return "api/v1/{$path}";
    }
}
