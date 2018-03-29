<?php

namespace AppBundle\Entity;

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
     * @var string
     *
     * @ORM\Column(name="nomGalerie", type="string", length=254, nullable=true)
     */
    private $nomgalerie;

    /**
     * @var integer
     *
     * @ORM\Column(name="idGalerie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgalerie;

    /**
     * @var \AppBundle\Entity\Article
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idArticle", referencedColumnName="idArticle")
     * })
     */
    private $idarticle;

    /**
     * @var \AppBundle\Entity\Evennement
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Evennement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEv", referencedColumnName="idEv")
     * })
     */
    private $idev;


}

