<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="Article", indexes={@ORM\Index(name="AK_Identifier_1", columns={"idArticle"}), @ORM\Index(name="FK_Client_Art", columns={"idUser"}), @ORM\Index(name="FK_Art_Resgion", columns={"idRegion"}), @ORM\Index(name="FK_Art_CatArt", columns={"idCatArt"})})
 * @ORM\Entity
 */
class Article
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
     * @ORM\Column(name="description", type="string", length=254, nullable=true)
     */
    private $description;

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
     * @var integer
     *
     * @ORM\Column(name="idArticle", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarticle;

    /**
     * @var \AppBundle\Entity\Categoriearticle
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categoriearticle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCatArt", referencedColumnName="idCatArt")
     * })
     */
    private $idcatart;

    /**
     * @var \AppBundle\Entity\Region
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRegion", referencedColumnName="idRegion")
     * })
     */
    private $idregion;

    /**
     * @var \AppBundle\Entity\Client
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;


}

