<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Party;
#use AppBundle\Form\PokemonRegist;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PartyController extends Controller
{

    /**
     * @Route("/party", name="party_index")
     */
    public function indexAction()
    {
        $party = $this->getDoctrine()->getRepository(Party::class)->findAllPokemon();
        $pokeItem = $this->getDoctrine()->getRepository(Party::class)->findAllItem();
        $partyName = $this->getDoctrine()->getRepository(Party::class)->findAllName();
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
        $party = new Party();
        #$form = $this->createForm(PokemonRegist::class, $party);
        $form = $this->createFormBuilder($party)
              ->add('id')
              ->getForm();
        return $this->render('party/new.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/party/prop", name="party_prop")
     */
    public function propAction(Request $request)
    {
        $id = $request->query->get('id');

        if ( $id == NULL)
        {
            throw $this->createNotFoundException('');
        }

        $party = $this->getDoctrine()->getRepository(Party::class)->findPokemonById($id);
        $pokeItem = $this->getDoctrine()->getRepository(Party::class)->findItemById($id);
        $partyName = $this->getDoctrine()->getRepository(Party::class)->findNameById($id);

        return $this->render('party/prop.html.twig',[
            'party' => $party,
            'pokeItem' => $pokeItem,
            'partyName' => $partyName,
        ]);
    }
}
