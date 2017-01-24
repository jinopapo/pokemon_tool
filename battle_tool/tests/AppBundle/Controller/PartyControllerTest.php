<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PartyControllerTest extends WebTestCase
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
        $path = explode('?', $path)[0];
        $this->assertContains($path, $link);
    }

    public function urlProvider() {
        return array( array('/party'),
                      array('/party/new'),
                      array('/party/prop'),
        );
    }

    public function attrProvider() {
        return array( array('/party','party-new'),
                      array('/party','party-prop'),
                      array('/party','battle'),
                      array('/party/prop','party-new'),
        );
    }

    public function linkProvider() {
        return array( array('/party','.party-new','/party/new'),
                      array('/party','.party-prop','/party/prop'),
                      array('/party','.battle','/battle'),
                      array('/party/prop','.party-new','/party/new'),
        );
    }

}
