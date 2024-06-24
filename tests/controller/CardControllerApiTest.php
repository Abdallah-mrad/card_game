<?php
/**
 * Created by PhpStorm.
 * User: Mrad
 */

namespace App\Tests\controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CardControllerApiTest extends WebTestCase
{
    public function testGetCards()
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/random-deck');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
    }
    public function testGetSortedCards()
    {
        $client = static::createClient();
        $client->request('POST', '/api/v1/sorted-deck', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            ['color' => 'Cœur', 'value' => 1],
            ['color' => 'Pique', 'value' => 13]
        ]));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
    }
    public function testGetSortedCardsWithInvalidData()
    {
        $client = static::createClient();
        $client->request('POST', '/api/v1/sorted-deck', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            ['color' => 'InvalidColor', 'value' => 1],
            ['color' => 'Pique', 'value' => 14] // Valeur non valide
        ]));

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
    }
    public function testGetSortedCardsWithException()
    {
        $client = static::createClient();
        $client->request('POST', '/api/v1/sorted-deck', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            ['color' => 'InvalidColor']
            ]));

        $this->assertEquals(500, $client->getResponse()->getStatusCode());
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
    }

}