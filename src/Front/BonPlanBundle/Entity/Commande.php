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
     * @ORM\Column(name="idCmd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcmd;

    /**
     * @var \utilisateur
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;

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
     * @var integer
     *
     * @ORM\Column(name="qteCmd", type="integer", nullable=true)
     */
    private $qtecmd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCmd", type="datetime", nullable=true)
     */
    private $datecmd;

    /**
     * @return int
     */
    public function getIdcmd()
    {
        return $this->idcmd;
    }

    /**
     * @param int $idcmd
     */
    public function setIdcmd($idcmd)
    {
        $this->idcmd = $idcmd;
    }

    /**
     * @return \utilisateur
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param \utilisateur $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
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
     * @return int
     */
    public function getQtecmd()
    {
        return $this->qtecmd;
    }

    /**
     * @param int $qtecmd
     */
    public function setQtecmd($qtecmd)
    {
        $this->qtecmd = $qtecmd;
    }

    /**
     * @return \DateTime
     */
    public function getDatecmd()
    {
        return $this->datecmd;
    }

    /**
     * @param \DateTime $datecmd
     */
    public function setDatecmd($datecmd)
    {
        $this->datecmd = $datecmd;
    }



}