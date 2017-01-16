<?php

namespace BattleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TopController extends Controller
{
    /**
     *@Route("/")
     */
    public function indexAction()
    {
        return $this->render('BattleBundle:Top:index.html.twig');
    }

    /**
     *@Route("/user/{id}")
     */
    public function userTopAction()
    {
        return $this->render('BattleBundle:Top:user_top.html.twig');
    }

    /**
     *@Route("/party/new")
     */
    public function partyNewAction()
    {
        return $this->render('BattleBundle:Top:party_new.html.twig');
    }

    /**
     *@Route("/battle")
     */
    public function battleAction()
    {
        return $this->render('BattleBundle:Top:battle.html.twig');
    }
}
