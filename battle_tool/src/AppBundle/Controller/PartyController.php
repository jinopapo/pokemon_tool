<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PartyController extends Controller
{

    const party=[
        ['ガブリアス','ボーマンダ','ギャラドス','ミミッキュ','カプコケコ','ギルガルド'],
        ['ドサイドン','キテルグマ','ベトベトン[ア]','アシレーヌ','パルシェン','ガラガラ[ア]']
    ];

    const pokeItem=[
        ['弱点保険','メガ','ドラゴンZ','メガ','きあいのタスキ','いのちのたま'],
        ['たつじんの帯','ゴツゴツメット','アシレーヌZ','とつげきチョッキ','おうじゃのしるし','ふといホネ']
    ];

    const partyName=[
        '厨ポケ',
        'ヤロテスタント'
    ];

    /**
     * @Route("/party", name="party_index")
     */
    public function indexAction()
    {
        $party=self::party;
        $pokeItem=self::pokeItem;
        $partyName=self::partyName;
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
    public function propAction(Request $request)
    {
        $id = $request->query->get('id');

        $party=self::party;
        $pokeItem=self::pokeItem;
        $partyName=self::partyName;

        if ( $id >= count($party) || $id == NULL)
        {
            throw $this->createNotFoundException('');
        }

        return $this->render('party/prop.html.twig',[
            'party' => $party[$id],
            'pokeItem' => $pokeItem[$id],
            'partyName' => $partyName[$id],
        ]);
    }
}
