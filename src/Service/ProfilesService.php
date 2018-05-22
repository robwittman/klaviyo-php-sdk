<?php

namespace Klaviyo\Service;

use GuzzleHttp\Psr7\Request;
use Klaviyo\Service;

class ProfilesService extends Service
{
    public function get($personId)
    {
        $request = new Request('GET', $this->getApiPathUrl("person/{$personId}"));
        return $this->getApi()->send($request);
    }

    public function update($personId, array $params)
    {
        $request = new Request('PUT', $this->getApiPathUrl("person/{$personId}"));
        return $this->getApi()->send($request, $params);
    }

    public function getEventTimeline($personId, array $params)
    {
        $request = new Request('GET', $this->getApiPathUrl("person/{$personId}/metrics/timeline"));
        return $this->getApi()->send($request, $params);
    }

    public function getEventTimelineForMetric($personId, $metricId, array $params = [])
    {
        $request = new Request('GET', $this->getApiPathUrl("person/{$personId}/metric/{$metricId}/timeline"));
        return $this->getApi()->send($request, $params);
    }
}


