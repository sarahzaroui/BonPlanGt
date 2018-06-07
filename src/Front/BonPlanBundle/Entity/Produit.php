<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 31/05/2018
 * Time: 16:57
 */

namespace Front\BonPlanBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="Produit")
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idProduit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproduit;

    /**
     * @var \Prestataire
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPrestataire", referencedColumnName="id")
     * })
     */
    private $idprestataire;
    /**
     * @var string
     *
     * @ORM\Column(name="nomPdt", type="string", length=254, nullable=true)
     */
    private $nompdt;

    /**
 * @var integer
 *
 * @ORM\Column(name="qteDispo", type="integer", nullable=true)
 */
    private $qtedispo;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="detailPdt", type="string", length=500, nullable=true)
     */
    private $detailpdt;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=254, nullable=true)
     */
    private $adresse;

    /**
     * @return int
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * @param int $idproduit
     */
    public function setIdproduit($idproduit)
    {
        $this->idproduit = $idproduit;
    }

    /**
     * @return \Prestataire
     */
    public function getIdprestataire()
    {
        return $this->idprestataire;
    }

    /**
     * @param \Prestataire $idprestataire
     */
    public function setIdprestataire($idprestataire)
    {
        $this->idprestataire = $idprestataire;
    }

    /**
     * @return string
     */
    public function getNompdt()
    {
        return $this->nompdt;
    }

    /**
     * @param string $nompdt
     */
    public function setNompdt($nompdt)
    {
        $this->nompdt = $nompdt;
    }

    /**
     * @return int
     */
    public function getQtedispo()
    {
        return $this->qtedispo;
    }

    /**
     * @param int $qtedispo
     */
    public function setQtedispo($qtedispo)
    {
        $this->qtedispo = $qtedispo;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return string
     */
    public function getDetailpdt()
    {
        return $this->detailpdt;
    }

    /**
     * @param string $detailpdt
     */
    public function setDetailpdt($detailpdt)
    {
        $this->detailpdt = $detailpdt;
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



}