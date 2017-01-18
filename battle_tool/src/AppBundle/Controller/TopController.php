<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TopController extends Controller
{
    /**
     * @Route("/", name="toppage")
     */
    public function indexAction()
    {
        return $this->render('index.html.twig');
    }
}
