<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 31/05/2018
 * Time: 16:57
 */

namespace Front\BonPlanBundle\Entity;
use doctrine\ORM as ORM;

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
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id_produit;

    /**
     * @var \Prestataire
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prestataire", referencedColumnName="id")
     * })
     */
    private $id_prestataire;
    /**
     * @var string
     *
     * @ORM\Column(name="nom_pdt", type="string", length=254, nullable=true)
     */
    private $nom_pdt;

    /**
 * @var integer
 *
 * @ORM\Column(name="qte_dispo", type="integer", nullable=true)
 */
    private $qte_dispo;

    /**
     * @var float
     *
     * @ORM\Column(name="qte_dispo", type="float", nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="detail_pdt", type="string", length=500, nullable=true)
     */
    private $detail_pdt;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_pdt", type="string", length=254, nullable=true)
     */
    private $adresse;

    /**
     * @return int
     */
    public function getIdProduit()
    {
        return $this->id_produit;
    }

    /**
     * @param int $id_produit
     */
    public function setIdProduit($id_produit)
    {
        $this->id_produit = $id_produit;
    }

    /**
     * @return \Prestataire
     */
    public function getIdPrestataire()
    {
        return $this->id_prestataire;
    }

    /**
     * @param \Prestataire $id_prestataire
     */
    public function setIdPrestataire($id_prestataire)
    {
        $this->id_prestataire = $id_prestataire;
    }

    /**
     * @return string
     */
    public function getNomPdt()
    {
        return $this->nom_pdt;
    }

    /**
     * @param string $nom_pdt
     */
    public function setNomPdt($nom_pdt)
    {
        $this->nom_pdt = $nom_pdt;
    }

    /**
     * @return int
     */
    public function getQteDispo()
    {
        return $this->qte_dispo;
    }

    /**
     * @param int $qte_dispo
     */
    public function setQteDispo($qte_dispo)
    {
        $this->qte_dispo = $qte_dispo;
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
    public function getDetailPdt()
    {
        return $this->detail_pdt;
    }

    /**
     * @param string $detail_pdt
     */
    public function setDetailPdt($detail_pdt)
    {
        $this->detail_pdt = $detail_pdt;
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