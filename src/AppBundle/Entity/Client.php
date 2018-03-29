<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="Client", indexes={@ORM\Index(name="FK_NewsL_Client", columns={"idNewsl"})})
 * @ORM\Entity
 */
class Client
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
     * @ORM\Column(name="prenom", type="string", length=254, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="situationFamiliale", type="string", length=254, nullable=true)
     */
    private $situationfamiliale;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=254, nullable=true)
     */
    private $genre;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

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

