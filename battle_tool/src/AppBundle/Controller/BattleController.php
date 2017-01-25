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
            ['ガブリアス','ボーマンダ','ギャラドス','ミミッキュ','カプコケコ','ギルガルド']
        ];

        if ( $id >= count($party))
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
