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
     * @var int
     *
     * @ORM\Column(name="evenementId", type="integer", unique=true)
     */
    private $evenementId;

    /**
     * @var string
     *
     * @ORM\Column(name="auteurT", type="string", length=255)
     */
    private $auteurT;

    /**
     * @var string
     *
     * @ORM\Column(name="texteT", type="text")
     */
    private $texteT;

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
     * Set evenementId
     *
     * @param integer $evenementId
     *
     * @return Temoignage
     */
    public function setEvenementId($evenementId)
    {
        $this->evenementId = $evenementId;

        return $this;
    }

    /**
     * Get evenementId
     *
     * @return int
     */
    public function getEvenementId()
    {
        return $this->evenementId;
    }

    /**
     * Set auteurT
     *
     * @param string $auteurT
     *
     * @return Temoignage
     */
    public function setAuteurT($auteurT)
    {
        $this->auteurT = $auteurT;

        return $this;
    }

    /**
     * Get auteurT
     *
     * @return string
     */
    public function getAuteurT()
    {
        return $this->auteurT;
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

