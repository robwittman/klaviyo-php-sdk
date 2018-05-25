<?php

namespace Klaviyo;

class Config
{
    /**
     * @var string
     */
    protected $apiUrl = 'https://a.klaviyo.com';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @param string $apiUrl
     * @return $this
     */
    public function setApiUrl($apiUrl): self
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiKey
     * @return $this
     */
    public function setApiKey($apiKey): self
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }
}
