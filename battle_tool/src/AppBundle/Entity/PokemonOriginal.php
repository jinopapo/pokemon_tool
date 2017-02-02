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
     * Set id
     *
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * Set name
     *
     */
    public function setName($name)
    {
        $this->name = $name;
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

    /**
     * Set item
     *
     */
    public function setItem($item)
    {
        $this->item = $item;
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
     * Set h
     *
     */
    public function setH($h)
    {
        $this->h = $h;
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
     * Set a
     *
     */
    public function setA($a)
    {
        $this->a = $a;
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
     * Set b
     *
     */
    public function setB()
    {
        $this->b = $b;
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
     * Set c
     *
     */
    public function setC()
    {
        $this->c = $c;
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
     * Get d
     *
     */
    public function setD()
    {
        $this->d = $d;
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
     * Set s
     *
     */
    public function setS()
    {
        $this->s = $s;
    }
}

