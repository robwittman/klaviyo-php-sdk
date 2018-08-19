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
        return $this->getApi()->send($request, $params, 'json');
    }

    public function create(array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl('lists'));
        return $this->getApi()->send($request, $params, 'json');
    }

    public function get($listId)
    {
        $request = new Request('GET', $this->getApiPathUrl("list/{$listId}"));
        return $this->getApi()->send($request, 'json');
    }

    public function update($listId, array $params)
    {
        $request = new Request('PUT', $this->getApiPathUrl("list/{$listId}"));
        return $this->getApi()->send($request, $params, 'json');
    }

    public function delete($listId)
    {
        $request = new Request('DELETE', $this->getApiPathUrl("list/{$listId}"));
        return $this->getApi()->send($request, 'json');
    }

    public function getSubscriptions($listId)
    {
        $request = new Request('GET', $this->getApiPathUrl("list/{$listId}/subscribe"));
        return $this->getApi()->send($request, 'json');
    }

    public function createSubscriptions($listId, array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl("list/{$listId}/subscribe"));
        return $this->getApi()->send($request, 'json');
    }

    public function deleteSubscriptions($listId, array $params)
    {
        $request = new Request('DELETE', $this->getApiPathUrl("list/{$listId}/subscribe"));
        return $this->getApi()->send($request, 'json');
    }

    public function getMembers($listId)
    {
        $request = new Request('GET', $this->getApiPathUrl("list/{$listId}/members"));
        return $this->getApi()->send($request, 'json');
    }

    public function addMember($listId, array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl("list/{$listId}/members"));
        return $this->getApi()->send($request, $params, 'json');
    }

    public function deleteMembed($listId, array $params)
    {
        $request = new Request('DELETE', $this->getApiPathUrl("list/{$listId}/members"));
        return $this->getApi()->send($request, $params, 'json');
    }

    public function getExclusions($listId)
    {
        $request = new Request('GET', $this->getApiPathUrl("list/{$listId}/exclusions/all"));
        return $this->getApi()->send($request, 'json');
    }

    public function getMembersInGroup($listId)
    {
        $request = new Request('GET', $this->getApiPathUrl("group/{$listId}/members/all"));
        return $this->getApi()->send($request, 'json');
    }
}
