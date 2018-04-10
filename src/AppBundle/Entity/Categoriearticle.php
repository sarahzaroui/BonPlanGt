<?php

namespace AppBundle\Entity;

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

    /**
     * @return int
     */
    public function getIdcatart()
    {
        return $this->idcatart;
    }

    /**
     * @param int $idcatart
     */
    public function setIdcatart($idcatart)
    {
        $this->idcatart = $idcatart;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


}

