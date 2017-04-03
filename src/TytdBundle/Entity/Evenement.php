<?php

namespace TytdBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="TytdBundle\Repository\EvenementRepository")
 */
class Evenement
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
     * @ORM\ManyToOne(targetEntity="TytdBundle\Entity\Categorie", inversedBy="evenement")
     */
    private $categorie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateE", type="datetime")
     */
    private $dateE;

    /**
     * @ORM\OneToMany(targetEntity="TytdBundle\Entity\Temoignage", mappedBy="evenement")
     */
    private $temoignage;

    /**
     * @ORM\ManyToOne(targetEntity="TytdBundle\Entity\Utilisateur",inversedBy="evenement" )
     */
    private $utilisateur;

    /**
     * @ORM\ManyToMany(targetEntity="TytdBundle\Entity\Todolist",mappedBy="evenements", cascade={"persist"})
     */
    private $todolists;


    public function __construct()
    {
        $this->todolists = new ArrayCollection();
    }

    /**
     * @param $todolist \TytdBundle\Entity\Todolist
     */
    public function addTodo($todolist)
    {
        if (!$this->todolists->contains($todolist)) {
            $this->todolists[] = $todolist;
        }
    }

    /**
     * @param $todolist \TytdBundle\Entity\Todolist
     */
    public function supprimerTodo($todolist)
    {
        if (!$this->todolists->contains($todolist)) {
            $this->todolists ->removeElement($todolist);
        }
    }

    /**
     * @return ArrayCollection|\TytdBundle\Entity\Todolist[]
     */
    public function getTodolists()
    {
        return $this->todolists;
    }

    /**
     * @return mixed
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * @param mixed $utilisateur
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;
    }

    /**
     * @return mixed
     */
    public function getTemoignage()
    {
        return $this->temoignage;
    }

    /**
     * @param mixed $temoignage
     */
    public function setTemoignage($temoignage)
    {
        $this->temoignage = $temoignage;
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
     * @return Evenement
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
     * Set categorie
     *
     * @param integer $categorie
     *
     * @return Evenement
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return int
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set dateE
     *
     * @param \DateTime $dateE
     *
     * @return Evenement
     */
    public function setDateE($dateE)
    {
        $this->dateE = $dateE;

        return $this;
    }

    /**
     * Get dateE
     *
     * @return string
     */
    public function getDateE()
    {
        return $this->dateE;
    }

}

