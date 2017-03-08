<?php

namespace TytdBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="TytdBundle\Repository\CommentaireRepository")
 */
class Commentaire
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
     * @ORM\ManyToOne(targetEntity="TytdBundle\Entity\Article", inversedBy="article")
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity="TytdBundle\Entity\Utilisateur", inversedBy="commentaire")
     */
    private $utilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text")
     */
    private $texteC;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateC", type="datetime")
     */
    private $dateC;

    /**
     * @var string
     *
     * @ORM\Column(name="titreC", type="string", length=255)
     */
    private $titreC;


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
     * Set article
     *
     * @param integer $article
     *
     * @return Commentaire
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return int
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set utilisateur
     *
     * @param string $utilisateur
     *
     * @return Commentaire
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
     * Set texte
     *
     * @param string $texte
     *
     * @return Commentaire
     */
    public function setTexteC($texteC)
    {
        $this->texteC = $texteC;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */

    public function getTexteC()
    {
        return $this->texteC;
    }

    /**
     * Set dateC
     *
     * @param \DateTime $dateC
     *
     * @return Commentaire
     */
    public function setDateC($dateC)
    {
        $this->dateC = $dateC;

        return $this;
    }

    /**
     * Get dateC
     *
     * @return \DateTime
     */
    public function getDateC()
    {
        return $this->dateC;
    }

    /**
     * Set titreC
     *
     * @param string $titreC
     *
     * @return Commentaire
     */
    public function setTitreC($titreC)
    {
        $this->titreC = $titreC;

        return $this;
    }

    /**
     * Get titreC
     *
     * @return string
     */
    public function getTitreC()
    {
        return $this->titreC;
    }
}

