<?php

namespace TytdBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="TytdBundle\Repository\UtilisateurRepository")
 */
class Utilisateur
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
     * @ORM\Column(name="nomU", type="string", length=255)
     */
    private $nomU;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomU", type="string", length=255)
     */
    private $prenomU;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="codepostal", type="integer", nullable=true)
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255, nullable=true)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionU", type="text", nullable=true)
     */
    private $descriptionU;

    /**
     * @var string
     *
     * @ORM\Column(name="imageU", type="string", length=255, nullable=true)
     */
    private $imageU;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateinscription", type="datetime", nullable=true)
     */
    private $dateinscription;

    /**
     * @ORM\ManyToMany(targetEntity="TytdBundle\Entity\Evenement")
     */
    private $evenement;

    /**
     * @ORM\OneToMany(targetEntity="TytdBundle\Entity\Article", mappedBy="utilisateur")
     */
    private $article;

    /**
     * @ORM\OneToMany(targetEntity="TytdBundle\Entity\Commentaire", mappedBy="utilisateur")
     */
    private $commentaire;

    /**
     * @ORM\OneToMany(targetEntity="TytdBundle\Entity\Temoignage", mappedBy="utilisateur")
     */
    private $temoignage;

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
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param mixed $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

    /**
     * @return mixed
     */
    public function getEvenement()
    {
        return $this->evenement;
    }

    /**
     * @param mixed $evenement
     */
    public function setEvenement($evenement)
    {
        $this->evenement = $evenement;
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
     * Set nomU
     *
     * @param string $nomU
     *
     * @return Utilisateur
     */
    public function setNomU($nomU)
    {
        $this->nomU = $nomU;

        return $this;
    }

    /**
     * Get nomU
     *
     * @return string
     */
    public function getNomU()
    {
        return $this->nomU;
    }

    /**
     * Set prenomU
     *
     * @param string $prenomU
     *
     * @return Utilisateur
     */
    public function setPrenomU($prenomU)
    {
        $this->prenomU = $prenomU;

        return $this;
    }

    /**
     * Get prenomU
     *
     * @return string
     */
    public function getPrenomU()
    {
        return $this->prenomU;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Utilisateur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Utilisateur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codepostal
     *
     * @param integer $codepostal
     *
     * @return Utilisateur
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return int
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Utilisateur
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Utilisateur
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Utilisateur
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Utilisateur
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set descriptionU
     *
     * @param string $descriptionU
     *
     * @return Utilisateur
     */
    public function setDescriptionU($descriptionU)
    {
        $this->descriptionU = $descriptionU;

        return $this;
    }

    /**
     * Get descriptionU
     *
     * @return string
     */
    public function getDescriptionU()
    {
        return $this->descriptionU;
    }

    /**
     * Set imageU
     *
     * @param string $imageU
     *
     * @return Utilisateur
     */
    public function setImageU($imageU)
    {
        $this->imageU = $imageU;

        return $this;
    }

    /**
     * Get imageU
     *
     * @return string
     */
    public function getImageU()
    {
        return $this->imageU;
    }

    /**
     * Set dateinscription
     *
     * @param \DateTime $dateinscription
     *
     * @return Utilisateur
     */
    public function setDateinscription($dateinscription)
    {
        $this->dateinscription = $dateinscription;

        return $this;
    }

    /**
     * Get dateinscription
     *
     * @return \DateTime
     */
    public function getDateinscription()
    {
        return $this->dateinscription;
    }

}

