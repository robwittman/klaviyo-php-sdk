<?php

namespace Klaviyo;

abstract class Service
{
    /**
     * @var Klaviyo
     */
    protected $api;

    protected $version = 'v1';
    /**
     * Service constructor.
     * @param Klaviyo $api
     */
    public function __construct(Klaviyo $api)
    {
        $this->api = $api;
    }

    public function getApi(): Klaviyo
    {
        return $this->api;
    }

    protected function getApiPathUrl($path): string
    {
        return "api/{$this->version}/{$path}";
    }
}
