<?php

namespace Front\BonPlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="Region", indexes={@ORM\Index(name="AK_Identifier_1",onDelete="CASCADE" ,columns={"idRegion"})})
 * @ORM\Entity
 */
/**
 * Class Region
 * @ORM\Entity(repositoryClass="Front\BonPlanBundle\Repository\RegionRepository")
 */
class Region
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRegion", type="integer", nullable=true)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idregion;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=true)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=254, nullable=true)
     */
    private $etat = "publié";

    /**
     * @return int
     */
    public function getIdregion()
    {
        return $this->idregion;
    }

    /**
     * @param int $idregion
     */
    public function setIdregion($idregion)
    {
        $this->idregion = $idregion;
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
     * @return string
     */
    public function getTyperegion()
    {
        return $this->typeregion;
    }

    /**
     * @param string $typeregion
     */
    public function setTyperegion($typeregion)
    {
        $this->typeregion = $typeregion;
    }

    /**
     * @return string
     */
    public function getRegionparente()
    {
        return $this->regionparente;
    }

    /**
     * @param string $regionparente
     */
    public function setRegionparente($regionparente)
    {
        $this->regionparente = $regionparente;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="typeregion", type="string", length=254, nullable=true)
     */
    private $typeregion;
    /**
     * @var string
     *
     * @ORM\Column(name="regionparante", type="string", length=254, nullable=true)
     */
    private $regionparente;

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

}

