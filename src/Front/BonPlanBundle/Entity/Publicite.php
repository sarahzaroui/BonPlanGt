<?php
/**
 * Created by PhpStorm.
 * User: Elliot
 * Date: 01/06/2018
 * Time: 15:22
 */

namespace Front\BonPlanBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Publicite
 *
 * @ORM\Table(name="Publicite")
 * @ORM\Entity
 */
class Publicite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idpublicite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpublicite;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=254, nullable=true)
     */
    private $libelle;
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=254, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer",  nullable=true)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="tarif", type="integer",  nullable=true)
     */
    private $tarif;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=254, nullable=true)
     */
    private $etat = "publié";

    /**
     * @return int
     */
    public function getIdpublicite()
    {
        return $this->idpublicite;
    }

    /**
     * @param int $idpublicte
     */
    public function setIdpublicite($idpublicite)
    {
        $this->idpublicte = $idpublicite;
    }




    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param int $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return string
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * @param string $tarif
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

    }


}