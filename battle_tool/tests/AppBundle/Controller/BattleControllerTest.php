<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BattleControllerTest extends WebTestCase
{
        /**
     * @dataProvider urlProvider
     */
    public function testIsSuccessful($url)
    {
        $client = self::createClient();
        $crawler = $client->request('GET', $url);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


    /**
     * @depends testIsSuccessful
     * @dataProvider attrProvider
     */
    public function testIsContain($url,$attr)
    {
        $client = self::createClient();
        $crawler = $client->request('GET', $url);
        $crawler = $crawler->filter('a');
        $tags = $crawler->each(function ($node, $i) {
            return preg_split('/[\s,]+/', $node->attr('class'));
        });
        $classes = [];
        array_walk_recursive($tags, function ($value) use (&$classes) {
            $classes[] = $value;
        });
        $this->assertContains($attr, $classes);
    }


    /**
     * @depends testIsContain
     * @dataProvider linkProvider
     */
    public function testLinks($url,$attr,$link)
    {
        $client = self::createClient();
        $crawler = $client->request('GET', $url);
        $path = $crawler->filter($attr)->attr('href');
        $this->assertContains($path, $link);
    }

    public function urlProvider() {
        return array( array('/battle'),
                      array('/battle/status'),
        );
    }

    public function attrProvider() {
        return array( array('/battle','battle-status'),
        );
    }

    public function linkProvider() {
        return array( array('/battle','.battle-status','/battle/status'),
         );
    }
}
