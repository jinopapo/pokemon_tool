<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PartyControllerTest extends WebTestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function testIsSuccessful($url,$status)
    {
        $client = self::createClient();
        $crawler = $client->request('GET', $url);
        $this->assertEquals($status, $client->getResponse()->getStatusCode());
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
        $path = $crawler->filter($attr);
        $path = $path->each(function ($node, $i){
            return explode('?', $node->attr('href'))[0];
        });
        $links = [];
        for($i = 0;$i < count($path);$i++)
        {
            $links[$i] = $link;
        }
        $this->assertEquals($links, $path);
    }

    public function urlProvider() {
        return array( array('/party',200),
                      array('/party/new',200),
                      array('/party/prop?id=0',200),
                      array('/party/prop',404),
        );
    }

    public function attrProvider() {
        return array( array('/party','party-new'),
                      array('/party','party-prop'),
                      array('/party','battle'),
                      array('/party/prop?id=0','party-new'),
        );
    }

    public function linkProvider() {
        return array( array('/party','.party-new','/party/new'),
                      array('/party','.party-prop','/party/prop'),
                      array('/party','.battle','/battle'),
                      array('/party/prop?id=0','.party-new','/party/new'),
        );
    }

}
