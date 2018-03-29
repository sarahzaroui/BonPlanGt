<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evennement
 *
 * @ORM\Table(name="Evennement", indexes={@ORM\Index(name="AK_Identifier_1", columns={"idEv"}), @ORM\Index(name="FK_Even_CatEv", columns={"idCatEv"}), @ORM\Index(name="FK_Region_Even", columns={"idRegion"}), @ORM\Index(name="FK_Even_Prest", columns={"idUser"})})
 * @ORM\Entity
 */
class Evennement
{
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
     * @var integer
     *
     * @ORM\Column(name="idEv", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idev;

    /**
     * @var \AppBundle\Entity\Categorieevenement
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categorieevenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCatEv", referencedColumnName="idCatEv")
     * })
     */
    private $idcatev;

    /**
     * @var \AppBundle\Entity\Prestataire
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prestataire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;

    /**
     * @var \AppBundle\Entity\Region
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRegion", referencedColumnName="idRegion")
     * })
     */
    private $idregion;


}

