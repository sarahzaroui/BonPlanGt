<?php

namespace Front\BonPlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="Article")
 * @ORM\Entity
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idArticle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarticle;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=254, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(name="imagename", type="string", length=500, nullable=true)
     */
    private $imagename;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=500, nullable=true)
     */

    private $adresse;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */

    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=254, nullable=true)
     */
    private $etat;

    /**
     * @var \Categoriearticle
     *
     * @ORM\ManyToOne(targetEntity="Categoriearticle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCatArt", referencedColumnName="idCatArt")
     * })
     */
    private $idcatart;

    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRegion", referencedColumnName="idRegion")
     * })
     */
    private $idregion;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @return int
     */
    public function getIdarticle()
    {
        return $this->idarticle;
    }

    /**
     * @param int $idarticle
     */
    public function setIdarticle($idarticle)
    {
        $this->idarticle = $idarticle;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImagename()
    {
        return $this->imagename;
    }

    /**
     * @param string $imagename
     */
    public function setImagename($imagename)
    {
        $this->imagename = $imagename;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return \Categoriearticle
     */
    public function getIdcatart()
    {
        return $this->idcatart;
    }

    /**
     * @param \Categoriearticle $idcatart
     */
    public function setIdcatart($idcatart)
    {
        $this->idcatart = $idcatart;
    }

    /**
     * @return \Region
     */
    public function getIdregion()
    {
        return $this->idregion;
    }

    /**
     * @param \Region $idregion
     */
    public function setIdregion($idregion)
    {
        $this->idregion = $idregion;
    }

    /**
     * @return \Client
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param \Client $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }



}

