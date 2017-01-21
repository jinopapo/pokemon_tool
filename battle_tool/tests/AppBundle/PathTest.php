<?php

namespace Tests\AppBundle;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PathTest extends WebTestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient(); $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * @dataProvider urlProvider
     */
    public function testHeaderPath($url)
    {
        $client = self::createClient();
        $crawler = $client->request('GET', $url);
        $link = $crawler->filter('a:contains("top")')->link();
        $client->click($link);
        $this->assertTrue($client->getResponse()->isSuccessful());
        $link = $crawler->filter('a:contains("パーティー")')->link();
        $client->click($link);
        $this->assertTrue($client->getResponse()->isSuccessful());
        $link = $crawler->filter('a:contains("対戦")')->link();
        $client->click($link);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider() {
        return array( array('/'),
                      array('/party'),
                      array('/party/new'),
                      array('/party/prop'),
                      array('/battle'),
                      array('/battle/status'),
        );
    }
}
