<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Entity\Party;
use AppBundle\Repository\PartyRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Presistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BattleControllerTest extends WebTestCase
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

    /**
     * @depends testLinks
     * @dataProvider partyProvider
     */
    public function testIndexAction($id,$party)
    {
        $client = self::createClient();

        $crawler = $client->request('GET', "/battle?id=$id");
        $names = $crawler->filter('.poke-name');
        $names = $names->each(function ($node, $i) {
            return $node->text();
        });
        $this->assertArraySubset($party, $names);
    }

    public function urlProvider() {
        return array( array('/battle?id=0',200),
                      array('/battle',404),
                      array('/battle/status',200),
        );
    }

    public function attrProvider() {
        return array( array('/battle?id=0','battle-status'),
        );
    }

    public function linkProvider() {
        return array( array('/battle?id=0','.battle-status','/battle/status'),
         );
    }

    public function partyProvider()
    {
        return array( array(0,['ガブリアス','ボーマンダ','ギャラドス','ミミッキュ','カプコケコ','ギルガルド']));
    }
}
