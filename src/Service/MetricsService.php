<?php

namespace Klaviyo\Service;

use GuzzleHttp\Psr7\Request;
use Klaviyo\Service;

class MetricsService extends Service
{
    public function getAll(array $params = [])
    {
        $request = new Request('GET', $this->getApiPathUrl('metrics'));
        return $this->getApi()->send($request, $params);
    }

    public function getTimeline(array $params = [])
    {
        $request = new Request('GET', $this->getApiPathUrl('metrics/timeline'));
        return $this->getApi()->send($request, $params);
    }

    public function getTimelineForMetric($metricId, array $params = [])
    {
        $request = new Request('GET', $this->getApiPathUrl("metrics/{$metricId}/timeline"));
        return $this->getApi()->send($request, $params);
    }

    public function export($metricId, array $params = [])
    {
        $request = new Request('GET', $this->getApiPathUrl("metrics/{$metricId}/export"));
        return $this->getApi()->send($request, $params);
    }
}
