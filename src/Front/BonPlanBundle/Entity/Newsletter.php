<?php

namespace Front\BonPlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Newsletter
 *
 * @ORM\Table(name="Newsletter", indexes={@ORM\Index(name="AK_Identifier_1", columns={"idNewsl"})})
 * @ORM\Entity
 */
class Newsletter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idNewsl", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnewsl;
    /**
     * @var string
     *
     * @ORM\Column(name="mailinter", type="string", length=254, nullable=true)
     */
    private $mailinter;
    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=254, nullable=true)
     */
    private $subject;
    /**
     * @var string
     *
     * @ORM\Column(name="mailtext", type="string", length=600, nullable=true)
     */
    private $mailtext;
    /**
     * @return int
     */
    public function getIdnewsl()
    {
        return $this->idnewsl;
    }

    /**
     * @param int $idnewsl
     */
    public function setIdnewsl($idnewsl)
    {
        $this->idnewsl = $idnewsl;
    }

    /**
     * @return string
     */
    public function getMailinter()
    {
        return $this->mailinter;
    }

    /**
     * @param string $mailinter
     */
    public function setMailinter($mailinter)
    {
        $this->mailinter = $mailinter;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getMailtext()
    {
        return $this->mailtext;
    }

    /**
     * @param string $mailtext
     */
    public function setMailtext($mailtext)
    {
        $this->mailtext = $mailtext;
    }


}

