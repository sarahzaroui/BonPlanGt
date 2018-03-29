<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="Region", indexes={@ORM\Index(name="AK_Identifier_1", columns={"idRegion"})})
 * @ORM\Entity
 */
class Region
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
     * @ORM\Column(name="idRegion", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idregion;


}

