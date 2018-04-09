<?php

namespace Front\BonPlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoriearticle
 *
 * @ORM\Table(name="CategorieArticle", indexes={@ORM\Index(name="AK_Identifier_1", columns={"idCatArt"})})
 * @ORM\Entity
 */
class Categoriearticle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCatArt", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcatart;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=true)
     */
    private $nom;


}

