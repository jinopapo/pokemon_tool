<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PartyController extends Controller
{
    /**
     * @Route("/party", name="party_index")
     */
    public function indexAction()
    {
        $party=[
            ['ガブリアス','ボーマンダ','ギャラドス','ミミッキュ','カプコケコ','ギルガルド'],
            ['ドサイドン','キテルグマ','ベトベトン[ア]','アシレーヌ','パルシェン','ガラガラ[ア]']
        ];
        $pokeItem=[
            ['弱点保険','メガ','ドラゴンZ','メガ','きあいのタスキ','いのちのたま'],
            ['たつじんの帯','ゴツゴツメット','アシレーヌZ','とつげきチョッキ','おうじゃのしるし','ふといホネ']
        ];
        $partyName=[
            '厨ポケ',
            'ヤロテスタント'
        ];
        return $this->render('party/index.html.twig',[
            'party' => $party,
            'pokeItem' => $pokeItem,
            'partyName' => $partyName,
        ]);
    }

    /**
     * @Route("/party/new", name="party_new")
     */
    public function newAction()
    {
        return $this->render('party/new.html.twig');
    }

    /**
     * @Route("/party/prop", name="party_prop")
     */
    public function propAction()
    {
        return $this->render('party/prop.html.twig');
    }
}
