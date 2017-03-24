<?php

namespace TytdBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="TytdBundle\Repository\CategorieRepository")
 */
class Categorie
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
     * @ORM\Column(name="nomCa", type="string", length=255)
     */
    private $nomCa;

    /**
     * @ORM\Column(name="imageCa", type="string")
     *
     * @Assert\NotBlank(message="Le fichier doit obligatoirement être en jpeg")
     * @Assert\File(mimeTypes={ "image/jpeg" }))
     */
    private $imageCa;

    /**
     * @ORM\OneToMany(targetEntity="TytdBundle\Entity\Article", mappedBy="categorie")
     */
    private $article;

    /**
     * @ORM\OneToMany(targetEntity="TytdBundle\Entity\Evenement", mappedBy="categorie")
     */
    private $evenement;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomCa
     *
     * @param string $nomCa
     *
     * @return Categorie
     */
    public function setNomCa($nomCa)
    {
        $this->nomCa = $nomCa;

        return $this;
    }

    /**
     * Get nomCa
     *
     * @return string
     */
    public function getNomCa()
    {
        return $this->nomCa;
    }

    /**
     * Set imageCa
     *
     * @param string $imageCa
     *
     * @return Categorie
     */
    public function setImageCa($imageCa)
    {
        $this->imageCa = $imageCa;

        return $this;
    }

    /**
     * Get imageCa
     *
     * @return string
     */
    public function getImageCa()
    {
        return $this->imageCa;
    }

}

