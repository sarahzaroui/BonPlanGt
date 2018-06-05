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
 * @ORM\Entity
 */
class Promotion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_promo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id_promo;
    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prod", referencedColumnName="id_produit")
     * })
     */
    private $id_prod;

    /**
     * @var float
     *
     * @ORM\Column(name="reduction", type="float", nullable=true)
     */
    private $reduction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_deb", type="datetime", nullable=true)
     */
    private $date_deb;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=true)
     */
    private $date_fin;

    /**
     * @return int
     */
    public function getIdPromo()
    {
        return $this->id_promo;
    }

    /**
     * @param int $id_promo
     */
    public function setIdPromo($id_promo)
    {
        $this->id_promo = $id_promo;
    }

    /**
     * @return \Produit
     */
    public function getIdProd()
    {
        return $this->id_prod;
    }

    /**
     * @param \Produit $id_prod
     */
    public function setIdProd($id_prod)
    {
        $this->id_prod = $id_prod;
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
    public function getDateDeb()
    {
        return $this->date_deb;
    }

    /**
     * @param \DateTime $date_deb
     */
    public function setDateDeb($date_deb)
    {
        $this->date_deb = $date_deb;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @param \DateTime $date_fin
     */
    public function setDateFin($date_fin)
    {
        $this->date_fin = $date_fin;
    }

}