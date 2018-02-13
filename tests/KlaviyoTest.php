<?php

namespace Klaviyo\Tests;

use Klaviyo\Klaviyo;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class KlaviyoTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->sut = new Klaviyo();
    }

    public function testGetSetApiKey()
    {
        $this->sut->setApiKey('api-key');
        $this->assertEquals('api-key', $this->sut->getApiKey());
    }

    public function testGetSetClient()
    {
        $client = new Client();
        $this->sut->setClient($client);
        $this->assertEquals($client, $this->sut->getClient());
    }

    public function testGetRequestAddsQueryParams()
    {
        $client = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $client
            ->expects($this->once())
            ->method('send')
            ->with(
                $this->anything(),
                array('query' => array(
                    'test' => 'true',
                    'api_key' => 'api-key'
                ))
            )
            ->willReturn($this->getMockResponse());
        $this->sut
            ->setClient($client)
            ->setApiKey('api-key');
        $res = $this->sut->request('/email-templates', 'GET', array(
            'test' => 'true'
        ));
    }

    public function testPostRequestAddsJsonParams()
    {
        $client = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $client
            ->expects($this->once())
            ->method('send')
            ->with(
                $this->anything(),
                array('json' => array(
                    'test' => 'true',
                    'api_key' => 'api-key'
                ))
            )
            ->willReturn($this->getMockResponse());
        $this->sut
            ->setClient($client)
            ->setApiKey('api-key');
        $res = $this->sut->request('/email-templates', 'POST', array(
            'test' => 'true'
        ));
    }

    protected function getMockResponse(array $data = array())
    {
        $body = $this->getMockBuilder(StreamInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $body->write(json_encode($data));
        $response = $this->getMockBuilder(ResponseInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $response->method('getBody')->willReturn($body);
        return $response;
    }
}
