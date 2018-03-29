<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="Commentaire", indexes={@ORM\Index(name="AK_Identifier_1", columns={"idCommentaire"}), @ORM\Index(name="FK_Client_Commen", columns={"idUser"}), @ORM\Index(name="FK_Art_Comm", columns={"idArticle"}), @ORM\Index(name="FK_Even_Commen", columns={"idEv"})})
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=254, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="idCommentaire", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcommentaire;

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
     * @var \AppBundle\Entity\Client
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;

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

