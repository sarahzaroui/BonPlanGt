<?php

namespace AppBundle\Entity;

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


}

