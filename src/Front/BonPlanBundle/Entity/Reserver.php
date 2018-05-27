<?php

namespace Front\BonPlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reserver
 *
 * @ORM\Table(name="Reserver")
 * @ORM\Entity
 */
class Reserver
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idReservation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var \Client
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @var \Evennement
     *
     * @ORM\OneToOne(targetEntity="Evennement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEv", referencedColumnName="idEv")
     * })
     */
    private $idev;
    

    /**
     * @return int
     */
    public function getIdreservation()
    {
        return $this->idreservation;
    }

    /**
     * @param int $idreservation
     */
    public function setIdreservation($idreservation)
    {
        $this->idreservation = $idreservation;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return \Client
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param \Client $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    /**
     * @return \Evennement
     */
    public function getIdev()
    {
        return $this->idev;
    }

    /**
     * @param \Evennement $idev
     */
    public function setIdev($idev)
    {
        $this->idev = $idev;
    }




}

