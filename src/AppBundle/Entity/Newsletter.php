<?php

namespace AppBundle\Entity;

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


}

