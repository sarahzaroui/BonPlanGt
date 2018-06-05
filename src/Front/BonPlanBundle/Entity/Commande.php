<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 31/05/2018
 * Time: 17:46
 */

namespace Front\BonPlanBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="Commande")
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cmd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id_cmd;

    /**
     * @var \utilisateur
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $id_user;

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
     * @var integer
     *
     * @ORM\Column(name="qte_cmd", type="integer", nullable=true)
     */
    private $qte_cmd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_cmd", type="datetime", nullable=true)
     */
    private $date_cmd;

    /**
     * @return int
     */
    public function getIdCmd()
    {
        return $this->id_cmd;
    }

    /**
     * @param int $id_cmd
     */
    public function setIdCmd($id_cmd)
    {
        $this->id_cmd = $id_cmd;
    }

    /**
     * @return \utilisateur
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param \utilisateur $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
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
     * @return int
     */
    public function getQteCmd()
    {
        return $this->qte_cmd;
    }

    /**
     * @param int $qte_cmd
     */
    public function setQteCmd($qte_cmd)
    {
        $this->qte_cmd = $qte_cmd;
    }

    /**
     * @return \DateTime
     */
    public function getDateCmd()
    {
        return $this->date_cmd;
    }

    /**
     * @param \DateTime $date_cmd
     */
    public function setDateCmd($date_cmd)
    {
        $this->date_cmd = $date_cmd;
    }

}