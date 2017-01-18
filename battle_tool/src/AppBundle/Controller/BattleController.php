<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BattleController extends Controller
{
    /**
     * @Route("/battle", name="battle_index")
     */
    public function battleAction()
    {
        return $this->render('battle/index.html.twig');
    }
}
