<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorieevenement
 *
 * @ORM\Table(name="CategorieEvenement", indexes={@ORM\Index(name="AK_Identifier_1", columns={"idCatEv"})})
 * @ORM\Entity
 */
class Categorieevenement
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
     * @ORM\Column(name="idCatEv", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcatev;


}

