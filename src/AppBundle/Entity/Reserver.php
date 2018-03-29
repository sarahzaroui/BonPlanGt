<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reserver
 *
 * @ORM\Table(name="Reserver", indexes={@ORM\Index(name="AK_Identifier_1", columns={"idReservation"}), @ORM\Index(name="FK_Even_Reser", columns={"idEv"}), @ORM\Index(name="IDX_40003CC5FE6E88D7", columns={"idUser"})})
 * @ORM\Entity
 */
class Reserver
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="idReservation", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idreservation;

    /**
     * @var \AppBundle\Entity\Client
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;

    /**
     * @var \AppBundle\Entity\Evennement
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Evennement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEv", referencedColumnName="idEv")
     * })
     */
    private $idev;


}

