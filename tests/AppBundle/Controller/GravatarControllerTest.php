<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GravatarControllerTest extends WebTestCase
{
    public function testGenerate()
    {
        $client = static::createClient();

        $client->request('GET', '/gravatr');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());

        $client->request('GET', '/gravatr/');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());

        $client->request('GET', '/gravatr/example@example.com');
        $this->assertEquals('http://www.gravatar.com/avatar/23463b99b62a72f26ed677cc556c44e8', $client->getResponse()->getContent());

        $client->request('GET', '/gravatr/example@example.net');
        $this->assertEquals('http://www.gravatar.com/avatar/993a9c97fc1c7035a555f512504a84e3', $client->getResponse()->getContent());
    }
}
