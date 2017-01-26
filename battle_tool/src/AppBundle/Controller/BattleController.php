<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BattleController extends Controller
{
    /**
     * @Route("/battle", name="battle_index")
     */
    public function indexAction(Request $request)
    {
        $id = $request->query->get('id');
        $party = [
            ['ガブリアス','ボーマンダ','ギャラドス','ミミッキュ','カプコケコ','ギルガルド'],
            ['ドサイドン','キテルグマ','ベトベトン[ア]','アシレーヌ','パルシェン','ガラガラ[ア]']
        ];
        if ( $id >= count($party) || $id == NULL)
        {
            throw $this->createNotFoundException('');
        }
        return $this->render('battle/index.html.twig',[
            'party' => $party[$id],
        ]);
    }

    /**
     * @Route("/battle/status", name="battle_status")
     */
    public function statusAction()
    {
        return $this->render('battle/status.html.twig');
    }
}
