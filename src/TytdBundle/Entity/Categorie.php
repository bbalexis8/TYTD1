<?php

namespace TytdBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="imageCa", type="text", nullable=true)
     */
    private $imageCa;


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

