<?php

namespace Front\BonPlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evennement
 *
 * @ORM\Table(name="Evennement")
 * @ORM\Entity
 */
class Evennement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idev;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=true)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDabut", type="datetime", nullable=true)
     */
    private $datedabut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateExpiration", type="datetime", nullable=true)
     */
    private $dateexpiration;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=254, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=254, nullable=true)
     */
    private $image;

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }



    /**
     * @return int
     */
    public function getIdev()
    {
        return $this->idev;
    }

    /**
     * @param int $idev
     */
    public function setIdev($idev)
    {
        $this->idev = $idev;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return \DateTime
     */
    public function getDatedabut()
    {
        return $this->datedabut;
    }

    /**
     * @param \DateTime $datedabut
     */
    public function setDatedabut($datedabut)
    {
        $this->datedabut = $datedabut;
    }

    /**
     * @return \DateTime
     */
    public function getDateexpiration()
    {
        return $this->dateexpiration;
    }

    /**
     * @param \DateTime $dateexpiration
     */
    public function setDateexpiration($dateexpiration)
    {
        $this->dateexpiration = $dateexpiration;
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
     * @return \Categorieevenement
     */
    public function getIdcatev()
    {
        return $this->idcatev;
    }

    /**
     * @param \Categorieevenement $idcatev
     */
    public function setIdcatev($idcatev)
    {
        $this->idcatev = $idcatev;
    }

    /**
     * @return \Prestataire
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param \Prestataire $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
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
     * @var \Categorieevenement
     *
     * @ORM\ManyToOne(targetEntity="Categorieevenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCatEv", referencedColumnName="idCatEv")
     * })
     */
    private $idcatev;

    /**
     * @var \Prestataire
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;

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
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Front\BonPlanBundle\Entity\Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idArticle", referencedColumnName="idArticle")
     * })
     */
    private $idArticle;

    /**
     * @return \Article
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * @param \Article $idArticle
     */
    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;
    }


}

