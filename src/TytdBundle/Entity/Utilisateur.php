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
     * @var text
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

