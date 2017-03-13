<?php

namespace TytdBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Temoignage
 *
 * @ORM\Table(name="temoignage")
 * @ORM\Entity(repositoryClass="TytdBundle\Repository\TemoignageRepository")
 */
class Temoignage
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
     * @ORM\ManyToOne(targetEntity="TytdBundle\Entity\Evenement", inversedBy="temoignage")
     */
    private $evenement;

    /**
     * @ORM\ManyToOne(targetEntity="TytdBundle\Entity\Utilisateur", inversedBy="temoignage")
     */
    private $utilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="texteT", type="text")
     */
    private $texteT;

    /**
     * @var string
     *
     * @ORM\Column(name="description_t", type="text")
     */
    private $descriptionT;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_t", type="text")
     */
    private $titreT;

    /**
     * @return string
     */
    public function getTitreT(): string
    {
        return $this->titreT;
    }

    /**
     * @param string $titreT
     */
    public function setTitreT(string $titreT)
    {
        $this->titreT = $titreT;
    }
    /**
     * @return string
     */
    public function getDescriptionT(): string
    {
        return $this->descriptionT;
    }

    /**
     * @param string $descriptionT
     */
    public function setDescriptionT(string $descriptionT)
    {
        $this->descriptionT = $descriptionT;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateT", type="datetime")
     */
    private $dateT;


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
     * Set evenement
     *
     * @param integer $evenement
     *
     * @return Temoignage
     */
    public function setEvenement($evenement)
    {
        $this->evenement = $evenement;

        return $this;
    }

    /**
     * Get evenement
     *
     * @return int
     */
    public function getEvenement()
    {
        return $this->evenement;
    }

    /**
     * Set utilisateur
     *
     * @param string $utilisateur
     *
     * @return Temoignage
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return string
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set texteT
     *
     * @param string $texteT
     *
     * @return Temoignage
     */
    public function setTexteT($texteT)
    {
        $this->texteT = $texteT;

        return $this;
    }

    /**
     * Get texteT
     *
     * @return string
     */
    public function getTexteT()
    {
        return $this->texteT;
    }

    /**
     * Set dateT
     *
     * @param \DateTime $dateT
     *
     * @return Temoignage
     */
    public function setDateT($dateT)
    {
        $this->dateT = $dateT;

        return $this;
    }

    /**
     * Get dateT
     *
     * @return \DateTime
     */
    public function getDateT()
    {
        return $this->dateT;
    }

}

