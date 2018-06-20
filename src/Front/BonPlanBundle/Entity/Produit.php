<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 31/05/2018
 * Time: 16:57
 */

namespace Front\BonPlanBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Produit
 *
 * @ORM\Table(name="Produit")
 * @ORM\Entity(repositoryClass="Front\BonPlanBundle\Repository\ProduitRepository")
 * @Vich\Uploadable
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
    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="image_name", type="string", length=255, nullable=true)
     */
    private $imageName;

    public function getIdproduit()
    {
        return $this->idproduit;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * @param string $lien
     */
    public function setLien($lien)
    {
        $this->lien = $lien;
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

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }


    public function __toString()
    {
        return $this->getNompdt();
    }
}