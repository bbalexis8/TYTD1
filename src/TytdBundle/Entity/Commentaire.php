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
     * @var int
     *
     * @ORM\Column(name="articleId", type="integer", unique=true)
     */
    private $articleId;

    /**
     * @var string
     *
     * @ORM\Column(name="auteurC", type="string", length=255)
     */
    private $auteurC;

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
     * Set articleId
     *
     * @param integer $articleId
     *
     * @return Commentaire
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;

        return $this;
    }

    /**
     * Get articleId
     *
     * @return int
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * Set auteurC
     *
     * @param string $auteurC
     *
     * @return Commentaire
     */
    public function setAuteurC($auteurC)
    {
        $this->auteurC = $auteurC;

        return $this;
    }

    /**
     * Get auteurC
     *
     * @return string
     */
    public function getAuteurC()
    {
        return $this->auteurC;
    }

    /**
     * Set texte
     *
     * @param string $texte
     *
     * @return Commentaire
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
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

