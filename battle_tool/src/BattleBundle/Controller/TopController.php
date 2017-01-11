<?php

namespace BattleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TopController extends Controller
{
    public function indexAction()
    {
        return $this->render('BattleBundle:Top:index.html.twig');
    }
}
