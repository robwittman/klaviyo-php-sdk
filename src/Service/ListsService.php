<?php

namespace Klaviyo\Service;

use GuzzleHttp\Psr7\Request;
use Klaviyo\Service;

class ListsService extends Service
{
    protected $version = 'v1';

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

    public function getMembers($listId)
    {
        $request = new Request('GET', $this->getApiPathUrl("list/{$listId}/members"));
        return $this->getApi()->send($request);
    }

    public function getSegmentMembers($listId, array $params = [])
    {
        $request = new Request('GET', $this->getApiPathUrl("segment/{$listId}/members"));
        return $this->getApi()->send($request, $params);
    }

    public function addMember($listId, array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl("list/{$listId}/members"));
        return $this->getApi()->send($request, $params);
    }

    public function batchAddMembers($listId, array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl("list/{$listId}/members/batch"));
        return $this->getApi()->send($request, $params);
    }

    public function deleteBatchMembers($listId, array $params)
    {
        $request = new Request('DELETE', $this->getApiPathUrl("list/{$listId}/members/batch"));
        return $this->getApi()->send($request, $params);
    }

    public function excludeMember($listId, array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl("list/{$listId}/members/exclude"));
        return $this->getApi()->send($request, $params);
    }

    public function getExclusions($listId, array $params)
    {
        $request = new Request('GET', $this->getApiPathUrl("list/{$listId}/exclusions"));
        return $this->getApi()->send($request, $params);
    }

    public function getGlobalExclusions(array $params)
    {
        $request = new Request('GET', $this->getApiPathUrl("people/exclusions"));
        return $this->getApi()->send($request, $params);
    }

    public function addGlobalExclusion(array $params)
    {
        $request = new Request('POST', $this->getApiPathUrl("people/exclusions"));
        return $this->getApi()->send($request, $params);
    }
}
