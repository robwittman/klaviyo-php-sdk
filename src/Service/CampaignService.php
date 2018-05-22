<?php

namespace Klaviyo\Service;

use GuzzleHttp\Psr7\Request;
use Klaviyo\Service;

class CampaignService extends Service
{
    public function getAll(array $params = [])
    {
        $request = new Request('GET', $this->getApiPathUrl('campaigns'));
        return $this->getApi()->send($request, $params);
    }

    public function create(array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl('campaigns'));
        return $this->getApi()->send($request, $params);
    }

    public function get($campaignId)
    {
        $request = new Request('GET', $this->getApiPathUrl("campaign/{$campaignId}"));
        return $this->getApi()->send($request);
    }

    public function update($campaignId, array $params = [])
    {
        $request = new Request('PUT', $this->getApiPathUrl("campaign/{$campaignId}"));
        return $this->getApi()->send($request);
    }

    public function send($campaignId)
    {
        $request = new Request('POST', $this->getApiPathUrl("campaign/{$campaignId}/send"));
        return $this->getApi()->send($request);
    }

    public function schedule($campaignId)
    {
        $request = new Request('POST', $this->getApiPathUrl("campaign/{$campaignId}/schedule"));
        return $this->getApi()->send($request);
    }

    public function cancel($campaignId)
    {
        $request = new Request('POST', $this->getApiPathUrl("campaign/{$campaignId}/cancel"));
        return $this->getApi()->send($request);
    }

    public function clone($campaignId)
    {
        $request = new Request('POST', $this->getApiPathUrl("campaign/{$campaignId}/clone"));
        return $this->getApi()->send($request);
    }

    public function getRecipients($campaignId)
    {
        $request = new Request('GET', $this->getApiPathUrl("campaign/{$campaignId}/recipients"));
        return $this->getApi()->send($request);
    }
}

