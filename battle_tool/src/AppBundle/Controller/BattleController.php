<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BattleController extends Controller
{
    /**
     * @Route("/battle", name="battle_index")
     */
    public function indexAction()
    {
        return $this->render('battle/index.html.twig');
    }

    /**
     * @Route("/battle/status", name="battle_status")
     */
    public function statusAction()
    {
        return $this->render('battle/status.html.twig');
    }
}
