<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Party
 *
 * @ORM\Table(name="party")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartyRepository")
 */
class Party
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pokemon1;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pokemon2;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pokemon3;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pokemon4;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pokemon5;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pokemon6;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

