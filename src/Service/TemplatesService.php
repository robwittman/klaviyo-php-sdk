<?php

namespace Klaviyo\Service;


use GuzzleHttp\Psr7\Request;
use Klaviyo\Service;

class TemplatesService extends Service
{
    public function getAll()
    {
        $request = new Request('GET', $this->getApiPathUrl('email-templates'));
        return $this->getApi()->send($request);
    }

    public function create(array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl('email-templates'));
        return $this->getApi()->send($request, $params);
    }

    public function update($templateId, array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl("email-template/{$templateId}"));
        return $this->getApi()->send($request, $params);
    }

    public function delete($templateId)
    {
        $request = new Request('DELETE', $this->getApiPathUrl("email-template/{$templateId}"));
        return $this->getApi()->send($request);
    }

    public function clone($templateId, $name)
    {
        $request = new Request('POST', $this->getApiPathUrl("email-template/{$templateId}/clone"));
        return $this->getApi()->send($request, ['name' => $name]);
    }

    public function render($templateId, $context)
    {
        $request = new Request('POST', $this->getApiPathUrl("email-template/{$templateId}/render"));
        return $this->getApi()->send($request, ['context' => $context]);
    }

    public function send($templateId, array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl("email-template/{$templateId}/send"));
        return $this->getApi()->send($request, $params);
    }
}
