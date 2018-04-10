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
     * @var integer
     *
     * @ORM\Column(name="idCatEv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcatev;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=true)
     */
    private $nom;

    /**
     * @return int
     */
    public function getIdcatev()
    {
        return $this->idcatev;
    }

    /**
     * @param int $idcatev
     */
    public function setIdcatev($idcatev)
    {
        $this->idcatev = $idcatev;
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

