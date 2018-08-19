<?php

namespace Klaviyo\Service;

use GuzzleHttp\Psr7\Request;
use Klaviyo\Service;

class ListsServiceV2 extends Service
{
    protected $version = 'v2';

    public function getAll(array $params = [])
    {
        $request = new Request('GET', $this->getApiPathUrl('lists'));
        return $this->getApi()->send($request, $params);
    }

    public function create(array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl('lists'));
        return $this->getApi()->send($request, $params);
    }

    public function get($listId)
    {
        $request = new Request('GET', $this->getApiPathUrl("list/{$listId}"));
        return $this->getApi()->send($request);
    }

    public function update($listId, array $params)
    {
        $request = new Request('PUT', $this->getApiPathUrl("list/{$listId}"));
        return $this->getApi()->send($request, $params);
    }

    public function delete($listId)
    {
        $request = new Request('DELETE', $this->getApiPathUrl("list/{$listId}"));
        return $this->getApi()->send($request);
    }

    public function getSubscriptions($listId)
    {
        $request = new Request('GET', $this->getApiPathUrl("list/{$listId}/subscribe"));
        return $this->getApi()->send($request);
    }

    public function createSubscriptions($listId, array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl("list/{$listId}/subscribe"));
        return $this->getApi()->send($request);
    }

    public function deleteSubscriptions($listId, array $params)
    {
        $request = new Request('DELETE', $this->getApiPathUrl("list/{$listId}/subscribe"));
        return $this->getApi()->send($request);
    }

    public function getMembers($listId)
    {
        $request = new Request('GET', $this->getApiPathUrl("list/{$listId}/members"));
        return $this->getApi()->send($request);
    }

    public function addMember($listId, array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl("list/{$listId}/members"));
        return $this->getApi()->send($request, $params);
    }

    public function deleteMembed($listId, array $params)
    {
        $request = new Request('DELETE', $this->getApiPathUrl("list/{$listId}/members"));
        return $this->getApi()->send($request, $params);
    }

    public function getExclusions($listId)
    {
        $request = new Request('GET', $this->getApiPathUrl("list/{$listId}/exclusions/all"));
        return $this->getApi()->send($request);
    }

    public function getMembersInGroup($listId)
    {
        $request = new Request('GET', $this->getApiPathUrl("group/{$listId}/members/all"));
        return $this->getApi()->send($request);
    }
}
