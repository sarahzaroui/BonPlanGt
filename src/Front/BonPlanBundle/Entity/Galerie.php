<?php

namespace Front\BonPlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Galerie
 *
 * @ORM\Table(name="Galerie", indexes={@ORM\Index(name="FK_Even_Galerie", columns={"idEv"}), @ORM\Index(name="FK_Art_Gal", columns={"idArticle"})})
 * @ORM\Entity
 */
class Galerie
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=true)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="idGalerie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgalerie;

    /**
     * @var string
     *
     * @ORM\Column(name="nomGalerie", type="string", length=254, nullable=true)
     */
    private $nomgalerie;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idArticle", referencedColumnName="idArticle")
     * })
     */
    private $idarticle;

    /**
     * @var \Evennement
     *
     * @ORM\ManyToOne(targetEntity="Evennement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEv", referencedColumnName="idEv")
     * })
     */
    private $idev;

   /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProduit", referencedColumnName="idProduit")
     * })
     */
    private $idproduit;
}

