<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PartyController extends Controller
{
    /**
     *@Route("/party", name="party_index")
     */
    public function indexAction()
    {
        return $this->render('party/index.html.twig');
    }

    /**
     *@Route("/party/new", name="party_new")
     */
    public function newAction()
    {
        return $this->render('party/new.html.twig');
    }
}
