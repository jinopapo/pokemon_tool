<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Party
 *
 * @ORM\Table(name="pokemonOriginal")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PokemonOriginalRepository")
 */
class PokemonOriginal
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
     * @ORM\Column(type="integer")
     */
    private $h;

    /**
     * @ORM\Column(type="integer")
     */
    private $a;

    /**
     * @ORM\Column(type="integer")
     */
    private $b;

    /**
     * @ORM\Column(type="integer")
     */
    private $c;

    /**
     * @ORM\Column(type="integer")
     */
    private $d;

    /**
     * @ORM\Column(type="integer")
     */
    private $s;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $item;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get h
     *
     * @return int
     */
    public function getH()
    {
        return $this->h;
    }

    /**
     * Get a
     *
     * @return int
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * Get b
     *
     * @return int
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * Get c
     *
     * @return int
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * Get d
     *
     * @return int
     */
    public function getD()
    {
        return $this->d;
    }

    /**
     * Get s
     *
     * @return int
     */
    public function getS()
    {
        return $this->s;
    }

    /**
     * Get item
     *
     * @return string
     */
    public function getItem()
    {
        return $this->item;
    }

}

