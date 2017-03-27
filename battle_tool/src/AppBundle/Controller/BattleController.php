<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Party;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

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
        $builder = $this->createFormBuilder();
        $builder
            ->add('name1',TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('name2',TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('name3',TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('name4',TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('name5',TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('name6',TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('name6',TextType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('starter1',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('starter2',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('starter3',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('starter4',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('starter5',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('starter6',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('choice1',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('choice2',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('choice3',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('choice4',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('choice5',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('choice6',CheckboxType::class,[
                'attr' => ['class' => 'form-control']
            ])
            ->add('save', SubmitType::class,[
                'label' => '対戦へ'
            ]);
        $form = $builder->getForm();
        return $this->render('battle/index.html.twig',[
            'party' => $party,
            'id' => $id,
            'form' => $form->createView(),
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
        $starter = [];
        $choice = [];
        $choicePokemon = [];
        for($i=0;$i<6;$i++){
            $starter[$i] = $request->query->get("starter$i");
            $choice[$i] = $request->query->get("choice$i");
            if($choice[$i]){
                array_push($choicePokemon,$myParty[$i]);
            }
        }
        return $this->render('battle/status.html.twig',[
            'myParty' => $myParty,
            'choice' => $choice,
            'starter' => $starter,
            'choicePokemon' => $choicePokemon,
        ]);
    }
}
