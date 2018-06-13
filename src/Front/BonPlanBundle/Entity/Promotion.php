<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 31/05/2018
 * Time: 17:47
 */

namespace Front\BonPlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Promotion
 *
 * @ORM\Table(name="Promotion")
 * @ORM\Entity(repositoryClass="Front\BonPlanBundle\Repository\PromotionRepository")
 */
class Promotion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPromo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpromo;
    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProd", referencedColumnName="idProduit")
     * })
     */
    private $idprod;

    /**
     * @var float
     *
     * @ORM\Column(name="reduction", type="float", nullable=true)
     */
    private $reduction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeb", type="datetime", nullable=true)
     */
    private $datedeb;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime", nullable=true)
     */
    private $datefin;

    /**
     * @return int
     */
    public function getIdpromo()
    {
        return $this->idpromo;
    }

    /**
     * @param int $idpromo
     */
    public function setIdpromo($idpromo)
    {
        $this->idpromo = $idpromo;
    }

    /**
     * @return \Produit
     */
    public function getIdprod()
    {
        return $this->idprod;
    }

    /**
     * @param \Produit $idprod
     */
    public function setIdprod($idprod)
    {
        $this->idprod = $idprod;
    }

    /**
     * @return float
     */
    public function getReduction()
    {
        return $this->reduction;
    }

    /**
     * @param float $reduction
     */
    public function setReduction($reduction)
    {
        $this->reduction = $reduction;
    }

    /**
     * @return \DateTime
     */
    public function getDatedeb()
    {
        return $this->datedeb;
    }

    /**
     * @param \DateTime $datedeb
     */
    public function setDatedeb($datedeb)
    {
        $this->datedeb = $datedeb;
    }

    /**
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param \DateTime $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }


}