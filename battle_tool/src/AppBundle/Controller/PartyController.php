<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Party;
use AppBundle\Entity\PokemonOriginal;
use AppBundle\Form\PokemonRegistType;
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
        $form = [];
        for($i=0;$i<6;$i++)
        {
            $pokemon = new PokemonOriginal();
            $form = $this->createForm(PokemonRegistType::class, $pokemon);
            $forms[] = $form;
        }
        return $this->render('party/new.html.twig',[
            'form1' => $forms[0]->createView(),
            'form2' => $forms[1]->createView(),
            'form3' => $forms[2]->createView(),
            'form4' => $forms[3]->createView(),
            'form5' => $forms[4]->createView(),
            'form6' => $forms[5]->createView(),
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
