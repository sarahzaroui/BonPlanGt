<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User", indexes={@ORM\Index(name="AK_Identifier_1", columns={"idUser"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=254, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=254, nullable=true)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=254, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=254, nullable=true)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=254, nullable=true)
     */
    private $etat;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;


}

