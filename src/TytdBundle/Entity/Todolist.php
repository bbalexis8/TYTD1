<?php

namespace TytdBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Todolist
 *
 * @ORM\Table(name="todolist")
 * @ORM\Entity(repositoryClass="TytdBundle\Repository\TodolistRepository")
 */
class Todolist
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;


    /**
     * @ORM\ManyToMany(targetEntity="TytdBundle\Entity\Evenement",mappedBy="todolists", cascade={"persist"} )
     */
    private $evenements;


    public function __construct()
    {
        $this ->evenements = new ArrayCollection();
    }

    /**
     * @param  $evenement\TytdBundle\Entity\Evenement
     */
    public function addMonEvent($evenement)
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
        }
    }

    /**
     * @param  $evenement\TytdBundle\Entity\Evenement
     */
    public function supprimerMonEvent($evenement)
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements ->removeElement($evenement);
        }
    }

    /**
     * @return ArrayCollection |\TytdBundle\Entity\Evenement[]
     */
    public function getEvenements()
    {
        return $this->evenements;
    }

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Todolist
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

}