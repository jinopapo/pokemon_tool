<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Party;
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
        if ( $id == NULL)
        {
            throw $this->createNotFoundException('');
        }
        $party = $this->getDoctrine()->getRepository(Party::class)->findPokemonById($id);

        return $this->render('battle/index.html.twig',[
            'party' => $party,
            'id' => $id,
        ]);
    }

    /**
     * @Route("/battle/status", name="battle_status")
     */
    public function statusAction(Request $request)
    {
        $id = $request->query->get('id');
        if ( $id == NULL)
        {
            throw $this->createNotFoundException('');
        }
        $myParty = $this->getDoctrine()->getRepository(Party::class)->findPokemonById($id);
        return $this->render('battle/status.html.twig',[
            'myParty' => $myParty,
        ]);
    }
}
