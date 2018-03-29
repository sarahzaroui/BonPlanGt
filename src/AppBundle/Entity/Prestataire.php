<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestataire
 *
 * @ORM\Table(name="Prestataire", indexes={@ORM\Index(name="FK_NewsL_Prest", columns={"idNewsl"})})
 * @ORM\Entity
 */
class Prestataire
{
    /**
     * @var string
     *
     * @ORM\Column(name="raisonSocial", type="string", length=254, nullable=true)
     */
    private $raisonsocial;

    /**
     * @var string
     *
     * @ORM\Column(name="matriculeFiscale", type="string", length=254, nullable=true)
     */
    private $matriculefiscale;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=254, nullable=true)
     */
    private $adresse;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;

    /**
     * @var \AppBundle\Entity\Newsletter
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Newsletter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idNewsl", referencedColumnName="idNewsl")
     * })
     */
    private $idnewsl;


}

