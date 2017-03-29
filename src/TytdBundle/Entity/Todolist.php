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
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePrevue", type="datetime", nullable=true)
     */
    private $datePrevue;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuPrevu", type="string", length=255, nullable=true)
     */
    private $lieuPrevu;

    /**
     * @var int
     *
     * @ORM\Column(name="nbInvites", type="integer", nullable=true)
     */
    private $nbInvites;

    /**
     * @var string
     *
     * @ORM\Column(name="titreEvent", type="string", length=255)
     */
    private $titreEvent;

    /**
     * @var int
     *
     * @ORM\Column(name="budget", type="integer")
     */
    private $budget;

    /**
     * @var string
     *
     * @ORM\Column(name="programme", type="text")
     */
    private $programme;


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

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Todolist
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set datePrevue
     *
     * @param \DateTime $datePrevue
     *
     * @return Todolist
     */
    public function setDatePrevue($datePrevue)
    {
        $this->datePrevue = $datePrevue;

        return $this;
    }

    /**
     * Get datePrevue
     *
     * @return \DateTime
     */
    public function getDatePrevue()
    {
        return $this->datePrevue;
    }

    /**
     * Set lieuPrevu
     *
     * @param string $lieuPrevu
     *
     * @return Todolist
     */
    public function setLieuPrevu($lieuPrevu)
    {
        $this->lieuPrevu = $lieuPrevu;

        return $this;
    }

    /**
     * Get lieuPrevu
     *
     * @return string
     */
    public function getLieuPrevu()
    {
        return $this->lieuPrevu;
    }

    /**
     * Set nbInvites
     *
     * @param integer $nbInvites
     *
     * @return Todolist
     */
    public function setNbInvites($nbInvites)
    {
        $this->nbInvites = $nbInvites;

        return $this;
    }

    /**
     * Get nbInvites
     *
     * @return int
     */
    public function getNbInvites()
    {
        return $this->nbInvites;
    }

    /**
     * Set titreEvent
     *
     * @param string $titreEvent
     *
     * @return Todolist
     */
    public function setTitreEvent($titreEvent)
    {
        $this->titreEvent = $titreEvent;

        return $this;
    }

    /**
     * Get titreEvent
     *
     * @return string
     */
    public function getTitreEvent()
    {
        return $this->titreEvent;
    }

    /**
     * Set budget
     *
     * @param integer $budget
     *
     * @return Todolist
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return int
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set programme
     *
     * @param string $programme
     *
     * @return Todolist
     */
    public function setProgramme($programme)
    {
        $this->programme = $programme;

        return $this;
    }

    /**
     * Get programme
     *
     * @return string
     */
    public function getProgramme()
    {
        return $this->programme;
    }








}

